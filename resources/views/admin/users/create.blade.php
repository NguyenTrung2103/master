@extends('layouts.admin.master')
@section('content')
@if (empty($user))
<form class="container-fluid" method="post" action="{{ route('admin.user.store') }}">
    @csrf
    <div class="d-flex justify-content-between">
        <h3> {{ __('user.createUser') }} </h3>
        <a href="{{ route('admin.user.index') }}" class="btn btn-primary">
            {{ __('button.back') }}
        </a>
    </div>

    @if (Session::has('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@endif
@if (Session::has('error'))
    <div class="alert alert-danger" role="alert">
        {{ session('error') }}
    </div>
@endif

@if (!empty($user))
    <div class="container-fluid">
        <label for="id" class="form-label"> {{ __('user.id') }} </label>
        <input name="id" id="id" class="form-control mb-2" value="{{ $user->id }}" readonly>
    </div>
@endif

    <div class="container-fluid">
        <label for="name" class="form-label"> {{ __('user.name') }} </label>
        <input name="name" type="text" class="form-control mb-2 @error('name') is-invalid @enderror" id="name" placeholder="" value="{{ old('name', $user->name ?? '') }}"{{ $isShow ? ' readonly' : ''}}>
        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="container-fluid">
        <label for="email" class="form-label"> {{ __('user.email') }} </label>
        <input name="email" type="text" class="form-control mb-2 @error('email') is-invalid @enderror" id="email" placeholder="" value="{{ old('email', $user->email ?? '') }}"{{ $isShow ? ' readonly' : ''}}>
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="container-fluid">
        <label for="username" class="form-label"> {{ __('user.username') }} </label>
        <input name="username" type="text" class="form-control mb-2 @error('username') is-invalid @enderror" id="username" placeholder="" value="{{ old('username', $user->username ?? '') }}"{{ $isShow ? ' readonly' : ''}}>
        @error('username')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

@if (empty($user))
    <div class="row">
        <div class="col-md-6">
            <div class="container-fluid">
                <label for="password" class="form-label"> {{ __('user.password') }} </label>
                <input name="password" type="password" class="form-control mb-2 @error('password') is-invalid @enderror" id="password" placeholder=""{{ $isShow ? ' readonly' : ''}}>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="container-fluid">
                <label for="password-confirm" class="form-label"> {{ __('user.password-confirm') }} </label>
                <input id="password-confirm" type="password" class="form-control mb-2" name="password_confirmation">
            </div>
        </div>
    </div>
@endif

@php
    $selectedRoles = collect(old('role', empty($user) ? [] : $user->roles->pluck('id')->all()));
@endphp
    <div class="container-fluid">
        <label for="role" class="form-label"> {{ __('user.role') }} </label>
        @if(!empty($roles))
            <div class="container-fluid">
                @foreach($roles as $role)
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="role[]" id="{{ 'chkbox_'.$role->id }}" value="{{ $role->id }}"{{ ($selectedRoles->contains($role->id)) ? ' checked' : '' }}{{ $isShow ? ' readonly' : ''}}>
                    <label class="form-check-label" for="{{ 'chkbox_'.$role->id }}">{{ $role->name }}</label>
                </div>
                @endforeach
            </div>
        @endif
    </div>

    <div class="container-fluid">
        <label for="address" class="form-label"> {{ __('user.address') }} </label>
        <input name="address" type="text" class="form-control mb-2 @error('address') is-invalid @enderror" id="address" placeholder="" value="{{ old('address', $user->address ?? '') }}"{{ $isShow ? ' readonly' : ''}}>
        @error('address')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="container-fluid">
        <label for="phone" class="form-label"> {{ __('user.phone') }} </label>
        <input name="phone" type="text" class="form-control mb-2 @error('username') is-invalid @enderror" id="phone" placeholder="" value="{{ old('phone', $user->phone ?? '') }}"{{ $isShow ? ' readonly' : ''}}>
        @error('phone')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="container-fluid">
        <label for="school_id" class="form-label"> {{ __('user.school_id') }} </label>
        <input name="school_id" id="school_id" class="form-control mb-2" value="{{ '' }}" readonly>
    </div>



    <div class="row mt-3">
        <div class="d-flex justify-content-center">
            <input type="submit" class="btn btn-primary" value="{{ __('button.save') }}">
        </div>
    </div>
</form>
@endif
@endsection