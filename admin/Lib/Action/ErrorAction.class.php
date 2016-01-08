<?php
/**
 * Created by PhpStorm.
 * User: liu
 * Date: 2015/11/30
 * Time: 9:38
 */

class ErrorAction extends Action {

    //关注页面
    public function WXfollow(){
        $this->display();

    }

    //不是微信浏览器页面
    public function errWXBrowser(){
        $this->display();
    }


}