<?php
namespace Admin\Controller;
use Think\Controller;
class OptionsController extends BaseController{
    //期权服务banner图
    public function banner_index(){
        $info = M('banner')->where("type = 2")->find();
        $this->assign(array(
            'current'   =>  'banner_index',
            'display'   =>  'Options',
            'info'      =>  $info,
        ));
        $this->display();
    }
    //页面总览
    public function all_index()
    {
        $info = M('title_img')->where("type = 2")->order('order_num asc')->select();
        $this->assign(array(
            'current' => 'all_index',
            'display' => 'Options',
            'info' => $info,
        ));
        $this->display();
    }
}