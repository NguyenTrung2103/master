@extends('layouts.admin.master')
@section('content')
<div class="container">
  <div class="d-flex justify-content-between">
    <h1 style="font-weight: bold;">Customer List</h1>
    <div>
      <a href="{{ route('admin.user.create') }}" class="btn btn-primary">{{__('button.create')}}</a>
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
              <select name="" id="">
                @foreach($customer->roles as $role)
              <option> {{ $role->name }} </option>
              
                @endforeach
              </select>      
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
              <select name="" id="">
                @foreach($customer->users as $user)
              <option> {{ $user->name }} </option>
              
                @endforeach
              </select>      
            </td>
            <td>
                <a href="{{ route('admin.customer.edit', $customer->id) }}" class="btn btn-primary"> {{__('messages.edit')}} </a>
                <a class="btn btn-danger delete " > {{__('messages.delete')}} </a>
                <form id="delete-form" class="d-inline" method="post" action="{{ route('admin.user.destroy', $user->id) }}">
                    @csrf
                    @method('DELETE')
                    
                </form>
            </td>
        </tr>
        @endforeach
        @endif

       
    </table>
    {{ $customers->links() }}
  </div>
</div>
@endsection
