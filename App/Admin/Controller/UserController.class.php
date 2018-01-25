<?php
namespace Admin\Controller;
class UserController extends BaseController{
    //个人中心
    public function index(){
        $info = M('admin')->find();
        $this->assign('info',$info);
        $this->display();
    }
    //修改页面
    public function user_editor($id){
        $info = M('admin')->where("id = $id")->find();
        $this->assign('info',$info);
        $this->display();
    }
    //修改
    public function user_editor_do($id){
        if($_POST['admin'] && $_POST['password']){
            $_POST['password'] = md5($_POST['password']);
            $res = M('admin')->where("id = $id")->save($_POST);
            if($res){
                echo "<script>alert('修改成功！');window.location='/admin.php/User/index'</script>";
            }
        }else{
            echo "<script>alert('完善填写信息！');window.history.back();</script>";
        }
    }
}