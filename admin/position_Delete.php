<?php
include('../conn.php');
$id = $_GET['id'];
$sql = "delete from position where id = $id";
$result = mysqli_query($conn ,$sql);
if($result) {
    alert('刪除成功','position_List.php');
}
else {
    alert('刪除失敗','position_List.php');
}