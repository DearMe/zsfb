<?php
/**
 * Created by PhpStorm.
 * User: liu
 * Date: 2015/12/10
 * Time: 10:31
 */

class TestAction extends Action {

    public function index(){
        ini_set('max_execution_time','0');
        import('ORG.wechat');
        $options = array(
            //'token'=>'tokenaccesskey', //填写你设定的key
            //'encodingaeskey'=>'encodingaeskey', //填写加密用的EncodingAESKey
            'appid'=>'wx35a55b1c419603dc', //填写高级调用功能的app id
            'appsecret'=>'ce22a59f9459611c9c38d17721659b95' //填写高级调用功能的密钥
        );
        $weObj = new Wechat($options);



        $userList = $weObj->getUserList();
        $page = (int)ceil($userList['total']/10000);//得出有多少页
        $userDB = M('user');
        $daochuDB =M('daochu');

        $daochuList = array();

      //  p($userList);
        foreach($userList['data']['openid'] as $openid){
           // type=1 AND status=1  array('id'=>array('lt'=>92214),'open_id'=>$openid)
            $user = $userDB->where("id<92214 AND open_id='".$openid."'")->find();
            echo$user['open_id'];
            //如果不存在就写入
            if(!$user){
               /* $userinfo = $weObj->getUserInfo($openid);

                $daochu['open_id'] = $userinfo['openid'];
                $daochu['unionid'] = $userinfo['unionid'];
                $daochu['nickname'] = $userinfo['nickname'];
                $daochu['subscribe_time'] = $userinfo['subscribe_time'];
                p($daochu['open_id']."--".$daochu['unionid']."--".$daochu['nickname']."--".$daochu['subscribe_time']);*/

               //$daochuList[] = $openid;
                p($openid);
                //$daochuDB->data($daochu)->add();

            }

        }


        exit;




        //$url = $weObj->getOauthRedirect(U("Test/index"),$scope='snsapi_base');

        //$oauthAccessToken = $weObj->getOauthAccessToken();

       // $poenid = $oauthAccessToken['openid'];

       /* header("Content-type: text/html; charset=utf-8");

        $openidList = array(
            "oZgcyt317SDpSIprDMtibtm4340A",
            "oZgcyt4AaKL5IrTWpffDlh05MNto",
            "oZgcyt5xgRhEPQBhGrWDdSrpVAl4",
            "oZgcytzQNaPcUZ2-4n5XtVhBe5zY",
            "oZgcyt4aY10Kj8S6FV-jlREkF0k4",
            "oZgcytwy4MY1YD4o5IOTD3C2cIkM",
            "oZgcyt1tK2I2V1LeCjJY2e8vYvzE",
            "oZgcyt4zBt8yAqA7EeBn6A49B1Ig",
            "oZgcyt99pOaxr8hucEPIuDh9e7g0",
        );


        $usrtList = array();


        foreach($openidList as $openid){
            $user = $weObj->getUserInfo($openid);

            array_push($usrtList, $user);
        }



        //$user = $weObj->getUserInfo('oZgcyt4aY10Kj8S6FV-jlREkF0k4');


        p($usrtList);
        exit;*/


    }



    function getAllUser(){
        ini_set('max_execution_time','0');
        import('ORG.wechat');
        $options = array(
            //'token'=>'tokenaccesskey', //填写你设定的key
            //'encodingaeskey'=>'encodingaeskey', //填写加密用的EncodingAESKey
            'appid'=>'wx35a55b1c419603dc', //填写高级调用功能的app id
            'appsecret'=>'ce22a59f9459611c9c38d17721659b95' //填写高级调用功能的密钥
        );
        $weObj = new Wechat($options);

        $userList = $weObj->getUserList();
        $page = (int)ceil($userList['total']/10000);//得出有多少页
        $user2DB = M('user2');

         p($userList);
        foreach($userList['data']['openid'] as $openid) {
            $user2['open_id'] =  $openid;
            $user2DB->data($user2)->add();
        }



        for($i=1;$i<$page;$i++){

            $userList = $weObj->getUserList($userList['next_openid']);

            foreach($userList['data']['openid'] as $openid){
                 $user2Data['open_id']= $openid;
                $user2DB->data($user2Data)->add();
             }
            p($userList);

        }



    }



    function getNewUser(){

        ini_set('max_execution_time','0');
        ini_set('memory_limit','512M');
        import('ORG.wechat');
        $options = array(
            //'token'=>'tokenaccesskey', //填写你设定的key
            //'encodingaeskey'=>'encodingaeskey', //填写加密用的EncodingAESKey
            'appid'=>'wx35a55b1c419603dc', //填写高级调用功能的app id
            'appsecret'=>'ce22a59f9459611c9c38d17721659b95' //填写高级调用功能的密钥
        );
        $weObj = new Wechat($options);

        $userList = $weObj->getUserList();
        $page = (int)ceil($userList['total']/10000);//得出有多少页
        $userDB = M('user');
        $yidong2DB = M('yidong3');

        p("start");
        foreach($userList['data']['openid'] as $openid) {
            $user = $userDB->where(array('open_id'=>$openid))->find();
            if($user==null || $user['id']>92214){
                $yidong2['open_id'] = $openid;
                //p($openid.'<br/>');
                $yidong2DB->data($yidong2)->add();
            }


        }



        for($i=1;$i<$page;$i++){

            $userList = $weObj->getUserList($userList['next_openid']);

            foreach($userList['data']['openid'] as $openid){
                $user = $userDB->where(array('open_id'=>$openid))->find();
                if($user==null || $user['id']>92214){
                    $yidong2['open_id'] = $openid;
                    p($openid.'<br/>');
                    $yidong2DB->data($yidong2)->add();
                }
            }
            p("*******$i*******");

        }

        p("*******end*******");
        exit;



    }


    function localgetuser(){
        echo"helo";
        ini_set('max_execution_time','0');



        $userDB = M('user');
        $user2DB = M('user2');
        $yidong3DB = M('yidong3');

        for($i=1;$i<=119634;$i++){
            $user2 = $user2DB->where(array('id'=>$i))->find();
            $user = $userDB->where(array('open_id'=>$user2['open_id']))->find();
            if(!$user){
                $yidong3['open_id'] = $user2['open_id'];
                $yidong3DB->data($yidong3)->add();
                p($user2['open_id']);
            }

        }

        exit;


    }


    function getAllUserInfo(){
        echo"helo";
        ini_set('max_execution_time','0');
        import('ORG.wechat');
        $options = array(
            //'token'=>'tokenaccesskey', //填写你设定的key
            //'encodingaeskey'=>'encodingaeskey', //填写加密用的EncodingAESKey
            'appid'=>'wx35a55b1c419603dc', //填写高级调用功能的app id
            'appsecret'=>'ce22a59f9459611c9c38d17721659b95' //填写高级调用功能的密钥
        );
        $weObj = new Wechat($options);
        $yidong3DB = M('yidong3');
        $yidong4DB = M('yidong4');

        for($i=11514;$i<=27776;$i++){

            $user = $yidong3DB->where(array('id'=>$i))->find();
            $userinfo = $weObj->getUserInfo($user['open_id']);
            p($user['open_id']);
            $daochu['open_id'] = $userinfo['openid'];
            $daochu['unionid'] = $userinfo['unionid'];
            $daochu['nickname'] = $userinfo['nickname'];
            $daochu['subscribe_time'] = $userinfo['subscribe_time'];
            $yidong4DB->data($daochu)->add();
        }

        exit;



    }




}