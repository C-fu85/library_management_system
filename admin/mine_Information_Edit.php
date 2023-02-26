<?php
include ('head.php');
$id=$_GET['id'];
$sql="select * from user where id = $id";
$result=mysqli_query($conn,$sql);
if($result) {
    $row=mysqli_fetch_assoc($result);
}
?>
    <div class="layui-body"> <!-- 修改用戶訊息 -->
        <div style="padding: 15px;">
            <h2>個人中心</h2>
            <div class="layui-tab layui-tab-brief">
                <ul class = "layui-tab-title" >
                    <li class="layui-this">修改個人訊息</a></li>
                </ul>  
            </div>
            <div class="layui-tab-content">
                <div class="layui-tab-item layui-show">
                    <div class="layui-row">
                        <div class="layui-col-md6">
                            <form class="layui-form" method="post" action="mine_Information_Edit_Save.php">
                                <input type="hidden" name = id value = "<?php echo $row['id']?>">
                                <div class="layui-form-item"> <!-- 用戶名稱 -->
                                    <label class="layui-form-label">用戶名稱</label>
                                    <div class="layui-input-block">
                                        <input type="text" name="username" readonly="true" class="layui-input"
                                         value="<?php echo $row['username'] ?>">
                                    </div>
                                </div>
                                <div class="layui-form-item"> <!-- 輸入修改密碼 -->
                                    <label class="layui-form-label">輸入修改密碼</label>
                                    <div class="layui-input-block">
                                        <input type="password" name="password" required lay-verify="required" class="layui-input"
                                        value="<?php echo $row['password']?>"
                                        >
                                    </div>
                                </div>
                                <div class="layui-form-item"> <!-- 再次輸入修改密碼 -->
                                    <label class="layui-form-label">再次輸入修改密碼</label>
                                    <div class="layui-input-block">
                                        <input type="password" name="password_Cheak" required lay-verify="required" class="layui-input"
                                        value="<?php echo $row['password']?>"
                                        >
                                    </div>
                                </div>
                                <div class="layui-form-item"> <!-- 修改真實姓名 -->
                                    <label class="layui-form-label">修改真實姓名</label>
                                    <div class="layui-input-block">
                                        <input type="text" name="real_Name" class="layui-input"
                                        value="<?php echo $row['real_name']?>"
                                        >
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <div class="layui-input-block">
                                        <input type="submit" class="layui-btn layui-btn-normal" value="提交">
                                        <button type="reset" class="layui-btn layui-btn-primary ">重置</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php 
include ('foot.php')
?>