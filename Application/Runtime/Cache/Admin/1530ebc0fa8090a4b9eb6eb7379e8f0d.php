<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
<link rel="stylesheet" href="/Public/Admin/css/base.css" />
<link rel="stylesheet" href="/Public/Admin/css/info-reg.css" />
    <title>Document</title>
</head>
<body>
<div class="title"><h2>信息登记</h2></div>
<form action ="" method="post" enctype="multipart/form-data">
    <div class="main">
        <p class="short-input ue-clear">
            <label>标题</label>
            <input type="text" name="title" placeholder="标题" value="<?php echo ($data["title"]); ?>">
            <input type="hidden" value="<?php echo ($data["id"]); ?>"  name="id">
        </p>
        <div class="short-input select ue-clear">
            <label>附件</label>
            <div class="select-wrap">
                    <input type="file" name="file"> 说明： 如需修改请直接重新选择文件。

             </div>
        </div>
        <p class="short-input ue-clear">
            <label>作者</label>
            <input type="text" name="author" value="<?php echo ($data["author"]); ?>" placeholder="排序">
        </p>
        <p class="short-input ue-clear">
            <label>内容<script id="editor" name="content" type="text/plain" style="width: 800px;height: 500px;"><?php echo (htmlspecialchars_decode($data["content"])); ?></script></label>

        </p>
    </div>
    <div class="btn ue-clear">
        <a href="javascript:;" class="confirm">确定</a>
        <a href="javascript:;" class="clear">清空内容</a>
    </div>
</form>
</body>
<script src="/Public/Admin/js/jquery.js"></script>
<script src="/Public/Admin/js/common.js"></script>
<script src="/Public/Admin/js/WdatePicker.js"></script>
<script src="/Public/Admin/plugin/ue/ueditor.config.js"></script>
<script src="/Public/Admin/plugin/ue/ueditor.all.min.js"></script>
<script src="/Public/Admin/plugin/ue/lang/zh-cn/zh-cn.js"></script>
<script>
var ue = UE.getEditor('editor');
$(".select-title").on("click",function(){
    $(".select-list").toggle();
    return false;
})
$(".select-list").on("click",function(){
    var txt = $(this).text();
    $(".select-title").find("span").text(txt);
});
showRemind('input[type=text],textarea','placeholder');


$(function(){
    $(".confirm").on("click",function(){
        $('form').submit();
    })
    $(".clear").on("click",function(){
        $("form").get(0).reset();
    })
})



</script>
</html>