<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="author" content="Coderthemes">

    <link rel="shortcut icon" href="images/favicon_1.ico">

    <title>添加</title>


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

    <link href="__PUBLIC__/assets/uploadify/uploadify.css" rel="stylesheet" type="text/css" />



    <!-- Plugins css-->
    <link href="__PUBLIC__/assets/tagsinput/jquery.tagsinput.css" rel="stylesheet" />
    <link href="__PUBLIC__/assets/toggles/toggles.css" rel="stylesheet" />
    <link href="__PUBLIC__/assets/timepicker/bootstrap-timepicker.min.css" rel="stylesheet" />
    <link href="__PUBLIC__/assets/timepicker/bootstrap-datepicker.min.css" rel="stylesheet" />
    <link href="__PUBLIC__/assets/timepicker/bootstrap-datetimepicker.min.css" rel="stylesheet" />
    <link href="__PUBLIC__/assets/colorpicker/colorpicker.css" rel="stylesheet" type="text/css" />
    <link href="__PUBLIC__/assets/jquery-multi-select/multi-select.css"  rel="stylesheet" type="text/css" />
    <link href="__PUBLIC__/assets/select2/select2.css" rel="stylesheet" type="text/css" />

    <link href="__PUBLIC__/assets/summernote/summernote.css" rel="stylesheet" />



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

                <!-- Form-validation -->
                <div class="row">

                    <div class="col-sm-12">
                        <div class="panel panel-default">
                            <div class="panel-heading"><h3 class="panel-title">添加</h3></div>
                            <div class="panel-body">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default dropdown-toggle waves-effect" data-toggle="dropdown" aria-expanded="false">选择回复类型<span class="caret"></span></button>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a class="btn waves-effect waves-light" data-toggle="modal" data-target="#con-text-modal" >文本</a></li>
                                        <li><a href="#">图片</a></li>
                                        <li><a href="#">图文</a></li>
                                    </ul>
                                </div>
                                <div class=" form">
                                    <form method="post" action="<?php echo U('AutoResponse/doAdd');?>" onSubmit="return checkForm();">

                                        <div id="con-text-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                        <h4 class="modal-title">自动回复设置：文本模式</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="field-1" class="control-label">Name</label>
                                                                    <input type="text" class="form-control" id="field-1" placeholder="John">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="field-2" class="control-label">Surname</label>
                                                                    <input type="text" class="form-control" id="field-2" placeholder="Doe">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="field-3" class="control-label">Address</label>
                                                                    <input type="text" class="form-control" id="field-3" placeholder="Address">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="field-4" class="control-label">City</label>
                                                                    <input type="text" class="form-control" id="field-4" placeholder="Boston">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="field-5" class="control-label">Country</label>
                                                                    <input type="text" class="form-control" id="field-5" placeholder="United States">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="field-6" class="control-label">Zip</label>
                                                                    <input type="text" class="form-control" id="field-6" placeholder="123456">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group no-margin">
                                                                    <label for="field-7" class="control-label">Personal Info</label>
                                                                    <textarea class="form-control autogrow" id="field-7" placeholder="Write something about yourself" style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 104px;">                                                        </textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                                        <button type="button" class="btn btn-info waves-effect waves-light">Save changes</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- /.modal -->














                                        <div class="form-group">
                                            <div class="col-lg-offset-2 col-lg-10">
                                                <button id="submitBtn" class="btn btn-success waves-effect waves-light" type="submit">　　　保存　　　</button>
                                                <br/><br/><br/>
                                            </div>
                                        </div>
                                    </form>














                                </div> <!-- panel-body -->
                            </div> <!-- panel -->
                        </div> <!-- col -->

                    </div> <!-- End row -->



                </div> <!-- container -->

            </div> <!-- content -->

            <footer class="footer text-right">
                2015 © 技术中心.<?php echo (cookie('PHPSESSID')); ?>aa
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

    <script src="__PUBLIC__/assets/tagsinput/jquery.tagsinput.min.js"></script>
    <script src="__PUBLIC__/assets/toggles/toggles.min.js"></script>
    <!--<script src="__PUBLIC__/assets/timepicker/bootstrap-timepicker.min.js"></script>
    <script src="__PUBLIC__/assets/timepicker/bootstrap-timepicker.js"></script>-->
    <script src="__PUBLIC__/assets/timepicker/bootstrap-datetimepicker.min.js"></script>
    <script src="__PUBLIC__/assets/timepicker/bootstrap-datetimepicker.zh-CN.js"></script>

    <script  src="__PUBLIC__/assets/colorpicker/bootstrap-colorpicker.js" type="text/javascript"></script>
    <script  src="__PUBLIC__/assets/jquery-multi-select/jquery.multi-select.js" type="text/javascript"></script>
    <script  src="__PUBLIC__/assets/jquery-multi-select/jquery.quicksearch.js" type="text/javascript"></script>
    <script src="__PUBLIC__/assets/bootstrap-inputmask/bootstrap-inputmask.min.js" type="text/javascript"></script>
    <script  src="__PUBLIC__/assets/spinner/spinner.min.js" type="text/javascript"></script>
    <script src="__PUBLIC__/assets/select2/select2.min.js" type="text/javascript"></script>
    <script src="__PUBLIC__/assets/uploadify/jquery.uploadify.min.js" type="text/javascript"></script>


    <script src="__PUBLIC__/assets/summernote/summernote.min.js"></script>
    <script src="__PUBLIC__/assets/summernote/summernote-zh-CN.js"></script>



    <script>

        var imgRootPath = '__ROOT__'

        jQuery(document).ready(function() {


            //日期选择
            $('#start_time').datetimepicker({
                language:  'zh-CN',
                weekStart: 1,
                todayBtn:  1,
                autoclose: 1,
                todayHighlight: 1,
                startView: 2,
                forceParse: 0,
                showMeridian: 1
            });

            //日期选择
            $('#end_time').datetimepicker({
                language:  'zh-CN',
                weekStart: 1,
                todayBtn:  1,
                autoclose: 1,
                todayHighlight: 1,
                startView: 2,
                forceParse: 0,
                showMeridian: 1
            });


            //最大选择次数
            $('#spinner3').spinner({value:1, min: 1, max: 100});

            $('#spinner_page').spinner({value:10, min: 1, max: 100});



            //头部图片上传函数
            $('#file_upload').uploadify({
                'swf'      : '__PUBLIC__/assets/uploadify/uploadify.swf',
                'uploader' : "<?php echo U('Upload/pictuieUpload',array('PHPSESSID'=> cookie('PHPSESSID')));?>",
                'buttonText' : '上传图片',
                'onUploadSuccess' : function(file, data, response) {
                    $('#vote_img').attr('src','__ROOT__/vote/Uploads/Picture/'+data);
                    $("input[name='vote_img']").val(data);
                },
            });


            //选项图片上传函数
            function addUploaddify(id){
                $("#option_img_upload_"+id).uploadify({
                    'swf'      : '__PUBLIC__/assets/uploadify/uploadify.swf',
                    'uploader' : "<?php echo U('Upload/pictuieUpload',array('PHPSESSID'=> cookie('PHPSESSID')));?>",
                    'buttonText' : '上传图片',
                    'onUploadSuccess' : function(file, data, response) {
                        $("img[name='option_img'][id='"+id+"']").attr('src','__ROOT__/vote/Uploads/Picture/'+data);
                        $("input[name='option_img[]'][id='"+id+"']").val(data);
                    },
                });
            }


            //添加选项
            var addId = 0;
            $("#add_opt").click(function(){
                addId = addId+1;
                var id= 0-addId;//变成负数，表示添加。

                var html='';
                html += '<tr>';
                html += '<td>';
                html += '<div class="input-group">';
                html += '<div class="avatar_box">';
                html += '<img name="option_img" id="'+id+'" src="" width="130" height="130" border="0" />';
                html += '<div class="upload_avatar">';
                html += '<input type="hidden" name="option_img[]" id="'+id+'" value=""/>';
                html += '<input id="option_img_upload_'+id+'"  name="option_img_upload" type="file" multiple="true" value="" />';
                html += '</div>';
                html += '</div>';
                html += '</div>';
                html += '</td>';
                html += '<td>';
                html += '<input class="form-control" id="'+id+'"  name="option_name[]" type="text" value="">';
                html += '</td>';
                html += '<td>';
                html += '<input type="hidden" name="option_id[]" id="'+id+'" value="'+id+'"/>';
                html += '<input style="width: 50px" id="'+id+'"  name="option_order[]" type="text" value="100">';
                html += '</td>';
                html += '<td>';
                html += '<div name="option_del" id="'+id+'" class="btn btn-primary waves-effect waves-light">删除</div>';
                html += '</td>';
                html += '</tr>';

                $('#opt_list').append(html);

                addUploaddify(id);

            });

            //选项卡删除、这里采用on来监听异步加载的内容
            $(document).on("click","div[name='option_del']",function(){
                $(this).parents('tr').remove();

            });


            $('.summernote_description').summernote({
                lang:'zh-CN',
                height: 200,                 // set editor height
                width: 650,
                minHeight: null,             // set minimum height of editor
                maxHeight: null,             // set maximum height of editor
                focus: false,                // set focus to editable area after initializing summernote

                toolbar: [
                    //[groupname, [button list]]

                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']],
                    ['Insert', ['hr']],
                ]


            });


            $('.summernote_bottominfo').summernote({
                lang:'zh-CN',
                height: 200,                 // set editor height
                width: 650,
                minHeight: null,             // set minimum height of editor
                maxHeight: null,             // set maximum height of editor
                focus: false,                 // set focus to editable area after initializing summernote

                toolbar: [
                    //[groupname, [button list]]

                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']],
                    ['Insert', ['hr']],
                ]

            });






        });


        function checkForm(){

            //alert("hahah");

            $("#vote_description").val($('.summernote_description').code());
            $("#vote_bottominfo").val($('.summernote_bottominfo').code());
            //alert($('.summernote_description').code());
            //alert($('.summernote_bottominfo').code());




            return true;





        }















    </script>



</body>
</html>