<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CustomerRequest;
use App\Repositories\Admin\Customer\CustomerRepositoryInterface as CustomerRepository;
use App\Repositories\Admin\Role\RoleRepositoryInterface as RoleRepository;
use App\Repositories\Admin\User\UserRepositoryInterface as UserRepository;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    protected $userRepository;

    protected $roleRepository;

    protected $customerRepository;

    public function __construct(customerRepository $customerRepository, UserRepository $userRepository, RoleRepository $roleRepository)
    {
        $this->customerRepository = $customerRepository;
        $this->userRepository = $userRepository;
        $this->roleRepository = $roleRepository;
    }

    public function index()
    {
        return view('admin.customer.index', [
            'customers' => $this->customerRepository->paginate(),
        ]);
    }

    public function create()
    {
        return view('admin.customer.create', [
            'roles' => $this->roleRepository->getAll(),
            'users' => $this->userRepository->getAll(),
            'isShow' => false,
        ]);
    }

    public function store(CustomerRequest $request)
    {
        $data = $request->validated();
        $data['mkh'] = 'DG'. $data['cmnd'];
        
        DB::beginTransaction();
        try {
            $customer = $this->customerRepository->save($data);
            //$customer->roles()->sync($request->input('role_id'));
            // $customer->users()->sync($request->input('user_id'));
            DB::commit();

            return redirect()->route('admin.customer.index', $customer->id)->with(
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

    public function edit($id)
    {
        if (! $customer = $this->customerRepository->findById($id)) {
            abort(404);
        }

        return view('admin.customer.edit', [
            'customer' => $customer,
            'roles' => $this->roleRepository->getAll(),
            'users' => $this->userRepository->getAll(),
            'isShow' => false,
        ]);
    }

    public function update(CustomerRequest $request, $id)
    {
        DB::beginTransaction();

        try {
            $customer = $this->customerRepository->save($request->validated(), ['id' => $id]);

            DB::commit();

            return redirect()->route('admin.customer.index', $id)->with(
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
        $this->customerRepository->deleteById($id);

        return redirect()->route('admin.customer.index');
    }
}
