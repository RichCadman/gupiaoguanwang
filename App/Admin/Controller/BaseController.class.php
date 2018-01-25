<?php
namespace Admin\Controller;
use Think\Controller;
class BaseController extends Controller{
    //构造方法
    public function _initialize(){
        if(!isset($_SESSION['admin'])){
            echo "<script>alert('未登录');window.location='/admin.php/Login/login';</script>";
        }
    }

}