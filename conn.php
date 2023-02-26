<?php
header(header: 'Content-Type:text/html;charset =utf-8');
$servername = "localhost:3307";
$username = "root";
$password = "peter2312412";
$dbname = "library_management_system";
$conn = mysqli_connect($servername ,$username ,$password ,$dbname);
if(!$conn) {
    die("連接失敗".mysqli_connect_error());
}
function alert($str ,$url) {
    echo '<script> alert ("'.$str.'");location.href = "'.$url.'"; </script>';
}
session_start();


