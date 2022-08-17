@extends('layouts.admin.master')
@section('content')
<div class="container">
  <div class="d-flex justify-content-between">
    <h1 style="font-weight: bold;">{{__('permission.permissionlist')}}</h1>
    <div>
      <a href="{{ route('admin.question.create') }}" class="btn btn-primary">{{__('messages.create')}}</a>
    </div>
  </div>
  <div class="table-responsive">
    <table class="table">
        <tr>
            <th> {{__('messages.name')}} </th>
            <th> {{__('messages.key')}} </th>
            <th> {{__('messages.category')}} </th>
            <th> {{__('messages.action')}} </th>
        </tr>
        @if(!empty($questions))
        @foreach($questions as $question)
        <tr>
            <td>
                <span class="cat-links">
                    {{ $question->id }}
                </span>
            </td>
            <td>
                <span class="cat-links">
                    {{ $question->content }}
                </span>
            </td>
            <td>
                <span class="cat-links">
                {{ $question->category->name  ?? 'None' }}
                </span>
                    
                
            </td>
            <td>
                <a href="{{ route('admin.question.show', $question->id) }}" class="btn btn-success align-self-end"> {{__('messages.show')}} </a>
                <a href="{{ route('admin.question.edit', $question->id) }}" class="btn btn-primary align-self-end"> {{__('messages.edit')}} </a>
                <a class="btn btn-danger delete " > {{__('messages.delete')}} </a>
                <form id="delete-form" class="d-inline" method="post" action="{{ route('admin.question.destroy', $question->id) }}">
                    @csrf
                    @method('DELETE')
                    
                </form>
            </td>
        </tr>
        @endforeach
        @endif

       
    </table>
    {{ $questions->links() }}
  </div>
</div>
@endsection