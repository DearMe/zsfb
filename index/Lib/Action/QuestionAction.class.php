<?php
/**
 * Created by PhpStorm.
 * User: liu
 * Date: 2015/12/1
 * Time: 8:42
 */
 class QuestionAction extends Action{

     private  $question = array(
         'question1'=>array(
             'question'=>'1. “十三五”时期经济年均增长至少要达到____。',
             'A'=>'A. 6.5%',
             'B'=>'B. 7.0%',
             'C'=>'C. 7.5%',
             'answer'=>'A'
         ),

         'question2'=>array(
             'question'=>'2. “十二五”期间人均国内生产总值增至____左右。',
             'A'=>'A. 7000美元',
             'B'=>'B. 7800美元',
             'C'=>'C. 8000美元',
             'answer'=>'B'
         ),

         'question3'=>array(
             'question'=>'3.要实现“十三五”时期发展目标必须牢固树立____的发展理念。',
             'A'=>'A. 创新、协调、绿色、开放、共享',
             'B'=>'B. 协调、创新、绿色、和平、共享',
             'C'=>'C. 协调、创新、绿色、开放、常态',
             'answer'=>'A'
         ),

         'question4'=>array(
             'question'=>'4. “十三五”规划建议中首次将____在5年规划中单列一章。',
             'A'=>'A. 经济建设',
             'B'=>'B. 社会建设',
             'C'=>'C. 生态文明建设',
             'answer'=>'C'
         ),

         'question5'=>array(
             'question'=>'5.十八届五中全会决定实施____政策。',
             'A'=>'A. 单独二孩',
             'B'=>'B. 全面二孩',
             'C'=>'C. 全面二胎',
             'answer'=>'B'
         ),

         'question6'=>array(
             'question'=>'6.全面提高教育质量，十八届五中全会提出普及____。',
             'A'=>'A. 九年义务教育',
             'B'=>'B. 高中阶段教育',
             'C'=>'C. 大学阶段教育',
             'answer'=>'B'
         ),

         'question7'=>array(
             'question'=>'7.“十三五”规划建议提出，实施“互联网+”行动计划，开展网络____行动，超前布局下一代互联网。',
             'A'=>'A. 提速降费',
             'B'=>'B. 环境整治',
             'C'=>'C. 提速提费',
             'answer'=>'A'
         ),

         'question8'=>array(
             'question'=>'8.“十三五”规划建议提出，深化户籍制度改革，实施____制度。',
             'A'=>'A. 暂住证',
             'B'=>'B. 居住证',
             'C'=>'C. 身份证',
             'answer'=>'B'
         ),

         'question9'=>array(
             'question'=>'9.“十三五”规划建议提出，支持____建设和城际基础设施互联互通。',
             'A'=>'A. 绿色城市、智慧城市、生态城市',
             'B'=>'B. 绿色城市、智慧城市、森林城市',
             'C'=>'C. 生态城市、智慧城市、森林城市',
             'answer'=>'B'
         ),

         'question10'=>array(
             'question'=>'10.“十三五”规划建议提出，出台____政策。',
             'A'=>'A. 渐进式提前退休年龄',
             'B'=>'B. 迅速式延迟退休年龄',
             'C'=>'C. 渐进式延迟退休年龄',
             'answer'=>'C'
         )
     );





     public function index(){

         session('userInfo',null);
         $userInfo = getUserInfo(U('Question/index'));





         $start_time=strtotime('2015-12-2 18:00');
         $end_time=strtotime('2015-12-3 12:00');

         $canPlay = 0;

         $nowTime= time();
         if($nowTime<$start_time){

             $timeInfo = "活动还没有开始";
             $canPlay = 2;
         }else if($nowTime>$end_time){
             $timeInfo = "活动时间已经结束";
             $canPlay = 3;
         }else if($nowTime>=$start_time && $nowTime<=$end_time){
             $timeInfo = "活动进行中";

             $questionLogDB = M('question_log');
             $redpacketLogDB = M('redpacket_log');
             $redpacketDB = M('redpacket');
             $prizeDB = M('redpacket_prize');

             $userLog = $questionLogDB->where(array('open_id'=>$userInfo['open_id']))->find();

             $prizeInfo="";
             if($userLog){
                 $canPlay =0;
                 $palyInfo= '你没有全答对<br/>正确答案是:1-5ABACB,6-10BABBC<br/>每个微信号只允许玩一次';

                 if($userLog['true_answer_sum']==10){

                     $palyInfo= "你全答对了<br/>每个微信号只允许玩一次";
                     $redpacket = $redpacketDB->where(array('to_play'=>'Question'))->find();

                     $redpacketLog = $redpacketLogDB->where(array('open_id'=>$userInfo['open_id'],'redpacket_id'=>$redpacket['id']))->find();

                     if($redpacketLog['prize_id']>0){
                         $prize = $prizeDB->where(array('id'=>$redpacketLog['prize_id']))->find();
                         $prizeInfo =$prize['name'];
                     }




                 }

             }else{
                 $canPlay =1;
                 $palyInfo= "请回答下面问题";
             }



        }





         $this->timeInfo = $timeInfo;
         $this->prizeInfo= $prizeInfo;
         $this->canPlay = $canPlay;
         $this->palyInfo = $palyInfo;
         $this->questionList= $this->question;

         $this->display();

     }



     public function checkAnswer(){


         $userInfo = getUserInfo(U('Question/index'));

         $questionLogDB = M('question_log');
         $userLog = $questionLogDB->where(array('open_id'=>$userInfo['open_id']))->find();

         if($userLog){
             $this->redirect('Question/index');
             exit;
        }



         $answerList = $_POST;
         //p($answerList);
         $trueAnswerSum = 0;
         foreach($answerList as $key =>$answer ){
           // p($this->question[$key]['answer']."--".$answer);


             if($this->question[$key]['answer'] == $answer){
                 $trueAnswerSum++;
             }
         }


         $userLog['open_id'] = $userInfo['open_id'];
         $userLog['true_answer_sum'] = $trueAnswerSum;
         $questionLogDB->data($userLog)->add();

         p($userLog);

         if($trueAnswerSum==10){
             session('to_play','Question');
             $this->redirect('ToPlayRedPacket/index',array('action'=>'Question','actionId'=>'1'));
         }





         $this->trueAnswerSum = $trueAnswerSum;
         $this->redirect('Question/index');


     }







 }
