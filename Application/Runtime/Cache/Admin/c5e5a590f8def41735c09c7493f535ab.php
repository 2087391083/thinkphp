<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="renderer" content="webkit">

<title>明日科技后台</title>
<link href="/thinkphp/Public/css/module.css" rel="stylesheet"/>

<link href="/thinkphp/Public/css/bootstrap.min.css?v=3.4.0" rel="stylesheet">
<link href="/thinkphp/Public/font-awesome/css/font-awesome.css?v=4.3.0" rel="stylesheet">


<link href="/thinkphp/Public/css/animate.css" rel="stylesheet">
<link href="/thinkphp/Public/css/admin-style.css?v=2.2.0" rel="stylesheet">

<!-- Mainly scripts -->
<script src="/thinkphp/Public/js/jquery-2.1.1.min.js"></script>
<script src="/thinkphp/Public/js/bootstrap.min.js?v=3.4.0"></script>



<!--Layer-->
<script src="/thinkphp/Public/static/layer/layer.js"></script>

<script type="text/javascript" src="/thinkphp/Public/js/admin.js"></script>

<script src="/thinkphp/Public/js/jquery.metisMenu.js"></script>


<!-- Custom and plugin javascript -->
<script src="/thinkphp/Public/js/hplus.js?v=2.2.0"></script>




</head>
<body>
<div id="wrapper">
	<script>
    $(function(){
        var controller_name = "<?php echo CONTROLLER_NAME;?>";
        var nav     = $('.nav-second-level a');
        nav.each(function(){
            var url = $(this).attr('href');
            console.log(url);
            if(url.indexOf('/'+controller_name) > 0){
                $(this).parent().addClass('active');
                return false;
            }
        });
    });
</script>

<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="side-menu">
            <li class="nav-header" style="padding: 25px 20px;">
                <div class="dropdown profile-element">
                    <span>
                        <img alt="image" class="img-circle" height="60px" src="/thinkphp/Public/images/profile_small.jpg" />
                    </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?php echo (session('admin_username')); ?></strong>
                         </span>  <span class="text-muted text-xs block"><?php if(($_SESSION['admin_id']) == "1"): ?>超级管理员<?php else: ?>管理员<?php endif; ?> <b class="caret"></b></span> </span>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="<?php echo U('Index/changePassword');?>">修改密码</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo U('Public/logout');?>">安全退出</a>
                        </li>
                    </ul>
                </div>
                <div class="logo-element">
                    MR
                </div>
            </li>
            <li class="active">
                <a href="#"><i class="fa fa-edit" style="width: 18px"></i> <span class="nav-label">管理</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="<?php echo U('HighLevel/lists');?>">高级分类</a></li>
                    <li><a href="<?php echo U('MiddleLevel/lists');?>">中级分类</a></li>
                    <li><a href="<?php echo U('ElementaryLevel/lists');?>">初级分类</a></li>
                    <li><a href="<?php echo U('Datalist/lists');?>">数据管理</a></li>
                    <li><a href="<?php echo U('Hot/lists');?>">热门管理</a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>





	
    <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="row border-bottom">
    <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#">
                <i class="fa fa-bars"></i>
            </a>
        </div>
        <ul class="nav navbar-top-links navbar-right">
            <li>
                <span class="m-r-sm text-muted welcome-message">
                    <a href="<?php echo U('Datalist/lists');?>" title="返回首页"><i class="fa fa-home"></i>欢迎使用明日导航后台</a>
                </span>
            </li>
            <li>
                <a href="<?php echo U('Public/logout');?>">
                    <i class="fa fa-sign-out"></i> 退出
                </a>
            </li>
        </ul>
    </nav>
</div> <!--顶部-->
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>添加分类</h5>
                </div>
                <div class="ibox-content">
                    <form class="form-horizontal m-t " method="post" action="<?php echo U('add');?>">
                        <input type="hidden" name='id' value="<?php echo ($_GET['id']); ?>">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">首页显示位置：</label>
                            <div class="col-sm-3">
                                <select name="layout">
                                    <option value="left"   <?php if(($data["layout"] == 'left')): ?>selected<?php endif; ?>>左侧</option>
                                    <option value="bottom" <?php if(($data["layout"] == 'bottom')): ?>selected<?php endif; ?>>底部</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">名称：</label>
                            <div class="col-sm-3">
                                <input  type="text" id="high_name" class="form-control" name="high_name" value="<?php echo ($data["high_name"]); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">排序：</label>
                            <div class="col-sm-3">
                                <input  type="text" id="sort" class="form-control" name="sort" value="<?php echo ($data["sort"]); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">是否显示：</label>
                            <input type="radio"  value="0"  name="is_display" <?php if(($data["is_display"] != 1)): ?>checked<?php endif; ?> />
                            否
                            <input type="radio"  value="1"  name="is_display" <?php if(($data["is_display"] == 1)): ?>checked<?php endif; ?> />
                            是
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-3">
                                <button class="btn btn-primary" type="submit">提交</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--尾部-->
        
    </div>

<script>
    $('form').submit(function(){
        var name = $('#high_name').val();
        var sort = $("#sort").val();
        if(name == ''){
            layer.msg('请填写名称',{time:1000});
            return false;
        }
        if(!sort || isNaN(sort)){
            layer.msg('请填写排序，并且为数字',{time:1000});
            return false;
        }
    });
</script>

</div>
</body>
</html>