<?php
include ('head.php');
limits('圖書管理');
?>
    <div class="layui-body"> <!-- 圖書管理 -->
        <div style="padding: 15px;">
            <h2>圖書管理</h2>
            <div class="layui-tab layui-tab-brief">
                <ul class = "layui-tab-title" >
                    <li><a href = "book_List.php">圖書列表</a></li>
                    <li class="layui-this">新增圖書</a></li>
                </ul>  
            </div>
            <div class="layui-tab-content">
                <div class="layui-tab-item layui-show">
                    <div class="layui-row">
                        <div class="layui-col-md8">
                            <form class="layui-form" method="post" action="book_Save.php">
                                <div class="layui-form-item"> <!-- 書本名稱輸入 -->
                                    <label class="layui-form-label">書本名稱</label>
                                    <div class="layui-input-block">
                                        <input type="text" name="book_Name" required lay-verify="required" class="layui-input">
                                    </div>
                                </div>
                                <div class="layui-form-item"> <!-- 書本類型選擇 -->
                                    <label class="layui-form-label">書本類型</label>
                                    <div class="layui-input-block">
                                        <select name="book_Assort" lay-verify="required">
                                            <option value="">請選取類型</option>
                                            <?php
                                            $sql="select * from assort order by id";
                                            $result = mysqli_query($conn ,$sql);
                                            if($result) {
                                                while($row = mysqli_fetch_assoc($result)) {
                                                    echo "<option value=\"".$row['assort_Name']."\">".$row['assort_Name']."</option>";
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
                                                while($row = mysqli_fetch_assoc($result)) {
                                                    echo "<option value=\"".$row['position_Name']."\">".$row['position_Name']."</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="layui-form-item"> <!-- 書本說明輸入 -->
                                    <label class="layui-form-label">數量</label>
                                    <div class="layui-input-block">
                                        <input type="text" name="book_Number" required lay-verify="required" class="layui-input">
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