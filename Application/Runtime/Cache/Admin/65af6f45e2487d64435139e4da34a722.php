<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>test1</title>
    <style>
        *{
            padding: 0;
            margin: 0;
        }
        body{
           /* background: url("./imgs/bg.jpg") no-repeat center;
            background-attachment: fixed;
            background-size: 100% 100%;*/
            /*filter: blur(0rem);*/
        }
        #yz{
            width: 100px;
        }
    </style>
</head>
<body>
    <div><?php echo $title; ?></div>
    <div><?php echo ($title); ?></div>

    <form action="#" method="post">
        <input type="text" placeholder="用户名" id="name" /><br />
        <input type="password" placeholder="请输入密码" id="pwd" /><br />
        验证码：<input type="text" id="yz" />
        <input type="submit" value="登录">
    </form>
</body>
</html>