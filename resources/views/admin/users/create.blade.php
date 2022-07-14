<!DOCTYPE html>
<html lang="en">
<head>
   @include('layouts.admin.partitions.head')
   <link href="/css/app.css" rel="stylesheet">
</head>


<body>
@include('layouts.admin.partitions.nav')

   <div class="container-fluid">
     @include('layouts.admin.partitions.sidebar')
     <div class="col-10 ">
     <div >

        <h1>Create a User</h1>
     
     <label for="name"><b>Name</b></label>
      <input id="tendn" type="text"  name="name" required>
     <label for="email"><b>Email</b></label>
      <input type="text" placeholder="Nhập Email" name="email" required>
     <label id="email" for="psw"><b>Password</b></label>
      <input type="password" placeholder="Nhập Mật Khẩu" name="psw" required>
     <label for="psw-repeat"><b>Nhập Lại Mật Khẩu</b></label>
      <input type="password" placeholder="Nhập Lại Mật Khẩu" name="psw-repeat" required>
     <label for="email"><b>Address</b></label>
      <input type="text"  name="Address" required>
     <label for="email"><b>Facebook link</b></label>
      <input type="text" placeholder="https://example.com" name="facebook" required>
     <label for="email"><b>Youtuba</b></label>
      <input type="text" placeholder="https://example.com" name="youtube" required>
     <label for="email"><b>Description</b></label>
      <input type="text"  name="description" required>
     <label>
        <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Nhớ Đăng Nhập
      </label>
     <div class="clearfix container">
        <button type="submit" class="signupbtn ">Save</button>
        <button type="submit" class="signupbtn ">Reset</button>
      </div>
     </div>
     </div>
   </div>
   @include('layouts.admin.partitions.footer')
</body>
<style>
     
</style>
</html>