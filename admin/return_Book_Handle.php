<?php
include ('../conn.php'); //新增後端的分類
$id = $_GET['id'];
$sql = "select * from mine_borrow where id = $id ";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
$state = $row['state'];
$borrow_Number = $row['borrow_Number'];
if($state == 2) {
    alert("該書籍不需要歸還" ,"return_Book.php");
}
$book_Id = $row['book_Id'];
$sql = "select * from book where id = $book_Id";
$result = mysqli_query($conn,$sql);
$row_Book = mysqli_fetch_assoc($result);
$book_Number = $row_Book['book_Number'];
if($state = 1) {
    $book_Number += $borrow_Number;
    $insert_SQL = "update book set book_Number = $book_Number where id = $book_Id";
    $insert_Result = mysqli_query($conn ,$insert_SQL);
}
$insert_SQL = "update mine_borrow set state=0 where id = $id";
$insert_Result = mysqli_query($conn ,$insert_SQL);
if($insert_Result) {
    alert(str:"處理成功" ,url:"return_Book.php");
}
else {
    alert(str:"處理失敗" ,url:"return_Book.php");
}
?>