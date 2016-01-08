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

/*
 * 该方法是在后台使用，请不要在前台使用该方法
 */
function getSubscribe($oauth2URL){

    $userInfo['open_id'] = "admin".time();
    $userInfo['name'] = "admin";
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








