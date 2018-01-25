<?php
namespace Home\Controller;
class PlanController extends BaseController{
    //e计划首页
    public function index(){
        //查询banner图
        $banner = M("banner")->where("type = 1")->select();
        //查询图文
        $title_img = M('title_img')->where("type = 3")->select();
        $this->assign(array(
            'current'   =>  'Plan_index',
            'banner'    =>  $banner,
            'title_img' =>  $title_img,
        ));
        $this->display();
    }
}