<?php

namespace Admin\Controller;
class IndexController extends BaseController
{
    public function index()
    {
        $info = array(
            '操作系统' => PHP_OS,
            '运行环境' => $_SERVER["SERVER_SOFTWARE"],
            'ThinkPHP版本' => THINK_VERSION,
            'PHP运行方式' => php_sapi_name(),
            '主机名' => $_SERVER['SERVER_NAME'],
            'WEB服务端口' => $_SERVER['SERVER_PORT'],
            '网站文档目录' => $_SERVER["DOCUMENT_ROOT"],
            '浏览器信息' => substr($_SERVER['HTTP_USER_AGENT'], 0, 40),
            '通信协议' => $_SERVER['SERVER_PROTOCOL'],
            '请求方法' => $_SERVER['REQUEST_METHOD'],
            '上传附件限制' => ini_get('upload_max_filesize'),
            '执行时间限制' => ini_get('max_execution_time') . '秒',
            '服务器时间' => date("Y年n月j日 H:i:s"),
            '北京时间' => gmdate("Y年n月j日 H:i:s", time() + 8 * 3600),
            '服务器域名/IP' => $_SERVER['SERVER_NAME'] . ' [ ' . gethostbyname($_SERVER['SERVER_NAME']) . ' ]',
            '用户的IP地址' => $_SERVER['REMOTE_ADDR'],
            '剩余空间' => round((disk_free_space(".") / (1024 * 1024)), 2) . 'M',
            'register_globals' => get_cfg_var("register_globals") == "1" ? "ON" : "OFF",
            'magic_quotes_gpc' => (1 === get_magic_quotes_gpc()) ? 'YES' : 'NO',
            'magic_quotes_runtime' => (1 === get_magic_quotes_runtime()) ? 'YES' : 'NO',
        );
        $this->assign(array(
            'info' => $info,
            "current" => 'index',
        ));
        $this->display();
    }

    //轮播图列表
    public function lunbo_index()
    {
        //var_dump($_SERVER);exit;
        $info = M('banner')->where("type = 1")->select();
        $this->assign(array(
            'current' => 'lunbo_index',
            'display' => 'Index',
            'info' => $info,
        ));
        $this->display();
    }

    //添加轮播图页面
    public function add_lunbo()
    {
        $this->assign(array(
            'current' => 'add_lunbo',
            'display' => 'Index',
        ));
        $this->display();
    }

    //添加轮播图
    public function add_lunbo_do()
    {
        if ($_FILES['banner_path']['error'] == 0) {
            $upload = new \Think\Upload();
            $upload->maxSize = 5242880;//设置附件上传大小
            $upload->exts = array('jpg', 'jpeg', 'png', 'gif');//设置附件上传类型
            $upload->rootPath = "./Pub/upload/";//设置附件上传目录 文件上传保存的根路径
            $upload->savePath = "banner/";//设置附件上传目录  文件上传的保存路径（相对于根路径）
            $info = $upload->uploadOne($_FILES['banner_path']);
            if ($info) {
                $data['banner_path'] = $info['savepath'] . $info['savename'];//遍历得到路径
            }
            //var_dump($data['banner_path']);
            $data['type'] = 1;
            $res = M('banner')->add($data);
            if ($res) {
                echo "<script>alert('添加成功！');window.history.go(-1);</script>";
            }
        } else {
            echo "<script>alert('请选择图片！');window.history.go(-1);</script>";
        }
    }

    //修改轮播图页面
    public function lunbo_editor($id)
    {
        $info = M('banner')->where("id = $id")->find();
        $this->assign('info', $info);
        $this->display();
    }

    //修改轮播图
    public function lunbo_editor_do($id)
    {
        if ($_FILES['banner_path']['error'] == 0) {
            $upload = new \Think\Upload();
            $upload->maxSize = 5242880;//设置附件上传大小
            $upload->exts = array('jpg', 'jpeg', 'png', 'gif');//设置附件上传类型
            $upload->rootPath = "./Pub/upload/";//设置附件上传目录 文件上传保存的根路径
            $upload->savePath = "banner/";//设置附件上传目录  文件上传的保存路径（相对于根路径）
            $info = $upload->uploadOne($_FILES['banner_path']);
            if ($info) {
                $data['banner_path'] = $info['savepath'] . $info['savename'];//遍历得到路径
            }
            //var_dump($data['banner_path']);
            $res = M('banner')->where("id = $id")->save($data);
            if ($res) {
                echo "<script>alert('修改成功！');window.history.go(-1);</script>";
            }
        } else {
            echo "<script>alert('请选择图片！');window.history.go(-1);</script>";
        }

    }

    //删除轮播图
    public function banner_del($id)
    {
        $res = M('banner')->where("id = $id")->delete();
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

    //页面总览
    public function all_index()
    {
        $info = M('title_img')->where("type = 1")->order('order_num asc')->select();
        $this->assign(array(
            'current' => 'all_index',
            'display' => 'Index',
            'info' => $info,
        ));
        $this->display();
    }

    //修改页面
    public function all_index_editor($id)
    {
        $info = M('title_img')->where("id = $id")->find();
        $this->assign('info', $info);
        $this->display();
    }

    //修改
    public function all_index_editor_do()
    {
        if ($_POST['title'] && $_POST['content']) {
            if ($_FILES['img_path']['error'] == 0) {
                $upload = new \Think\Upload();
                $upload->maxSize = 5242880;//设置附件上传大小
                $upload->exts = array('jpg', 'jpeg', 'png', 'gif');//设置附件上传类型
                $upload->rootPath = "./Pub/upload/";//设置附件上传目录 文件上传保存的根路径
                $upload->savePath = "banner/";//设置附件上传目录  文件上传的保存路径（相对于根路径）
                $info = $upload->uploadOne($_FILES['img_path']);
                if ($info) {
                    $data['img_path'] = $info['savepath'] . $info['savename'];//遍历得到路径
                }
            }
            if ($_FILES['background_img']['error'] == 0) {
                $upload = new \Think\Upload();
                $upload->maxSize = 5242880;//设置附件上传大小
                $upload->exts = array('jpg', 'jpeg', 'png', 'gif');//设置附件上传类型
                $upload->rootPath = "./Pub/upload/";//设置附件上传目录 文件上传保存的根路径
                $upload->savePath = "banner/";//设置附件上传目录  文件上传的保存路径（相对于根路径）
                $info = $upload->uploadOne($_FILES['background_img']);
                if ($info) {
                    $data['background_img'] = $info['savepath'] . $info['savename'];//遍历得到路径
                }
            }
            $data['title'] = $_POST['title'];
            $data['content'] = $_POST['content'];
            $id = $_POST['id'];
            $res = M('title_img')->where("id = $id")->save($data);
            if ($res) {
                echo "<script>alert('修改成功！');window.history.back();</script>";
            } else {
                echo "<script>alert('修改失败！');window.history.back();</script>";
            }
        } else {
            echo "<script>alert('请完善标题或内容！');window.history.back();</script>";
        }
    }

    //清除缓存
    public function clear_cache()
    {
        deldir(RUNTIME_PATH);
        echo "<script>alert('清除成功！');window.history.go(-1);</script>";
    }

}