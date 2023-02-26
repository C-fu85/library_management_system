<?php
include ('../conn.php'); //新增後端的分類
$position_Name = $_POST['position_Name'];
$other = $_POST['other'];
$cheak_SQL_EXIST = "select *from position where position_Name ='$position_Name'";
$exist_Result = mysqli_query($conn ,$cheak_SQL_EXIST);
if(mysqli_num_rows($exist_Result) > 0) {
    alert(str:'該位置已存在',url:'position_New.php');
    exit();
}
$insert_SQL = "insert into position (position_Name ,other) VALUES ('$position_Name' ,'$other')";
$insert_Result = mysqli_query($conn ,$insert_SQL);
if($insert_Result) {
    alert(str:"添加成功" ,url:"position_List.php");
}
else {
    alert(str:"添加失敗" ,url:"position_New.php");
}
?>