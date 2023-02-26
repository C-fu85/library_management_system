<?php
include ('../conn.php'); //新增後端的分類
$id = $_POST['id'];
$book_Number = $_POST['book_Number'];
$borrow_Number = $_POST['borrow_Number'];
if($borrow_Number > $book_Number) {
    alert(str:'無法執行此操作',url:'mine_Borrow_Require.php');
    exit();
}
$insert_SQL = "update mine_borrow set borrow_Number = $borrow_Number where id = $id" ;
$insert_Result = mysqli_query($conn ,$insert_SQL);
if($insert_Result) {
    alert(str:"添加成功" ,url:"mine_Borrow_List.php");
}
else {
    alert(str:"添加失敗" ,url:"mine_Borrow_Require.php");
}
?>