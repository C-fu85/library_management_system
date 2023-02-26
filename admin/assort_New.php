<?php
include ('head.php');
limits('分類管理');
?>
    <div class="layui-body"> <!-- 分類管理 -->
        <div style="padding: 15px;">
            <h2>分類管理</h2>
            <div class="layui-tab layui-tab-brief">
                <ul class = "layui-tab-title" >
                    <li><a href = "assort_List.php">分類列表</a></li>
                    <li class="layui-this">新增分類</a></li>
                </ul>  
            </div>
            <div class="layui-tab-content">
                <div class="layui-tab-item layui-show">
                    <div class="layui-row">
                        <div class="layui-col-md8">
                            <form class="layui-form" method="post" action="assort_Save.php">
                                <div class="layui-form-item"> <!-- 分類名稱輸入 -->
                                    <label class="layui-form-label">分類名稱</label>
                                    <div class="layui-input-block">
                                        <input type="text" name="assort_Name" required lay-verify="required" class="layui-input">
                                    </div>
                                </div>
                                <div class="layui-form-item"> <!-- 分類說明輸入 -->
                                    <label class="layui-form-label">分類說明</label>
                                    <div class="layui-input-block">
                                        <input type="text" name="other" class="layui-input">
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