<h1>session</h1>
<form action="user" method="POST">
    @csrf
    <input type="text" name="username" placeholder="nhap ten"><br><br>
    <input type="text" name="email" placeholder="nhap email"><br><br>
    <input type="text" name="passwork" placeholder="nhap phap pass"><br><br>
    <input type="text" name="repasswork" placeholder="nhap lại passwork"><br><br>
    <input type="text" name="add" placeholder="nhap dia chỉ"><br><br>
    <input type="text" name="facebook" placeholder="nhap facebook"><br><br>
    <input type="text" name="youtube" placeholder="nhap youtube"><br><br>
    <button type="submit">save</button>
</form>