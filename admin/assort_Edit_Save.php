<?php
include ('../conn.php');
$id = $_POST['id'];
$assort_Name = $_POST['assort_Name'];
$other = $_POST['other'];
if(strlen($assort_Name) < 1) {
    alert(str:'名字不能為空' ,url: 'assort_List.php');
    exit();
}
$insert_SQL = "update assort set assort_Name = '$assort_Name',other='$other' where id=$id";
$insert_Result = mysqli_query($conn ,$insert_SQL);
if($insert_Result) {
    alert(str:"修改成功" ,url:"assort_List.php");
}
else {
    alert(str:"修改失敗" ,url:"assort_List.php");
}
?>