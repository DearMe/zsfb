<?php
/**
 * Created by PhpStorm.
 * User: liu
 * Date: 2015/11/24
 * Time: 9:12
 * 红包Action
 */

class RedPacketAction extends CommonAction {

    public function index(){
        $this->display();
    }


    //投票列表页的ajax数据
    public function tableAJAX () {

        $pageNum = $_GET['draw'] ;
        if($pageNum<=0){
            $pageNum = 1;
        }

        $redpacketDB = M('redpacket');
        import('ORG.Util.Page');// 导入分页类
        $recordsTotal = $redpacketDB->count();// 查询满足要求的总记录数 $map表示查询条件

        $page = new Page($recordsTotal);// 实例化分页类 传入总记录数
        $page->firstRow =  $_GET['start'];
        $page->listRows = $_GET['length'];

        $search = $_GET['search']['value'];
        if(strlen($search)>0){

            $list = $redpacketDB->where("name like '%".$search."%'")->order('id desc')->limit($page->firstRow.','.$page->listRows)->select();
            $recordsFiltered = $redpacketDB->where("name like '%".$search."%'")->count();

        }else{
            $list = $redpacketDB->order('id desc')->limit($page->firstRow.','.$page->listRows)->select();
            $recordsFiltered = $recordsTotal;
        }


        $infos = array();
        foreach($list as $v){
            $state = "";
            if($v['is_open']==1){
                $state = "开启";
            }else{
                $state = "关闭";
            }

            $doButton = '<button name="del" id="'.$v['id'].'" class="btn btn-icon waves-effect waves-light btn-danger m-b-5"> <i class="fa fa-remove"></i><span> 删除</span></button> ';
            $doButton .= '<button name="edit" id="'.$v['id'].'" class="btn btn-icon waves-effect waves-light btn-warning m-b-5"> <i class="fa fa-edit"></i><span> 编辑</span></button> ';
            $doButton .= '<button name="show" id="'.$v['id'].'" class="btn btn-icon waves-effect waves-light btn-success m-b-5"> <i class="fa fa-wrench"></i><span> 查看</span></button>';
            $data = array($v['id'],$v['name'],$state,$doButton);
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



    private function getTpl(){
        //获取所有的模板
        $dir = "./Tpl/PlayRedPacket";

        $handler = opendir($dir);
        while (($filename = readdir($handler)) !== false) {

            if ($filename != "." && $filename != "..") {
                $files[] = $filename ;
            }
        }

        closedir($handler);

        //打印所有文件名
        foreach ($files as $value) {
            $tplList[] = basename($value,".html");
        }

        return $tplList;

    }






    //添加操作
    public function add(){

        $this->tplList = $this->getTpl();
        $this->display();

    }

    public function doAdd(){

        if(IS_POST){


            $redpacketData['name'] = I('post.redpacket_name');
            $redpacketData['start_time'] = strtotime(I('post.redpacket_start_time'));
            $redpacketData['end_time'] = strtotime(I('post.redpacket_end_time'));
            $redpacketData['join_num'] = I('post.redpacket_join_num');
            $redpacketData['to_play'] = I('post.redpacket_to_play');
            $redpacketData['info'] = I('post.redpacket_info');
            $redpacketData['is_open'] = I('post.redpacket_is_open')=='on' ? 1 : 0;
            $redpacketData['tpl'] = I('post.redpacket_tpl');


           /* p($redpacketData);
            die;*/

            $prizeDataArr['id'] = I('post.prize_id');
            $prizeDataArr['name'] = I('post.prize_name');
            $prizeDataArr['num'] = I('post.prize_num');


            P($prizeDataArr);


            $redpacketDB = M('redpacket');
            $prizeDB = M('redpacket_prize');

            $redpacket_id = $redpacketDB->data($redpacketData)->add();
            $prizeData = array();
            for($i=0;$i<count($prizeDataArr['id']);$i++){
                if($prizeDataArr['id'][$i]<0){

                    $prizeData[$i]['name'] = $prizeDataArr['name'][$i];
                    $prizeData[$i]['num'] = $prizeDataArr['num'][$i];


                    $prizeData[$i]['redpacket_id'] = $redpacket_id;
                }
            }

            $prizeDB->addAll($prizeData);
            $this->redirect('RedPacket/index');

        }


    }



    public function edit(){

        $id = I('get.id');
        $redpacketDB = M('redpacket');
        $prizeDB = M('redpacket_prize');

        $redpacket = $redpacketDB->where('id='.$id)->find();
        $prizelist = $prizeDB->where('redpacket_id='.$redpacket['id'])->select();

        $redpacket['info'] = htmlspecialchars_decode( $redpacket['info']);

        $this->tplList = $this->getTpl();
        $this->redpacket = $redpacket;
        $this->prizelist =  $prizelist;
        $this->display();


    }


    public function doEdit(){


        if(IS_POST){
            //获取修改的投票数据
            $redpacket_id = I('post.redpacket_id');
            $redpacketData['id'] = I('post.redpacket_id');
            $redpacketData['name'] = I('post.redpacket_name');
            $redpacketData['start_time'] = strtotime(I('post.redpacket_start_time'));
            $redpacketData['end_time'] = strtotime(I('post.redpacket_end_time'));
            $redpacketData['join_num'] = I('post.redpacket_join_num');
            $redpacketData['to_play'] = I('post.redpacket_to_play');
            $redpacketData['info'] = I('post.redpacket_info');
            $redpacketData['is_open'] = I('post.redpacket_is_open')=='on' ? 1 : 0;
            $redpacketData['tpl'] = I('post.redpacket_tpl');

            $prizeDataArr['id'] = I('post.prize_id');
            $prizeDataArr['name'] = I('post.prize_name');
            $prizeDataArr['num'] = I('post.prize_num');


            //创建数据库连接
            $redpacketDB = M('redpacket');
            $prizeDB = M('redpacket_prize');

            //修改vote数据
            $redpacketDB->save($redpacketData);



            $prizeDataEdit = array();//需要修改或者删除的数据
            $prizeDataAdd = array();//需要添加的数据

            for($i=0;$i<count($prizeDataArr['id']);$i++){
                if($prizeDataArr['id'][$i]>0){//需要修改的或者删除的
                    $prizeEditTemp['id'] = $prizeDataArr['id'][$i];
                    $prizeEditTemp['name'] = $prizeDataArr['name'][$i];
                    $prizeEditTemp['num'] = $prizeDataArr['num'][$i];

                    /*$optionEditTemp['opt_count'] = 0;*/
                    $prizeEditTemp['redpacket_id'] = $redpacketData['id'];

                    array_push($prizeDataEdit,$prizeEditTemp);

                }else{//需要添加的
                    $prizeAddTemp['name'] = $prizeDataArr['name'][$i];
                    $prizeAddTemp['num'] = $prizeDataArr['num'][$i];

                    $prizeAddTemp['redpacket_id'] = $redpacketData['id'];
                    array_push($prizeDataAdd,$prizeAddTemp);
                }
            }

             //p($prizeDataEdit);
             //p($prizeDataAdd);


            //die;


            //获取该投票的所有选项
            $prizeIdList = $prizeDB->field('id')->where('redpacket_id='.$redpacketData['id'])->select();
            $prizeIdList = twoArr2oneArr($prizeIdList);
            // p($optionIdList);

            //循环修改存在的数据
            for($i=0;$i<count($prizeDataEdit);$i++){
                $prizeDB->save($prizeDataEdit[$i]);
                unset($prizeIdList[array_search($prizeDataEdit[$i]['id'] , $prizeIdList)]);
            }



            //循环删除不需要的数据
            foreach ($prizeIdList as $prizeId){
                //echo $optionId;
                $prizeDB->where('id='.$prizeId)->delete();
            }


            //把新加入的数据加入
            $prizeDB->addAll($prizeDataAdd);


        }


        $this->redirect('RedPacket/edit',array('id'=>$redpacketData['id']));


    }


    public function del(){
        $id = I('get.id');
        $redpacketDB = M('redpacket');
        $prizeDB = M('redpacket_prize');

        $redpacketDB->where('id='.$id)->delete();
        $prizeDB->where('redpacket_id='.$id)->delete();


        $this->redirect('RedPacket/index');
    }


}