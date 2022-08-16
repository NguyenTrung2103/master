@extends('layouts.admin.master')
@section('content')
@if (empty($quesions))
<form class="container-fluid" method="post" action="{{ route('admin.question.store') }}">
  @csrf
  <div class="row">
    <div class="d-flex justify-content-between">
      <h3> {{__('permission.createPermission')}}: </h3>
@else
<form class="container-fluid" method="post" action="{{ route('admin.questions.update', $questions->id) }}">
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
    <label for="answer_1" class="form-label"> {{__('messages.answer_1')}} </label>
    <input name="answer_1" type="text" class="form-control @error('answer_1') is-invalid @enderror" id="answer_1" placeholder="" value="{{ old('answer_1', $answers->answer_1 ?? '') }}">
    @error('content')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
    @enderror
  </div>

  <div class="container-fluid">
    <label for="answer_2" class="form-label"> {{__('messages.answer_2')}} </label>
    <input name="answer_2" type="text" class="form-control @error('answer_2') is-invalid @enderror" id="answer_2" placeholder="" value="{{ old('answer_2', $answers->answer_2 ?? '') }}">
    @error('content')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
    @enderror
  </div>

  <div class="container-fluid">
    <label for="answer_3" class="form-label"> {{__('messages.answer_3')}} </label>
    <input name="answer_3" type="text" class="form-control @error('answer_3') is-invalid @enderror" id="answer_3" placeholder="" value="{{ old('answer_3', $answers->answer_3 ?? '') }}">
    @error('content')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
    @enderror
  </div>

  <div class="container-fluid">
    <label for="answer_4" class="form-label"> {{__('messages.answer_4')}} </label>
    <input name="answer_4" type="text" class="form-control @error('answer_4') is-invalid @enderror" id="answer_4" placeholder="" value="{{ old('answer_4', $answers->answer_4 ?? '') }}">
    @error('content')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
    @enderror
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
