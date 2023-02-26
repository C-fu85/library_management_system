<?php
include('../conn.php');
$id = $_GET['id'];
$sql = "delete from assort where id = $id";
$result = mysqli_query($conn ,$sql);
if($result) {
    alert('刪除成功','assort_List.php');
}
else {
    alert('刪除失敗','assort_List.php');
}