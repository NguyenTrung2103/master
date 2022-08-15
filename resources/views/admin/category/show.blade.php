@extends('layouts.admin.master')

@section('content')
@if (Session::has('error'))
<div class="alert alert-danger" role="alert">
  {{ session('error') }}
</div>
@endif
<div class="container-fluid">
  <div class="d-flex justify-content-between">
    <p style="font-weight: bold;"> Showing Categorry: </p>
    <div>
      <a href="{{ route('admin.category.index') }}" class="btn btn-primary">Back</a>
    </div>
  </div>
  @if(!empty($category))
    <div class="container-fluid">
      <p>
        ID: {{ $category->id }}
      </p>
      <p>
        Name: {{ $category->name }}
      </p>
      <p>
        Slug: {{ $category->slug }}
      </p>
      <p>
        Created at: {{ $category->created_at }}
      </p>
      <p>
        Updated at: {{ $category->updated_at }}
      </p>
    </div>
    <div class="row mt-3">
      <div class="d-flex justify-content-center">
        @can('update-permission-group')
          <a href="{{ route('admin.category.edit', $category->id) }}" class="btn btn-primary d-inline-block"> Edit </a>
        @endcan
        @can('delete-permission-group')
          <form class="d-inline-block" method="post" action="{{ route('admin.category.destroy', $category->id) }}">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger"> Delete </button>
          </form>
        @endcan
      </div>
    </div>
  @endif
</div>

@endsection