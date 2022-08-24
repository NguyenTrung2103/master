<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <div class="container-fluid">
        <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Bảng điều khiển</a></li>
                 <li class="breadcrumb-item active" aria-current="page">Quản lý Thông tin KH</li>
             </ol>
        </nav>
        </div>
        <div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                 <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                     <li class="nav-item">
                          <a class="btn btn-primary" aria-current="page" href="#">Thêm mới</a>
                     </li>
                      <li class="nav-item">
                          <a class="btn btn-danger" href="#">Xoá tất cả</a>
                         </li>
                          <li class="nav-item dropdown">
                              <a class="btn btn-danger" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          Chuyển người quản lý
                                  </a>
          
                          </li>
        
                 </ul>
      <form class="d-flex">
        <input class="form-control me-3" type="search" placeholder="Tìm kiếm" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Tìm kiếm</button>
      </form>
    </div>
  </div>
</nav>
</div>
<div class="border-top border-primary border-2">
                <form>
                    <p>Tìm kiếm</p>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>Loại khách</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>Người quản lý</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <button type="button" class="btn btn-success"><i class="fa fa-search" aria-hidden="true"></i>Tìm kiếm</button>
                                <button type="button" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i>Hủy lọc</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="border-top border-primary border-2 container-fluid">
                
                <p>Danh sách thông tin khách hàng</p>
                <button type="button" class="btn btn-success">Success</button>
                <button type="button" class="btn btn-success">Success</button>
                <table class="table table-bordered table-all">
                <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Loại khách</th>
                    <th scope="col">Mã KH</th>
                    <th scope="col">Thông tin KH</th>
                    <th scope="col">Địa chỉ</th>
                    <th scope="col">Điện thoại</th>
                    <th scope="col">Email</th>
                    <th scope="col">Người tạo</th>
                    <th scope="col">Thao tác</th>
                </tr>
                <tr>

                </tr>
                </thead>
                </table>
                
            </div>
</div>
</body>
</html>
