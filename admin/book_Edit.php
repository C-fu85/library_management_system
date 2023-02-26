<?php
include ('head.php');
$id=$_GET['id'];
$sql="select * from book where id = $id";
$result=mysqli_query($conn,$sql);
if($result) {
    $row=mysqli_fetch_assoc($result);
}
limits('圖書管理');
?>
    <div class="layui-body"> <!-- 圖書管理 -->
        <div style="padding: 15px;">
            <h2>圖書管理</h2>
            <div class="layui-tab layui-tab-brief">
                <ul class = "layui-tab-title" >
                    <li class="layui-this">編輯圖書</a></li>
                </ul>  
            </div>
            <div class="layui-tab-content">
                <div class="layui-tab-item layui-show">
                    <div class="layui-row">
                        <div class="layui-col-md8">
                            <form class="layui-form" method="post" action="book_Edit_Save.php">
                                <input type="hidden" name = id value = "<?php echo $row['id']?>">
                                <div class="layui-form-item"> <!-- 修改的書本名稱輸入 -->
                                    <label class="layui-form-label">書名修改</label>
                                    <div class="layui-input-block">
                                        <input type="text" name="book_Name" required lay-verify="required" class="layui-input"
                                        value = "<?php echo $row['book_Name'] ?>">
                                    </div>
                                </div>
                                <div class="layui-form-item"> <!-- 書本分類修改 -->
                                    <label class="layui-form-label">書本類型</label>
                                    <div class="layui-input-block">
                                        <select name="book_Assort" lay-verify="required">
                                            <option value="">請選取類型</option>
                                            <?php
                                            $sql="select * from assort order by id";
                                            $result = mysqli_query($conn ,$sql);
                                            if($result) {
                                                while($rows = mysqli_fetch_assoc($result)) {
                                                    if($rows['assort_Name'] == $row['book_Assort']) {
                                                        echo "<option selected=\"selected\" 
                                                        value = \"".$rows['assort_Name']."\">".$rows['assort_Name']."</option>";
                                                    }
                                                    else {
                                                        echo "<option value=\"".$rows['assort_Name']."\">".$rows['assort_Name']."</option>";
                                                    }
                                                    
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="layui-form-item"> <!-- 書本存放位置選擇 -->
                                    <label class="layui-form-label">書本存放位置</label>
                                    <div class="layui-input-block">
                                        <select name="book_Position" lay-verify="required">
                                            <option value="">請選取位置</option>
                                            <?php
                                            $sql="select * from position order by id";
                                            $result = mysqli_query($conn ,$sql);
                                            if($result) {
                                                while($rows = mysqli_fetch_assoc($result)) { 
                                                    if($rows['position_Name'] == $row['book_Position']) {
                                                        echo "<option selected=\"selected\" 
                                                        value = \"".$rows['position_Name']."\">".$rows['position_Name']."</option>";
                                                    }
                                                    else {
                                                        echo "<option value=\"".$rows['position_Name']."\">".$rows['position_Name']."</option>";
                                                    }
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="layui-form-item"> <!-- 書本數量輸入 -->
                                    <label class="layui-form-label">數量</label>
                                    <div class="layui-input-block">
                                        <input type="text" name="book_Number" lay-verify="required" class="layui-input"
                                        value="<?php echo $row['book_Number'] ?>">
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