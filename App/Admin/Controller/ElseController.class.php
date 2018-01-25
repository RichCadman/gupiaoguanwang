<?php
namespace Admin\Controller;
use Think\Controller;
class ElseController extends BaseController{
    //二维码页面
    public function code_img(){
        $info = M('code')->select();
        $this->assign(array(
            'current'   =>  'code_img',
            'display'   =>  'Else',
            'info'      =>  $info,
        ));
        $this->display();
    }

    //修改二维码页面
    public function qrcode_editor($id){
        $qrcode = M('code')->where("id = $id")->find();
        $this->assign(array(
            'current'   =>  'qrcode_editor',
            'display'   =>  'Else',
            'qrcode'      =>  $qrcode,
        ));
        $this->display();
    }
    //修改二维码
    public function qrcode_editor_do(){
        if($_FILES['code_img']['error'] == 0){
            $upload = new \Think\Upload();
            $upload->maxSize = 5242880;//设置附件上传大小
            $upload->exts = array('jpg', 'jpeg', 'png', 'gif');//设置附件上传类型
            $upload->rootPath = "./Pub/upload/";//设置附件上传目录 文件上传保存的根路径
            $upload->savePath = "banner/";//设置附件上传目录  文件上传的保存路径（相对于根路径）
            $info = $upload->uploadOne($_FILES['code_img']);
            if ($info) {
                $data['code_img'] = $info['savepath'] . $info['savename'];//遍历得到路径
            }
            $id = $_POST['id'];
            $res = M('code')->where("id = $id")->save($data);
            if($res){
                echo "<script>alert('修改成功！');window.history.back();</script>";
            }else{
                echo "<script>alert('修改失败！');window.history.back();</script>";
            }
        }else{
            echo "<script>alert('请选择图片！');window.history.back();</script>";
        }
    }
    //公司信息
    public function company(){
        $info = M('company')->find();
        $this->assign(array(
            'current'   =>  'company',
            'display'   =>  'Else',
            'info'      =>  $info,
        ));
        $this->display();
    }
    //修改公司信息
    public function company_editor_do(){
        if($_POST['tel'] && $_POST['address']){
            $id = $_POST['id'];
            $res = M("company")->where("id = $id")->save($_POST);
            if($res){
                echo "<script>alert('修改成功！');window.history.back();</script>";
            }else{
                echo "<script>alert('修改失败！');window.history.back();</script>";
            }
        }else{
            echo "<script>alert('请完善填写信息！');window.history.back();</script>";
        }
    }
}