@extends('layouts.admin.master')
@section('content')
<div class="col-md-9">
    <div>
        <h1>Create a Category</h1>
        <a href="/admin/category" class="btn btn-back">Back</a>
    </div>
    <form class="row" action="" method="POST" action="{{ route('category.store') }}">
        @csrf
        <div class="col-md-12 mb-3">
            <label for="exampleFormControlInput1" class="form-label">CategoryId</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="id" placeholder="Nhập tên" aria-describedby="emailHelp">
            @error('id')
            @enderror
        </div>
        <div class="col-md-12 mb-3">
            <label for="exampleFormControlInput1" class="form-label">CategoryName</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="name" placeholder="Nhập tên" aria-describedby="emailHelp">
            @error('name')
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
