@extends('layouts.admin.master')

@section('content')
<div class="container-fluid">
  <div class="d-flex justify-content-between">
    <p style="font-weight: bold;"> Showing Permission Group: </p>
    <div>
      <a href="{{ route('admin.permission-group.index') }}" class="btn btn-primary">Back</a>
    </div>
  </div>
  @if(!empty($permissionGroup))
    <div class="container-fluid">
      <p>
        ID: {{ $permissionGroup->id }}
      </p>
      <p>
        Name: {{ $permissionGroup->name }}
      </p>
      <p>
        Created at: {{ $permissionGroup->created_at }}
      </p>
      <p>
        Updated at: {{ $permissionGroup->updated_at }}
      </p>
    </div>
    <div class="row mt-3">
      <div class="d-flex justify-content-center">
        <div>
          <a href="{{ route('admin.permission-group.edit', $permissionGroup->id) }}" class="btn btn-primary"> Edit </a>
        </div>
        <div>
          <form class="d-inline" method="post" action="{{ route('admin.permission-group.destroy', $permissionGroup->id) }}">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger"> Delete </button>
          </form>
        </div>
      </div>
    </div>
  @endif
</div>

@endsection