<?php
/**
 * Created by PhpStorm.
 * User: liu
 * Date: 2015/12/11
 * Time: 15:17
 */
import('ORG.wechat');
class GetRevAction extends Action {
    private $weObj;

    public function index(){



        $this->weObj = getWeObj();
        $this->weObj->valid();

        $type = $this->weObj->getRev()->getRevType();



        switch($type) {

            case Wechat::MSGTYPE_TEXT:
                $content = $this->weObj->getRevContent();
                if($content == "我要抢流量"){
                    $data=array(
                        "0"=>array(
                            'Title'=>'冬至送温暖 点点有流量',
                            'Description'=>'点击进入门票抽奖页面',
                            'PicUrl'=>'http://zsfbwx.zsbtv.com.cn/zsfb/Tpl/Public/images/ll.jpg',
                            'Url'=>'https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx35a55b1c419603dc&redirect_uri=http://zsfbwx.zsbtv.com.cn/zsfb/index.php?s=/PlayRedPacket/index/id/19.html&response_type=code&scope=snsapi_base&connect_redirect=1&from=singlemessage&isappinstalled=0#wechat_redirect',
                        ),

                    );
                    $this->weObj->news($data)->reply();
                }
                break;





            case Wechat::MSGTYPE_EVENT://事件推送

                $event_type = $this->weObj->getRevEvent();

               // Log::write('myinfo:'.$type, Log::DEBUG);
               // Log::write('myinfo:'.$event_type, Log::DEBUG);

                switch($event_type['event']){
                    case Wechat::EVENT_SUBSCRIBE:

                        $this->weObj->text("您好！欢迎关注“中山发布”公众微信平台。
★  介绍中山，我说的最全面；解读中山，我说的最权威；畅享中山，我说的最丰富！每天第一时间为您推送最新鲜的各类资讯，让您最迅速、最全面、最深刻感知中山。

★“中山发布”微信还推出了五大便民服务功能，包括在线查询天气、实时公交、交通违章以及网上办事、预约挂号等五大功能，只需点击微信界面左下角的“便民服务”，点击相关栏目即可查询。

★  您可以通过邮箱给我们投稿（zsxcbwlk@126.com），提供线索或建言献策，欢迎与我们交流。感谢您的关注，敬请把“中山发布”推荐给周围的朋友。
")->reply();


                        $this->yidong();
                        break;

                    case Wechat::EVENT_MENU_CLICK:
                        switch($event_type['key']){
                            case "WMS":
                                $this->weObj->text("您好，如果您对中山市开展“全民修身”行动、创建文明城市有好的意见和建议，欢迎给小编留言喔，别忘了留下您的联系方式，方便我们与您及时联系！[Smile]
")->reply();
                                break;
                            case "HFCX":
                                $this->weObj->text("【温馨提示】话费查询功能现阶段仅支持中国移动用户查询。只要你是“中山移动”公众号订阅用户，首次关注“中山发布”公众号可获赠送5元话费。首次关注“中山移动”公众号，也可获赠送5元话费，赠送话费均在次月到账。“中山发布”和“中山移动”公众号每周都定期推出抢流量活动，欢迎广大用户参与抽奖！
<a href='http://gd.10086.cn/widget/webpage/appBill/balanceQuery.html?session=gmccfswap'>【详细话费查询】点击话费查询</a>")->reply();
                                break;
                            default:
                                break;
                        }

                        break;
                    default:
                        break;

                }


                break;

            default:
                break;
       }

        exit;


    }


    //关注时送移动话费处理
    private function yidong(){



        //获取用户的详细信息
        $userInfo = $this->weObj->getUserInfo($this->weObj->getRevFrom());
       // Log::write('myinfo:'.$userInfo['openid'].$userInfo['subscribe_time'], Log::DEBUG);
        if($userInfo['subscribe']=='1'){
           // Log::write('myinfo:'.'subscribe', Log::DEBUG);
            $userDB = M('user');
            $yidongDB = M('yidong');

            //判断是否有关注过的
            $user = $userDB->where(array('open_id'=>$this->weObj->getRevFrom()))->find();

            if($user){//已经关注过了
                exit;
            }else{//没有关注过的用户
                $userData['open_id'] = $userInfo['openid'];
                $userDB->data($userData)->add();

                $yidongUserData['open_id'] = $userInfo['openid'];
                if($userInfo['unionid']){
                    $yidongUserData['unionid'] = $userInfo['unionid'];
                }

                $yidongUserData['nickname'] = $userInfo['nickname'];
                $yidongUserData['subscribe_time'] = $userInfo['subscribe_time'];
                $yidongDB->data($yidongUserData)->add();
            }


        }
















    }


}