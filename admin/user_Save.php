<?php
include ('../conn.php');
$username = $_POST['username'];
$password = $_POST['password'];
$password_Cheak = $_POST['password_Cheak'];
$real_Name = $_POST['real_Name'];
$cheak_SQL_EXIST = "select *from user where username='$username'";
$exist_Result = mysqli_query($conn ,$cheak_SQL_EXIST);
if(mysqli_num_rows($exist_Result) > 0) {
    alert(str:'用戶名已存在',url:'user_New.php');
    exit();
}
if(strlen($username) < 5) {
    alert(str:'用戶名不能小於5個字' ,url: 'user_New.php');
    exit();
}
if(strlen($password) < 5) {
    alert(str:'密碼不能小於5個字' ,url: 'user_New.php');
    exit();
}
if($password != $password_Cheak) {
    alert(str:'密碼不相同' ,url: 'user_New.php');
    exit();
}
$insert_SQL = "insert into user(username ,password ,real_name) VALUES('$username' ,'$password' ,'$real_Name')";

$insert_Result = mysqli_query($conn ,$insert_SQL);
if($insert_Result) {
    alert(str:"添加成功" ,url:"user_List.php");
}
else {
    alert(str:"添加失敗" ,url:"user_New.php");
}
?>