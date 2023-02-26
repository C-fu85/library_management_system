<?php
include('conn.php');
$username = $_POST['username'];
$password = $_POST['password'];
if(strlen($username) < 5) {
    alert(str:'用戶名不能小於5個字' ,url: 'login.php');
    exit();
}
$sql = "select *from user where username='$username' and password='$password'";
$result = mysqli_query($conn ,$sql);

if(mysqli_num_rows($result) > 0) {
    $_SESSION['username'] = $username;
    alert(str:"登陸成功" ,url:"admin/index.php");
}
else {
    alert(str:'用戶名或密碼錯誤',url:'login.php');
}
?>