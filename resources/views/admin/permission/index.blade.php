@extends('layouts.admin.master')
@section('content')
<div class="container">
  <div class="d-flex justify-content-between">
    <h1 style="font-weight: bold;">{{__('permission.permissionlist')}}</h1>
    <div>
      <a href="{{ route('admin.permission.create') }}" class="btn btn-primary">{{__('messages.create')}}</a>
    </div>
  </div>
  <div class="table-responsive">
    <table class="table">
        <tr>
            <th> {{__('messages.name')}} </th>
            <th> {{__('messages.key')}} </th>
            <th> {{__('messages.permissionGroup')}} </th>
            <th> {{__('messages.action')}} </th>
        </tr>
        @if(!empty($permissions))
        @foreach($permissions as $permission)
        <tr>
            <td>
                <span class="cat-links">
                    {{ $permission->name }}
                </span>
            </td>
            <td>
                <span class="cat-links">
                    {{ $permission->key }}
                </span>
            </td>
            <td>
                <span class="cat-links">
                {{ $permission->permissionGroup->name  ?? 'None' }}
                </span>
                    
                
            </td>
            <td>
                <a href="{{ route('admin.permission.show', $permission->id) }}" class="btn btn-success"> {{__('messages.show')}} </a>
                <a href="{{ route('admin.permission.edit', $permission->id) }}" class="btn btn-primary"> {{__('messages.edit')}} </a>
                <a class="btn btn-danger delete " > {{__('messages.delete')}} </a>
                <form id="delete-form" class="d-inline" method="post" action="{{ route('admin.permission.destroy', $permission->id) }}">
                    @csrf
                    @method('DELETE')
                    
                </form>
            </td>
        </tr>
        @endforeach
        @endif

       
    </table>
    {{ $permissions->links() }}
  </div>
</div>
@endsection
