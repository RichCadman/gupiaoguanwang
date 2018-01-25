<?php
namespace Home\Controller;
class AboutController extends BaseController{
    //关于我们首页
    public function index(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            //查询banner图
            $banner = M("banner")->where("type = 1")->select();
            //查询菜单
            $menu = M('about')->order("id asc")->select();
            //查询最小的id数据
            $info = M('about')->where("id = $id")->order("id asc")->find();
            $this->assign(array(
                'current'   =>  'About_index',
                'banner'    =>  $banner,
                'menu'      =>  $menu,
                'info'      =>  $info,
            ));
            $this->display();
        }else{
            //查询banner图
            $banner = M("banner")->where("type = 1")->select();
            //查询菜单
            $menu = M('about')->order("id asc")->select();
            //查询最小的id数据
            $info = M('about')->order("id asc")->find();
            $this->assign(array(
                'current'   =>  'About_index',
                'banner'    =>  $banner,
                'menu'      =>  $menu,
                'info'      =>  $info,
            ));
            $this->display();
        }

    }

}