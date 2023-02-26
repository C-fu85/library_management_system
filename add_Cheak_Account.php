<?php
include ('conn.php');
$username = $_POST['username'];
$password = $_POST['password'];
$password_Cheak = $_POST['password_Cheak'];
if(strlen($username) < 5) {
    alert(str:'用戶名不能小於5個字' ,url: 'add_Account.php');
    exit();
}
if(strlen($password) < 5) {
    alert(str:'密碼不能小於5個字' ,url: 'add_Account.php');
    exit();
}
if($password != $password_Cheak) {
    alert(str:'密碼不相同' ,url: 'add_Account.php');
    exit();
}
$insert_SQL = "insert into user(username ,password) VALUES('$username' ,'$password')";
$cheak_SQL_EXIST = "select *from user where username='$username'";
$insert_Result = mysqli_query($conn ,$insert_SQL);
$exist_Result = mysqli_query($conn ,$cheak_SQL_EXIST);
if($insert_Result > 0 and mysqli_num_rows($exist_Result) == 0) {
    alert(str:"註冊成功" ,url:"login.php");
}
else {
    alert(str:'用戶名已存在',url:'add_Account.php');
}
?>