
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" >
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" ></script>
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <title>Document</title>
</head>
<body>
    <div class = "container-fluid">
    <div class="row">
        <div class = "col-7">
            <form action="">
            <div class="container-fluid">
                 <label for="id" class="form-label"> {{ __('user.MaKH') }} </label>
                 <input name="id" id="id" class="form-control mb-2" value="" readonly>
             </div>
             <div class="container-fluid">
                 <label for="id" class="form-label"> {{ __('user.ThongtinKH') }} </label>
                 <input name="id" id="id" class="form-control mb-2" value="" >
             </div>
             <div class="container-fluid">
                 <label for="id" class="form-label"> {{ __('user.Diachi') }} </label>
                 <input name="id" id="id" class="form-control mb-2" value="" >
             </div>
             <div class="container-fluid">
                 <label for="id" class="form-label"> {{ __('user.phone') }} </label>
                 <input name="id" id="id" class="form-control mb-2" value="" >
             </div>
             <div class="container-fluid">
                <label for="id" class="form-label"> {{ __('user.phoneZalo') }}: </label> 
                <a href="" class="btn btn-primary"> {{__('messages.addZalo')}} </a>
             </div>
             <div class="container-fluid">
                 <label for="id" class="form-label"> {{ __('user.phone1') }} </label>
                 <input name="id" id="id" class="form-control mb-2" value="" >
                 <a class="btn btn-danger delete " > {{__('messages.delete')}} </a>
                <form id="delete-form" class="d-inline" method="post" action="">
                    @csrf
                    @method('DELETE')
                    
                </form>
             </div>
             <div class="container-fluid">
                 <label for="id" class="form-label"> {{ __('user.email') }} </label>
                 <input name="id" id="id" class="form-control mb-2" value="" >
             </div>
             <div class="container-fluid">
                 <label for="id" class="form-label"> {{ __('user.lienhe') }} </label>
                 <input name="id" id="id" class="form-control mb-2" value="" >
             </div>
             <div class="container-fluid">
                 <label for="id" class="form-label"> {{ __('user.chucvu') }} </label>
                 <input name="id" id="id" class="form-control mb-2" value="" >
             </div>
             <div class="container-fluid">
                 <label for="id" class="form-label"> {{ __('user.Tendonvi') }} </label>
                 <input name="id" id="id" class="form-control mb-2" value="" >
             </div>
             <div class="container-fluid">
                 <label for="id" class="form-label"> {{ __('user.MasoThue') }} </label>
                 <input name="id" id="id" class="form-control mb-2" value="" >
             </div>
             <div class="container-fluid">
                 <label for="id" class="form-label"> {{ __('user.Diachihoadon') }} </label>
                 <input name="id" id="id" class="form-control mb-2" value="" >
             </div>
             <div class="container-fluid">
                 <label for="id" class="form-label"> {{ __('user.taikhoannganhang') }} </label>
                 <input name="id" id="id" class="form-control mb-2" value="" >
             </div>
            </form>
        </div>
        <div class = "col-5">
        <div class="mb-3">
                 <label for="id" class="form-label"> {{ __('user.LoaiKhach') }} </label>
                 <select class="form-select" aria-label="Default select example">
                     <option value="" selected disabled hidden> Select Category </option>    
                     <option value=""> 1 </option>   
                     <option value=""> 1 </option>   
                     <option value=""> 1 </option>      
                </select>
        </div>
        <div class="mb-3">
            <input type="checkbox" name="" id="" value="">   Chia sẻ quyền cho kế toán
            <br>
        </div>
        <div class="mb-3">
            <input type="checkbox" name="" id="" value="">   Khoá tạo đơn hàng, khách hàng đã quá hạn mức
        </div>
        <div class="mb-3">
                 <label for="id" class="form-label"> {{ __('user.MasoThue') }} </label>
        </div>
        <div class="mb-3">
        <textarea name="" id="" cols="80" rows="5"></textarea>
        </div>
        <div class="mb-3">
                 <label for="id" class="form-label"> {{ __('user.taikhoannganhang') }} </label>
                 <input name="id" id="id" class="form-control mb-2" value="" >
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Email address</label>
            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
             <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <div class="form-group">
                    <label for="content">Content:</label>
                    <textarea id="default">Hello, World!</textarea>
                </div>
        </div>
        </div>
    </div>
<script>
    tinymce.init({
    selector: 'textarea#default'
});
</script>
</body>
</html>
