<?php
include ('head.php');
?>
    <div class="layui-body"> <!-- 個人中心 -->
        <div style="padding: 15px;">
            <h2>個人中心</h2>
            <div class="layui-tab layui-tab-brief">
                <ul class = "layui-tab-title" >
                    <li ><a href = "mine_Information.php">個人訊息</a></li>
                    <li class="layui-this">借閱申請</a></li>
                    <li><a href = "mine_Borrow_List.php">申請列表</a></li>
                    <li><a href = "mine_Book_List.php">我的書籍</a></li>
                </ul>   
            </div>
            <div class="layui-tab-content">
                <div class="layui-table-item layui-show">
                    <div>
                        <form class="layui-form" method="post" action="mine_Borrow_Require_Search.php">
                            <div class="layui-inline">
                                <input class="layui-input" name="search" style="width:350" placeholder="點此搜尋">
                            </div>
                            <button class="layui-btn layui-btn-normal" type="submit">搜尋</button>
                        </form>
                    </div>
                    <script type="text/html" id="toolbar">
                        <div class="layui-btn-container">
                            <a class="layui-btn layui-btn-xs layui-btn-normal" lay-event="add">借閱</a>
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
                                <td lay-data="{field:'',toolbar:'#toolbar',width:60}">操作</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $sql="select * from book order by id";
                                $result = mysqli_query($conn ,$sql);
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
                                if(eventName == 'add') {
                                    window.location.href="mine_Borrow_add.php?id="+arr[0];
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