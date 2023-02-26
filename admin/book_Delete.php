<?php
include('../conn.php');
$id = $_GET['id'];
$sql = "delete from book where id = $id";
$result = mysqli_query($conn ,$sql);
if($result) {
    alert('刪除成功','book_List.php');
}
else {
    alert('刪除失敗','book_List.php');
}