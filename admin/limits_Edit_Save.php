<?php
include ('../conn.php');
$id = $_POST['id'];
$limits = array(
    $_POST['limits0'],
    $_POST['limits1'],
    $_POST['limits2'],
    $_POST['limits3'],
    $_POST['limits4'],
    $_POST['limits5']
);
$limits = implode(separator:" ",array:$limits);
$insert_SQL = "update user set limits = '$limits' where id=$id";
$insert_Result = mysqli_query($conn ,$insert_SQL);
if($insert_Result) {
    alert(str:"修改成功" ,url:"limits_List.php");
}
else {
    alert(str:"修改失敗" ,url:"limits_List.php");
}
?>