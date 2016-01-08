<?php
/**
 * Created by PhpStorm.
 * User: liu
 * Date: 2015/11/25
 * Time: 17:28
 */

class ToPlayRedPacketAction extends Action {


    //play页面
    public function index(){

        //session('userInfo',null);
        session('redpacket_id',null);



/*
        session('to_play','Question');
        $userInfo['open_id'] = 'admin_openId'.time();
        $userInfo['name'] = 'admin';
        session('userInfo',$userInfo);*/



        $action = I('get.action');//获取第三方跳转时的action，由第三方跳转时添加(分享过来有该参数)
        $actionId = I('get.actionId');//获取第三方跳转时的action的Id，由第三方跳转时添加(分享过来有该参数)
        $to_play = session('to_play');//获取第三方跳转时session的参数(分享过来有没有该参数)

        //p($_GET);

       // p("to_play=".$to_play);



        $userInfo = getUserInfo(U($action.'/index',array('id'=>$actionId)));

        //exit;
        //第三方活动
        if(!$to_play){
            $this->redirect($action.'/index',array('id'=>$actionId));
        }



        //创建数据库
        $redpacketDB = M('redpacket');
        $logDB = M('redpacket_log');
        $prizeDB = M('redpacket_prize');


        //如果$redpacket_id是空的而且有toplay的session在，那么可以确定是第三方跳转过来的
        if($to_play){
            //由第三方的to_play找到
            $redpacket = $redpacketDB->where(array('to_play'=>$to_play))->find();
            $redpacket_id = $redpacket['id'];
            session('redpacket_id',$redpacket_id);

        }





        //获取抽奖的信息
        $redpacket = $redpacketDB->where(array('id'=>$redpacket_id))->find();

        //获取当前访问时间
        $nowTime = time();

        if($nowTime<$redpacket['start_time'] ){
            $canPlay = '0';
            $canPlayInfo = '活动时间还没有到';
        }


        if($nowTime>$redpacket['end_time']){
            $canPlay = '0';
            $canPlayInfo = '活动时间已经结束';
        }

        //如果时间是到的
        if($nowTime>=$redpacket['start_time'] && $nowTime<=$redpacket['end_time']){

            //查找用户在该抽奖的记录
            $userLog = $logDB->where(array('open_id'=>$userInfo['open_id'],'redpacket_id'=>$redpacket_id))->find();

            //如果他的奖品id是大于等于0的就表示已经参加过抽奖的。
            if(!$userLog){

                $canPlay = '1';//表示不可以抽奖
                $canPlayInfo = '点击下图的礼品盒进行抽奖';


            }else{
                $canPlay = '0';//表示不可以抽奖
                if($userLog['prize_id']==0){
                    $canPlayInfo = "你已经参加过";
                }else if($userLog['prize_id']>0){
                    $userPrize = $prizeDB->where(array('id'=>$userLog['prize_id']))->find();
                    $canPlayInfo = $userPrize['name'];
                }
            }

        }


        $redpacket['info'] = htmlspecialchars_decode( $redpacket['info']);

        $this->canPlay = $canPlay;
        $this->canPlayInfo = $canPlayInfo;
        $this->redpacket = $redpacket;

        //p($_SESSION);
        //p($userInfo);
        $this->display();


    }


    public function userInfo(){

        if(IS_POST){
            $userInfo = getUserInfo("");
            $redpacket_id = session('redpacket_id');


            if(!$redpacket_id || !$userInfo){
                exit;
            }

            $redpacket_logDB = M('redpacket_log');
            $userLog = $redpacket_logDB->where(array('open_id'=>$userInfo['open_id'],'redpacket_id'=>$redpacket_id))->find();


            $userLog['name'] = I('post.name');
            $userLog['phone'] = I('post.phone');
            $userLog['identity_id'] = I('post.identity_id');

            // p($userLog);

            $redpacket_logDB->data($userLog)->save();

            $jsonData['state']='1';


            echo json_encode($jsonData);
            exit;




        }

    }






    public function err(){
        echo "err";
    }



    public function giveUpPrize(){

        if(IS_POST) {
            $userInfo = getUserInfo("");
            $redpacket_id = session('redpacket_id');
            if (!$redpacket_id || !$userInfo) {
                exit;
            }

            $redpacket_logDB = M('redpacket_log');
            $userLog = $redpacket_logDB->where(array('open_id'=>$userInfo['open_id'],'redpacket_id'=>$redpacket_id))->find();
            $userLog['prize_id']=0;
            $redpacket_logDB->data($userLog)->save();
            $jsonData['state']='1';
            echo json_encode($jsonData);
            exit;




        }

    }

