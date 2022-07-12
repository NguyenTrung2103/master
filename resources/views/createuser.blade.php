<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title></title>
</head>
<script>
    function CheckName(event){
        event.preventDefalt();

        var mess = document.getElementById('errorText');
        ver username = document.getElementById('tendn').value;
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
     @import url('https://fonts.googleapis.com/css2?family=Noto+Sans+JP&display=swap');
* {box-sizing: border-box}
body{
  font-family: 'Noto Sans JP', sans-serif;
}
h1, label{
  color: DodgerBlue;
}
/* Full-width input fields */
  input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  width:100%;
  resize: vertical;
  padding:15px;
  border-radius:15px;
  border:0;
  box-shadow:4px 4px 10px rgba(0,0,0,0.2);
}

input[type=text]:focus, input[type=password]:focus {
  outline: none;
}

hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for all buttons */
button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 25px;
  opacity: 0.9;
  height: 50px;
}

button:hover {
  opacity:1;
}

/* Extra styles for the cancel button */
.cancelbtn {
  padding: 14px 20px;
  background-color: #f44336;
  width: 50px;
}

/* Float cancel and signup buttons and add an equal width */
.signupbtn {
  float: left;
  width: 50%;
  border-radius:15px;
  border:0;
  box-shadow:4px 4px 10px rgba(0,0,0,0.2);
}

/* Add padding to container elements */
.container {
  padding: 16px;
}

/* Clear floats */
.clearfix::after {
  content: "";
  clear: both;
  display: table;
}
</style>
</html>