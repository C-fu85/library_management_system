<?php
include ('head.php');
$id=$_GET['id'];
$sql="select * from book where id = $id";
$result=mysqli_query($conn,$sql);
if($result) {
    $row=mysqli_fetch_assoc($result);
}
?>
    <div class="layui-body"> <!-- 個人中心-借閱申請-詳情介面 -->
        <div style="padding: 15px;">
            <h2>個人中心</h2>
            <div class="layui-tab layui-tab-brief">
                <ul class = "layui-tab-title" >
                    <li class="layui-this">借閱申請-詳情介面</a></li>
                </ul>  
            </div>
            <div class="layui-tab-content">
                <div class="layui-tab-item layui-show">
                    <div class="layui-row">
                        <div class="layui-col-md8">
                            <form class="layui-form" method="post" action="mine_Borrow_Save.php">
                                <input type="hidden" name = "book_Id" value = "<?php echo $row['id']?>">
                                <div class="layui-form-item"> <!-- 書本名稱 -->
                                    <label class="layui-form-label">書名</label>
                                    <div class="layui-input-block">
                                        <input type="text" name="book_Name" class="layui-input"
                                        value = "<?php echo $row['book_Name'] ?>" readonly ="true">
                                    </div>
                                </div>
                                <div class="layui-form-item"> <!-- 書本分類 -->
                                    <label class="layui-form-label">書本類型</label>
                                    <div class="layui-input-block">
                                        <input type="text" name="book_Assort" class="layui-input"
                                        value="<?php echo $row['book_Assort'] ?>" readonly ="true">
                                    </div>
                                </div>
                                <div class="layui-form-item"> <!-- 書本存放位置 -->
                                    <label class="layui-form-label">書本存放位置</label>
                                    <div class="layui-input-block">
                                        <input type="text" name="book_Position" class="layui-input"
                                        value="<?php echo $row['book_Position'] ?>" readonly ="true">
                                    </div>
                                </div>
                                <div class="layui-form-item"> <!-- 書本數量 -->
                                    <label class="layui-form-label">書本數量</label>
                                    <div class="layui-input-block">
                                        <input type="text" name="book_Number"  class="layui-input"
                                        value="<?php echo $row['book_Number'] ?>" readonly ="true">
                                    </div>
                                </div>
                                <div class="layui-form-item"> <!-- 借閱書本數量輸入 -->
                                    <label class="layui-form-label">借閱數量</label>
                                    <div class="layui-input-block">
                                        <input type="text" name="borrow_Number" lay-verify="required" class="layui-input">
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