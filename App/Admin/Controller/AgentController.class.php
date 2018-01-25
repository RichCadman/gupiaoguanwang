<?php
namespace Admin\Controller;
use Think\Controller;
//代理合作类
class AgentController extends BaseController{
    //页面总览
    public function all_index()
    {
        $info = M('title_img')->where("type = 4")->order('order_num asc')->select();
        $this->assign(array(
            'current' => 'all_index',
            'display' => 'Agent',
            'info' => $info,
        ));
        $this->display();
    }
}