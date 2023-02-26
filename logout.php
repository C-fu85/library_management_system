<?php 
include ('conn.php');
$_SESSION=[];
session_destroy();
alert('已成功登出' ,'login.php');