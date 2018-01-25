<?php
namespace Home\Controller;
class AgentController extends BaseController{
    public function index(){
        //查询图文
        $title_img = M('title_img')->where("type = 4")->select();
        $this->assign(array(
            'title_img'    =>  $title_img,
        ));
        $this->display();
    }
}