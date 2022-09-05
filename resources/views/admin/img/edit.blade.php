@extends('layouts.admin.master')
@section('content')

<div class="container mt-2">

    
    <div class="d-flex justify-content-between">
    <h1 style="font-weight: bold;">Edit Img</h1>
    <div>
    <a class="btn btn-primary" href="{{ route('admin.img.index') }}" enctype="multipart/form-data"> Back</a>
    </div>
    </div>
   
  @if(session('status'))
    <div class="alert alert-success mb-1 mt-1">
        {{ session('status') }}
    </div>
  @endif
  
    <form action="{{ route('admin.img.update',$img->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
   
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Img Title:</strong>
                    <input type="text" name="title" value="{{ $img->title }}" class="form-control" placeholder="Img Title">
                    @error('title')
                     <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Img Description:</strong>
                    <textarea class="form-control" style="height:150px" name="description" placeholder="Img Description">{{ $img->description }}</textarea>
                    @error('description')
                     <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong> Image:</strong>
                 <input type="file" name="image" class="form-control" placeholder="Img Title">
                @error('image')
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
               @enderror
            </div>
            <div class="form-group">

            <img src="{{ 'data:image/jpg;base64,' .  base64_encode(Storage::get($img->image))  }}" alt="" style="max-width: 100px; height: auto"/>


            </div>
        </div>
            
        <div class="bt">
        <button type="submit" class="btn btn-primary">Save</button>
        </div>
          
        </div>
   
    </form>
</div>
@endsection
