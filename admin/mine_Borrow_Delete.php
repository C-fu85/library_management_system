<?php
include('../conn.php');
$id = $_GET['id'];
$sql = "delete from mine_borrow where id = $id";
$result = mysqli_query($conn ,$sql);
if($result) {
    alert('刪除成功','mine_Borrow_List.php');
}
else {
    alert('刪除失敗','mine_Borrow_List.php');
}