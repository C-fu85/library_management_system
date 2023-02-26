<?php
include ('head.php');
?>
    <div class="layui-body"> <!-- 內容主體 -->
        <div style="padding: 15px;">
            <h2>圖書管理</h2>
            <div class="layui-tab layui-tab-brief">
                <ul class = "layui-tab-title" >
                    <li class = "layui-this">圖書列表</a></li>
                    <li><a href="book_New.php">新增圖書</a></li>
                </ul>  
            </div>
            <div class="layui-tab-content">
                <div class="layui-table-item layui-show">
                    <div>
                        <form class="layui-form" method="post" action="book_List_Search.php">
                            <div class="layui-inline">
                                <input class="layui-input" name="search" style="width:350" placeholder="點此搜尋">
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
                                <td lay-data="{field:'book_Name'}">圖書名</td>
                                <td lay-data="{field:'book_Assort'}">圖書分類</td>
                                <td lay-data="{field:'book_Position'}">擺放位置</td>
                                <td lay-data="{field:'book_Number'}">數量</td>
                                <td lay-data="{field:'',toolbar:'#toolbar',width:100}">操作</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $search=$_POST['search'];
                                if($search == '') {
                                    alert('搜索欄不能為空' ,'book_List.php');
                                }
                                $sql="select * from book where book_Name = '$search' order by id";
                                $result = mysqli_query($conn ,$sql);
                                if($rows=mysqli_num_rows($result) < 1) {
                                    alert('沒有檢測到該目標' ,'book_List.php');
                                }
                                if($result) {
                                    while($rows = mysqli_fetch_assoc($result)) {
                                        echo '<tr>';
                                        echo '<td>'.$rows['id'].'</td>';
                                        echo '<td>'.$rows['book_Name'].'</td>';
                                        echo '<td>'.$rows['book_Assort'].'</td>';
                                        echo '<td>'.$rows['book_Position'].'</td>';
                                        echo '<td>'.$rows['book_Number'].'</td>';
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
                                    layer.confirm("你確認刪除嗎?" ,function(index) {
                                        obj.del();
                                        window.location.href="book_Delete.php?id="+arr[0];
                                        layer.colse(index);
                                    })
                                }
                                else if(eventName == 'edit') {
                                    window.location.href="book_Edit.php?id="+arr[0];
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