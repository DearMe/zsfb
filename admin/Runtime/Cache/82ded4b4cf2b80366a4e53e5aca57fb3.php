<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="author" content="Coderthemes">

    <link rel="shortcut icon" href="images/favicon_1.ico">

    <title>自动回复设置</title>


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
                                <h3 class="panel-title">列表</h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="m-b-30">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-primary dropdown-toggle waves-effect" data-toggle="dropdown" aria-expanded="false">添加<span class="caret"></span></button>
                                                <ul class="dropdown-menu" role="menu">
                                                    <li><a class="btn waves-effect waves-light" data-toggle="modal" data-target="#con-text-modal" >文本</a></li>
                                                    <li><a class="btn waves-effect waves-light" data-toggle="modal" data-target="#con-image-text-modal" >图文</a></li>
                                                    <li><a href="#">图文</a></li>
                                                </ul>
                                            </div>

                                            <div id="con-text-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                            <h4 class="modal-title">自动回复设置：文本模式</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class=" form">
                                                                <form method="post" action="<?php echo U('AutoResponse/add');?>" onSubmit="return checkForm();">

                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="text_key" class="control-label">key</label>
                                                                                <input type="text" class="form-control" id="text_key" name="key" placeholder="key">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="text_text" class="control-label">text</label>
                                                                                <input type="text" class="form-control" id="text_text" name="text" placeholder="key">
                                                                            </div>
                                                                        </div>
                                                                    </div>


                                                                    <input type="hidden" value="text" name="type">

                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                                                        <button type="submit" class="btn btn-info waves-effect waves-light">Save</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- /.modal -->

                                            <div id="con-image-text-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                            <h4 class="modal-title">自动回复设置：图文模式</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class=" form">
                                                                <form method="post" action="<?php echo U('AutoResponse/add');?>" onSubmit="return checkForm();">

                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="image_text_key" class="control-label">key</label>
                                                                                <input type="text" class="form-control" id="image_text_key" name="key" placeholder="key">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="image_text_title" class="control-label">title</label>
                                                                                <input type="text" class="form-control" id="image_text_title" name="title" placeholder="title">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <div class="form-group ">
                                                                                <label for="image_text_pic" class="control-label col-12">上传图片</label>
                                                                                <div class="input-group">
                                                                                    <div class="avatar_box">
                                                                                        <img id="image_text_pic" src="" width="130" height="130" border="0" />
                                                                                        <div class="upload_avatar">
                                                                                            <input name="mediaId" type="hidden"  value=""/>
                                                                                            <input id="file_upload" name="file_upload" type="file" multiple="false" value="" />
                                                                                        </div>
                                                                                    </div>

                                                                                </div>
                                                                            </div>
                                                                        </div>


                                                                    </div>


                                                                    <input type="hidden" value="image" name="type">

                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">关闭</button>
                                                                        <button type="submit" class="btn btn-info waves-effect waves-light">保存</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- /.modal -->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <table id="datatable" class="table table-striped table-bordered">
                                            <thead>
                                            <tr>
                                                <th>id</th>
                                                <th>关键字</th>
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
    <script src="__PUBLIC__/assets/uploadify/jquery.uploadify.min.js" type="text/javascript"></script>
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
    <script src="__PUBLIC__/assets/uploadify/jquery.uploadify.min.js" type="text/javascript"></script>

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
            "ajax": "<?php echo U('AutoResponse/tableAJAX');?>"



        });
    } );





    $(document).on("click","button[name='edit']",function(){
        location.href = "<?php echo U('AutoResponse/edit');?>"+'&id='+$(this).attr('id');
    });


    $(document).on("click","button[name='del']",function(){

        var id = $(this).attr('id');

        sweetAlert({
            title: "注意：删除后不可恢复",
            text: "你确定要删除吗？",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "确定删除",
            closeOnConfirm: false },
            function(){
                sweetAlert("删除中...", "正在删除id="+id+"的自动回复", "success");
                location.href = "<?php echo U('AutoResponse/del');?>"+'&id='+id;

            });



    });

    function checkForm(){

        if($("#text_key").val() == null || $("#text_key").val() == ""){
            sweetAlert({title:"请输入关键字", timer:1000, showConfirmButton:false});
            return false;
        }
        if($("#text_text").val() == null || $("#text_text").val() == ""){
            sweetAlert({title:"请输入回复内容", timer:1000, showConfirmButton:false});
            return false;
        }
        return true;
    }


    $('#file_upload').uploadify({
        'swf'      : '__PUBLIC__/assets/uploadify/uploadify.swf',
        'uploader' : "<?php echo U('Upload/pictuieUpload',array('PHPSESSID'=> cookie('PHPSESSID')));?>",
        'buttonText' : '上传图片',
        'multi':'false',
        'onUploadSuccess' : function(file, data, response) {
            $('#image_text_pic').attr('src','__ROOT__/admin/Uploads/Picture/' + data);
            $("input[name='img_img']").val(data);
            alert(data);
        },
    });




</script>

</body>
</html>