<?php
namespace Home\Controller;
class HistoryController extends BaseController{
    //历史业绩页面
    public function index(){
        //查询首页banner图
        $banner = M("banner")->where("type = 1")->select();
        //查询历史业绩
        $history = M('his_per')->order("add_time desc")->select();
        $this->assign(array(
            'banner'    =>  $banner,
            'history' =>  $history,
        ));
        $this->display();
    }
    //详情
    public function detail($id){
        $info = M('his_per')->where("id = $id")->find();
        $this->assign(array(
            'info'    =>  $info,
        ));
        $this->display();
    }
}