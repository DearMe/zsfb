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

<div id="option_detial_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="full-width-modalLabel" aria-hidden="true" style="display: none;">

</div>

<div id="bodyall">


    <!--投票说明-->
    <div class="wrapper-page">
        <div class="row">
            <div class="panel panel-danger panel-border">
                <div class="panel-heading">
                    <h3 class="panel-title"></h3>
                </div>
                <div class="panel-body">
                    <?php echo ($redpacket["info"]); ?>

                </div>
            </div>
        </div>

        <div>
            <img id="packet_img" src="__PUBLIC__/images/packet.jpg" width="100%"/>
            <div id="getPrize_info" style=" position: relative;top: -120px; text-align: center; ">

               <!-- <h1 style="color: #e40001">恭喜你</h1>
                <h3 style="color: #e40001;">获得一等奖：电话费100元</h3>-->

            </div>

        </div>
        <br/><br/>


    </div>








</div>




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


    var HTML = '<h3 style="color: #e40001;">'+canPlayInfo+'</h3>';

    $("#getPrize_info").html(HTML);

    $("#packet_img").click(function(){

        if(canPlay == 1){
            //把能够抽奖的标志位改为0，前端防止用户多次获取
            canPlay=0;
            HTML = '<h3 style="color: #e40001;">正在努力获取礼品</h3>';
            $("#getPrize_info").html(HTML);

            //异步去获取礼品
            $.ajax(
            {
                type: "post",
                url: "<?php echo U('PlayRedPacket/getPrize');?>",
                dataType: "json",
                success: function (data) {

                    if(data.state==1){
                        HTML = '<h1 style="color: #e40001;">恭喜你</h1>';
                        HTML += '<h3 style="color: #e40001;">获得:'+data.info+'</h3>';
                        $("#getPrize_info").html(HTML);
                        $("#packet_img").attr('src',publicPath+'/images/packet_success.jpg');
                    }else if(data.state==0){
                        HTML = '<h1 style="color: #e40001;">好可惜！</h1>';
                        HTML += '<h3 style="color: #e40001;">你没有获得礼品</h3>';
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






</script>


</body>
</html>