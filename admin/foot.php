<div class="layui-footer"> <!-- 底部區域 -->
        圖書管理
</div>
<script>
//JS 
layui.use(['element', 'layer'], function(){
  var element = layui.element
  ,layer = layui.layer
  ,util = layui.util
  ,$ = layui.$;
  
  //头部事件
  util.event('lay-header-event', {
    menuLeft: function(othis){
        layer.msg('展开左侧菜单的操作', {icon: 0});
    }
    ,menuRight: function(){
        layer.open({
            type: 1
                ,content: '<div style="padding: 15px;">处理右侧面板的操作</div>'
                ,area: ['260px', '100%']
                ,offset: 'rt' //右上角
                ,anim: 5
                ,shadeClose: true
            });
        }
    });
  
});
</script>
</body>
</html>

  