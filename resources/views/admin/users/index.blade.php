@extends('layouts.admin.master')
@section('content')
<div class="container">
  <div class="d-flex justify-content-between">
    <h1 style="font-weight: bold;">{{__('permission.permissionlist')}}</h1>
    <div>
      <a href="{{ route('admin.permission.create') }}" class="btn btn-primary">{{__('button.create')}}</a>
    </div>
  </div>
  <div class="table-responsive">
    <table class="table">
        <tr>
            <th> {{__('User.userName')}} </th>
            <th> {{__('User.userEmail')}} </th>
            <th> {{__('User.userPhone')}} </th>
            <th> {{__('User.userRole')}} </th>
            <th> {{__('messages.action')}} </th>
        </tr>
        @if(!empty($users))
        @foreach($users as $user)
        <tr>
            <td>
                <span class="cat-links">
                    {{ $user->name }}
                </span>
            </td>
            <td>
                <span class="cat-links">
                    {{ $user->email }}
                </span>
            </td>
            <td>
                <span class="cat-links">
                {{ $user->phone }}
                </span>  
            </td>
            <td>
                <span class="cat-links">
                {{ $user->role->name  ?? 'None' }}
                </span>  
            </td>
            <td>
                <a href="{{ route('admin.permission.show', $user->id) }}" class="btn btn-success"> {{__('messages.show')}} </a>
                <a href="{{ route('admin.permission.edit', $user->id) }}" class="btn btn-primary"> {{__('messages.edit')}} </a>
                <a class="btn btn-danger delete " > {{__('messages.delete')}} </a>
                <form id="delete-form" class="d-inline" method="post" action="{{ route('admin.permission.destroy', $user->id) }}">
                    @csrf
                    @method('DELETE')
                    
                </form>
            </td>
        </tr>
        @endforeach
        @endif

       
    </table>
    {{ $users->links() }}
  </div>
</div>
@endsection
