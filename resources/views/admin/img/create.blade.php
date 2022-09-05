@extends('layouts.admin.master')
@section('content')
<div class="col-md-9">
    <div>
        <h1>Create New Img</h1>
        <a class="btn btn-primary" href="{{ route('admin.img.index') }}"> Back</a>
    </div>

    @if(session('status'))
    <div class="alert alert-success mb-1 mt-1">
        {{ session('status') }}
    </div>
  @endif
    <form action="{{ route('admin.img.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
  
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Img Title:</strong>
                <input type="text" name="title" class="form-control" placeholder="Img Title">
               @error('title')
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
               @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Img Description:</strong>
                <textarea class="form-control" style="height:150px" name="description" placeholder="Img Description"></textarea>
                @error('description')
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong> Image:</strong>
                 <input type="file" name="image" class="form-control" placeholder="Post Title">
                @error('image')
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
               @enderror
            </div>
        </div>
        <div class="bt">
        <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </div>
   
</form>
</div>
</div>
@endsection