    public function getPrize(){

        if(IS_POST) {

            $userInfo = getUserInfo("");
            $redpacket_id = session('redpacket_id');

            //如果不存在session的$redpacket_id
            if(!$redpacket_id){
                exit;
            }



            //创建数据库连接
            $redpacketDB = M('redpacket');
            $prizeDB = M('redpacket_prize');
            $logDB = M('redpacket_log');

            //获取抽奖的信息
            $redpacket = $redpacketDB->where(array('id'=>$redpacket_id))->find();
            //验证id是否存在
            if(!$redpacket){
                exit;
            }


            //获取当前访问时间
            $nowTime = time();

            $canPlay = 0;
            if($nowTime<$redpacket['start_time'] ){
                $canPlay = 0;

            }


            if($nowTime>$redpacket['end_time']){
                $canPlay = 0;

            }

            //如果时间是到的
            if($nowTime>=$redpacket['start_time'] && $nowTime<=$redpacket['end_time']) {

                //查找用户在该抽奖的记录
                $userLog = $logDB->where(array('open_id' => $userInfo['open_id'], 'redpacket_id' => $redpacket_id))->find();

                //如果他的奖品id是大于等于0的就表示已经参加过抽奖的。
                if (!$userLog) {

                    $canPlay = 1;//表示不可以抽奖


                } else {
                    $canPlay = 0;//表示不可以抽奖

                }
            }



            if($canPlay == 0){
                exit;
            }



            //获取当前访问时间
            $nowTime = time();

            //奖品列表
            $prizeList = $prizeDB->where(array('redpacket_id'=>$redpacket_id))->select();

            //奖品数，即也是区间数
            $prizeSum = $prizeDB->where(array('redpacket_id'=>$redpacket_id))->sum('num');
            //总时长
            $timeLong = $redpacket['end_time'] - $redpacket['start_time'];

            //每个区间的时间长度
            $extTimeLong =  (int)floor($timeLong/$prizeSum);

            //获取当前访问所在的区间
            $nowExt = (int)ceil(($nowTime - $redpacket['start_time'])/$extTimeLong);

            if($nowExt==0){
                $nowExt =1;
            }



            //判断缓存是否存在，没有就创建
            if(!$prizeTime = S('prizeTime'.$redpacket_id)){
                $prizeTime = array();
                //循环创建每个区间的中奖时间点
                for($i=1;$i<=$prizeSum;$i++){
                    $prizeTime[$i] = rand($redpacket['start_time']+$extTimeLong*($i-1),$redpacket['start_time']+$extTimeLong*$i-1);

                    $a['extent'] = $i;
                    $a['start'] = $redpacket['start_time']+$extTimeLong*($i-1);
                    $a['prizeTime'] = $prizeTime[$i];
                    $a['end'] = $redpacket['start_time']+$extTimeLong*$i-1;
                    $a['timeLong'] =$a['end'] -  $a['start'];
                    $a['prize'] = $a['end'] - $a['prizeTime'];

                    // p($a);
                }
                // p("写缓存");
                //把每个区间的中奖时间点写入缓存
                S('prizeTime'.$redpacket_id,$prizeTime,$timeLong);

            }



            //获取已经发出的奖品的数目
            $prizeSumed = $logDB->where(array('redpacket_id'=>$redpacket_id,'prize_id'=>array('gt',0)))->count();


            //如果之前的区间有没有发出票，或者当前区间没有发出而且已经到了随机的获奖时间那么就中奖
            if($nowExt>$prizeSumed+1 || ($nowExt==$prizeSumed+1 && $nowTime>=$prizeTime[$nowExt])){
                //获奖
                //奖品种类
                $prizeSize = count($prizeList);
                //随机数
                $randNum = rand(1,$prizeSum);
                //获得的奖品
                $onprize = null;

                //按概率循环他获得几等奖
                for($i=0;$i<count($prizeList);$i++){

                    $startNum = 1;
                    for($j=0;$j<$i;$j++){
                        $startNum += $prizeList[$j]['num'];
                    }

                    $endNum = $startNum+$prizeList[$i]['num'];

                    if($randNum>=$startNum && $randNum<=$endNum){
                        $onprize = $i;
                        break;
                    }
                }

                //验证随机出来的奖品是否已经发光，如果没有了就调到下一个奖品
                for($i=1;$i<count($prizeList);$i++){
                    //随机出来的奖品已经发出的数目
                    $thisPrizeSumed = $logDB->where(array('redpacket_id'=>$redpacket_id,'prize_id'=>$prizeList[$onprize]['id']))->count();
                    //随机出来的奖品总共有多少
                    $thisPrize = $prizeDB->where(array('id'=>$prizeList[$onprize]['id']))->find();
                    $thisPrizeSum = $thisPrize['num'];
                    if($thisPrizeSumed<$thisPrizeSum){
                        break;
                    }else{
                        $onprize += $i;
                        $onprize = $onprize%count($prizeList);

                    }

                }


                //把他的获奖信息写入数据库
                $userLog['open_id'] = $userInfo['open_id'];
                $userLog['prize_id'] = $prizeList[$onprize]['id'];
                $userLog['redpacket_id'] = $redpacket_id;
                $logDB->data($userLog)->add();


                $jsonData['state']='1';
                $jsonData['info'] = $prizeList[$onprize]['name'];


                echo json_encode($jsonData);
                exit;



            }else{
                //没有获奖

                $userLog['open_id'] = $userInfo['open_id'];
                $userLog['prize_id'] = 0;
                $userLog['redpacket_id'] = $redpacket_id;
                $logDB->data($userLog)->add();



                $jsonData['state']='0';
                $jsonData['info'] = '没有中奖';

                echo json_encode($jsonData);
                exit;


            }


        }

    }


}