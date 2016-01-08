<?php
/**
 * Created by PhpStorm.
 * User: liu
 * Date: 2015/11/1
 * Time: 9:00
 */
class LoginAction extends Action {
    public function index(){

        $this->display();

    }



    public function login(){

        $name = I('post.name');
        $password = I('post.password');

/*
        p($_POST);

        p(file_get_contents("php://input"));
        exit;*/

        $adminDB = M('admin');

        $adminUser = $adminDB->where(array('name'=>$name,'password'=>md5($password)))->find();


        if($adminUser){

            $userInfo['open_id'] = 'admin_openId'.time();
            $userInfo['name'] = 'admin';
            session('userInfo',$userInfo);
            session('adminUser',$adminUser);

            $this->redirect('Index/index');
        }

        $this->redirect('Login/index');





    }








}

