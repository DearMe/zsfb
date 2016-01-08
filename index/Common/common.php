<?php
/**
 * Created by PhpStorm.
 * User: liu
 * Date: 2015/10/30
 * Time: 9:21
 */


function p($arr){
    

    echo"<pre>";
    print_r($arr);
    echo"</pre>";


}


function twoArr2oneArr($arr){
    $arrBak = array();

    for($i=0;$i<count($arr);$i++){

        $arrBak[$i] = $arr[$i]['id'];

    }

    return $arrBak;
}


/********************微信接口相关函数*************************/

function getWeObj(){
    global $weObj;//添加为全局变量
    if(!$weObj){
        import('ORG.wechat');
        $weObj = new Wechat(C('WX_OPTIONS'));
    }
    return $weObj;
}


//判断是不是微信浏览器
function isWeixinBrowser() {
    $agent = $_SERVER ['HTTP_USER_AGENT'];
    if (! strpos ( $agent, "icroMessenger" )) {
        return false;
    }
    return true;
}



function getSubscribe($oauth2URL){
    //如果不是微信浏览器
    if(!isWeixinBrowser()){
        //跳转到提示不是微信浏览器页面
        header("location:".U("Error/errWXBrowser"));
        exit;
    }
    $weObj = getWeObj();


    $oauth2URL = 'http://'.$_SERVER['SERVER_NAME'].$oauth2URL;
    //没有code就添加code
    if(empty($_REQUEST ['code'])){
        //跳转到关注页面
        header($weObj->getOauthRedirect($oauth2URL, "","snsapi_base"));

        exit;
    }else{
        $code = $_REQUEST ['code'];
       // print_r($code);
    }



    $openidArr = $weObj->getOauthAccessToken();

    p("$openidArr");

    $openid = $openidArr['openid'];
    if($openid ==""){
        header($weObj->getOauthRedirect($oauth2URL, "","snsapi_base"));
        exit;
    }

    $usrInfoArr= array();

    $usrInfoArr = $weObj->getUserInfo();
    if(!$usrInfoArr){
        if($weObj->errCode=="40001"){
            //$weObj->removeCache();
            $usrInfoArr = $weObj->getUserInfo();
        }
    }


    p($usrInfoArr);
    exit;


    if ($usrInfoArr['subscribe'] != "1"){
        //跳转到关注页面
        header("location:".U("Error/WXfollow"));
        exit;
    }


    $userInfo['open_id'] = $openid;
    $userInfo['name'] = $usrInfoArr['nickname'];
    return $userInfo;




}


function getUserInfo( $oauth2URL ){


    $userInfo = session('userInfo');
    if($userInfo){
        return $userInfo;
    }

    $userInfo = getSubscribe( $oauth2URL );
    session('userInfo',$userInfo);

    return $userInfo;






}


