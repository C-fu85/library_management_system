<?php
include ('head.php');
limits('位置管理');
$id=$_GET['id'];
$sql="select * from position where id = $id";
$result=mysqli_query($conn,$sql);
if($result) {
    $row=mysqli_fetch_assoc($result);
}
?>
    <div class="layui-body"> <!-- 修改位置訊息 -->
        <div style="padding: 15px;">
            <h2>位置管理</h2>
            <div class="layui-tab layui-tab-brief">
                <ul class = "layui-tab-title" >
                    <li class="layui-this">修改位置訊息</a></li>
                </ul>  
            </div>
            <div class="layui-tab-content">
                <div class="layui-tab-item layui-show">
                    <div class="layui-row">
                        <div class="layui-col-md6">
                            <form class="layui-form" method="post" action="position_Edit_Save.php">
                                <input type="hidden" name = id value = "<?php echo $row['id']?>">
                                <div class="layui-form-item"> <!-- 位置名稱修改 -->
                                    <label class="layui-form-label">位置名稱</label>
                                    <div class="layui-input-block">
                                        <input type="text" name="position_Name" required lay-verify="required" class="layui-input"
                                         value="<?php echo $row['position_Name'] ?>">

                                    </div>
                                </div>
                                <div class="layui-form-item"> <!-- 分類解釋修改 -->
                                    <label class="layui-form-label">輸入修改的位置解釋</label>
                                    <div class="layui-input-block">
                                        <input type="text" name="other" required lay-verify="required" class="layui-input"
                                        value="<?php echo $row['other']?>"
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