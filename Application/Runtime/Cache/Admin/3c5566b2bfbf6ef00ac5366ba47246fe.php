<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <script src="/thinkphp/Public/js/jquery-2.1.1.min.js"></script>
    <script src="/thinkphp/Public/static/layer/layer.js"></script>
    <link rel="stylesheet" href="/thinkphp/Public/css/login.css" />
</head>
<body>
<form action="<?php echo U('checkLogin');?>" method="post" name="form" id="form">
    <h1 style="text-align: center;padding: 30px 0;font-size: 45px">hao365网址之家</h1>
    <input type="text" placeholder="用户名" name="username" name="name" class="username" /><br />
    <input type="password" placeholder="请输入密码" name="password" id="pwd" class="password" /><br />
    验证码：<input type="text" id="code" name="code" />
    <a>
        <img class="reloadverify" src="<?php echo U('Admin/Public/verify');?>" id="imgcode" onclick="this.src=this.src+'?'+Math.random()" />
    </a><br />
    <button type="submit" class="btn" >登&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;录</button>
</form>

<script>
    $('form').submit(function(){
        var username=$("input[name='username']").val();
        var password=$("input[name='password']").val();
        var code=$("#code").val();
        if(!username){
            layer.msg('用户名不能为空！',{time:2000});
            return false;
        }
        if(!password){
            layer.msg("密码不能为空！",{time:2000});
            return false;
        }
        if(!code){
            layer.msg("验证码不能为空！",{time:2000});
            return false;
        }
        var url=$(this).attr("action");
        $.ajax({
            type:"post",
            url:url,
            data:{username:username,password:password,code:code},
            success:function(res){
                if(res.status){
                    layer.msg(res.message,{time:1000},function(){
                        window.location.href="<?php echo U('Index/index');?>";
                    });
                }else{
                    $(".reloadverify").click();
                    layer.msg(res.message,{time:2000});
                }
            }
        });
        return false;
    });

    layer.msg('内容',{icon:1,time:2000},function(){

    })
</script>
</body>
</html>