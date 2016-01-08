<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="author" content="Coderthemes">

    <link rel="shortcut icon" href="images/favicon_1.ico">

    <title>微信活动运营平台</title>

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

    <!-- sweet alerts -->
    <link href="__PUBLIC__/assets/sweet-alert/sweet-alert.min.css" rel="stylesheet">

    <!-- Custom Files -->
    <link href="__PUBLIC__/css/helper.css" rel="stylesheet" type="text/css" />
    <link href="__PUBLIC__/css/style.css" rel="stylesheet" type="text/css" />

    <script src="__PUBLIC__/js/jquery.min.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <script src="__PUBLIC__/js/modernizr.min.js"></script>

</head>



<body class="fixed-left">

<!-- Begin page -->
<div id="wrapper">

    <!-- Top Bar Start -->
    <div class="topbar">
    <!-- LOGO -->
    <div class="topbar-left">
        <div class="text-center">
            <a href="<?php echo U('Index/index');?>" class="logo"><i class="md  "></i> <span>微信运营管理系统 </span></a>
        </div>
    </div>
    <!-- Button mobile view to collapse sidebar menu -->
    <div class="navbar navbar-default" role="navigation">
        <div class="container">
            <div class="">
                <div class="pull-left">
                    <button class="button-menu-mobile open-left">
                        <i class="fa fa-bars"></i>
                    </button>
                    <span class="clearfix"></span>
                </div>


                <ul class="nav navbar-nav navbar-right pull-right">
                    <li class="dropdown hidden-xs">
                        <a href="#" data-target="#" class="dropdown-toggle waves-effect waves-light"  aria-expanded="true">
                            <i class="md md-notifications"></i> <span class="badge badge-xs badge-danger"></span>
                        </a>

                    </li>
                    <li class="hidden-xs">
                        <a href="#" id="btn-fullscreen" class="waves-effect waves-light"><i class="md md-crop-free"></i></a>
                    </li>

                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
    </div>
</div>
    <!-- Top Bar End -->


    <!-- ========== Left Sidebar Start ========== -->
    <div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">
        <div class="user-details">


        </div>
        <!--- Divider -->
        <div id="sidebar-menu">
            <ul>
                <li>
                    <a href="<?php echo U('Index/index');?>" class="waves-effect"><i class="md md-home"></i><span> 首页 </span></a>
                </li>
                <li>
                    <a href="<?php echo U('Vote/index');?>" class="waves-effect"><i class="md md-now-widgets"></i><span> 投票 </span></a>
                </li>
               <!-- <li>
                    <a href="<?php echo U('Lottery/index');?>" class="waves-effect"><i class="md md-now-widgets"></i><span> 抽奖 </span></a>
                </li>-->



                <li class="has_sub">
                    <a href="#" class="waves-effect"><i class="md md-now-widgets"></i><span> 抽奖 </span><span class="pull-right"><i class="md md-add"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="<?php echo U('RedPacket/index');?>"> 红包 </a></li>

                    </ul>
                </li>

                <li>
                    <a href="<?php echo U('AutoResponse/index');?>" class="waves-effect"><i class="md md-now-widgets"></i><span> 自动回复</span></a>
                </li>





            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
    <!-- Left Sidebar End -->



    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">









            </div> <!-- container -->

        </div> <!-- content -->

        <footer class="footer text-right">
            2015 © 技术中心.
        </footer>

    </div>
    <!-- ============================================================== -->
    <!-- End Right content here -->
    <!-- ============================================================== -->

    <!--
        &lt;!&ndash; Right Sidebar &ndash;&gt;
        <div class="side-bar right-bar nicescroll">
            <h4 class="text-center">Chat</h4>
            <div class="contact-list nicescroll">
                <ul class="list-group contacts-list">
                    <li class="list-group-item">
                        <a href="#">
                            <div class="avatar">
                                <img src="images/users/avatar-1.jpg" alt="">
                            </div>
                            <span class="name">Chadengle</span>
                            <i class="fa fa-circle online"></i>
                        </a>
                        <span class="clearfix"></span>
                    </li>
                    <li class="list-group-item">
                        <a href="#">
                            <div class="avatar">
                                <img src="images/users/avatar-2.jpg" alt="">
                            </div>
                            <span class="name">Tomaslau</span>
                            <i class="fa fa-circle online"></i>
                        </a>
                        <span class="clearfix"></span>
                    </li>
                    <li class="list-group-item">
                        <a href="#">
                            <div class="avatar">
                                <img src="images/users/avatar-3.jpg" alt="">
                            </div>
                            <span class="name">Stillnotdavid</span>
                            <i class="fa fa-circle online"></i>
                        </a>
                        <span class="clearfix"></span>
                    </li>
                    <li class="list-group-item">
                        <a href="#">
                            <div class="avatar">
                                <img src="images/users/avatar-4.jpg" alt="">
                            </div>
                            <span class="name">Kurafire</span>
                            <i class="fa fa-circle online"></i>
                        </a>
                        <span class="clearfix"></span>
                    </li>
                    <li class="list-group-item">
                        <a href="#">
                            <div class="avatar">
                                <img src="images/users/avatar-5.jpg" alt="">
                            </div>
                            <span class="name">Shahedk</span>
                            <i class="fa fa-circle away"></i>
                        </a>
                        <span class="clearfix"></span>
                    </li>
                    <li class="list-group-item">
                        <a href="#">
                            <div class="avatar">
                                <img src="images/users/avatar-6.jpg" alt="">
                            </div>
                            <span class="name">Adhamdannaway</span>
                            <i class="fa fa-circle away"></i>
                        </a>
                        <span class="clearfix"></span>
                    </li>
                    <li class="list-group-item">
                        <a href="#">
                            <div class="avatar">
                                <img src="images/users/avatar-7.jpg" alt="">
                            </div>
                            <span class="name">Ok</span>
                            <i class="fa fa-circle away"></i>
                        </a>
                        <span class="clearfix"></span>
                    </li>
                    <li class="list-group-item">
                        <a href="#">
                            <div class="avatar">
                                <img src="images/users/avatar-8.jpg" alt="">
                            </div>
                            <span class="name">Arashasghari</span>
                            <i class="fa fa-circle offline"></i>
                        </a>
                        <span class="clearfix"></span>
                    </li>
                    <li class="list-group-item">
                        <a href="#">
                            <div class="avatar">
                                <img src="images/users/avatar-9.jpg" alt="">
                            </div>
                            <span class="name">Joshaustin</span>
                            <i class="fa fa-circle offline"></i>
                        </a>
                        <span class="clearfix"></span>
                    </li>
                    <li class="list-group-item">
                        <a href="#">
                            <div class="avatar">
                                <img src="images/users/avatar-10.jpg" alt="">
                            </div>
                            <span class="name">Sortino</span>
                            <i class="fa fa-circle offline"></i>
                        </a>
                        <span class="clearfix"></span>
                    </li>
                </ul>
            </div>
        </div>-->
    <!-- /Right-bar -->

