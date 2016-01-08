<?php
/**
 * Created by PhpStorm.
 * User: liu
 * Date: 2015/11/1
 * Time: 9:16
 */

class CommonAction extends Action{
    public function _initialize () {



        $adminUser = session('adminUser');
        if(empty($adminUser)){
            $this->redirect('Login/index');
        }



    }
}