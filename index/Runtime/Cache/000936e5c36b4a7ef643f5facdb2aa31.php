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

    <title>未来五年有哪些新变化？有奖答题，快来！</title>

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



<div style="display:none"><img src="__PUBLIC__/images/packet_success.jpg" ></div>

    <!--投票说明-->
    <div class="wrapper-page" style="font-size: 18px ;">
        <div class="row" >
            <div class="panel panel-danger panel-border">
                <div class="panel-heading">
                    <h3 class="panel-title" style="text-align: center; font-size: 19px ;">未来五年有哪些新变化？有奖答题，快来！</h3>
                </div>
                <div class="panel-body">
                    党的十八届五中全会审议通过的《中共中央关于制定国民经济和社会发展第十三个五年规划的建议》，与我们每个人都息息相关。市网信办特举办“党的十八届五中全会知识有奖答题活动”，简单的10道单选题，全部答对的可参与拆礼包抽奖游戏，随机抽出50名幸运儿，各奖励200元话费。快来试试！！
                    <br/>（活动时间12月2日18时至3日12时）
                    <br/><p style="text-align: center; color: #e40001 "><?php echo ($timeInfo); ?></p>
                    <hr/>
                    <p style="text-align: center; color: #e40001 "><?php echo ($palyInfo); ?></p>
                    <h3 style="text-align: center; color: #e40001 "><?php echo ($prizeInfo); ?></h3>
                </div>
            </div>
        </div>


        <form action="<?php echo U('Question/checkAnswer');?>" method="post" onSubmit="return checkForm();">

        <?php if(is_array($questionList)): foreach($questionList as $key=>$question): ?><div class="row" >
                <div class="question">
                <div class="col-12">
                    <div class="mini-stat clearfix bx-shadow" id="panel" style="" >

                        <h4 class="text-uppercase"><?php echo ($question["question"]); ?></h4>

                        <hr/>
                        <div class="tiles-progress">
                            <div class="m-t-20">


                                <div class="col-sm-12">
                                    <div class="radio radio-danger">
                                        <input type="radio" name="<?php echo ($key); ?>" id="question<?php echo ($key); ?>A" value="A">
                                        <label for="question<?php echo ($key); ?>A">
                                            <?php echo ($question["A"]); ?>
                                        </label>
                                    </div>
                                    <div class="radio radio-danger">
                                        <input type="radio" name="<?php echo ($key); ?>" id="question<?php echo ($key); ?>B" value="B" >
                                        <label for="question<?php echo ($key); ?>B">
                                            <?php echo ($question["B"]); ?>
                                        </label>
                                    </div>
                                    <div class="radio radio-danger">
                                        <input type="radio" name="<?php echo ($key); ?>" id="question<?php echo ($key); ?>C" value="C" >
                                        <label for="question<?php echo ($key); ?>C">
                                            <?php echo ($question["C"]); ?>
                                        </label>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div><?php endforeach; endif; ?>

        <button id="submitBtn" type="submit" class="btn btn-block btn-lg btn-danger waves-effect waves-light ">确定提交</button>

        </form>

</div>






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

    var canPlay = parseInt(<?php echo ($canPlay); ?>);


    function checkForm(){

        if(canPlay==0){
            sweetAlert({ title: "你已经玩过", timer: 1000, showConfirmButton: false });
            return false;
        }

        if(canPlay==2){
            sweetAlert({ title: "活动时间还没有到", timer: 1000, showConfirmButton: false });
            return false;
        }

        if(canPlay==3){
            sweetAlert({ title: "活动时间已经结束", timer: 1000, showConfirmButton: false });
            return false;
        }


        if(canPlay==1){
            var answerSum =0;
            $('div.question').each(function(){


                if($(this).find('input:checked').length > 0) {
                    answerSum++;
                } else {

                }
            });

            if(answerSum<10){
                sweetAlert({ title: "请回答完10题",text:"你还有"+(10-answerSum)+"题没有回答", timer: 1000, showConfirmButton: false });
                return false;
            }



            if(answerSum==10){
                canPlay=0;
                sweetAlert({ title: "提交成功", timer: 1000, showConfirmButton: false });
                return true
            }
        }






        canPlay=0;
        return false;



    }

</script>


</body>
</html>