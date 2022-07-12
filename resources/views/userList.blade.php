<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="   https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>


<div class="container">
  <div class = "row">
  <div class="col-3">
     <ul>System
         <li>User management</li>
         <li>Role management</li>
         <li>Permissin management</li>
     </ul>
     <ul>Catalog
     <li>Prodct management</li>
     <li>Category management</li>
     
     </ul>
 <div>
<div class="col-md-9">
    <div class="row" style="margin-top:8px">
        <div class="col-md-10">
            <h1>UserList</h1>
            <a href="login" class="btn btn-new">+Addnew</a>
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
  </div>


</body>
<style>
    .container{
  }
  .table{
    color:
  }
  .btn{
    position: relative;
  }
  .btn-new{
        background: #0D6EFD;
        color: #FFFFFF;
        float:right;
        left: 0;
        bottom: 50px;
        width: 110px;
        border-radius: 5px
    }
    .btn-new:hover{
        background: #0D6EFD;
        border: none;
        color: #FFFFFF;
    }
    .pagination{
        align-items: center;
        display: flex;
        justify-content: center;
    }
</style>
</html>