<?php
/**
 * Created by PhpStorm.
 * User: liu
 * Date: 2015/10/29
 * Time: 9:03
 */


class VoteAction extends CommonAction {

    //首页
    public function index(){
        $this->display();
    }

    //投票列表页的ajax数据
    public function tableAJAX () {

        $pageNum = $_GET['draw'] ;
        if($pageNum<=0){
            $pageNum = 1;
        }

        $voteDB = M('vote');
        import('ORG.Util.Page');// 导入分页类
        $recordsTotal = $voteDB->count();// 查询满足要求的总记录数 $map表示查询条件

        $page = new Page($recordsTotal);// 实例化分页类 传入总记录数
        $page->firstRow =  $_GET['start'];
        $page->listRows = $_GET['length'];

        $search = $_GET['search']['value'];
        if(strlen($search)>0){

            $list = $voteDB->where("title like '%".$search."%'")->order('id desc')->limit($page->firstRow.','.$page->listRows)->select();
            $recordsFiltered = $voteDB->where("title like '%".$search."%'")->count();

        }else{
            $list = $voteDB->order('id desc')->limit($page->firstRow.','.$page->listRows)->select();
            $recordsFiltered = $recordsTotal;
        }


        $infos = array();
        foreach($list as $v){
            $state = "";
            if($v['is_open']==1){
                $nowTime = time();
                //echo $nowTime;
                if($nowTime <= $v['start_time']){
                    $state="投票时间没有到";
                }elseif($nowTime > $v['start_time'] && $nowTime < $v['end_time']){
                    $state = "投票进行中";
                }else{
                    $state = "投票时间已结束";
                }
            }else{
                $state = "投票已关闭";
            }

            $doButton = '<button name="del" id="'.$v['id'].'" class="btn btn-icon waves-effect waves-light btn-danger m-b-5"> <i class="fa fa-remove"></i><span> 删除</span></button> ';
            $doButton .= '<button name="edit" id="'.$v['id'].'" class="btn btn-icon waves-effect waves-light btn-warning m-b-5"> <i class="fa fa-edit"></i><span> 编辑</span></button> ';
            $doButton .= '<button name="show" id="'.$v['id'].'" class="btn btn-icon waves-effect waves-light btn-success m-b-5"> <i class="fa fa-wrench"></i><span> 查看</span></button>';
            $doButton .= '<button name="res" id="'.$v['id'].'" class="btn btn-icon waves-effect waves-light btn-primary m-b-5"> <i class="fa  fa-database"></i><span> 结果</span></button> ';
            $data = array($v['id'],$v['title'],$v['max_c'],$state,$doButton);
            array_push($infos,$data);
        }

        $jsonData = array(
            'draw' => intval($pageNum), //第几页
            'recordsTotal' => intval($recordsTotal), 		//总条数
            'recordsFiltered' => intval($recordsFiltered), //总共多少页
            'data' => $infos
        );

        echo json_encode($jsonData);

    }

