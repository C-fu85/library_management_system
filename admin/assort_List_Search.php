<?php
include ('head.php');
limits('分類管理');
?>
    <div class="layui-body"> <!-- 內容主體 -->
        <div style="padding: 15px;">
            <h2>分類管理</h2>
            <div class="layui-tab layui-tab-brief">
                <ul class = "layui-tab-title" >
                    <li class="layui-this">搜索結果</a></li>
                </ul>  
            </div>
            <div class="layui-tab-content">
                <div class="layui-table-item layui-show">
                    <div>
                        <form class="layui-form" method="post" action="assort_List_Search.php">
                            <div class="layui-inline">
                                <input class="layui-input" name="search" style="width:350" placeholder="點此輸入">
                            </div>
                            <button class="layui-btn layui-btn-normal" type="submit">搜尋</button>
                        </form>
                    </div>
                    <script type="text/html" id="toolbar">
                        <div class="layui-btn-container">
                            <a class="layui-btn layui-btn-xs layui-btn-normal" lay-event="edit">編輯</a>
                            <a class="layui-btn layui-btn-xs layui-btn-danger" lay-event="del">刪除</a>
                        </div>
                    </script>
                    <table class="layui-table" lay-data="{
                        height:550,
                        page:true,
                        id:'id_table',
                        toolbar:true
                    }"  lay-filter="test">
                        <thead>
                            <tr>
                                <td lay-data="{field:'id',sort:true}">ID</td>
                                <td lay-data="{field:'assort_Name'}">分類名</td>
                                <td lay-data="{field:'other'}">解釋</td>
                                <td lay-data="{field:'',toolbar:'#toolbar',width:100}">操作</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $assort_Name=$_POST['search'];
                                if($assort_Name == '') {
                                    alert('搜索欄不能為空' ,'assort_List.php');
                                }
                                $sql="select * from assort where assort_Name = '$assort_Name' order by id";
                                $result = mysqli_query($conn ,$sql);
                                if($rows=mysqli_num_rows($result) < 1) {
                                    alert('沒有檢測到該目標' ,'assort_List.php');
                                }
                                if($result) {
                                    while($rows = mysqli_fetch_assoc($result)) {
                                        echo '<tr>';
                                        echo '<td>'.$rows['id'].'</td>';
                                        echo '<td>'.$rows['assort_Name'].'</td>';
                                        echo '<td>'.$rows['other'].'</td>';
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
                                if(eventName == 'del') {
                                    layer.confirm("你確認刪除嗎" ,function(index) {
                                        obj.del();
                                        layer.colse(index);
                                        window.location.href="assort_Delete.php?id="+arr[0];
                                    })
                                }
                                else if(eventName == 'edit') {
                                    window.location.href="assort_Edit.php?id="+arr[0];
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