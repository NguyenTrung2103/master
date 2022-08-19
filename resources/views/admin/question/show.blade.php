@extends('layouts.admin.master')
@section('content')
@if (Session::has('error'))
    <div class="alert alert-danger" role="alert">
        {{ session('error') }}
    </div>
@endif
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
    <input readonly name="content" type="text" class="form-control @error('content') is-invalid @enderror" id="content" placeholder="" value="{{ old('content', $questions->content ?? '') }}">
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
        <option readonly value="" selected disabled hidden> Select Category </option>
      @endif
      @foreach($categories as $category)
        <option  value="{{ $category->id }}"{{ ($selected == $category->id) ? ' selected' : ''}}> {{ $category->name }} </option>
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
    $answerNumber = isset($question) ? $question->answers->count() : 4;
    $contents = old('answers.content', isset($questions) ? $questions->answers->pluck('content')->all() : []);
    $correct = old('answers.correct', isset($questions) ? $questions->answers->search(fn ($answer, $key) => $answer->correct) : -1);
@endphp
        <label for="answers.correct" class="form-label"> {{ __('question.answers.correct') }} </label>
        <div class="container-fluid   bg-white @error('answers.correct') is-invalid @enderror">
            @for ($i = 0; $i < $answerNumber; $i++)
                    <div class=" form-check form-check-reverse">
                        <input readonly name="answers[content][]" type="text" class="form-check-label form-control mb-3 @error('answers.content.'.$i) is-invalid @enderror" id="answers.content.{{$i}}" @isset($isShow) readonly @endisset value="{{ $contents[$i] ?? '' }}">  </input> 
                        <input readonly="readonly" type="radio" name="answers[correct]" id="answers.correct.{{$i}}" class="form-check-input" value="{{ $i }}" @if($i == $correct) checked @endif @isset($isShow) disabled @endisset>
                        @error('answers.content.'.$i)
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @endif
                    </div>
            @endfor
        @error('answers.correct')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
  </div>

  

 

</form>
@endsection
