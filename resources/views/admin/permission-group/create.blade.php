@extends('layouts.admin.master')
@section('content')
<form class="container-fluid" method="post" action="{{ route('admin.permission-group.store') }}">
@csrf
  <div class="row">
    <div class="d-flex justify-content-between">
      <h3> Create a permission group </h3>
      <a href="{{ route('admin.permission-group.index') }}" class="btn btn-primary">
        Back
      </a>
    </div>
  </div>
  <div class="container-fluid">
    <label for="name" class="form-label"> Name </label>
    <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="">
    @error('name')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
    @enderror
  </div>
  <div class="row mt-3">
    <div class="d-flex justify-content-center">
      <button type="submit" class="btn btn-primary">
        Save
      </button>
      <button class="btn btn-secondary">
        Reset
      </button>
    </div>
  </div>
</form>
@endsection