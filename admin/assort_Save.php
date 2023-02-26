<?php
include ('../conn.php'); //新增後端的分類
$assort_Name = $_POST['assort_Name'];
$other = $_POST['other'];
$cheak_SQL_EXIST = "select *from assort where assort_Name ='$assort_Name'";
$exist_Result = mysqli_query($conn ,$cheak_SQL_EXIST);
if(mysqli_num_rows($exist_Result) > 0) {
    alert(str:'該分類已存在',url:'assort_New.php');
    exit();
}
$insert_SQL = "insert into assort(assort_Name ,other) VALUES('$assort_Name' ,'$other')";
$insert_Result = mysqli_query($conn ,$insert_SQL);
if($insert_Result) {
    alert(str:"添加成功" ,url:"assort_List.php");
}
else {
    alert(str:"添加失敗" ,url:"assort_New.php");
}
?>