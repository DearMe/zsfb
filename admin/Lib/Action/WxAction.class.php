<?php
/**
 * Created by PhpStorm.
 * User: liu
 * Date: 2015/9/4
 * Time: 11:09
 */

class WxAction extends Action{
    public function _initialize () {
        $adminUser = session('adminUser');
        if($adminUser){
            $userInfo['open_id'] = 0;
            $userInfo['name'] = 'admin';
            session('userInfo',$userInfo);
        }
        getUserInfo();

    }
}