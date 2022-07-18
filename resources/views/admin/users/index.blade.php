<!doctype html>
<html lang="en">
<head>
    @include('layouts.admin.partitions.head')
    <link rel="stylesheet" href="/css/userlist.css">
</head>
<body>
@include('layouts.admin.partitions.nav')
<div class="container-fluid ">

<div class = "row">
     <div class="col-2 ">
        <div class="menu">
        <h2>
          <span>
            System
          </span>
        </h2>
          <a target="_top" href="">User management</a>
          <a href="">Role management</a>
          <a href="">Permssion management</a>
        <br>
        <h2>
          <span>
            Catalog
          </span>
        </h2>
          <a target="_top" href="">Product management</a>
          <a href="">Category management</a>
        
        </div>
      
     </div>
     
      <div class=" col-10">
      <div class="row" style="margin-top:8px">
        <div class="col-md-10">
            <h1>UserList</h1>
            <a href="login" class="btn btn-new">+Addnew</a>
            <a href="login" class="btn btn-mail">sent mail</a>
        </div>
     </div>
      <div class="col-md-10 ">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Avatar</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Admin</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><img width="30px" src="https://i.imgur.com/s6l2a1U.png" alt=""></td>
                <td>Aza</td>
                <td>Aza@gmail.com</td>
                <td><button type="button" class="btn btn-primary">Edit</button> <button type="button" class="btn btn-danger">Delete</button></td>
              </tr>
                <td><img width="30px" src="https://i.imgur.com/s6l2a1U.png"alt=""></td>
                <td>Thorn</td>
                <td>Thorn@gmail.com</td>
                <td><button type="button" class="btn btn-primary">Edit</button> <button type="button" class="btn btn-danger">Delete</button></td>
              </tr>
                <td><img width="30px" src="https://i.imgur.com/s6l2a1U.png" alt=></td>
                <td>Wish</td>
                <td>Wish@gmail.com</td>
                <td><button type="button" class="btn btn-primary">Edit</button> <button type="button" class="btn btn-danger">Delete</button></td>
              </tr>
                <td><img width="30px" src="https://i.imgur.com/s6l2a1U.png" alt=""></td>
                <td>Aya</td>
                <td>Aya@gmail.com</td>
                <td><button type="button" class="btn btn-primary">Edit</button> <button type="button" class="btn btn-danger">Delete</button></td>
              </tr>
                <td><img width="30px" src="https://i.imgur.com/s6l2a1U.png" alt=""></td>
                <td>Home</td>
                <td>Home@gmail.com</td>
                <td><button type="button" class="btn btn-primary">Edit</button> <button type="button" class="btn btn-danger">Delete</button></td>
              </tr>
            </tbody>
          </table>
    </div>
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
 

</div>
@include('layouts.admin.partitions.footer')
    
    
<style>
.btn-mail{
        background: #FFFFFF;
        color: #0D6EFD;
        float:right;
        left: 0;
        bottom: 50px;
        width: 110px;
        border-radius: 5px
    }
</style>
</body>
</html>