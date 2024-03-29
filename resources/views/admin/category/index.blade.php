@extends('layouts.admin.master')
@section('content')
<div class="container-fluid">
  <div class="d-flex justify-content-between">
    <p style="font-weight: bold;">{{__('category.CategoryList')}}</p>
    <div>
        <a href="{{ route('admin.category.create') }}" class="btn btn-primary">{{__('messages.create')}}</a>  
    </div>
  </div>
  <div class="table-responsive">
    <table class="table">
        <tr>
            <th> {{__('messages.name')}} </th>
            <th> {{__('messages.slug')}} </th>
            <th> {{__('messages.action')}} </th>
        </tr>
        @if(!empty($categories))
      @foreach($categories as $category)
      <td>
              {{ $category->name }}
          </td>
          <td>
              {{ $category->slug }}
          </td>
          <td>
              <a href="{{ route('admin.category.show', $category->id) }}" class="btn btn-success"> {{__('messages.show')}} </a>
              <a href="{{ route('admin.category.edit', $category->id) }}" class="btn btn-primary"> {{__('messages.edit')}} </a>
              <a class="btn btn-danger delete " > {{__('messages.delete')}} </a>
              <form id="delete-form" class="d-inline" method="post" action="{{ route('admin.category.destroy', $category->id) }}">
                @csrf
                @method('DELETE')   
              </form>  
          </td>
          </tr>
          @endforeach
      @endif   
    </table>
    {{ $categories->links() }} 
  </div>
</div>
@endsection