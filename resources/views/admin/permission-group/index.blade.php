@extends('layouts.admin.master')

@section('content')
<div class="container-fluid">
  <div class="d-flex justify-content-between">
    <p style="font-weight: bold;">Permission Group List</p>
    <div>
      <a href="{{ route('admin.permission-group.create') }}" class="btn btn-primary">Create</a>
    </div>
  </div>
  <div class="table-responsive">
    <table class="table">
        <tr>
            <th> Name </th>
            <th> Action </th>
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
                <a href="{{ route('admin.permission-group.show', $permissionGroup->id) }}" class="btn btn-success"> Show </a>
                <a href="{{ route('admin.permission-group.edit', $permissionGroup->id) }}" class="btn btn-primary"> Edit </a>
                <form class="d-inline" method="post" action="{{ route('admin.permission-group.destroy', $permissionGroup->id) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"> Delete </button>
                </form>
            </td>
        </tr>
        @endforeach
        @endif

        
    </table>
    <div>
    {{ $permissionGroups->links() }}
    </div>
  </div>
</div>

@endsection