    //添加投票
    public function  add(){
        $this->display();
    }
    //获取添加投票表单并写入数据库
    public function doAdd(){
        if(IS_POST){
            $voteData['title'] = I('post.vote_title');
            $voteData['description'] = I('post.vote_description');
            $voteData['bottominfo'] = I('post.vote_bottominfo');
            $voteData['is_open'] = I('post.vote_is_open')=='on' ? 1 : 0;
            $voteData['start_time'] = strtotime(I('post.vote_start_time'));
            $voteData['end_time'] = strtotime(I('post.vote_end_time'));
            $voteData['img'] = I('post.vote_img');
            $voteData['max_c'] = I('post.vote_max_c');
            $voteData['c_time'] = time();
            $voteData['is_detail'] = I('post.vote_is_detail')=='on' ? 1 : 0;
            $voteData['page_rows'] = I('post.vote_page_rows');


            //print_r($voteData);


            $optionDataArr['id'] = I('post.option_id');
            $optionDataArr['name'] = I('post.option_name');
            $optionDataArr['img'] = I('post.option_img');
            $optionDataArr['order'] = I('post.option_order');
            $optionDataArr['opt_count'] = 0;



            $voteDB = M('vote');
            $vote_optionDB = M('vote_option');

            $vote_id = $voteDB->data($voteData)->add();
            $optionData = array();
            for($i=0;$i<count($optionDataArr['id']);$i++){
                 if($optionDataArr['id'][$i]<0){
                     $optionData[$i]['name'] = $optionDataArr['name'][$i];
                     $optionData[$i]['img'] = $optionDataArr['img'][$i];
                     $optionData[$i]['order'] = $optionDataArr['order'][$i];
                     $optionData[$i]['opt_count'] = 0;
                     $optionData[$i]['vote_id'] = $vote_id;
                 }
            }

           // p($optionData);

            $vote_optionDB->addAll($optionData);

           // die;
            $this->redirect('Vote/index');



        }
    }

    //投票编辑
    public function edit(){
        $id = I('get.id');
        $voteDB = M('vote');
        $vote_optionDB = M('vote_option');

        //echo $id;

        $vote = $voteDB->where('id='.$id)->find();
        $optionlist = $vote_optionDB->where('vote_id='.$vote['id'])->select();



        $vote['description'] = htmlspecialchars_decode($vote['description']);
        $vote['bottominfo'] = htmlspecialchars_decode($vote['bottominfo']);

       // p($vote);
        //p($optionlist);
        //die;

        $this->vote = $vote;
        $this->optionlist =  $optionlist;
        $this->display();


    }

//    保存编辑
    public function doedit(){
        if(IS_POST){
            //获取修改的投票数据
            $id = I('post.vote_id');
            $voteData['id'] = $id;
            $voteData['title'] = I('post.vote_title');
            $voteData['description'] = I('post.vote_description');
            $voteData['bottominfo'] = I('post.vote_bottominfo');
            $voteData['is_open'] = I('post.vote_is_open')=='on' ? 1 : 0;
            $voteData['start_time'] = strtotime(I('post.vote_start_time'));
            $voteData['end_time'] = strtotime(I('post.vote_end_time'));
            $voteData['img'] = I('post.vote_img');
            $voteData['max_c'] = I('post.vote_max_c');
            $voteData['is_detail'] = I('post.vote_is_detail')=='on' ? 1 : 0;
            $voteData['page_rows'] = I('post.vote_page_rows');

            //创建数据库连接
            $voteDB = M('vote');
            $vote_optionDB = M('vote_option');

            //修改vote数据
            $voteDB->save($voteData);

            //获取表单的选项
            $optionDataArr['id'] = I('post.option_id');
            $optionDataArr['name'] = I('post.option_name');
            $optionDataArr['img'] = I('post.option_img');
            $optionDataArr['order'] = I('post.option_order');

            $optionDataEdit = array();//需要修改或者删除的数据
            $optionDataAdd = array();//需要添加的数据

            for($i=0;$i<count($optionDataArr['id']);$i++){
                if($optionDataArr['id'][$i]>0){//需要修改的或者删除的
                    $optionEditTemp['id'] = $optionDataArr['id'][$i];
                    $optionEditTemp['name'] = $optionDataArr['name'][$i];
                    $optionEditTemp['img'] = $optionDataArr['img'][$i];
                    $optionEditTemp['order'] = $optionDataArr['order'][$i];
                    /*$optionEditTemp['opt_count'] = 0;*/
                    $optionEditTemp['vote_id'] = $id;

                    array_push($optionDataEdit,$optionEditTemp);

                }else{//需要添加的
                    $optionAddTemp['name'] = $optionDataArr['name'][$i];
                    $optionAddTemp['img'] = $optionDataArr['img'][$i];
                    $optionAddTemp['order'] = $optionDataArr['order'][$i];
                    $optionAddTemp['opt_count'] = 0;
                    $optionAddTemp['vote_id'] = $id;
                    array_push($optionDataAdd,$optionAddTemp);
                }
            }

            p($optionDataAdd);
           // p($optionDataEdit);


            //die;


            //获取该投票的所有选项
            $optionIdList = $vote_optionDB->field('id')->where('vote_id='.$id)->select();
            $optionIdList = twoArr2oneArr($optionIdList);
           // p($optionIdList);

            //循环修改存在的数据
            for($i=0;$i<count($optionDataEdit);$i++){
                $vote_optionDB->save($optionDataEdit[$i]);
                unset($optionIdList[array_search($optionDataEdit[$i]['id'] , $optionIdList)]);
            }



            //循环删除不需要的数据
            foreach ($optionIdList as $optionId){
                echo $optionId;
                $vote_optionDB->where('id='.$optionId)->delete();
            }


            //把新加入的数据加入
            $vote_optionDB->addAll($optionDataAdd);


        }


        $this->redirect('Vote/edit',array('id'=>$id));


    }

