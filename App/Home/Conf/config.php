<?php
return array(
    //'配置项'=>'配置值'
    /* 默认设定 */
    'DEFAULT_MODULE'        =>  'Home',  // 默认模块
    'DEFAULT_CONTROLLER'    =>  'Index', // 默认控制器名称
    'DEFAULT_ACTION'        =>  'index', // 默认操作名称
    'DEFAULT_CHARSET'       =>  'utf-8', // 默认输出编码
    'DEFAULT_TIMEZONE'      =>  'PRC',	// 默认时区
    'DEFAULT_AJAX_RETURN'   =>  'JSON',  // 默认AJAX 数据返回格式,可选JSON XML ...
    'DEFAULT_JSONP_HANDLER' =>  'jsonpReturn', // 默认JSONP格式返回的处理方法
    'DEFAULT_FILTER'        =>  'htmlspecialchars', // 默认参数过滤方法 用于I函数...

    //添加模板变量规则
    'TMPL_PARSE_STRING' =>array(
        '__PUBLIC__'=> __ROOT__.'/Pub',
        '__APUBLIC__' => __ROOT__.'/Pub/admin', // 后台admin路径 替换规则
        '__ACSS__' => __ROOT__.'/Pub/admin/css', // 后台css路径 替换规则
        '__AJS__' => __ROOT__.'/Pub/admin/js', // 后台js路径替换规则
        '__AIMAGES__' => __ROOT__.'/Pub/admin/images', // 后台image路径替换规则
        '__AIMG__' => __ROOT__.'/Pub/admin/img', // 后台img路径替换规则

        '__UPLOAD__' => __ROOT__.'/Pub/upload', // 增加新的上传路径替换规则

        '__HPUBLIC__' => __ROOT__.'/Pub/home', // 前台路径 替换规则
        '__HCSS__' => __ROOT__.'/Pub/home/css', // 前台css路径 替换规则
        '__HJS__' => __ROOT__.'/Pub/home/js', // 前台js路径替换规则
        '__HIMAGES__' => __ROOT__.'/Pub/home/images', // 前台image路径替换规则
        '__HIMG__' => __ROOT__.'/Pub/home/img', // 前台img路径替换规则
        '__KIND__' =>__ROOT__.'/Lib/kindeditor',
    ),

    'URL_ROUTER_ON' => TRUE, //开启路由
    'URL_MODEL'          => '2',    //REWRITE模式是在PATHINFO模式的基础上添加了重写规则的支持，
                                   //可以去掉URL地址里面的入口文件index.php

    'URL_ROUTE_RULES' => array(//配置路由


   //按顺序匹配,先走index_index,再走index_index/:id\d,这样传id时会得不到意向的结果
//   'index_index'           =>'Index/index',//访问http://127.0.0.6/index_index等同于http://127.0.0.6/index.php/Index/index
//   'index_index/:id\d'     =>"Index/index",//访问http://127.0.0.6/index_index/15等同于http://127.0.0.6/index.php/Index/index/id/15
   //以上两种要想实现匹配id的情况必须把顺序换过来*/
    //第一种方法:
    //即:
    /*'index_index/:id\d'     =>"Index/index",
    'index_index'           =>'Index/index',*/

    //第二种方法:加上 $ 后就会进行绝对匹配,完全符合条件才进行
    'index$'           =>'Index/index',
    'options$'         =>'Options/index',
    'plan$'            =>'Plan/index',
    'about$'           =>'About/index',
    'agent$'           =>'Agent/index',
    'history$'           =>'History/index',
//    'index$'           =>'Index/index',
//    'index$'           =>'Index/index',
//    'index$'           =>'Index/index',
    'about/:id\d$'     =>"About/index",
    'detail/:id\d$'     =>"History/detail",
//    'index_index/:id\d$'     =>"Index/index",

    //第三种方法利用正则来匹配  详见手册  路由实例说明


    //分页匹配原则:
    /*'/^list\/(.*\d)_(.*\d)$/'  =>      'article/list?id=:1&p=:2',

    'index_read$'           =>'Index/read',
    'index_read/:id\d$'     =>"Index/read",
    'news_index$'           =>'News/index',
    'news_index/:id\d$'     =>"News/index",
    'news_news$'           =>'News/news',
    'news_news/:id\d$'     =>"News/news",*/

    ),
);