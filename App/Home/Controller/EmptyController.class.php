<?php
namespace Home\Controller;
use Think\Controller;
class EmptyController extends BaseController{
    public function index(){
        redirect('index');
    }
    public function _empty(){
        redirect('index');
    }
}