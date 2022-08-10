@extends('layouts.admin.master')
@section('content')
<div class="container">
  <div class="d-flex justify-content-between">
    <h1 style="font-weight: bold;">Permission List</h1>
    <div>
      <a href="{{ route('admin.permission.create') }}" class="btn btn-primary">Create</a>
    </div>
  </div>
  <div class="table-responsive">
    <table class="table">
        <tr>
            <th> Name </th>
            <th> Key </th>
            <th> Permission Group </th>
            <th> Action </th>
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
                {{ $permission->permissionGroup->name ?? 'None' }}
                </span>
                    
                
            </td>
            <td>
                <a href="{{ route('admin.permission.show', $permission->id) }}" class="btn btn-success"> Show </a>
                <a href="{{ route('admin.permission.edit', $permission->id) }}" class="btn btn-primary"> Edit </a>
                <a class="btn btn-danger delete " > Delete </a>
                <form class="d-inline" method="post" action="{{ route('admin.permission.destroy', $permission->id) }}">
                    @csrf
                    @method('DELETE')
                    
                </form>
            </td>
        </tr>
        @endforeach
        @endif

        {{ $permissions->links() }}
    </table>
  </div>
</div>
@endsection
