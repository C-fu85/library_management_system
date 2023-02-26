<?php
include('../conn.php');
if(!isset($_SESSION['username'])) {
    alert('登陸失效，請重新登錄' ,'../login.php');
}
$sql ="select * from mine_borrow where state = 0";
$result = mysqli_query($conn ,$sql);
$num = mysqli_num_rows($result);
if($num > 0) {
    $span = '<span class= "layui-badge-rim layui-bg-red">'.$num.'</span>';
}
else {
    $span = null;
}
function limits($limits){
    $conn = @mysqli_connect(hostname:'localhost:3307' ,username:'root' ,password:'peter2312412' ,database:'library_management_system') or die('連接失敗');
    mysqli_query($conn ,query:'set names utf8');
    $username = $_SESSION['username'];
    $sql = "select * from user where username = '$username' and limits like '%".$limits."%'";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result) < 1) {
        alert("您不具備訪問該頁面的權限",'index.php');
        exit();
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>圖書管理系統首頁</title>
    <link rel="stylesheet" href="../layui/css/layui.css">
    <script src = "../layui/layui.js"></script>
</head>
<body>
<div class="layui-layout layui-layout-admin">
    <div class="layui-header">
        <div class="layui-logo layui-hide-xs layui-bg-black">圖書管理系統</div>
        <ul class="layui-nav layui-layout-left">
            <li class="layui-nav-item layui-hide-xs"><a href="./index.php">首頁</a></li>
        </ul>
        <ul class="layui-nav layui-layout-right">
            <li class="layui-nav-item layui-hide-xs"><a href="../logout.php">登出</a></li>
            <li class="layui-nav-item layui-hide layui-show-md-inline-block">
                <a href="javascript:;">個人中心</a>
                <dl class="layui-nav-child">
                    <dd><a href="mine_Information.php">個人信息</a></dd>
                    <dd><a href="mine_Borrow_Require.php">借閱申請</a></dd>
                    <dd><a href="mine_Borrow_List.php">申請列表</a></dd>
                    <dd><a href="mine_Book_List.php">我的書籍</a></dd>
                </dl>
            </li>
        <li class="layui-nav-item" lay-header-event="menuRight" lay-unselect>
            <a href="javascript:;">
                <i class="layui-icon layui-icon-more-vertical"></i>
            </a>
        </li>
        </ul>
    </div>
    <div class="layui-side layui-bg-black">
        <div class="layui-side-scroll">
            <ul class="layui-nav layui-nav-tree" lay-filter="test">
            <li class="layui-nav-item">
                <a class="" href="javascript:;">圖書管理</a>
                <dl class="layui-nav-child">
                    <dd><a href="book_List.php">圖書列表</a></dd>
                    <dd><a href="book_New.php">新增圖書</a></dd>  
                </dl>
            </li>
            <li class="layui-nav-item">
                <a href="javascript:;">分類管理</a>
                <dl class="layui-nav-child">
                    <dd><a href="assort_List.php">分類列表</a></dd>
                    <dd><a href="assort_New.php">新增分類</a></dd>
                </dl>
            </li>
            <li class="layui-nav-item">
                <a href="javascript:;">位置管理</a>
                <dl class="layui-nav-child">
                    <dd><a href="position_List.php">位置列表</a></dd>
                    <dd><a href="position_New.php">新增位置</a></dd>
                </dl>
                </li>
            <li class="layui-nav-item">
                <a href="javascript:;">借閱管理管理</a>
                <dl class="layui-nav-child">
                    <dd><a href="manage_Borrow_List.php">申請列表<?php echo $span?></a></dd>
                    <dd><a href="return_Book.php">歸還書籍</a></dd>
                </dl>
            </li>
            <li class="layui-nav-item">
                <a href="javascript:;">用戶管理</a>
                <dl class="layui-nav-child">
                    <dd><a href="user_List.php">用戶列表</a></dd>
                    <dd><a href="user_New.php">新增用戶</a></dd>
                </dl>
            </li>
            <li class="layui-nav-item">
                <a href="javascript:;">權限設置</a>
                <dl class="layui-nav-child">
                    <dd><a href="limits_List.php">修改權限</a></dd>
                </dl>
            </li>
        </ul>
    </div>
</div>

  