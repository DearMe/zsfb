<?php
/**
 * Created by PhpStorm.
 * User: liu
 * Date: 2015/11/11
 * Time: 9:02
 */


class UploadAction extends Action{

    public function pictuieUpload(){

        $sessionid = I('get.PHPSESSID');

        if(!empty($sessionid)){
            session_id($sessionid);

            //echo $sessionid;
        }

        $adminUser = session('adminUser');
        if(empty($adminUser)){
            $this->redirect('Login/index');
        }





        if (!empty($_FILES)) {
            import('ORG.Net.UploadFile');

            $upload = new UploadFile();// 实例化上传类
            $upload->maxSize  = 3145728 ;// 设置附件上传大小
            $upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
            $upload->savePath =  './Uploads/Picture/';// 设置附件上传目录
            $upload->autoSub = true;
            $upload->subType = 'date';
            $upload->dateFormat = 'Ymd';


            if(!$upload->upload()){
                $this->error($upload->getErrorMsg());//获取失败信息
            } else {
                $info = $upload->getUploadFileInfo();//获取成功信息

                $arr = explode("/",$info[0]['savename']);
                $date = $arr[0];



                $savePath = '../index/vote/Uploads/Picture/'.$date;
                $savePathName = '../index/vote/Uploads/Picture/'.$info[0]['savename'];
                $inPathName = './Uploads/Picture/'.$info[0]['savename'];

                if(!is_dir($savePath)){
                    mkdir($savePath);
                }
                copy($inPathName,$savePathName);
                /*
                                p($aa);

                                p($savePath);
                                p($savePathName);
                                p($inPathName);*/

            }
            echo $info[0]['savename'];    //返回文件名给JS作回调用
        }
    }




}