@extends('layouts.admin.master')
@section('content')
@if (empty($permission))
<form class="container-fluid" method="post" action="{{ route('admin.permission.store') }}">
  @csrf
  <div class="row">
    <div class="d-flex justify-content-between">
      <h3> {{__('messages.createPermission')}}: </h3>
@else
<form class="container-fluid" method="post" action="{{ route('admin.permission.update', $permission->id) }}">
  @method('PUT')
  @csrf
  <div class="row">
    <div class="d-flex justify-content-between">
      <h3> {{__('messages.editPermission')}}: </h3>
@endif
      <a href="{{ route('admin.permission.index') }}" class="btn btn-primary">
      {{__('messages.back')}}
      </a>
    </div>
  </div>
  @if (!empty($permission))
  <div class="container-fluid">
    <p class="form-label"> ID </p>
    <p class="form-control"> {{ $permission->id }} </p>
    <p class="form-label"> Create At </p>
    <p class="form-control"> {{ $permission->created_at }} </p>
    <p class="form-label"> Update At</p>
    <p class="form-control"> {{ $permission->updated_at }} </p>
  </div>
  @endif
  <div class="container-fluid">
    <label for="name" class="form-label"> {{__('messages.name')}} </label>
    <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="" value="{{ old('name', $permission->name ?? '') }}">
    @error('name')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
    @enderror
  </div>
  <div class="container-fluid">
    <label for="key" class="form-label"> {{__('messages.key')}} </label>
    <input name="key" type="text" class="form-control @error('key') is-invalid @enderror" id="key" placeholder="" value="{{ old('key', $permission->key ?? '') }}">
      @error('key')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
      @enderror
  </div>
  @php
    $selected = null;
    if (!empty(old('permission_group_id'))) {
      $selected = old('permission_group_id');
    } else if (!empty($permission)) {
      $selected = $permission->permissionGroup->id;
    }
  @endphp
  <div class="container-fluid">
    <label for="permission_group_id" class="form-label"> {{__('messages.permissionGroup')}} </label>
    <select name="permission_group_id" id="permission_group_id" class="form-select @error('permission_group_id') is-invalid @enderror">
      @if (empty($selected))
        <option value="" selected disabled hidden> Select a permission group </option>
      @endif
      @foreach($permissionGroups as $permissionGroup)
        <option value="{{ $permissionGroup->id }}"{{ ($selected == $permissionGroup->id) ? ' selected' : ''}}> {{ $permissionGroup->name }} </option>
      @endforeach
    </select>
    @error('permission_group_id')
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
