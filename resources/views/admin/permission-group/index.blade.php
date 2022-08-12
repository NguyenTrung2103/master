@extends('layouts.admin.master')

@section('content')

<div class="container-fluid">
  <div class="d-flex justify-content-between">
    <p style="font-weight: bold;">{{__('permission-group.permissionGroupList')}}</p>
    <div>
      <a href="{{ route('admin.permission-group.create') }}" class="btn btn-primary">{{__('messages.create')}}</a>
    </div>
  </div>
  <div class="table-responsive">
    <table class="table">
        <tr>
            <th> {{__('messages.name')}} </th>
            <th> {{__('messages.action')}} </th>
        </tr>
        @if(!empty($permissionGroups))
        @foreach($permissionGroups as $permissionGroup)
        <tr>
            <td>
                <p>
                    {{ $permissionGroup->name }}
                </p>
            </td>
            <td>
                <a href="{{ route('admin.permission-group.show', $permissionGroup->id) }}" class="btn btn-success"> {{__('messages.show')}} </a>
                <a href="{{ route('admin.permission-group.edit', $permissionGroup->id) }}" class="btn btn-primary"> {{__('messages.edit')}} </a>
                <a class="btn btn-danger delete " > {{__('messages.delete')}} </a>
                <form class="d-inline" id="delete-form" method="post" action="{{ route('admin.permission-group.destroy', $permissionGroup->id) }}">
                    @csrf
                    @method('DELETE')
                </form>
            </td>
        </tr>
        @endforeach
        @endif

        
    </table>
    
    {{ $permissionGroups->links() }}
    
  </div>
</div>

@endsection