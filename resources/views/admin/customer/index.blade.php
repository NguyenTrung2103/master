@extends('layouts.admin.master')
@section('content')
<div class="container">
  <div class="d-flex justify-content-between">
    <h1 style="font-weight: bold;">Customer List</h1>
    <div>
      <a href="{{ route('admin.customer.create') }}" class="btn btn-primary">{{__('button.create')}}</a>
    </div>
  </div>
  <div class="table-responsive">
    <table class="table">
        <tr>
            <th> Loại Khách </th>
            <th> Mã KH </th>
            <th> Thông tin </th>
            <th> Địa chỉ </th>
            <th> Điện thoại </th>
            <th>Người Tạo</th>
            <th>Thao Tác</th>
        </tr>
        @if(!empty($customers))
        @foreach($customers as $customer)
        <tr>
            <td>
              
                @foreach($customer->roles as $role)
              <span> {{ $role->name }} </span>
              
                @endforeach
                   
            </td>
            <td>
                <span class="cat-links">
                    {{ $customer->mkh }}
                </span>
            </td>
            <td>
                <span class="cat-links">
                    {{ $customer->name }}
                </span>
            </td>
            <td>
                <span class="cat-links">
                    {{ $customer->address }}
                </span>
            </td>
            <td>
                <span class="cat-links">
                {{ $customer->phone }}
                </span>  
            </td>
            <td>
              
                @foreach($customer->users as $user)
                <span class="cat-links"> {{ $user->username }} </span>
              
                @endforeach
                  
            </td>
            <td>
                <a href="{{ route('admin.customer.edit', $customer->id) }}" class="btn btn-primary"> {{__('messages.edit')}} </a>
                <a class="btn btn-danger delete " > {{__('messages.delete')}} </a>
                <form id="delete-form" class="d-inline" method="post" action="{{ route('admin.customer.destroy', $customer->id) }}">
                    @csrf
                    @method('DELETE')
                    
                </form>
            </td>
        </tr>
        @endforeach
        @endif

        {{ $customers->links() }}
    </table>
  </div>
</div>
@endsection
