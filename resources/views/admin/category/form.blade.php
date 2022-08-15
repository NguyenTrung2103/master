@extends('layouts.admin.master')

@section('content')
@if (Session::has('error'))
<div class="alert alert-danger" role="alert">
  {{ session('error') }}
</div>
@endif
@if (empty($categories))
<form class="container-fluid" method="post" action="{{ route('admin.category.store') }}">
  @csrf
  <div class="row">
    <div class="d-flex justify-content-between">
      <h3> Create permission group: </h3>
@else
<form class="container-fluid" method="post" action="{{ route('admin.category.update', $categories->id) }}">
  @method('PUT')
  @csrf
  <div class="row">
    <div class="d-flex justify-content-between">
      <h3> Edit permission group: </h3>
@endif
      <a href="{{ route('admin.category.index') }}" class="btn btn-primary">
        Back
      </a>
    </div>
  </div>
  @if (!empty($categories))
  <div class="container-fluid">
    <p for="id" class="form-label"> ID </p>
    <p class="form-control"> {{ $categories->id }} </p>
  </div>
  @endif
  <div class="container-fluid">
    <label for="name" class="form-label"> Name </label>
    <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="" value="{{ old('name', $categories->name ?? '') }}">
    @error('name')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
    @enderror
  </div>
  <div class="container-fluid">
    <label for="slug" class="form-label"> Slug </label>
    <input name="slug" type="text" class="form-control @error('slug') is-invalid @enderror" id="name" placeholder="" value="{{ old('slug', $categories->slug ?? '') }}">
    @error('slug')
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
    </div>
  </div>
</form>
@endsection