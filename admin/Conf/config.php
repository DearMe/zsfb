<?php
return array(
    //数据库
    'DB_HOST' =>'10.4.96.40',
    'DB_USER' =>'zsfb',
    'DB_PWD' => 'admin_312',
    'DB_NAME' => 'zsfb',
    'DB_PREFIX' =>'',


    //设置后台public的Public文件
    'TMPL_PARSE_STRING' => array(
        //'__PUBLIC__' =>__ROOT__.'/Tpl/Public'
        '__PUBLIC__' =>'./Tpl/Public'

    ),
    //设置时区
    'DEFAULT_TIMEZONE' =>'PRC',
    //URL的模式
    'URL_MODEL'=>3,

    'DATA_CACHE_PATH'=>'../public/Cache/',

    //引入微信的设置
    'LOAD_EXT_CONFIG' => '../../public/Conf/wxConfig',






);
?>