</div>
<!-- END wrapper -->



<script>
    var resizefunc = [];
</script>

<!-- jQuery  -->

<script src="__PUBLIC__/js/bootstrap.min.js"></script>
<script src="__PUBLIC__/js/waves.js"></script>
<script src="__PUBLIC__/js/wow.min.js"></script>
<script src="__PUBLIC__/js/jquery.nicescroll.js" type="text/javascript"></script>
<script src="__PUBLIC__/js/jquery.scrollTo.min.js"></script>
<script src="__PUBLIC__/assets/chat/moment-2.2.1.js"></script>
<script src="__PUBLIC__/assets/jquery-sparkline/jquery.sparkline.min.js"></script>
<script src="__PUBLIC__/assets/jquery-detectmobile/detect.js"></script>
<script src="__PUBLIC__/assets/fastclick/fastclick.js"></script>
<script src="__PUBLIC__/assets/jquery-slimscroll/jquery.slimscroll.js"></script>
<script src="__PUBLIC__/assets/jquery-blockui/jquery.blockUI.js"></script>

<!-- sweet alerts -->
<script src="__PUBLIC__/assets/sweet-alert/sweet-alert.min.js"></script>
<script src="__PUBLIC__/assets/sweet-alert/sweet-alert.init.js"></script>

<!-- flot Chart -->
<script src="__PUBLIC__/assets/flot-chart/jquery.flot.js"></script>
<script src="__PUBLIC__/assets/flot-chart/jquery.flot.time.js"></script>
<script src="__PUBLIC__/assets/flot-chart/jquery.flot.tooltip.min.js"></script>
<script src="__PUBLIC__/assets/flot-chart/jquery.flot.resize.js"></script>
<script src="__PUBLIC__/assets/flot-chart/jquery.flot.pie.js"></script>
<script src="__PUBLIC__/assets/flot-chart/jquery.flot.selection.js"></script>
<script src="__PUBLIC__/assets/flot-chart/jquery.flot.stack.js"></script>
<script src="__PUBLIC__/assets/flot-chart/jquery.flot.crosshair.js"></script>

<!-- Counter-up -->
<script src="__PUBLIC__/assets/counterup/waypoints.min.js" type="text/javascript"></script>
<script src="__PUBLIC__/assets/counterup/jquery.counterup.min.js" type="text/javascript"></script>

<!-- CUSTOM JS -->
<script src="__PUBLIC__/js/jquery.app.js"></script>

<!-- Dashboard -->
<script src="__PUBLIC__/js/jquery.dashboard.js"></script>

<!-- Chat -->
<script src="__PUBLIC__/js/jquery.chat.js"></script>

<!-- Todo -->
<script src="__PUBLIC__/js/jquery.todo.js"></script>

<script type="text/javascript">
    /* ==============================================
     Counter Up
     =============================================== */
    jQuery(document).ready(function($) {

    });


    function requestTime(id){
        //alert("bbbbbbb"+id);
        $.ajax(
                {
                    type:"post",
                    url:"<?php echo U('RequestTime/index');?>",
                    dataType:"json",
                    data: {
                        id:id,
                    },
                    success:function( data ){

                        $("#div-"+id).find('div[name=time]').html(data['request_time']);
                        $("#div-"+id).find('div[name=time]').attr("class","h2 text-"+data['err_type']);
                        $("#div-"+id).find('div[name=head]').attr("class","panel panel-border widget-s-1 panel-"+data['err_type']);


                        // alert(data['request_time']);
                    },
                    error: function(){
                        return 0;
                    }
                });

    }




</script>

</body>
</html>