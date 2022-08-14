<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserRequest;
use App\Http\Requests\SendMailUserProfileRequest;
use App\Repositories\Admin\User\UserRepositoryInterface as UserRepository;
use App\Repositories\Admin\Role\RoleRepositoryInterface as RoleRepository;
use App\Services\MailService;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Validation\Rule;
use App\Models\User;

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
    public function __construct(MailService $mailService, UserRepository $userRepository,RoleRepository $roleRepository)
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
        return view('admin.users.create',[
            'roles' => $this->roleRepository->getAll(),
            'isShow'=> false,
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
        return view('sendmail', ['users' => $this->getUsers()]);
    }

    

    

    public function sendMailUser(SendMailUserProfileRequest $request)
    {
        $targetMail = $request->validated()['email'];
        $users = $this->getUsers();
        $path = public_path('uploads');
        $attachment = null;
        if ($request->file('attachment')) {
            $attachment = $request->file('attachment');
        }
        if (! strcmp($targetMail, 'all')) {
            $users->each(function ($user) {
                $this->mailService->sendUserProfile($user->firstWhere('email'), $this->file);
            });

            return redirect()->back();
        }
        $user = $users->firstWhere('email', $targetMail);
        $this->mailService->sendUserProfile($user, $attachment);

        return redirect()->back()->with('success', 'Mail sent successfully.');
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
            $user->roles()->sync($request->input('role'));
            DB::commit();

            return redirect()->route('admin.user.show', $id)->with(
                'success',
                __('user.update.success')
            );
        } catch (Exception) {
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
