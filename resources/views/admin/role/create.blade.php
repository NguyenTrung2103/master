@extends('layouts.admin.master')
@section('content')
<div class="col-md-9">
    <div>
        <h1>Create a Role</h1>
        <a href="/admin/role" class="btn btn-back">Back</a>
    </div>
    <form class="row" action="" method="POST" action="{{ route('role.store') }}">
        @csrf
        <div class="col-md-12 mb-3">
            <label for="exampleFormControlInput1" class="form-label">RoleID</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="id" placeholder="Nhập tên" aria-describedby="emailHelp">
            @error('id')
            <span class="text-danger text-left">{{$message}}</span>
            @enderror
        </div>
        <div class="col-md-12 mb-3">
            <label for="name" class="form-label">RoleName</label>
            <input type="text" class="form-control" id="name"name="name" placeholder="Nhập tên" aria-describedby="emailHelp">
            @error('name')
            <span class="text-danger text-left">{{$message}}</span>
            @enderror
        </div>
        <div class="clearfix"></div>
        <div class="bt">
        <button type="button" class="btn btn-primary">Save</button>
        <button type="button" class="btn btn-secondary">Reset</button>
        </div>
    </form>
</div>
</div>
@endsection
