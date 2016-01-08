<?php
/**
 * Created by IntelliJ IDEA.
 * User: ruanqx
 * Date: 2015/12/12
 * Time: 14:51
 */

import('ORG.wechat');
class WechatSettingAction extends Action {
    private $weObj;
    public function addMenu(){
        $data=array (
            'button' => array (
                0 => array (
                    'name' => '便民服务',
                    'sub_button' => array (

                        0 => array (
                            'type' => 'view',
                            'name' => '预约挂号',
                            'url' => 'http://www.zsws.gov.cn/reg/index.action',
                        ),

                        1 => array (
                            'type' => 'view',
                            'name' => ' 违章查询',
                            'url' => 'http://chaweizhang.eclicks.cn/webapp/index?appid=10',
                        ),

                        2 => array (
                            'type' => 'view',
                            'name' => '天气查询',
                            'url' => 'https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx35a55b1c419603dc&redirect_uri=http://zsfbwx.zsbtv.com.cn/bm/tianqi.php&response_type=code&scope=snsapi_base&connect_redirect=1#wechat_redirect',
                        ),

                        3 => array (
                            'type' => 'view',
                            'name' => '公积金查询',
                            'url' => 'https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx35a55b1c419603dc&redirect_uri=http://zsfbwx.zsbtv.com.cn/bm/gjj.php&response_type=code&scope=snsapi_base&connect_redirect=1#wechat_redirect'
                        ),

                        4 => array (
                            'type' => 'click',
                            'name' => '话费查询',
                            'key' => 'HFCX',
                        ),




                    ),
                ),
                1 => array (
                    'name' => '全民修身',
                    'sub_button' => array (


                        0 => array (
                            'type' => 'view',
                            'name' => '好人投票',
                            'url' => 'http://app.zsnews.cn/active/2010sbhr/toupiao.asp',
                        ),
                        1 => array (
                            'type' => 'view',
                            'name' => '感动中山',
                            'url' => 'http://www.zsnews.cn/zt/wgsx/news/showindex_15057.shtml',
                        ),
                        2 => array (
                            'type' => 'click',
                            'name' => '文明说',
                            'key' => 'WMS',
                        ),



                    ),
                ),
                2 => array (
                    'name' => '人文中山',
                    'sub_button' => array (
                        0 => array (
                            'type' => 'view',
                            'name' => ' 香山骄傲',
                            'url' => 'http://www.zsnews.cn/zt/wgsx/news/showindex_15199.shtml',
                        ),
                        1 => array (
                            'type' => 'media_id',
                            'name' => ' 醉美镇区',
                            'media_id' => 'EtIY-HbxkuWCp14BMzuaoTq8y-yc4nOUc28H8jVSdJU',
                        ),
                        2 => array (
                            'type' => 'media_id',
                            'name' => ' 诗意中山',
                            'media_id' => 'NSMSts8uGRS5S-0ZcNKy9vkv9sz30FvH6M33sbwCYXw',
                        ),

                    ),
                ),
            ),
        );

        $options = array(
            'token'=>'zspublish', //填写你设定的key
            'encodingaeskey'=>'7IJYLFsn3GQrmvoMibVP8SwfD7BrR0PqK3DX25WnNrw', //填写加密用的EncodingAESKey
            'appid'=>'wx35a55b1c419603dc', //填写高级调用功能的app id
            'appsecret'=>'ce22a59f9459611c9c38d17721659b95', //填写高级调用功能的密钥

        );
        $this->weObj = new Wechat($options);
       // $this->weObj->valid();
        if($this->weObj->createMenu($data)){
            p("1234");
        }else{
            p("4321");
        }


    }

    public function getMenu(){
        return $this->getMenu();
    }



    public function getForeverList(){
        $options = array(
            'token'=>'zspublish', //填写你设定的key
            'encodingaeskey'=>'7IJYLFsn3GQrmvoMibVP8SwfD7BrR0PqK3DX25WnNrw', //填写加密用的EncodingAESKey
            'appid'=>'wx35a55b1c419603dc', //填写高级调用功能的app id
            'appsecret'=>'ce22a59f9459611c9c38d17721659b95', //填写高级调用功能的密钥

        );
        $this->weObj = new Wechat($options);

        p($this->weObj->getForeverList('news',610,10));

    }

}

