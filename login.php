<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset = "UTF-8">
    <title>圖書管理系統登陸介面</title>
    <link rel = "stylesheet" href = "layui/css/layui.css">
    <script sre = "layui/layui.js"></script>
</head>
<body>
    <div class= "layui-container">
        <div style="height: 150px"></div>
        <div class = "layui-row">
            <div class = "layui-col-md4" style="height: 150px"></div>
            <div class = "layui-col-md4" style="height: 150px">
                <p style="text-align:center;font-size:35px">圖書管理系統-登陸介面</p>
                <div style ="height:25px"></div>
                <form class = "layui-form" action = "login-Cheak.php" method="post">
                    <input type = "text" name = "username" placeholder="請輸入用戶名" class = "layui-input">
                    <div style ="height:25px"></div>
                    <input type = "text" name = "password" placeholder="請輸入密碼" class = "layui-input">
                    <div style ="height:25px"></div>
                    <input type = "submit" value="登陸" class = "layui-btn layui-btn-normal layui-btn-fluid">
                </form>
            <a href="add_Account.php" style = "color: #452E3C">點此註冊帳號</a>
            </div>
            <div class = "layui-col-md4" style="height: 150px"></div>
        </div> 
    </div>
<script>
    layui.use('form' ,function() {
        let form = layui.form;
    });
</script>
</body>
</html>