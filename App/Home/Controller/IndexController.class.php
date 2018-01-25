<?php
namespace Home\Controller;
class IndexController extends BaseController {
    //首页
    public function index(){
        //查询首页banner图
        $banner = M("banner")->where("type = 1")->select();
        //查询图文
        $title_img = M('title_img')->where("type = 1")->select();
        //查询公众号二维码
        $qrcode = M('code')->where("type = 1")->find();
        //查询APP二维码
        $appcode = M('code')->where("type = 2")->find();
        //
        $this->assign(array(
            'current'   =>  'Index_index',
            'banner'    =>  $banner,
            'title_img' =>  $title_img,
            'qrcode'    =>  $qrcode,
            'appcode'   =>  $appcode,
        ));
        $this->display();
    }
}