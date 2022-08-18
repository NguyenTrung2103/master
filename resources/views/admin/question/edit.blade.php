@extends('layouts.admin.master')
@section('content')
@if (Session::has('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@endif

@if (empty($questions))
<form class="container-fluid" method="post" action="{{ route('admin.question.store') }}">
  @csrf
  <div class="row">
    <div class="d-flex justify-content-between">
      <h3> {{__('permission.createPermission')}}: </h3>
@else
<form class="container-fluid" method="post" action="{{ route('admin.question.update', $questions->id) }}">
  @method('PUT')
  @csrf
  <div class="row">
    <div class="d-flex justify-content-between">
      <h3> {{__('permission.editPermission')}}: </h3>
@endif
      <a href="{{ route('admin.question.index') }}" class="btn btn-primary">
      {{__('messages.back')}}
      </a>
    </div>
  </div>
  @if (!empty($questions))
  <div class="container-fluid">
    <p class="form-label"> ID </p>
    <p class="form-control"> {{ $questions->id }} </p>
    <p class="form-label"> Create At </p>
    <p class="form-control"> {{ $questions->created_at }} </p>
    <p class="form-label"> Update At</p>
    <p class="form-control"> {{ $questions->updated_at }} </p>
  </div>
  @endif
  <div class="container-fluid">
    <label for="content" class="form-label"> {{__('messages.content')}} </label>
    <input name="content" type="text" class="form-control @error('content') is-invalid @enderror" id="content" placeholder="" value="{{ old('content', $questions->content ?? '') }}">
    @error('content')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
    @enderror
  </div>
  
  @php
    $selected = null;
    if (!empty(old('caterory_id'))) {
      $selected = old('category_id');
    } else if (!empty($questions)) {
      $selected = $questions->category->id;
    }
  @endphp
  <div class="container-fluid">
    <label for="category_id" class="form-label"> {{__('question.selectCategory')}} </label>
    <select name="category_id" id="category_id" class="form-select @error('category_id') is-invalid @enderror">
      @if (empty($selected))
        <option value="" selected disabled hidden> Select Category </option>
      @endif
      @foreach($categories as $category)
        <option value="{{ $category->id }}"{{ ($selected == $category->id) ? ' selected' : ''}}> {{ $category->name }} </option>
      @endforeach
    </select>
    @error('category_id')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
    @enderror
  </div>

  <div class="container-fluid">
  @php
    $selectedAnswers = collect(old('answers', empty($question) ? [] : $question->answers->pluck('id')));
@endphp
    <div class="container-fluid">
        <label for="role" class="form-label"> {{ __('user.role') }} </label>
        
        @if(!empty($answers))

            <div class="container-fluid">
                @foreach($answers as $answer)
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="text" name="id[]" id="{{ 'chkbox_'.$answer->id }}" value="{{ $answer->id }}"{{ ($selectedAnswers->contains($answer->id)) ? ' checked' : '' }}>
                   
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="text" name="answer[]" id="{{ 'chkbox_'.$answer->content }}" value="{{ $answer->content }}"{{ ($selectedAnswers->contains($answer->content)) ? ' checked' : '' }}>
                   
                </div>
                @if($answer->correct == true)
                    <input class=" form-check-input" type="checkbox" name="radio[]" id="{{ 'chkbox_'.$answer->correct }}" value="{{ $answer->correct }}"{{ ($selectedAnswers->contains($answer->correct)) ? ' checked' : '' }}>
                @else
                    
                @endif 
                @endforeach
                 
            </div>
        @endif
    </div>
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
