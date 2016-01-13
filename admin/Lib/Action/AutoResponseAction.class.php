<?php
/**
 * Created by IntelliJ IDEA.
 * User: ruanqx
 * Date: 2015/12/31
 * Time: 10:28
 */
class AutoResponseAction extends Action {

    private function readFromIndexByPost(){
        $data['id'] = I('post.id');
        $data['key'] = I('post.key');
        $data['type'] = I('post.type');
        $data['text'] = I('post.text');
        $data['media_id'] = I('post.media_id');
        $data['title'] = I('post.title');
        $data['description'] = I('post.description');
        $data['music_url'] = I('post.music_url');
        $data['pic_url'] = I('post.picUrl');
        $data['text_url'] = I('post.url');
        $data['status'] = I('post.status');
        $data['msg_type'] = I('post.msg_type');
        $data['sub_msg_type'] = I('post.sub_msg_type');
        return $data;
    }

    public function index(){
        $this->display();
    }

    public function add(){
        $data = $this->readFromIndexByPost();
        $autoResponseDB = M('auto_response');
        $autoResponseDB->data($data)->add();
        $this->redirect("AutoResponse/index");
    }

    public function delete(){
        $id = I('get.id');
        $autoResponseDB = M('auto_response');
        $autoResponseDB->where(array('id'=>$id))->delete();
        $this->redirect("AutoResponse/index");
    }

    public function changeStatus(){
        $id = I('get.id');
        $autoResponseDB = M('auto_response');
        $item = $autoResponseDB->where(array('id'=>$id))->find();
        $item['status'] = ($item['status'] == 1) ? 0 : 1;
        $autoResponseDB->save($item);
        $this->redirect("AutoResponse/index");
    }

    public function tableAJAX(){
        $pageNum = I('get.draw');
        if($pageNum <= 0)
            $pageNum = 1;

        $autoResponseDB= M('auto_response');
        import('ORG.Util.Page');
        $recordsTotal = $autoResponseDB->count();

        $page = new Page($recordsTotal);
        $page->firstRow = I('get.start');
        $page->listRows = I('get.length');

        $search = I('get.search.value');
        if(strlen($search) > 0){
            $list = $autoResponseDB->where("key like '%".$search."%'")->order('id desc')->limit($page->firstRow.','.$page->listRows)->select();
            $recordsFiltered = $autoResponseDB->where("key like '%".$search."%'")->count();
        }else{
            $list = $autoResponseDB->order('id desc')->limit($page->firstRow.','.$page->listRows)->select();
            $recordsFiltered = $recordsTotal;
        }
        $information = array();
        foreach ($list as $item) {
            if($item[status] == 1) {
                $status = "有效";
                $doButton = '<button name="del" id="'.$item['id'].'" class="btn btn-icon waves-effect waves-light btn-danger m-b-5"> <i class="fa fa-remove"></i><span> 删除 </span></button> ';
                $doButton.= '<button name="edit" id="'.$item['id'].'" class="btn btn-icon waves-effect waves-light btn-primary m-b-5"> <i class="fa fa-edit"></i><span> 编辑 </span></button> ';
                $doButton.= '<button name="changeStatus" id="'.$item['id'].'" class="btn btn-icon waves-effect waves-light btn-warning m-b-5"> <i class="fa fa-edit"></i><span> 取消启用</span></button> ';
            }
            else {
                $status = "无效";
                $doButton = '<button name="del" id="'.$item['id'].'" class="btn btn-icon waves-effect waves-light btn-danger m-b-5"> <i class="fa fa-remove"></i><span> 删除 </span></button> ';
                $doButton.= '<button name="edit" id="'.$item['id'].'" class="btn btn-icon waves-effect waves-light btn-primary m-b-5"> <i class="fa fa-edit"></i><span> 编辑 </span></button> ';
                $doButton.= '<button name="changeStatus" id="'.$item['id'].'" class="btn btn-icon waves-effect waves-light btn-success m-b-5"> <i class="fa fa-edit"></i><span> 启用</span></button> ';
            }
            $data = array($item['id'], $item['key'], $item['type'], $status, $doButton);
            array_push($information, $data);
        }
        $jsonData = array(
            'draw' => intval($pageNum), //第几页
            'recordsTotal' => intval($recordsTotal), 		//总条数
            'recordsFiltered' => intval($recordsFiltered), //总共多少页
            'data' => $information,
        );

        echo json_encode($jsonData);

    }

    public function getItem(){
        $id = I('get.id');
        $autoResponseDB= M('auto_response');
        $item = $autoResponseDB->where('id='.$id)->find();
        echo json_encode($item);
        exit;
    }

    public function edit()
    {
        $data = $this->readFromIndexByPost();
        $autoResponseDB= M('auto_response');
        $autoResponseDB->save($data);
        $this->redirect("AutoResponse/index");
    }
}