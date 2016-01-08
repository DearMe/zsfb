<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="author" content="Coderthemes">

    <link rel="shortcut icon" href="images/favicon_1.ico">

    <title>登陆</title>

    <!-- Base Css Files -->
    <link href="__PUBLIC__/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Font Icons -->
    <link href="__PUBLIC__/assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="__PUBLIC__/assets/ionicon/css/ionicons.min.css" rel="stylesheet" />
    <link href="__PUBLIC__/css/material-design-iconic-font.min.css" rel="stylesheet">

    <!-- animate css -->
    <link href="__PUBLIC__/css/animate.css" rel="stylesheet" />

    <!-- Waves-effect -->
    <link href="__PUBLIC__/css/waves-effect.css" rel="stylesheet">

    <!-- Custom Files -->
    <link href="__PUBLIC__/css/helper.css" rel="stylesheet" type="text/css" />
    <link href="__PUBLIC__/css/style.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <script src="__PUBLIC__/js/modernizr.min.js"></script>

</head>
<body>


<div class="wrapper-page">
    <div class="panel panel-color panel-primary panel-pages">
        <div class="panel-heading bg-img">
            <div class="bg-overlay"></div>
            <h3 class="text-center m-t-10 text-white"> 中山电视台微信活动管理平台 </h3>
        </div>


        <div class="panel-body">
            <form class="form-horizontal m-t-20" action="<?php echo U('Login/login');?>" method="post">

                <div class="form-group ">
                    <div class="col-xs-12">
                        <input class="form-control input-lg " type="text" required="" name="name" placeholder="登陆名">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <input class="form-control input-lg" type="password" required="" name="password" placeholder="密码">
                    </div>
                </div>

                <div class="form-group text-center m-t-40">
                    <div class="col-xs-12">
                        <button class="btn btn-primary btn-lg w-lg waves-effect waves-light" type="submit">登陆</button>
                    </div>
                </div>


            </form>
        </div>

    </div>
</div>


<script>
    var resizefunc = [];
</script>
<script src="__PUBLIC__/js/jquery.min.js"></script>
<script src="__PUBLIC__/js/bootstrap.min.js"></script>
<script src="__PUBLIC__/js/waves.js"></script>
<script src="__PUBLIC__/js/wow.min.js"></script>
<script src="__PUBLIC__/js/jquery.nicescroll.js" type="text/javascript"></script>
<script src="__PUBLIC__/js/jquery.scrollTo.min.js"></script>
<script src="__PUBLIC__/assets/jquery-detectmobile/detect.js"></script>
<script src="__PUBLIC__/assets/fastclick/fastclick.js"></script>
<script src="__PUBLIC__/assets/jquery-slimscroll/jquery.slimscroll.js"></script>
<script src="__PUBLIC__/assets/jquery-blockui/jquery.blockUI.js"></script>


<!-- CUSTOM JS -->
<script src="__PUBLIC__/js/jquery.app.js"></script>

</body>
</html>