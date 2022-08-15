@extends('layouts.admin.master')

@section('content')
@if (!empty($user))
<form class="container-fluid" method="post" action="{{ route('admin.user.update', $user->id) }}">
    
    @method('PUT')
    @csrf
    <div class="d-flex justify-content-between">
        <h3> {{ __('user.editUser') }} </h3>
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


<div class="container-fluid">
        <label for="phone" class="form-label"> {{ __('user.phone') }} </label>
        <input name="phone" type="text" class="form-control mb-2 @error('username') is-invalid @enderror" id="phone" placeholder="" value="{{ old('phone', $user->phone ?? '') }}"{{ $isShow ? ' readonly' : ''}}>
        @error('phone')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
@php
    $selectedRoles = collect(old('role_ids', empty($user) ? [] : $user->roles->pluck('id')->all()));
@endphp
    <div class="container-fluid">
        <label for="role_ids" class="form-label"> {{ __('user.role') }} </label>
        @if(!empty($roles))
            <div class="container-fluid">
                @foreach($roles as $role)
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="role_ids[]" id="{{ 'chkbox_'.$role->id }}" value="{{ $role->id }}"{{ ($selectedRoles->contains($role->id)) ? ' checked' : '' }}{{ $isShow ? ' readonly' : ''}}>
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
        <label for="school_id" class="form-label"> {{ __('user.school_id') }} </label>
        <input name="school_id" id="school_id" class="form-control mb-2" value="{{ '' }}" readonly>
    </div>

@php
    $types = \App\Models\User::TYPES;
@endphp
@if (!empty($user))
    <div class="container-fluid">
        <label for="type" class="form-label"> {{ __('user.type') }} </label>
        <input name="type" id="type" class="form-control mb-2" value="{{ empty($user->type) ? 'admin' : array_search($user->type, $types) }}" readonly>
    </div>
@endif

    <div class="container-fluid">
        <label for="parent_id" class="form-label"> {{ __('user.parent_id') }} </label>
        <input name="parent_id" id="parent_id" class="form-control mb-2" value="{{ '' }}" readonly>
    </div>

@if (!empty($user))
    <div class="container-fluid">
        <label for="verified_at" class="form-label"> {{ __('user.verified_at') }} </label>
        <input name="verified_at" id="verified_at" class="form-control mb-2" value="{{ $user->verified_at }}" readonly>
    </div>
@endif

@if (!empty($user))
    <div class="container-fluid">
        <label for="closed" class="form-label"> {{ __('user.closed') }} </label>
        <input name="closed" id="closed" class="form-control mb-2" value="{{ $user->closed ? __('user.is-closed') : __('user.is-not-closed') }}" readonly>
    </div>
@endif

    <div class="container-fluid">
        <label for="code" class="form-label"> {{ __('user.code') }} </label>
        <input name="code" type="text" class="form-control mb-2 @error('code') is-invalid @enderror" id="code" placeholder="" value="{{ old('code', $user->code ?? '') }}"{{ $isShow ? ' readonly' : ''}}>
        @error('code')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="container-fluid">
        <label for="social_type" class="form-label"> {{ __('user.social_type') }} </label>
        <input name="social_type" type="text" class="form-control mb-2 @error('social_type') is-invalid @enderror" id="social_type" placeholder="" value="{{ old('social_type', $user->social_type ?? '') }}"{{ $isShow ? ' readonly' : ''}}>
        @error('social_type')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="container-fluid">
        <label for="social_id" class="form-label"> {{ __('user.social_id') }} </label>
        <input name="social_id" type="text" class="form-control mb-2 @error('social_id') is-invalid @enderror" id="social_id" placeholder="" value="{{ old('social_id', $user->social_id ?? '') }}"{{ $isShow ? ' readonly' : ''}}>
        @error('social_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="container-fluid">
        <label for="social_name" class="form-label"> {{ __('user.social_name') }} </label>
        <input name="social_name" type="text" class="form-control mb-2 @error('social_name') is-invalid @enderror" id="social_name" placeholder="" value="{{ old('social_name', $user->social_name ?? '') }}"{{ $isShow ? ' readonly' : ''}}>
        @error('social_name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="container-fluid">
        <label for="social_nickname" class="form-label"> {{ __('user.social_nickname') }} </label>
        <input name="social_nickname" type="text" class="form-control mb-2 @error('social_nickname') is-invalid @enderror" id="social_nickname" placeholder="" value="{{ old('social_nickname', $user->social_nickname ?? '') }}"{{ $isShow ? ' readonly' : ''}}>
        @error('social_nickname')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="container-fluid">
        <label for="social_avatar" class="form-label"> {{ __('user.social_avatar') }} </label>
        <input name="social_avatar" type="text" class="form-control mb-2 @error('social_avatar') is-invalid @enderror" id="social_avatar" placeholder="" value="{{ old('social_avatar', $user->social_avatar ?? '') }}"{{ $isShow ? ' readonly' : ''}}>
        @error('social_avatar')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="container-fluid">
        <label for="description" class="form-label"> {{ __('user.description') }} </label>
        <textarea name="description" type="text" class="form-control mb-2 @error('description') is-invalid @enderror" id="description" placeholder="" value="{{ old('description', $user->description ?? '') }}"{{ $isShow ? ' readonly' : ''}}> </textarea>
        @error('description')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

@if (!empty($user))
    <div class="container-fluid">
        <label for="created_at" class="form-label"> {{ __('user.created_at') }} </label>
        <input name="created_at" id="created_at" class="form-control mb-2" value="{{ $user->created_at }}" readonly>
    </div>
    <div class="container-fluid">
        <label for="updated_at" class="form-label"> {{ __('user.updated_at') }} </label>
        <input name="updated_at" id="updated_at" class="form-control mb-2" value="{{ $user->updated_at }}" readonly>
    </div>
    <div class="container-fluid">
        <label for="deleted_at" class="form-label"> {{ __('user.deleted_at') }} </label>
        <input name="deleted_at" id="deleted_at" class="form-control mb-2" value="{{ $user->deleted_at }}" readonly>
    </div>
@endif

    <div class="row mt-3">
        <div class="d-flex justify-content-center">
            <input type="submit" class="btn btn-primary" value="{{ __('button.save') }}">
        </div>
    </div>
</form>
@endif
@endsection