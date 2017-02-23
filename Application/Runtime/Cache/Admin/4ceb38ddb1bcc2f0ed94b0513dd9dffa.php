<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    $Think.server.path:<?php echo ($_SERVER['PATH']); ?>
    <hr>
    $Think.get.id:<?php echo ($_GET['id']); ?>
    <hr>
    $Think.request.pid:<?php echo ($_REQUEST['pid']); ?>
    <hr>
    $Think.cookie.PHPSESSONID:<?php echo (cookie('PHPSESSID')); ?>
    <hr>
    $Think.config.DEFAULT_MODULE:<?php echo (C("DEFAULT_MODULE")); ?>
</body>
</html>