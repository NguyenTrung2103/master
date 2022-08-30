@extends('layouts.admin.master')
@section('content')
<div class="container mt-2">
<div class="row">
        
    </div>
    <div class="d-flex justify-content-between">
    <h1 style="font-weight: bold;">Img</h1>
    <div>
    <a class="btn btn-success" href="{{ route('admin.img.create') }}"> Create New Img</a>
    </div>
  </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>S.No</th>
            <th>Image</th>
            <th>Title</th>
            <th>Description</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($imgs as $img)
        <tr>
            <td>{{ $img->id }}</td>
            <td><img src="{{ 'data:image/jpg;base64,' .  base64_encode(Storage::get($img->image))  }}" alt="" style="max-width: 100px; height: auto"/></td>
            <td>{{ $img->title }}</td>
            <td>{{ $img->description }}</td>
            <td>
                <form action="{{ route('admin.img.destroy',$img->id) }}" method="POST">
    
                    <a class="btn btn-primary" href="{{ route('admin.img.edit',$img->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $imgs->links() !!}
    @endsection