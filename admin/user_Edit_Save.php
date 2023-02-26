<?php
include ('../conn.php');
$id = $_POST['id'];
$username = $_POST['username'];
$password = $_POST['password'];
$password_Cheak = $_POST['password_Cheak'];
$real_Name = $_POST['real_Name'];
if(strlen($password) < 5) {
    alert(str:'密碼不能小於5個字' ,url: 'user_List.php');
    exit();
}
if($password != $password_Cheak) {
    alert(str:$password ,url: 'user_List.php');
    exit();
}
$insert_SQL = "update user set username = '$username',password='$password',real_name='$real_Name' where id=$id";
$insert_Result = mysqli_query($conn ,$insert_SQL);
if($insert_Result) {
    alert(str:"修改成功" ,url:"user_List.php");
}
else {
    alert(str:"修改失敗" ,url:"user_List.php");
}
?>