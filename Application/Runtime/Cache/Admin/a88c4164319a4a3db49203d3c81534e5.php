<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="/Public/Admin/css/base.css">
    <link rel="stylesheet" type="text/css" href="/Public/Admin/css/info-mgt.css">
    <link rel="stylesheet" type="text/css" href="/Public/Admin/css/WdatePicker.css">
    <title>移动办公自动化系统</title>
</head>
<body>
<div class="title"><h2>信息管理</h2></div>
<div class="table-operate ue-clear">
    <a href="javascript:;" class="add">添加</a>
    <a href="javascript:;" class="del">删除</a>
    <a href="javascript:;" class="edit">编辑</a>
    <a href="javascript:;" class="count">统计</a>
    <a href="javascript:;" class="check">审核</a>
</div>
<div class="table-box">
    <table>
        <thead>
            <tr>
                <th class="id">序号</th>
                <th class="title">标题</th>
                <th class="thumb">缩略图</th>
                <th class="content">内容</th>
                <th class="author">作者</th>
                <th class="addtime">添加时间</th>
                <th class="operate">操作</th>
            </tr>
        </thead>
        <tbody>
            <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?><tr>
                    <td class="id"><?php echo ($vol["id"]); ?></td>
                    <td class="name"><?php echo ($vol["title"]); ?> </td>
                    <td class="file">
                    <img src="<?php echo ($vol["thumb"]); ?>">
                    <?php if(!empty($vol["picture"])): ?>【<a href="/index.php/Admin/Knowledge/download/id/<?php echo ($vol["id"]); ?>">下载</a>】<?php endif; ?>

                    </td>
                    <td class="content"><?php echo ($vol["content"]); ?> </td>
                    <td class="author"><?php echo ($vol["author"]); ?> </td>
                    <td class="addtime"><?php echo (date('Y-m-d H:i:s',$vol["addtime"])); ?> </td>
                    <td class="operate"> <a href="javascript:;" class="show" data="<?php echo ($vol["id"]); ?>" data-title="<?php echo ($vol["title"]); ?>">查看</a>
                    <a href="/index.php/Admin/Knowledge/edit/id/<?php echo ($vol["id"]); ?>">修改</a></td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>
</div>
<div class="pagination ue-clear"></div>
</body>
<script src="/Public/Admin/js/jquery.js"></script>
<script src="/Public/Admin/js/common.js"></script>
<script src="/Public/Admin/js/WdatePicker.js"></script>
<script src="/Public/Admin/js/jquery.pagination.js"></script>
<script src="/Public/Admin/plugin/layer/layer.js"></script>
<script>
// layer.alert('xx');
    $(".select-title").on("click",function(){
        $(".select-list").hide();
        $(this).siblings($(".select-list")).show();
        return false;
    })
    $(".select-list").on("click","li",function(){
        var txt = $(this).text();
        $(this).parent($(".select-list")).siblings($(".select-title")).find("span").text(txt);
    })
    $(".pagination").pagination(100,{
        callback:function(page){
            alert(page);
        },
        display_msg : true,
        setPageNo:true
    })
    $("tbody").find("tr:odd").css("backgroundColor","#eff6fa");
    $("tbody").find("tr:odd").css("backgroundColor","#eee6fa");


    $(function(){
        $(".del").on('click',function(){
            var idObj = $(":checkbox:checked"); //获取全部已经被选中的checkbox
            var id = ''; //接收处理后的部门id的值。组成id1，id2，
            //循环遍历idobj对象，获取其中的每一个的值。
            for(var i = 0;i < idObj.length;i++){
                id = id + idObj[i].value + ',';
            }
            //去掉最后的逗号
            id = id.substring(0,id.length-1);
            console.log(id);
            window.location.href="/index.php/Admin/Knowledge/del/id/" + id;
        })



        //给查看按钮绑定点击事件
        $('.show').on('click',function(){
            // layer.alert('x');
            var id = $(this).attr('data');
            //获取公文标题
            var title  = $(this).attr('data-title');
            layer.open({
              type: 2,
              title: title,
              shadeClose: true,
              shade: 0.8,
              area: ['560px', '90%'],
              content: '/index.php/Admin/Knowledge/showContent/id/'+id //iframe的url
            });
        })
    })
</script>
</html>