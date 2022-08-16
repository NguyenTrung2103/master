<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserRequest;
use App\Http\Requests\SendMailUserProfileRequest;
use App\Models\User;
use App\Repositories\Admin\Role\RoleRepositoryInterface as RoleRepository;
use App\Repositories\Admin\User\UserRepositoryInterface as UserRepository;
use App\Services\MailService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserContrller extends Controller
{
    protected $userRepository;

    protected $roleRepository;

    protected $mailService;

    protected $file;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(MailService $mailService, UserRepository $userRepository, RoleRepository $roleRepository)
    {
        $this->mailService = $mailService;
        $this->userRepository = $userRepository;
        $this->roleRepository = $roleRepository;
    }

    public function index()
    {
        return view('admin.users.index', [
            'users' => $this->userRepository->with('roles')->paginate(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create', [
            'roles' => $this->roleRepository->getAll(),
            'isShow' => false,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $data = $request->validated();
        $data['verified_at'] = now();
        $data['type'] = User::TYPES['admin'];
        $data['password'] = Hash::make($data['password']);

        DB::beginTransaction();

        try {
            $user = $this->userRepository->save($data);
            $user->roles()->sync($request->input('role'));
            DB::commit();

            return redirect()->route('admin.user.index', $user->id)->with(
                'success',
                __('user.create.success')
            );
        } catch (\Exception) {
            DB::rollback();

            return redirect()->back()->with(
                'error',
                __('user.create.error')
            );
        }
    }

    public function sendMail()
    {
        return view('sendmail', [
            'users' => $this->userRepository->getAll(),
        ]);
    }

    public function sendMailUser(SendMailUserProfileRequest $request)
    {
        $targetMail = $request->validated()['email'];
        $fileAttached = $request->validated()['attachment'] ?? null;
        $users = $this->userRepository->getAll();

        $users = (! strcmp($targetMail, 'all'))
            ? $users
            : $users->where('email', $targetMail);

        try {
            $users->each(fn ($user) => $this->mailService->sendUserProfile($user, $fileAttached));

            return redirect()->back()->with(
                'success',
                __('user.send-mail.success')
            );
        } catch (\Exception) {
            return redirect()->back()->with(
                'error',
                __('user.send-mail.error')
            );
        }
    }

    private function getUsers()
    {
        return collect(Session::get('users'));
    }

    public function show($id)
    {
        if (! $user = $this->userRepository->findById($id)) {
            abort(404);
        }

        return view('admin.users.show', [
            'user' => $user,
            'roles' => $this->roleRepository->getAll(),
            'isShow' => true,
        ]);
    }

    public function edit($id)
    {
        if (! $user = $this->userRepository->findById($id)) {
            abort(404);
        }

        return view('admin.users.edit', [
            'user' => $user,
            'roles' => $this->roleRepository->getAll(),
            'isShow' => false,
        ]);
    }

    public function update(UserRequest $request, $id)
    {
        DB::beginTransaction();

        try {
            $user = $this->userRepository->save($request->validated(), ['id' => $id]);
            $user->roles()->sync($request->input('role_ids'));
            DB::commit();

            return redirect()->route('admin.user.show', $id)->with(
                'success',
                __('user.update.success')
            );
        } catch (\Exception) {
            DB::rollback();

            return redirect()->back()->with(
                'error',
                __('user.update.error')
            );
        }
    }

    public function destroy($id)
    {
        DB::beginTransaction();

        try {
            $this->userRepository->findById($id)->roles()->detach();
            $this->userRepository->deleteById($id);
            DB::commit();

            return redirect()->route('admin.user.index')->with(
                'success',
                __('user.delete.success')
            );
        } catch (\Exception) {
            DB::rollback();

            return redirect()->back()->with(
                'error',
                __('user.delete.error')
            );
        }
    }
}
