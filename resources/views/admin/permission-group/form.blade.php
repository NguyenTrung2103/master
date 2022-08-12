@extends('layouts.admin.master')

@section('content')
@if (empty($permissionGroup))
<form class="container-fluid" method="post" action="{{ route('admin.permission-group.store') }}">
  @csrf
  <div class="row">
    <div class="d-flex justify-content-between">
      <h3> {{__('permission-group.createPermissionList')}}: </h3>
@else
<form class="container-fluid" method="post" action="{{ route('admin.permission-group.update', $permissionGroup->id) }}">
  @method('PUT')
  @csrf
  <div class="row">
    <div class="d-flex justify-content-between">
      <h3> {{__('permission-group.editPermissionGroup')}}: </h3>
@endif
      <a href="{{ route('admin.permission-group.index') }}" class="btn btn-primary">
      {{__('messages.back')}}
      </a>
    </div>
  </div>
  @if (!empty($permissionGroup))
  <div class="container-fluid">
    <p for="id" class="form-label"> ID </p>
    <p class="form-control"> {{ $permissionGroup->id }} </p>
    <p class="form-label"> Create At </p>
    <p class="form-control"> {{ $permissionGroup->created_at }} </p>
    <p class="form-label"> Update At </p>
    <p class="form-control"> {{ $permissionGroup->updated_at }} </p>
  </div>
  @endif
  <div class="container-fluid">
    <label for="name" class="form-label"> {{__('messages.name')}} </label>
    <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="" value="{{ old('name', $permissionGroup->name ?? '') }}">
    @error('name')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
    @enderror
    
  </div>
  <div class="row mt-3">
    <div class="d-flex justify-content-center">
      <button type="submit" class="btn btn-primary">
      {{__('messages.save')}}
      </button>
    </div>
  </div>
</form>
@endsection