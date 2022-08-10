@extends('layouts.admin.master')
@section('content')
<div class="container-fluid">
  <div class="d-flex justify-content-between">
    <p style="font-weight: bold;">{{__('messages.roleList')}}</p>
    <div>
      <a href="{{ route('admin.role.create') }}" class="btn btn-primary">{{__('messages.create')}}</a>
    </div>
  </div>
  <div class="table-responsive">
    <table class="table">
        <tr>
            <th> {{__('messages.name')}} </th>
            <th> {{__('messages.permissionCount')}} </th>
            <th> {{__('messages.action')}} </th>
        </tr>
        @if(!empty($roles))
        @foreach($roles as $role)
        <tr>
            <td>
                
                    {{ $role->name }}
                
            </td>
            <td>
                
                    {{ $role->rolesPermissions->count() }}
                
            </td>
            <td>
                <a href="{{ route('admin.role.show', $role->id) }}" class="btn btn-success"> {{__('messages.show')}} </a>
                <a href="{{ route('admin.role.edit', $role->id) }}" class="btn btn-primary"> {{__('messages.edit')}} </a>
                <a class="btn btn-danger delete " > {{__('messages.delete')}} </a>
                <form id="delete-form"class="d-inline" method="post" action="{{ route('admin.role.destroy', $role->id) }}">
                    @csrf
                    @method('DELETE')
                </form>
            </td>
        </tr>
        @endforeach
        @endif

        
    </table>
    
    
    
  </div>
</div>

@endsection
