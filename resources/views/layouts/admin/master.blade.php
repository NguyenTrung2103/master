<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/app.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title></title>
</head>
<script>
    function CheckName(event){
        event.preventDefalt();

        var mess = document.getElementById('errorText');
        var username = document.getElementById('tendn').value;
        var pattern = new RegExp(/[~`!#$%\^&*+=\-\[\]\\';,/{}|\\":<>\?]/);

        if (username == ''){
            document.getElementById('tendn').style.backgroundColor = 'red';
            mess.innerHTML += 'khong duoc vo danh';
        }else if(username.length > 0 && username.length < 2){
            document.getElementById('tendn').style.backgroundColor = 'yellow';

            mess.innerHTML += 'Tên đăng nhập nhieu hon 2 ki tu ';
        }else if(pattern.test(username)){
            document.getElementById('tendn').style.backgroundColor = 'yellow';

            mess.innerHTML += 'Tên đăng nhập khong co ki tu dac biet ';
        }
    }
    function Checkemail(event)

{

    event.preventDefault();

    var mess = document.getElementById('errorText');

    var letter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

    var email = document.getElementById('email').value;

    if (email == '')

    {

        document.getElementById('email').style.backgroundColor = 'yellow';

        mess.innerHTML += 'Email ko được để trống ';

    } else if (!email.match(letter))

    {

        document.getElementById('email').style.backgroundColor = 'yellow';

        mess.innerHTML += 'Email nhập sai định dạng';

    } else mess.innerHTML += 'Email của bạn là :' + email + '';
}
    

</script>

<body>

   <div class="container-fluid">
     <div class = "row">
     <div class="col-3 ">
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
     <div class="col-9 ">
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
 
</body>
<style>
     
</style>
</html>