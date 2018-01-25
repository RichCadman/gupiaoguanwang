<?php
namespace Admin\Controller;
use Think\Controller;
class PlanController extends BaseController{
    //E计划横幅图
    public function banner_index(){
        $info = M('banner')->where("type = 3")->find();
        $this->assign(array(
            'current'   =>  'banner_index',
            'display'   =>  'Plan',
            'info'      =>  $info,
        ));
        $this->display();
    }
    //添加历史业绩页面
    public function add_history(){
        $this->assign(array(
            'current'   =>  'add_history',
            'display'   =>  'Plan',
        ));
        $this->display();
    }
    //历史业绩总览
    public function history_index(){
        $info = M('his_per')->order("add_time desc")->select();
        $this->assign(array(
            'current'   =>  'history_index',
            'display'   =>  'Plan',
            'info'      =>  $info,
        ));
        $this->display();
    }
    //添加历史业绩
    public function add_history_do(){
        if($_FILES['img_path']['error'] == 0 && $_POST['title'] && $_POST['content']){
            $upload = new \Think\Upload();
            $upload->maxSize=5242880;//设置附件上传大小
            $upload->exts=array('jpg','jpeg','png','gif');//设置附件上传类型
            $upload->rootPath="./Pub/upload/";//设置附件上传目录 文件上传保存的根路径
            $upload->savePath="banner/";//设置附件上传目录  文件上传的保存路径（相对于根路径）
            $info=$upload->uploadOne($_FILES['img_path']);
            if($info){
                $_POST['img_path']=$info['savepath'].$info['savename'];//遍历得到路径
            }
            //var_dump($_POST['banner_path']);
            $res = M('his_per')->add($_POST);
            if($res){
                echo "<script>alert('添加成功！');window.history.go(-1);</script>";
            }
        }else{
            echo "<script>alert('请完善填写信息！');window.history.go(-1);</script>";
        }
    }
    //历史业绩修改页面
    public function history_editor($id){
        $info = M('his_per')->where("id = $id")->find();
        $this->assign(array(
            'info'  =>  $info,
        ));
        $this->display();
    }
    //历史业绩修改
    public function history_editor_do(){
        if($_FILES['img_path']['error'] == 0 && $_POST['title'] && $_POST['content']){
            $upload = new \Think\Upload();
            $upload->maxSize=5242880;//设置附件上传大小
            $upload->exts=array('jpg','jpeg','png','gif');//设置附件上传类型
            $upload->rootPath="./Pub/upload/";//设置附件上传目录 文件上传保存的根路径
            $upload->savePath="banner/";//设置附件上传目录  文件上传的保存路径（相对于根路径）
            $info=$upload->uploadOne($_FILES['img_path']);
            if($info){
                $_POST['img_path']=$info['savepath'].$info['savename'];//遍历得到路径
            }
            //var_dump($_POST['banner_path']);
            $id = $_POST['id'];
            $res = M('his_per')->where("id = $id")->save($_POST);
            if($res){
                echo "<script>alert('修改成功！');window.history.go(-1);</script>";
            }
        }else{
            echo "<script>alert('请完善填写信息！');window.history.go(-1);</script>";
        }
    }
    //删除历史业绩
    public function history_del($id){
        $res = M('his_per')->where("id = $id")->delete();
        if($res){
            $data['statu'] = 200;
            $data['info'] = '删除成功';
            $this->ajaxReturn($data);
        }else{
            $data['statu'] = 400;
            $data['info'] = '删除失败';
            $this->ajaxReturn($data);
        }
    }
    //页面总览
    public function all_index()
    {
        $info = M('title_img')->where("type = 3")->order('order_num asc')->select();
        $this->assign(array(
            'current' => 'all_index',
            'display' => 'Plan',
            'info' => $info,
        ));
        $this->display();
    }
}