<?php
include ('../conn.php'); //新增後端的分類
$book_Id = $_POST['book_Id'];
$book_Name = $_POST['book_Name'];
$book_Number = $_POST['book_Number'];
$borrow_Number = $_POST['borrow_Number'];
if($borrow_Number > $book_Number) {
    alert(str:'無法借閱此書籍',url:'mine_Borrow_Require.php');
    exit();
}
$insert_SQL = "insert into mine_borrow(book_Name ,book_Id ,borrow_Number ) VALUES('$book_Name' ,$book_Id 
,$borrow_Number)";
$insert_Result = mysqli_query($conn ,$insert_SQL);
if($insert_Result) {
    alert(str:"添加成功" ,url:"mine_Borrow_List.php");
}
else {
    alert(str:"添加失敗" ,url:"mine_Borrow_Require.php");
}
?>