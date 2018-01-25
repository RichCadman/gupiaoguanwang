<?php
namespace Home\Controller;
use Think\Controller;
class BaseController extends Controller{
    public function _initialize(){
        //查询公司信息
        $company = M('company')->find();
        //查询二维码
        $qrcode = M('code')->where("type = 1")->find();

        $this->assign(array(
            'company'   =>  $company,
            'qrcode'    =>  $qrcode,
        ));
    }
    public function _empty(){
        redirect('index');
    }
}