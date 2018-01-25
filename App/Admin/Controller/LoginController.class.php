<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller {
    public function login(){
        unset($_SESSION['admin']);
        $this->display();
    }
    //登录验证
    public function login_do(){
        if($_POST['admin'] && $_POST['password']){
            $_POST['password'] = md5($_POST['password']);
            $res = M('admin')->where($_POST)->find();
            if($res){
                $_SESSION['admin'] = $res;
                header("location:".__APP__."/Index/index");
            }else{}
            echo "<script>alert('用户名或密码错误');window.history.back();</script>";
        }else{
            echo "<script>alert('请填写用户名或密码');window.history.back();</script>";
        }
    }

}