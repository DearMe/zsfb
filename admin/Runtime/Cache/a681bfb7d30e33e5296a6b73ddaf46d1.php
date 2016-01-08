<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="author" content="Coderthemes">

    <link rel="shortcut icon" href="images/favicon_1.ico">

    <title>投票</title>


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

    <!-- Plugin Css-->
    <link rel="stylesheet" href="__PUBLIC__/assets/magnific-popup/magnific-popup.css" />
    <link rel="stylesheet" href="__PUBLIC__/assets/jquery-datatables-editable/datatables.css" />

    <!-- Custom Files -->
    <link href="__PUBLIC__/css/helper.css" rel="stylesheet" type="text/css" />
    <link href="__PUBLIC__/css/style.css" rel="stylesheet" type="text/css" />


    <!-- sweet alerts -->
    <link href="__PUBLIC__/assets/sweet-alert/sweet-alert.min.css" rel="stylesheet">

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


                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">投票列表</h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="m-b-30">
                                            <a href="<?php echo U('Vote/add');?>" class="btn btn-primary waves-effect waves-light">添加</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <table id="datatable" class="table table-striped table-bordered">
                                            <thead>
                                            <tr>
                                                <th>id</th>
                                                <th>名字</th>
                                                <th>最大选项数</th>
                                                <th>状态</th>
                                                <th>操作</th>
                                            </tr>
                                            </thead>


                                            <tbody>


                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- End Row -->
            </div> <!-- container -->
        </div> <!-- content -->

        <footer class="footer text-right">
            2015 © 技术中心.
        </footer>
    </div>
    <!-- ============================================================== -->
    <!-- End Right content here -->
    <!-- ============================================================== -->



</div>
<!-- END wrapper -->

<script>
    var resizefunc = [];
</script>

<!-- jQuery  -->
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

<script src="__PUBLIC__/assets/datatables/jquery.dataTables.min.js"></script>
<script src="__PUBLIC__/assets/datatables/dataTables.bootstrap.js"></script>


<script src="__PUBLIC__/assets/sweet-alert/sweet-alert.min.js"></script>
<script src="__PUBLIC__/assets/sweet-alert/sweet-alert.init.js"></script>


<script type="text/javascript">
    $(document).ready(function() {
        $('#datatable').dataTable({
            "processing": true,
            "serverSide": true,
            "ajax": "<?php echo U('Vote/tableAJAX');?>"



        });
    } );





    $(document).on("click","button[name='edit']",function(){
        location.href = "<?php echo U('Vote/edit');?>"+'&id='+$(this).attr('id');
    });

    $(document).on("click","button[name='show']",function(){
        //alert("hahah ");

        //window.open("<?php echo U('ToVote/index');?>"+'&id='+$(this).attr('id'));
        location.href = "<?php echo U('ToVote/index');?>"+'&id='+$(this).attr('id');
    });

    $(document).on("click","button[name='res']",function(){
        //alert("hahah ");
        location.href = "<?php echo U('Vote/result');?>"+'&id='+$(this).attr('id');
    });

    $(document).on("click","button[name='del']",function(){

        var id = $(this).attr('id');

        sweetAlert({
            title: "注意：删除后不可恢复",
            text: "你确定要删除该投票显目吗？",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "确定删除",
            closeOnConfirm: false },
            function(){
                sweetAlert("删除中...", "正在删除id="+id+"的投票", "success");
                location.href = "<?php echo U('Vote/del');?>"+'&id='+id;

            });



       // location.href = "<?php echo U('Vote/del');?>"+'&id='+$(this).attr('id');
    });








</script>

</body>
</html>