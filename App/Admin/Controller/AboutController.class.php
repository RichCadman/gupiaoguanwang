<?php
namespace Admin\Controller;
use Think\Controller;
class AboutController extends BaseController{
    //关于我们横幅图片
    public function banner_index(){
        $info = M('banner')->where("type = 4")->find();
        $this->assign(array(
            'current'   =>  'banner_index',
            'display'   =>  'About',
            'info'      =>  $info,
        ));
        $this->display();
    }
    //关于我们总览
    public function about_index(){
        $info = M('about')->order("id asc")->select();
        $this->assign(array(
            'current'   =>  'about_index',
            'display'   =>  'About',
            'info'      =>  $info,
        ));
        $this->display();
    }
    //添加关于我们页面
    public function add_menu(){

        $this->assign(array(
            'current'   =>  'add_menu',
            'display'   =>  'About',
        ));
        $this->display();
    }
    //添加关于我们
    public function add_menu_do(){
        if($_POST['title'] && $_POST['content']){
            $res = M('about')->add($_POST);
            if($res){
                echo "<script>alert('添加成功！');window.history.back();</script>";
            }else{
                echo "<script>alert('添加失败！');window.history.back();</script>";
            }
        }else{
            echo "<script>alert('请完善标题或内容！');window.history.back();</script>";
        }
    }
    //修改关于我们
    public function about_editor($id){
        $info = M('about')->where("id = $id")->find();
        $this->assign(array(
            'info'     =>  $info,
        ));
        $this->display();
    }
    //修改
    public function about_editor_do(){
        if($_POST['content'] && $_POST['title']){
            $id = $_POST['id'];
            $res = M("about")->where("id = $id")->save($_POST);
            if($res){
                echo "<script>alert('修改成功！');window.history.back();</script>";
            }else{
                echo "<script>alert('修改失败！');window.history.back();</script>";
            }
        }else{
            echo "<script>alert('请完善填写信息！');window.history.back();</script>";
        }
    }
    //删除菜单
    public function about_del($id){
        $res = M('about')->where("id = $id")->delete();
        if ($res) {
            $data['statu'] = 200;
            $data['info'] = '删除成功';
            $this->ajaxReturn($data);
        } else {
            $data['statu'] = 400;
            $data['info'] = '删除失败';
            $this->ajaxReturn($data);
        }
    }
//    //修改关于我们
//    public function mod_about(){
//        $about = M('about')->where("type = 1")->find();
//        $this->assign(array(
//            'current'   =>  'mod_about',
//            'display'   =>  'About',
//            'about'     =>  $about,
//        ));
//        $this->display();
//    }
//    //修改安全保障
//    public function mod_safe(){
//        $safe = M('about')->where("type = 2")->find();
//        $this->assign(array(
//            'current'   =>  'mod_safe',
//            'display'   =>  'About',
//            'safe'      =>  $safe,
//        ));
//        $this->display();
//    }
//    //修改代理合作
//    public function mod_agent(){
//        $agent = M('about')->where("type = 3")->find();
//        $this->assign(array(
//            'current'   =>  'mod_agent',
//            'display'   =>  'About',
//            'agent'     =>  $agent,
//        ));
//        $this->display();
//    }
//    //修改法律法规
//    public function mod_law(){
//        $law = M('about')->where("type = 4")->find();
//        $this->assign(array(
//            'current'   =>  'mod_law',
//            'display'   =>  'About',
//            'law'       =>  $law,
//        ));
//        $this->display();
//    }
//    //修改人才招聘
//    public function mod_talent(){
//        $talent = M('about')->where("type = 5")->find();
//        $this->assign(array(
//            'current'   =>  'mod_talent',
//            'display'   =>  'About',
//            'talent'    =>  $talent,
//        ));
//        $this->display();
//    }
//    //修改联系我们
//    public function mod_contact(){
//        $contact = M('about')->where("type = 6")->find();
//        $this->assign(array(
//            'current'   =>  'mod_contact',
//            'display'   =>  'About',
//            'contact'   =>  $contact,
//        ));
//        $this->display();
//    }
//    //修改
//    public function editor_do(){
//        if($_POST['content']){
//            $id = $_POST['id'];
//            $res = M("about")->where("id = $id")->save($_POST);
//            if($res){
//                echo "<script>alert('修改成功！');window.history.back();</script>";
//            }
//        }else{
//            echo "<script>alert('请完善填写信息！');window.history.back();</script>";
//        }
//    }
}