<?php
include ('head.php');
?>
    <div class="layui-body"> <!-- 個人中心 -->
        <div style="padding: 15px;">
            <h2>個人中心</h2>
            <div class="layui-tab layui-tab-brief">
                <ul class = "layui-tab-title" >
                    <li class="layui-this">個人訊息</a></li>
                    <li><a href = "mine_Borrow_Require.php">借閱申請</a></li>
                    <li><a href = "mine_Borrow_List.php">申請列表</a></li>
                    <li><a href = "mine_Book_List.php">我的書籍</a></li>
                </ul>  
            </div>
            <div class="layui-tab-content">
                <div class="layui-table-item layui-show">
                    <script type="text/html" id="toolbar">
                        <div class="layui-btn-container">
                            <a class="layui-btn layui-btn-xs layui-btn-normal" lay-event="edit">編輯</a>
                        </div>
                    </script>
                    <table class="layui-table" lay-data="{
                        height:550,
                        id:'id_table',
                    }"  lay-filter="test">
                        <thead>
                            <tr>
                                <td lay-data="{field:'id',sort:true}">ID</td>
                                <td lay-data="{field:'username'}">用戶名</td>
                                <td lay-data="{field:'real_name'}">真實姓名</td>
                                <td lay-data="{field:'',toolbar:'#toolbar',width:60}">操作</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $username = $_SESSION['username'];
                                $sql="select * from user where username = '$username' order by id";
                                $result = mysqli_query($conn ,$sql);
                                if($result) {
                                    while($rows = mysqli_fetch_assoc($result)) {
                                        echo '<tr>';
                                        echo '<td>'.$rows['id'].'</td>';
                                        echo '<td>'.$rows['username'].'</td>';
                                        echo '<td>'.$rows['real_name'].'</td>';
                                        echo '<td></td>';
                                        echo '</tr>';
                                    }
                                }
                            ?>
                        </tbody>
                    </table>
                    <script>
                        layui.use('table' ,function() {
                            let table = layui.table;
                            table.on('tool(test)' ,function(obj) {
                                var tr = obj.data;
                                let arr = Object.values(tr);
                                var eventName = obj.event;
                                if(eventName == 'edit') {
                                    window.location.href="mine_Information_Edit.php?id="+arr[0];
                                }
                            });
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
<?php 
include ('foot.php')
?>