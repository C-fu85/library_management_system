<?php
include ('head.php');
limits('借閱管理');
?>
    <div class="layui-body"> <!-- 借閱管理-申請列表 -->
        <div style="padding: 15px;">
            <h2>個人中心</h2>
            <div class="layui-tab layui-tab-brief">
                <ul class = "layui-tab-title" >
                    <li class="layui-this">申請列表</a></li>
                    <li><a href = "return_Book.php">歸還書籍</a></li>
                </ul>   
            </div>
            <div class="layui-tab-content">
                <div class="layui-table-item layui-show">
                    <div>
                        <form class="layui-form" method="post" action="manage_Borrow_List_Search.php">
                            <div class="layui-inline">
                                <input class="layui-input" name="search" style="width:350" placeholder="點此搜尋">
                            </div>
                            <button class="layui-btn layui-btn-normal" type="submit">搜尋</button>
                        </form>
                    </div>
                    <script type="text/html" id="toolbar">
                        <div class="layui-btn-container">
                            <a class="layui-btn layui-btn-xs layui-btn-normal" lay-event="handle">處理</a>
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
                                <td lay-data="{field:'borrow_Number'}">借閱數量</td>
                                <td lay-data="{field:'state'}">狀態</td>
                                <td lay-data="{field:'',toolbar:'#toolbar',width:100}">操作</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $sql="select * from mine_borrow order by book_Id ";
                                $result = mysqli_query($conn ,$sql);
                                if($result) {
                                    while($rows = mysqli_fetch_assoc($result)) {
                                        switch($rows['state']){
                                            case 0:
                                                $state = "未處理";
                                                break;
                                            case 1:
                                                $state = "已處裡，並通過，但未歸還";
                                                break;
                                            case 2:
                                                $state = "已處裡，未通過";
                                                break;
                                        }
                                        echo '<tr>';
                                        echo '<td>'.$rows['id'].'</td>';
                                        echo '<td>'.$rows['book_Name'].'</td>';
                                        echo '<td>'.$rows['borrow_Number'].'</td>';
                                        echo '<td>'.$state.'</td>';
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
                                if(eventName == 'handle') {
                                    window.location.href="manage_Borrow_Handle.php?id="+arr[0];
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