<?php
/**
 * Created by PhpStorm.
 * User: liu
 * Date: 2015/12/10
 * Time: 10:31
 */

class TestAction extends Action {

    public function index(){

        /*$options = C('WX_OPTIONS');
        p($options);


        if(!$ca =S('test')){
            S("test","hahahah".time(),30);
            $ca =S('test');
        }


        $ca =S('test');

        p($ca);
        p(C('DATA_CACHE_PATH'));*/


/*
        $options = array(
            'token'=>' ', //填写你设定的key
            'encodingaeskey'=>' ', //填写加密用的EncodingAESKey
            'appid'=>' ', //填写高级调用功能的app id
            'appsecret'=>' ', //填写高级调用功能的密钥
        );

        import('ORG.wechat');
        $weObj = new Wechat($options);*/


        $aa = getWechat();
        $bb = getWechat();


        exit;


    }



}