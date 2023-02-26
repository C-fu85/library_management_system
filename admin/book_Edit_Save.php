<?php
include ('../conn.php'); //新增後端的分類
$id = $_POST['id'];
$book_Name = $_POST['book_Name'];
$book_Assort = $_POST['book_Assort'];
$book_Position = $_POST['book_Position'];
$book_Number = $_POST['book_Number'];
if(strlen($book_Name) < 1) {
    alert(str:'名字不能為空' ,url: 'book_List.php');
    exit();
}
$insert_SQL = "update book set book_Name = '$book_Name',book_Assort='$book_Assort' ,book_Position = '$book_Position' 
,book_Number = '$book_Number' where id=$id";
$insert_Result = mysqli_query($conn ,$insert_SQL);
if($insert_Result) {
    alert(str:"修改成功" ,url:"book_List.php");
}
else {
    alert(str:"修改失敗" ,url:"book_List.php");
}
?>