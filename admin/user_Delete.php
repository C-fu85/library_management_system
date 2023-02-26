<?php
include('../conn.php');
$id = $_GET['id'];
$sql = "delete from user where id = $id";
$result = mysqli_query($conn ,$sql);
if($result) {
    alert('刪除成功','user_List.php');
}
else {
    alert('刪除失敗','user_List.php');
}