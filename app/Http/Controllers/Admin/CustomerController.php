<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CustomerRequest;
use App\Repositories\Admin\Customer\CustomerRepositoryInterface as CustomerRepository;
use App\Repositories\Admin\Phonezalo\PhonezaloRepositoryInterface as PhonezaloRepository;
use App\Repositories\Admin\Role\RoleRepositoryInterface as RoleRepository;
use App\Repositories\Admin\User\UserRepositoryInterface as UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    protected $userRepository;

    protected $roleRepository;

    protected $phonezaloRepository;

    protected $customerRepository;

    public function __construct(customerRepository $customerRepository, UserRepository $userRepository, RoleRepository $roleRepository, PhonezaloRepository $phonezaloRepository)
    {
        $this->customerRepository = $customerRepository;
        $this->userRepository = $userRepository;
        $this->roleRepository = $roleRepository;
        $this->phonezaloRepository = $phonezaloRepository;
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

        $data['user_id'] = Auth::user()->id;
        $data['mkh'] = 'DG'.$data['cmnd'];

        DB::beginTransaction();
        try {
            $customer = $this->customerRepository->save($data);

            $answerNumber = count($data['phonezalo']);
            for ($i = 0; $i < $answerNumber; $i++) {
                $customer->phonezalo()->create([
                    'phone' => $request->phonezalo[$i],
                    'customer_id' => $customer->id,
                ]);
            }

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
            'phonezalo' => $this->phonezaloRepository->getAll(),
            'isShow' => false,
        ]);
    }

    public function update(CustomerRequest $request, $id)
    {
        DB::beginTransaction();

        try {
            $data = $request->all();

            $customer = $this->customerRepository->save($request->validated(), ['id' => $id]);

            $phones = [];
            foreach ($data['phonezalo'] as $phone_zalo) {
                array_push($phones, ['phone' => $phone_zalo, 'customer_id' => $id]);
            }
            $customer->phonezalo()->delete();
            $customer->phonezalo()->upsert($phones, 'phone');

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
