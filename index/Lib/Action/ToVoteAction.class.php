<?php
/**
 * Created by PhpStorm.
 * User: liu
 * Date: 2015/10/30
 * Time: 18:00
 */


class ToVoteAction extends Action
{
    public function index()
    {

        //获取微信用户信息
        $userInfo = getUserInfo();

        $id = I('get.id');//vote的id

        //创建数据库连接
        $voteDB = M('vote');
        $vote_optionDB = M('vote_option');
        $vote_logDB = M('vote_log');


        //根据vote的id获取投票的信息
        $vote = $voteDB->where('id='.$id)->find();

        $vote['description'] = htmlspecialchars_decode($vote['description']);
        $vote['bottominfo'] = htmlspecialchars_decode($vote['bottominfo']);





        //如果不存在，跳转....
        if(empty($vote['id'])){
            header("location:".C('ERR_TO_URL'));
        }





        $state = 0;//状态标识,投票关闭0，投票进行中1，投票时间没有到2，投票时间过期3，已经投票|今天已经投票4
        $stateSon = "";//状态说明
        if($vote['is_open']==1){
            $nowTime = time();
            //echo $nowTime;
            if($nowTime <= $vote['start_time']){
                $state=2;//投票没有开始
                $stateSon="投票时间还没有到";
            }elseif($nowTime > $vote['start_time'] && $nowTime < $vote['end_time']){
                $state = 1;//投票进行中
                $stateSon="投票进行中";
            }else{
                $state = 3;//投票过期
                $stateSon="投票时间已经结束";
            }
        }else{
            $state = 0;//投票关闭
            $stateSon="投票已经关闭";
        }



       $lastVote =  $vote_logDB->where(array('vote_id'=>$id,'open_id'=>$userInfo['open_id']))->order('id desc')->find();

        if($lastVote){
            $nowDateStr = date("Y-m-d");
            $nowTime = strtotime($nowDateStr);

            if($lastVote['vote_time']>$nowTime){

                    $state = 4;
                    $stateSon="你今天已经投过票了。";
            }

        }


       /* if($useVoteNo>0){
            $state = 4;
            $stateSon="你已经投过票了";
        }*/

        $this->stateSon = $stateSon;
        $this->state = $state;



        $optionlist = $vote_optionDB->where('vote_id='.$vote['id'])->select();
        $optionNo = $vote_optionDB->where('vote_id='.$vote['id'])->count();
        $page_rows = $vote['page_rows'];

        $optionG = (int)ceil($optionNo/$page_rows);
        $this->optionG = $optionG;

        $this->vote = $vote;
        $this->optionlist = $optionlist;
        $this->display();


    }


    public function join(){

        $userInfo = getUserInfo();
        $voteId = I('post.vote_id');

        //创建数据库连接
        $voteDB = M('vote');
        $vote_logDB = M('vote_log');
        $vote_optionDB = M('vote_option');

        $vote = $voteDB->where('id='.$voteId)->find();
        //判断是否能投票

        $state = 0;
        if($vote['is_open']==1){
            $nowTime = time();
            //echo $nowTime;
            if($nowTime <= $vote['start_time']){
                $state=2;//投票没有开始

            }elseif($nowTime > $vote['start_time'] && $nowTime < $vote['end_time']){
                $state = 1;//投票进行中

            }else{
                $state = 3;//投票过期

            }
        }else{
            $state = 0;//投票关闭

        }

        $lastVote =  $vote_logDB->where(array('vote_id'=>$voteId,'open_id'=>$userInfo['open_id']))->order('id desc')->find();

        if($lastVote){
            $nowDateStr = date("Y-m-d");
            $nowTime = strtotime($nowDateStr);
            if($lastVote['vote_time']>$nowTime){
                $state = 4;
            }

        }

        if($state != 1){
            header("location:https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx35a55b1c419603dc&redirect_uri=http://zsfbwx.zsbtv.com.cn/vote/index.php?s=/ToVote/index/id/".$voteId.".html&response_type=code&scope=snsapi_base&connect_redirect=1&from=singlemessage&isappinstalled=0#wechat_redirect");
            exit;
        }


        unset($_POST['vote_id']);

        $optionIdArr = $_POST;




        //增加票数
        foreach($optionIdArr as $key => $optionId){

            if(substr($key,0,6) == 'option'){

                $option = $vote_optionDB->where('id='.$optionId)->find();
                if($option){
                    $option['opt_count'] = $option['opt_count']+1;
                    $vote_optionDB->data($option)->save();
                }
                $vote_log['vote_id'] = $voteId;
                $vote_log['option_id'] = $optionId;
                $vote_log['open_id'] = $userInfo['open_id'];
                $vote_log['name'] = $userInfo['name'];
                $vote_log['vote_time'] = time();
                p($vote_log);

                $vote_logDB->data($vote_log)->add();
                //die;
            }

        }


        $this->redirect('ToVote/index',array('id'=>$voteId));



    }



    public function optionPage(){
        $id= I('get.id');
        $page = I('get.page');




        $vote_optionDB = M('vote_option');
        $voteDB = M('vote');
        $vote = $voteDB->where('id='.$id)->find();


        $rowNo = $vote['page_rows'];
        $firstRow = ($page-1)*$rowNo;
        $optionList = $vote_optionDB->where('vote_id='.$id)->limit($firstRow.','.$rowNo)->select();

        //所有投票的总数
        $optAllNo = $vote_optionDB->where('vote_id='.$id)->sum('opt_count');

        for($i=0;$i<count($optionList);$i++){
            $optionList[$i]['percent'] = round($optionList[$i]['opt_count'] * 100 /$optAllNo , 1);
        }

        $this->optionList = $optionList;
        $this->vote = $vote;
        $this->display();

    }



    public function ajaxOptionDetial(){
        if(IS_POST){
            $optionId = I('post.optionId');
            $option_detailDB = M('vote_option_detail');
            $vote_optionDB = M('vote_option');

            $vote_option = $vote_optionDB->where(array('id'=>$optionId))->find();
            $option_detail = $option_detailDB->where(array('option_id'=>$optionId))->find();
            //p($vote_option);
            $bakArr['option_name'] = $vote_option['name'];
            $bakArr['content'] = htmlspecialchars_decode($option_detail['content']);

            $bakJson = json_encode($bakArr);
            echo $bakJson;
            exit;

        }
        exit;


    }



    public function userInfo(){
        $user = array();
        $userInfo = getUserInfo();
        if($userInfo['open_id'] != null || $userInfo['open_id'] != ""){
            $userDB = M('user');
            $user = $userDB->where('openid='.$userInfo['open_id'])->find();
        }
        $this->user = $user;
        $this->display();
    }

    public function addUser(){
        if(IS_POST){
            $name = I('post.name');
            $phone= I('post.phone');
            $vote_id = I('post.vote_id');
        }
        $userInfo = getUserInfo();
        $userDB = M('user');
        $user = $userDB->where('openid='.$userInfo['open_id'])->find();
        $user['name'] = $name;
        $user['phone'] = $phone;
        if($userInfo['open_id'] != null || $userInfo['open_id'] != ""){
            $userDB->add($user);
        }else{
            $userDB->save($user);
        }
        $this->redirect('ToVote/index',array('id'=>$vote_id));
    }

    public function getLiveVoteId(){
        return F("voteId", "", C('DATA_CACHE_PATH') );
    }
}