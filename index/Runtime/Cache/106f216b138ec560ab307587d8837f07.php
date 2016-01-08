<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <meta content="yes" name="apple-mobile-web-app-capable" />
    <meta content="yes" name="apple-touch-fullscreen" />
    <meta content="telephone=no" name="format-detection" />
    <meta content="black" name="apple-mobile-web-app-status-bar-style" />
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="author" content="Coderthemes">

    <link rel="shortcut icon" href="images/favicon_1.ico">

    <title><?php echo ($redpacket["name"]); ?></title>

    <!-- Base Css Files -->
    <link href="__PUBLIC__/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Custom Files -->
    <link href="__PUBLIC__/css/helper.css" rel="stylesheet" type="text/css" />
    <link href="__PUBLIC__/css/style.css" rel="stylesheet" type="text/css" />
    <link href="__PUBLIC__/assets/sweet-alert/sweet-alert.min.css" rel="stylesheet">

    <!-- Font Icons -->
    <link href="__PUBLIC__/assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" />


    <script src="__PUBLIC__/js/jquery.min.js"></script>



</head>



<body>

<div>

<div  id="getPrize_info" style=" position: relative;top: 140px; margin-top: -100px; text-align: center; "></div>

<img  id="packet_img" src="__PUBLIC__/images/packet.jpg" width="100%"/>

</div>







<div id="info_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="full-width-modalLabel" aria-hidden="true" style="display: none;">




    <div class="modal-content">

        <div class="modal-header " style="height: 60px">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="full-width-modalLabel">填写信息</h4>
        </div>
        <div class="modal-body" id="modal-body" >

            <div class="form-horizontal m-t-5">

                <p class="text-center" id="prize_info" style="color: #CC0000"></p>
                <div class="form-group ">
                    <div class="col-xs-12">
                        <input class="form-control input-lg " type="text"  name="name" placeholder="名字">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <input class="form-control input-lg" type="text"  name="phone" placeholder="手机号">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <input class="form-control input-lg" type="text"  name="identity_id" placeholder="身份证号">
                    </div>
                </div>
            </div>

            <p class="text-center" style="color: rgba(81, 81, 81, 0.72);">以上信息为兑奖的唯一凭证</p>
            <p class="text-center" style="color: rgba(81, 81, 81, 0.72);">放弃提交视为放弃该奖品</p>
            <button id="info_btn" type="button" class="btn btn-primary ">提交</button>

        </div>
        <div class="modal-footer" style="height: 60px">

        </div>
    </div>

</div>





    <!--投票说明-->
   <!-- <div class="wrapper-page">-->
        <!--<div class="row">
            <div class="panel panel-danger panel-border">
                <div class="panel-heading">
                    <h3 class="panel-title"></h3>
                </div>
                <div class="panel-body">
                    <?php echo ($redpacket["info"]); ?>

                </div>
            </div>
        </div>-->








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
<script src="__PUBLIC__/assets/sweet-alert/sweet-alert.min.js"></script>
<script src="__PUBLIC__/assets/sweet-alert/sweet-alert.init.js"></script>




<script language="javascript">

    var publicPath = "__PUBLIC__";

    var canPlay = parseInt(<?php echo ($canPlay); ?>);
    var canPlayInfo = '<?php echo ($canPlayInfo); ?>';

    var userInfoFlag = 0;



    var HTML = '<h3 style="color: #e40001;">'+canPlayInfo+'</h3>';

    $("#getPrize_info").html(HTML);

    $("#packet_img").click(function(){

        if(canPlay == 1){
            //把能够抽奖的标志位改为0，前端防止用户多次获取
            canPlay=0;
            // HTML = '<h3 style="color: #e40001;">正在努力获取礼品</h3>';
            // $("#getPrize_info").html(HTML);

            //异步去获取礼品
            $.ajax(
                    {
                        type: "post",
                        url: "<?php echo U('ToPlayRedPacket/getPrize');?>",
                        dataType: "json",
                        success: function (data) {

                            if(data.state==1){

                                var winHeight = 1200;
                                var styleHtml = 'height:'+winHeight+'px; overflow:scroll;';
                                $("#modal-body").attr('style',styleHtml);

                                $('#info_modal').modal('show');

                                $('#prize_info').html("获得"+data.info);

                                HTML = '<h1 style="color: #e40001;">恭喜你获得</h1>';
                                HTML += '<h3 style="color: #e40001;">'+data.info+'</h3>';
                                $("#getPrize_info").html(HTML);
                                $("#packet_img").attr('src',publicPath+'/images/packet_success.jpg');
                            }else if(data.state==0){
                                HTML = '<h1 style="color: #e40001;">谢谢参与</h1>';
                                HTML += '<h4 style="color: #e40001;">我们还将陆续推出多种有奖活动，敬请关注。</h4>';
                                $("#getPrize_info").html(HTML);
                                $("#packet_img").attr('src',publicPath+'/images/packet_fail.jpg');

                            }


                        },
                        error: function () {
                            return 0;
                        }
                    });
        }


    });



    $("#info_btn").click(function(){

        var name = $("input[name='name']");
        var phone = $("input[name='phone']");
        var identity_id = $("input[name='identity_id']");


        if(name.val().length==0){
            sweetAlert({   title: "请填写正确您的名字", timer: 1000, showConfirmButton: false });
            name.focus();
            return 0;

        }

        if(!(/^1[358]\d{9}$/.test(phone.val()))){
            sweetAlert({   title: "请填写正确的电话", timer: 1000, showConfirmButton: false });
            phone.focus();
            return 0;
        }


        if(identity_id.val().length!=18 ){

            sweetAlert({   title: "请填写正确您的身份证号", timer: 1000, showConfirmButton: false });
            identity_id.focus();
            return 0;

        }else{

            var identityStr = identity_id.val();

            var identity17Str = identityStr.substr(0, 17); // 获取子字符串。

            if(!(/^[1-9][0-9]{16}$/.test(identity17Str))) {
                sweetAlert({   title: "请填写正确您的身份证号", timer: 1000, showConfirmButton: false });
                identity_id.focus();
                return 0;
            }

        }



        // alert("haha");

        $.ajax(
                {
                    type: "post",
                    url: "<?php echo U('ToPlayRedPacket/userInfo');?>",
                    dataType: "json",
                    data:{
                        name:name.val(),
                        phone:phone.val(),
                        identity_id:identity_id.val()

                    },




                    success: function (data) {

                        userInfoFlag = 1;
                        $('#info_modal').modal('hide');

                    },
                    error: function () {
                        return 0;
                    }
                });



    });





    $('#info_modal').on('hidden.bs.modal', function () {

        if(userInfoFlag==0){

            $.ajax(
                    {
                        type: "post",
                        url: "<?php echo U('ToPlayRedPacket/giveUpPrize');?>",
                        dataType: "json",
                        success: function (data) {


                        },
                        error: function () {
                            return 0;
                        }
                    });


            HTML = '<h1 style="color: #e40001;">好可惜</h1>';
            HTML += '<h3 style="color: #e40001;">你放弃了本奖品</h3>';
            $("#getPrize_info").html(HTML);
            $("#packet_img").attr('src',publicPath+'/images/packet_fail.jpg');

        }

    });






</script>


</body>
</html>