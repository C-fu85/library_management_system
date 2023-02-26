<?php
include ('../conn.php');
$id = $_POST['id'];
$position_Name = $_POST['position_Name'];
$other = $_POST['other'];
if(strlen($position_Name) < 1) {
    alert(str:'名字不能為空' ,url: 'position_List.php');
    exit();
}
$insert_SQL = "update position set position_Name = '$position_Name',other='$other' where id=$id";
$insert_Result = mysqli_query($conn ,$insert_SQL);
if($insert_Result) {
    alert(str:"修改成功" ,url:"position_List.php");
}
else {
    alert(str:"修改失敗" ,url:"position_List.php");
}
?>