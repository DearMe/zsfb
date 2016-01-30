<?php
/**
 * Created by PhpStorm.
 * User: liu
 * Date: 2015/12/11
 * Time: 15:17
 */
class GetRevAction extends Action {
    private  $weObj;
    private function sendMSG($item){
        $this->weObj = getWeObj();
        $this->weObj->valid();
        if($item['type'] == 'text'){
            $this->weObj->text($item['text'])->reply();
        }else if($item['type'] == 'image'){
            $this->weObj->image($item['media_id'])->reply();
        }else if($item['type'] == 'voice'){
            $this->weObj->voice($item['media_id'])->reply();
        }else if($item['type'] == 'video'){
            $this->weObj->video($item['media_id'], $item['title'], $item['description'])->reply();
        }else if($item['type'] == 'music'){
            //
        }else if($item['type'] == 'news'){
            $data = array(
                "0" => array(
                    'Title' => $item['title'],
                    'Description' => $item['description'],
                    'PicUrl' => 'http://'.$_SERVER['SERVER_NAME'].'/Uploads/Picture/'.$item['pic_url'],
                    'Url' => $item['text_url'],
                ),
            );
            $this->weObj->news($data)->reply();
        }
    }


    public function index(){
        $this->weObj = getWeObj();
        $this->weObj->valid();
        $type = $this->weObj->getRev()->getRevType();

        $autoResponseDB = M('auto_response');

        if($type == Wechat::MSGTYPE_TEXT){
            $content = $this->weObj->getRevContent();
            $itemList = $autoResponseDB->where(array('key' => $content, 'status' => 1))->select();
            foreach($itemList as $item) {
                $this->sendMSG($item);
            }
        }else if($type == Wechat::MSGTYPE_IMAGE){
        }else if($type == Wechat::MSGTYPE_LOCATION){
        }else if($type == Wechat::MSGTYPE_LINK){
        }else if($type == Wechat::MSGTYPE_EVENT){
            $event_type = $this->weObj->getRevEvent();
            if($event_type['event'] == Wechat::EVENT_SUBSCRIBE){
                $itemList = $autoResponseDB->where(array('status' => 1, 'msg_type' => 'event', 'sub_msg_type' => $event_type['event']))->select();
                foreach($itemList as $item_event) {
                    $this->sendMSG($item_event);
                }
            }
        }else if($type == Wechat::MSGTYPE_MUSIC){
        }else if($type == Wechat::MSGTYPE_NEWS){
        }else if($type == Wechat::MSGTYPE_VOICE){
        }else if($type == Wechat::MSGTYPE_VIDEO){
        }

        exit;
    }
}
