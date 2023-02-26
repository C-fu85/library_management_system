<<?php
include ('head.php');
limits('借閱管理');
$id=$_GET['id'];
$sql="select * from mine_borrow where id = $id";
$result=mysqli_query($conn,$sql);
if($result) {
    $row=mysqli_fetch_assoc($result);
    $book_Id=$row['book_Id'];
}
$sql = "select * from book where id=$book_Id";
$result = mysqli_query($conn,$sql);
if($result) {
    $row_Book = mysqli_fetch_assoc($result);
}
?>
    <div class="layui-body"> <!-- 借閱狀態-詳情介面 -->
        <div style="padding: 15px;">
            <h2>個人中心</h2>
            <div class="layui-tab layui-tab-brief">
                <ul class = "layui-tab-title" >
                    <li class="layui-this">借閱管理-處理介面</a></li>
                </ul>  
            </div>
            <div class="layui-tab-content">
                <div class="layui-tab-item layui-show">
                    <div class="layui-row">
                        <div class="layui-col-md8">
                            <form class="layui-form" method="post" action="manage_Borrow_Handle_Save.php">
                                <input type="hidden" name = "id" value = "<?php echo $row['id']?>">
                                <input type="hidden" name = "book_Id" value = "<?php echo $row_Book['id']?>">
                                <div class="layui-form-item"> <!-- 書本名稱 -->
                                    <label class="layui-form-label">書名</label>
                                    <div class="layui-input-block">
                                        <input type="text" name="book_Name" class="layui-input"
                                        value = "<?php echo $row['book_Name'] ?>" readonly ="true">
                                    </div>
                                </div>
                                <div class="layui-form-item"> <!-- 書本名稱 -->
                                    <label class="layui-form-label">借閱人</label>
                                    <div class="layui-input-block">
                                        <input type="text" name="borrow_User" class="layui-input"
                                        value = "<?php echo $row['borrow_User'] ?>" readonly ="true">
                                    </div>
                                </div>
                                <div class="layui-form-item"> <!-- 書本分類 -->
                                    <label class="layui-form-label">書本類型</label>
                                    <div class="layui-input-block">
                                        <input type="text" name="book_Assort" class="layui-input"
                                        value="<?php echo $row_Book['book_Assort'] ?>" readonly ="true">
                                    </div>
                                </div>
                                <div class="layui-form-item"> <!-- 書本存放位置 -->
                                    <label class="layui-form-label">書本存放位置</label>
                                    <div class="layui-input-block">
                                        <input type="text" name="book_Position" class="layui-input"
                                        value="<?php echo $row_Book['book_Position'] ?>" readonly ="true">
                                    </div>
                                </div>
                                <div class="layui-form-item"> <!-- 書本數量 -->
                                    <label class="layui-form-label">書本數量</label>
                                    <div class="layui-input-block">
                                        <input type="text" name="book_Number"  class="layui-input"
                                        value="<?php echo $row_Book['book_Number'] ?>" readonly ="true">
                                    </div>
                                </div>
                                <div class="layui-form-item"> <!-- 借閱書本數量輸入 -->
                                    <label class="layui-form-label">借閱數量</label>
                                    <div class="layui-input-block">
                                        <input type="text" name="borrow_Number" lay-verify="required" class="layui-input"
                                        value="<?php echo $row['borrow_Number'] ?>" readonly ="true">
                                    </div>
                                </div>
                                <div class="layui-form-item"> <!-- 狀態輸入 -->
                                    <label class="layui-form-label">是否通過</label>
                                    <div class="layui-input-block">
                                        <select name ="state" lay-verify="required">
                                            <option value = "0">請選擇</option>
                                            <option value = "1">通過</option>
                                            <option value = "2">未通過</option>
                                        </select>
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