<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\CustomerRequest;
use App\Repositories\Admin\Customer\CustomerRepositoryInterface as CustomerRepository;


class CustomerController extends Controller
{
    protected $customerRepository;

    public function __construct(customerRepository $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    public function index()
    {
        return view('admin.customer.index', [
            'customers' => $this->customerRepository->paginate(),
        ]);
    }

    public function create()
    {
        return view('admin.customer.form');
    }

    public function store(CustomerRequest $request)
    {
        $this->customerRepository->save($request->validated());

        return redirect()->route('admin.customer.index')->with(
            'success',
            __('category.create.success'));
    }

}