    //删除一个投票操作
    public function del(){
        $id = I('get.id');
        $voteDB = M('vote');
        $vote_optionDB = M('vote_option');

        $voteDB->where('id='.$id)->delete();
        $vote_optionDB->where('vote_id='.$id)->delete();

        //p($id);
        //die;


        $this->redirect('Vote/index');


    }

//结果页面展示
    public function  result(){

        $voteId = I('get.id');
        $voteDB = M('vote');
        $vote_optionDB = M('vote_option');

        $vote = $voteDB->where(array('vote_id'=>$voteId))->find();
        $optionList = $vote_optionDB->where(array('vote_id'=>$voteId))->order('opt_count desc')->select();

        //p($optionList);


        $optAllSum = $vote_optionDB->where('vote_id='.$voteId)->sum('opt_count');

        for($i=0;$i<count($optionList);$i++){
            $optionList[$i]['percent'] = round($optionList[$i]['opt_count'] * 100 /$optAllSum , 1);
        }

        //p($optionList);
        $this->optAllSum = $optAllSum;
        $this->vote = $vote;
        $this->optionList = $optionList;
        $this->display();

    }

    public function editOptionDetial(){

        $optionId = I('get.optionId');
        $voteId = I('get.voteId');
        $option_detailDB = M('vote_option_detail');

        $option_detail = $option_detailDB->where(array('option_id'=>$optionId))->find();

        if(!$option_detail){
            $option_detail_data['option_id'] = $optionId;
            $option_detail_data['content'] = "";
            $option_detailDB->data($option_detail_data)->add();
        }

        $option_detail = $option_detailDB->where(array('option_id'=>$optionId))->find();

        $option_detail['content'] = htmlspecialchars_decode($option_detail['content']);


        $this->option_detail = $option_detail;
        $this->optionId = $optionId;
        $this->voteId = $voteId;

        $this->display();

    }

    public function ajaxOptionDetial(){

        $optionId = I('post.optionId');

        $option_detailDB = M('vote_option_detail');

        $option_detail = $option_detailDB->where(array('option_id'=>$optionId))->find();

        $option_detail['content'] = htmlspecialchars_decode($option_detail['content']);

        echo $option_detail['content'];
        exit;

    }

    public function doEditOptionDetial(){

        $optionId = I('post.optionId');
        $content = I('post.content');
        $option_detailDB = M('vote_option_detail');

        $option_detail['content'] = $content;


        $option_detailDB->where(array('option_id'=>$optionId))->data($option_detail)->save();


    }
//图片上传接收方法
    public function pictuieUpload(){


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


    public function setVoteId(){
        if(IS_POST){
            $vote_id = I('post.id');
            F("voteId", $vote_id, C('DATA_CACHE_PATH'));
        }
        $this->redirect('ToVote/index',array('id'=>$vote_id));
    }





}