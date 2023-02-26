<?php
include ('../conn.php'); //新增後端的分類
$id = $_POST['id'];
$book_Id = $_POST['book_Id'];
$book_Number = $_POST['book_Number'];
$borrow_Number = $_POST['borrow_Number'];
$state = $_POST['state'];
if($state = 1) {
    $book_Number -= $borrow_Number;
    $insert_SQL = "update book set book_Number = $book_Number where id = $book_Id";
    $insert_Result = mysqli_query($conn ,$insert_SQL);
}
$insert_SQL = "update mine_borrow set state=$state where id = $id";
$insert_Result = mysqli_query($conn ,$insert_SQL);
if($insert_Result) {
    alert(str:"處理成功" ,url:"manage_Borrow_List.php");
}
else {
    alert(str:"處理失敗" ,url:"manage_Borrow_Handle.php");
}
?>