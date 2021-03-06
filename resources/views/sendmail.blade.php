@extends('layouts.admin.master')
@section('content')
<div class="container-fluid">
  <div class="d-flex justify-content-between">
    <p style="font-weight: bold;"> Send email to user </p>
    <div>
      <a href="{{ route('admin.user.create') }}" class="btn btn-primary">Back</a>
    </div>
  </div>
  <form method="POST" action="{{ route('admin.user.send') }}" enctype="multipart/form-data" >
    @csrf
    <select class="form-control" name="email">
      <option value="all">Select a user</option>
      @if(!empty($users))
        @foreach($users as $user)
        <option value="{{ $user['email'] }}">{{ $user['name'] }}</option>
        @endforeach
      @endif
    </select>
    <div class="mb-3">
        <label for="attachment" class="form-label">File upload</label>
        <input class="form-control" type="file" id="attachment" name="attachment">
     </div>

    <div class="d-flex justify-content-center">
      <div>
        <button type="submit" class="btn btn-primary">Send</button>
      </div>
    </div>
  </form>
    
      
@endsection    