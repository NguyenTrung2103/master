@extends('layouts.admin.master')
@section('content')
<div class="col-md-9">
    <div>
        <h1>ListRole</h1>
        <a href="/admin/role/create" class="btn btn-new">+Addnew</a>
    </div>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">RoleID</th>
            <th scope="col">RoleName</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td>Boss</td>
            <td><button type="button" class="btn btn-primary">Edit</button> <button type="button" class="btn btn-danger">Delete</button></td>
          </tr>
          <tr>
            <td>2</td>
            <td>Manger</td>
            <td><button type="button" class="btn btn-primary">Edit</button> <button type="button" class="btn btn-danger">Delete</button></td>
          </tr>
          <tr>
            <td>3</td>
            <td>Member</td>
            <td><button type="button" class="btn btn-primary">Edit</button> <button type="button" class="btn btn-danger">Delete</button></td>
          </tr>
        </tbody>
      </table>
<nav aria-label="Page navigation example">
<ul class="pagination">
  <li class="page-item">
    <a class="page-link" href="#" aria-label="Previous">
      <span aria-hidden="true">&laquo;</span>
    </a>
  </li>
  <li class="page-item"><a class="page-link" href="#">1</a></li>
  <li class="page-item active" aria-current="page">
    <a class="page-link" href="#">2</a>
  </li>
  <li class="page-item"><a class="page-link" href="#">3</a></li>
  <li class="page-item">
    <a class="page-link" href="#" aria-label="Next">
      <span aria-hidden="true">&raquo;</span>
    </a>
  </li>
</ul>
</nav>
</div>
</div>

@endsection
