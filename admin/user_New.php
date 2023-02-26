<?php
include ('head.php');
limits('用戶管理');
?>
    <div class="layui-body"> <!-- 內容主體 -->
        <div style="padding: 15px;">
            <h2>用戶管理</h2>
            <div class="layui-tab layui-tab-brief">
                <ul class = "layui-tab-title" >
                    <li><a href = "user_List.php">用戶列表</a></li>
                    <li class="layui-this">新增用戶</a></li>
                </ul>  
            </div>
            <div class="layui-tab-content">
                <div class="layui-tab-item layui-show">
                    <div class="layui-row">
                        <div class="layui-col-md8">
                            <form class="layui-form" method="post" action="user_Save.php">
                                <div class="layui-form-item"> <!-- 用戶名稱輸入 -->
                                    <label class="layui-form-label">用戶名稱</label>
                                    <div class="layui-input-block">
                                        <input type="text" name="username" required lay-verify="require" class="layui-input">
                                    </div>
                                </div>
                                <div class="layui-form-item"> <!-- 用戶密碼輸入 -->
                                    <label class="layui-form-label">登陸密碼</label>
                                    <div class="layui-input-block">
                                        <input type="password" name="password" required lay-verify="required" class="layui-input">
                                    </div>
                                </div>
                                <div class="layui-form-item"> <!-- 用戶密碼再次確認 -->
                                    <label class="layui-form-label">再次輸入密碼</label>
                                    <div class="layui-input-block">
                                        <input type="password" name="password_Cheak" required lay-verify="required" class="layui-input">
                                    </div>
                                </div>
                                <div class="layui-form-item"> <!-- 真實姓名輸入 -->
                                    <label class="layui-form-label">輸入姓名</label>
                                    <div class="layui-input-block">
                                        <input type="text" name="real_Name" class="layui-input">
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