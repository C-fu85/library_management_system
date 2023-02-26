<?php
include ('head.php');
$id=$_GET['id'];
$sql="select * from assort where id = $id";
$result=mysqli_query($conn,$sql);
if($result) {
    $row=mysqli_fetch_assoc($result);
}
limits('分類管理');
?>
    <div class="layui-body"> <!-- 修改分類訊息 -->
        <div style="padding: 15px;">
            <h2>分類管理</h2>
            <div class="layui-tab layui-tab-brief">
                <ul class = "layui-tab-title" >
                    <li class="layui-this">修改分類訊息</a></li>
                </ul>  
            </div>
            <div class="layui-tab-content">
                <div class="layui-tab-item layui-show">
                    <div class="layui-row">
                        <div class="layui-col-md6">
                            <form class="layui-form" method="post" action="assort_Edit_Save.php">
                                <input type="hidden" name = id value = "<?php echo $row['id']?>">
                                <div class="layui-form-item"> <!-- 分類名稱修改 -->
                                    <label class="layui-form-label">分類名稱</label>
                                    <div class="layui-input-block">
                                        <input type="text" name="assort_Name" required lay-verify="required" class="layui-input"
                                         value="<?php echo $row['assort_Name'] ?>">

                                    </div>
                                </div>
                                <div class="layui-form-item"> <!-- 分類解釋修改 -->
                                    <label class="layui-form-label">輸入修改的分類解釋</label>
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