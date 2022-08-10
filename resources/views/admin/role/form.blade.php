@extends('layouts.admin.master')

@section('content')
@if (empty($roles))
<form class="container-fluid" method="post" action="{{ route('admin.role.store') }}">
  @csrf
  <div class="row">
    <div class="d-flex justify-content-between">
      <h3> {{__('messages.createRole')}}: </h3>
@else
<form class="container-fluid" method="post" action="{{ route('admin.role.update', $roles->id) }}">
  @method('PUT')
  @csrf
  <div class="row">
    <div class="d-flex justify-content-between">
      <h3> {{__('messages.editRole')}}: </h3>
@endif
      <a href="{{ route('admin.role.index') }}" class="btn btn-primary">
      {{__('messages.back')}}
      </a>
    </div>
  </div>
  @if (!empty($roles))
  <div class="container-fluid">
    <p class="form-label"> ID </p>
    <p class="form-control"> {{ $roles->id }} </p>
  </div>
  @endif
  <div class="container-fluid">
    <label for="name" class="form-label"> {{__('messages.name')}} </label>
    <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="" value="{{ old('name', $roles->name ?? '') }}">
    @error('name')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
    @enderror
  </div>
  @php
    $selected = !empty(old('permission')) ? collect(old('permission', [])) : ($role->permissions ?? collect([]));
  @endphp
  <div class="container-fluid mt-3">
  <label for="" class="form-label"> {{__('messages.permissionGroup')}} </label>
  @if(!empty($permissionGroups))
    @foreach($permissionGroups as $permissionGroup)
      <div class="container-fluid border rounded my-2 px-0 py-3 bg-white shadow-sm">
        <div class="container-fluid">
          <p class="form-label"> {{ $permissionGroup->name }} </p>
        </div>
        <hr>
        <div class="container-fluid">
        @if(!empty($permissionGroup->permissions))
          @foreach($permissionGroup->permissions as $permission)
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="permission[]" id="{{ 'chkbox_'.$permissionGroup->id.'_'.$permission->id }}" value="{{ $permission->id }}"{{ ($selected->contains($permission->id)) ? ' checked' : '' }}>
            <label class="form-check-label" for="{{ 'chkbox_'.$permissionGroup->id.'_'.$permission->id }}">{{ $permission->name }}</label>
          </div>
          @endforeach
        @endif
        </div>
      </div>
    @endforeach
  @endif
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