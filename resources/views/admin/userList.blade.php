<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>UserList</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

<div class="container-fluid ">
  <div class="row " >
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
    
    
<style>
th{
  text-align: center;
}
td{
  text-align: center;
}
h2{
  padding-left: 16px;
    margin: -4px 0 4px 0;
    width: 204px;
}
.menu{
    height: 100%;
    width: 100%;
    background-color: #E7E9EB;
    
    overflow-x: hidden;
    padding-top: 20px;
    display: block;
    font-family: Verdana,sans-serif;
    font-size: 15px;
    line-height: 1.5;
}
a{
  font-family: "Segoe UI",Arial,sans-serif;
    text-decoration: none;
    display: block;
    padding: 2px 1px 1px 16px;
    color: inherit;
    background-color: transparent;
    box-sizing: inherit;
    
}
a:hover{
  color: #000000;
  background-color: #cccccc;
}
   .system{
    margin-top: 100px;
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
</body>
</html>