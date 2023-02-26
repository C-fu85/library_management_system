<?php
include ('head.php');
limits('權限管理');
$id=$_GET['id'];
$sql="select * from user where id = $id";
$result=mysqli_query($conn,$sql);
if($result) {
    $row=mysqli_fetch_assoc($result);
}
function checkbox_Limits($limits) {
    $conn = @mysqli_connect(hostname:'localhost:3307' ,username:'root' ,password:'peter2312412' ,database:'library_management_system') or die('連接失敗');
    mysqli_query($conn ,query:'set names utf8');
    $id=$_GET['id'];
    $sql = "select * from user where id = $id and limits like '%".$limits."%'";
    $result =mysqli_query($conn ,$sql);
    if(mysqli_num_rows($result) > 0) {
        echo 'checked';
    }
}
?>
    <div class="layui-body"> <!-- 修改用戶訊息 -->
        <div style="padding: 15px;">
            <h2>權限管理</h2>
            <div class="layui-tab layui-tab-brief">
                <ul class = "layui-tab-title" >
                    <li class="layui-this">修改用戶權限</a></li>
                </ul>  
            </div>
            <div class="layui-tab-content">
                <div class="layui-tab-item layui-show">
                    <div class="layui-row">
                        <div class="layui-col-md8">
                            <form class="layui-form" method="post" action="limits_Edit_Save.php">
                                <input type="hidden" name = id value = "<?php echo $row['id']?>">
                                <div class="layui-form-item"> <!-- 用戶名稱 -->
                                    <label class="layui-form-label">用戶名稱</label>
                                    <div class="layui-input-block">
                                        <input type="text" name="username" required lay-verify="required" class="layui-input"
                                         value="<?php echo $row['username'] ?>" readonly ="true">

                                    </div>
                                </div>
                                <div class="layui-form-item"> <!-- 修改真實姓名 -->
                                    <label class="layui-form-label">修改真實姓名</label>
                                    <div class="layui-input-block">
                                        <input type="text" name="real_Name" class="layui-input"
                                        value="<?php echo $row['real_name']?>" readonly="true"
                                        >
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <label class = "layui-form-label">權限設置</label>
                                    <div class="layui-input-block">
                                        <input type="checkbox" name="limits0" value = "圖書管理" title="圖書管理" 
                                        <?php checkbox_Limits(limits:'圖書管理');?>>

                                        <input type="checkbox" name="limits1" value = "分類管理" title="分類管理" 
                                        <?php checkbox_Limits(limits:'分類管理');?>>

                                        <input type="checkbox" name="limits2" value = "位置管理" title="位置管理" 
                                        <?php checkbox_Limits(limits:'位置管理');?>>

                                        <input type="checkbox" name="limits3" value = "借閱管理" title="借閱管理" 
                                        <?php checkbox_Limits(limits:'借閱管理');?>>

                                        <input type="checkbox" name="limits4" value = "用戶管理" title="用戶管理" 
                                        <?php checkbox_Limits(limits:'用戶管理');?>>

                                        <input type="checkbox" name="limits5" value = "權限管理" title="權限管理" 
                                        <?php checkbox_Limits(limits:'權限管理');?>>
                                    </div>
                                </div>
                                <div class="layui-form-item"> <!-- 真實姓名輸入 -->
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