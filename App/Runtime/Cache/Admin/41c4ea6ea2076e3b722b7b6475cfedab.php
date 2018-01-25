<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en" style="overflow-x:hidden;overflow-y:auto;">
<head>
    <title>e管家后台管理</title>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="/Pub/admin/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="/Pub/admin/css/bootstrap-responsive.min.css"/>
    <link rel="stylesheet" href="/Pub/admin/css/uniform.css"/>
    <link rel="stylesheet" href="/Pub/admin/css/select2.css"/>
    <link rel="stylesheet" href="/Pub/admin/css/matrix-style.css"/>
    <link rel="stylesheet" href="/Pub/admin/css/matrix-media.css"/>
    <link href="/Pub/admin/font-awesome/css/font-awesome.css" rel="stylesheet"/>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
    <style>
        .table td {
            text-align: center;
        }
    </style>
</head>
<body>

<style>
.over{
  width:100%;
  overflow:auto;
  /* white-space:pre-wrap;不换行 */
  /* overflow-x:hidden;内容超出宽度时隐藏超出部分的内容  */
}
</style>

<link href="/favicon.ico" type="image/ico" rel="shortcut icon" />
<!--Header-part-->
<div id="header">
  <h1><a href="dashboard.html">员工项目管理系统</a></h1>
</div>
<!--close-Header-part--> 

<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav">
    <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text">Welcome <?php echo ($_SESSION['admin']['admin']); ?></span><b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li><a href="/admin.php/My/my.html"><i class="icon-user"></i> 个人中心</a></li>
        <li class="divider"></li>
        <!-- <li><a href="#"><i class="icon-check"></i> My Tasks</a></li> -->
        <li class="divider"></li>
        <li><a href="/admin.php/Login/login.html"><i class="icon-key"></i> 登出</a></li>
      </ul>
    </li>
    <!-- <li class="dropdown" id="menu-messages"><a href="#" data-toggle="dropdown" data-target="#menu-messages" class="dropdown-toggle"><i class="icon icon-envelope"></i> <span class="text">项目</span> <span class="label label-important">5</span> <b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li><a class="sAdd" title="" href="#"><i class="icon-plus"></i> new message</a></li>
        <li class="divider"></li>
        <li><a class="sInbox" title="" href="#"><i class="icon-envelope"></i> inbox</a></li>
        <li class="divider"></li>
        <li><a class="sOutbox" title="" href="#"><i class="icon-arrow-up"></i> outbox</a></li>
        <li class="divider"></li>
        <li><a class="sTrash" title="" href="#"><i class="icon-trash"></i> trash</a></li>
      </ul>
    </li> -->
    <!-- <li class=""><a title="" href="#"><i class="icon icon-cog"></i> <span class="text">Settings</span></a></li> -->
    <li class=""><a title="" href="/admin.php/Login/login.html"><i class="icon icon-share-alt"></i> <span class="text">登出</span></a></li>
  </ul>
</div>

<!--start-top-serch-->
<div id="search">
  <a href="/index.html" target="_blank" class="btn btn-info" style="margin-bottom:9px;margin-right:15px;">官网首页</a>
  <a href="javascript:void();" onclick="cache()" class="btn btn-info" style="margin-bottom:9px;margin-right:15px;">清除缓存</a>
  <!-- <input type="text" placeholder="Search here..."/>
  <button type="submit" class="tip-bottom" title="Search"><i class="icon-search icon-white"></i></button> -->
</div>
<!--close-top-serch--> 

<script>
  function cache(){
    if(confirm("确定清除吗？")){
      window.location="/admin.php/Index/clear_cache";
    }
  }
</script>
<!-- 定时弹框提醒项目进度 -->
<script type="text/javascript">
   function ajax(){
        var url="/admin.php/Item/remind";
        $(function(){
            $.post(url,function(data){
                //alert(data);
                /*if(data.statu == 200){
                  alert(data.msg);
                }*/
            })
        });
        
    }
    setInterval("ajax()",10000);//每隔10秒检查一次
  </script>
  <!-- 定时查看推送消息，超过三天自动确认 -->
<script type="text/javascript">
   function auto(){
        var url="/admin.php/Remark/auto_hit";
        $(function(){
            $.post(url,function(data){
                //alert(data);
                /*if(data.statu == 200){
                  alert(data.msg);
                }*/
            })
        });
        
    }
    setInterval("auto()",10000);//每隔10秒检查一次
  </script>
<!--sidebar-menu-->
<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> 菜单栏</a>
  <ul>
    <li class="<?php echo ($current=='index'?'active':''); ?>"><a href="/admin.php/Index/index.html"><i class="icon icon-dashboard"></i> <span>仪表盘</span></a> </li>


      <li class="submenu <?php echo ($current=='Index'?'active':''); ?>"> <a href="#"><i class="icon icon-th-list"></i> <span>前台首页管理</span> <!-- <span class="label label-important">2</span> --></a>
        <ul style="display:<?php echo ($display=='Index'?'block':'none'); ?>">
         <li class="<?php echo ($current=='lunbo_index'?'active':''); ?>"><a href="/admin.php/Index/lunbo_index.html">轮播图总览</a></li>
          <li class="<?php echo ($current=='add_lunbo'?'active':''); ?>"><a href="/admin.php/Index/add_lunbo.html">添加轮播图</a></li>
          <li class="<?php echo ($current=='all_index'?'active':''); ?>"><a href="/admin.php/Index/all_index.html">页面总览</a></li>
        </ul>
      </li>
      <li class="submenu <?php echo ($current=='Options'?'active':''); ?>"> <a href="#"><i class="icon icon-th-list"></i> <span>前台期权服务管理</span> <!-- <span class="label label-important">2</span> --></a>
          <ul style="display:<?php echo ($display=='Options'?'block':'none'); ?>">
              <!--<li class="<?php echo ($current=='banner_index'?'active':''); ?>"><a href="/admin.php/Options/banner_index.html">横幅图片总览</a></li>-->
              <li class="<?php echo ($current=='all_index'?'active':''); ?>"><a href="/admin.php/Options/all_index.html">页面总览</a></li>
          </ul>
      </li>
      <li class="submenu <?php echo ($current=='Plan'?'active':''); ?>"> <a href="#"><i class="icon icon-th-list"></i> <span>前台e计划管理</span> <!-- <span class="label label-important">2</span> --></a>
          <ul style="display:<?php echo ($display=='Plan'?'block':'none'); ?>">
              <!--<li class="<?php echo ($current=='banner_index'?'active':''); ?>"><a href="/admin.php/Plan/banner_index.html">横幅图片总览</a></li>-->
              <li class="<?php echo ($current=='all_index'?'active':''); ?>"><a href="/admin.php/Plan/all_index.html">页面总览</a></li>
              <li class="<?php echo ($current=='history_index'?'active':''); ?>"><a href="/admin.php/Plan/history_index.html">历史业绩总览</a></li>
              <li class="<?php echo ($current=='add_history'?'active':''); ?>"><a href="/admin.php/Plan/add_history.html">添加历史业绩</a></li>
          </ul>
      </li>
      <li class="submenu <?php echo ($current=='About'?'active':''); ?>"> <a href="#"><i class="icon icon-th-list"></i> <span>前台关于我们管理</span> <!-- <span class="label label-important">2</span> --></a>
          <ul style="display:<?php echo ($display=='About'?'block':'none'); ?>">
              <li class="<?php echo ($current=='about_index'?'active':''); ?>"><a href="/admin.php/About/about_index.html">关于我们总览</a></li>
              <!--<li class="<?php echo ($current=='banner_index'?'active':''); ?>"><a href="/admin.php/About/banner_index.html">横幅图片总览</a></li>-->
              <li class="<?php echo ($current=='add_menu'?'active':''); ?>"><a href="/admin.php/About/add_menu.html">添加关于我们菜单</a></li>
          </ul>
      </li>

      <li class="submenu <?php echo ($current=='Plan'?'active':''); ?>"> <a href="#"><i class="icon icon-th-list"></i> <span>前台代理合作管理</span> <!-- <span class="label label-important">2</span> --></a>
          <ul style="display:<?php echo ($display=='Agent'?'block':'none'); ?>">
              <li class="<?php echo ($current=='all_index'?'active':''); ?>"><a href="/admin.php/Agent/all_index.html">页面总览</a></li>
          </ul>
      </li>

      <li class="submenu <?php echo ($current=='About'?'active':''); ?>"> <a href="#"><i class="icon icon-th-list"></i> <span>其他</span> <!-- <span class="label label-important">2</span> --></a>
          <ul style="display:<?php echo ($display=='Else'?'block':'none'); ?>">
              <li class="<?php echo ($current=='code_img'?'active':''); ?>"><a href="/admin.php/Else/code_img.html">二维码总览</a></li>
              <li class="<?php echo ($current=='company'?'active':''); ?>"><a href="/admin.php/Else/company.html">公司信息</a></li>
              <!--<li class="<?php echo ($current=='item_link'?'active':''); ?>"><a href="/admin.php/Item/item_link.html">123</a></li>-->
              <!--<li class="<?php echo ($current=='item_add_time'?'active':''); ?>"><a href="/admin.php/Item/item_add_time.html">增加项目时间</a></li>-->
              <!--<li class="<?php echo ($current=='item_affirm'?'active':''); ?>"><a href="/admin.php/Item/item_affirm.html">待确认项目</a></li>-->
          </ul>
      </li>
      <li><a href="/admin.php/User/index.html"><i class="icon icon-tint"></i> <span>个人中心</span></a></li>
      <!-- <li class="submenu <?php echo ($current=='position'?'active':''); ?>"> <a href="#"><i class="icon icon-th-list"></i> <span>职位管理</span> <span class="label label-important">3</span></a>
        <ul>
         <li class="<?php echo ($current=='position_index'?'active':''); ?>"><a href="/admin.php/Index/position_index.html">职位总览</a></li>
          <li class="<?php echo ($current=='position_add'?'active':''); ?>"><a href="/admin.php/Index/position_add.html">添加职位</a></li>
          <li><a href="/admin.php/Index/form_wizard.html">Form with Wizard</a></li>
        </ul>
      </li> -->
      
      <!-- <li class="submenu <?php echo ($current=='authority'?'active':''); ?>"> <a href="#"><i class="icon icon-th-list"></i> <span>权限管理</span> <span class="label label-important">3</span></a>
        <ul>
         <li class="<?php echo ($current=='authority_index'?'active':''); ?>"><a href="/admin.php/Index/authority_index.html">权限总览</a></li>
          <li class="<?php echo ($current=='authority_add'?'active':''); ?>"><a href="/admin.php/Index/authority_add.html">添加权限</a></li>
          <li><a href="/admin.php/Index/form_wizard.html">Form with Wizard</a></li>
        </ul>
      </li> -->

   <!--  <li><a href="/admin.php/Index/table.html"><i class="icon icon-th"></i> <span>Tables</span></a></li>
   
   <li><a href="/admin.php/Index/full.html"><i class="icon icon-fullscreen"></i> <span>Full width</span></a></li>
   
   <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Forms</span> <span class="label label-important">3</span></a>
     <ul>
      <li><a href="/admin.php/Index/form_common.html">Basic Form</a></li>
       <li><a href="/admin.php/Index/form_validation.html">Form with Validation</a></li>
       <li><a href="/admin.php/Index/form_wizard.html">Form with Wizard</a></li>
     </ul>
   </li>
   
   <li><a href="/admin.php/Index/buttons.html"><i class="icon icon-tint"></i> <span>Buttons &amp; icons</span></a></li>
   
   <li><a href="/admin.php/Index/interface1.html"><i class="icon icon-pencil"></i> <span>Eelements</span></a></li>
   
   <li class="submenu"> <a href="#"><i class="icon icon-file"></i> <span>Addons</span> <span class="label label-important">5</span></a>
     <ul>
       <li><a href="/admin.php/Index/index2.html">Dashboard2</a></li>
       <li><a href="/admin.php/Index/gallery.html">Gallery</a></li>
       <li><a href="/admin.php/Index/calendar.html">Calendar</a></li>
       <li><a href="/admin.php/Index/invoice.html">Invoice</a></li>
       <li><a href="/admin.php/Index/chat.html">Chat option</a></li>
     </ul>
   
   </li>
   
   <li class="submenu"> <a href="#"><i class="icon icon-info-sign"></i> <span>Error</span> <span class="label label-important">4</span></a>
     <ul>
       <li><a href="/admin.php/Index/error403.html">Error 403</a></li>
       <li><a href="/admin.php/Index/error404.html">Error 404</a></li>
       <li><a href="/admin.php/Index/error405.html">Error 405</a></li>
       <li><a href="/admin.php/Index/error500.html">Error 500</a></li>
     </ul>
   </li>
   
   <li class="content"> <span>Monthly Bandwidth Transfer</span>
     <div class="progress progress-mini progress-danger active progress-striped">
       <div style="width: 77%;" class="bar"></div>
     </div>
     <span class="percent">77%</span>
     <div class="stat">21419.94 / 14000 MB</div>
   </li>
   
   <li class="content"> <span>Disk Space Usage</span>
     <div class="progress progress-mini active progress-striped">
       <div style="width: 87%;" class="bar"></div>
     </div>
     <span class="percent">87%</span>
     <div class="stat">604.44 / 4000 MB</div>
   </li> -->
  
  </ul>
</div>

<div id="content">
    <div id="content-header">
        <div id="breadcrumb"><a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> 首页</a> <a
                href="#" class="tip-bottom">首页管理</a><a href="#" class="current">二维码总览</a></div>
        <h1 style="float:left">二维码总览</h1>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"><span class="icon"><i class="icon-th"></i></span>
                    </div>
                    <div class="widget-content nopadding">
                        <div class="over">
                            <table class="table table-bordered data-table" style="overflow:hidden">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>图片路径（点击查看）</th>
                                    <!--<th>顺序</th>-->
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if(is_array($info)): foreach($info as $k=>$v): ?><tr class="gradeX">
                                        <td><?php echo ($k+1); ?></td>
                                        <td><a target="_blank"
                                               href="http://<?php echo ($_SERVER ['HTTP_HOST']); ?>/Pub/upload/<?php echo ($v["code_img"]); ?>">http://<?php echo ($_SERVER ['HTTP_HOST']); ?>/Pub/upload/<?php echo ($v["code_img"]); ?></a></td>
                                        <!--<td><?php echo ($v["order_num"]); ?></td>-->
                                        <td width="300px;">
                                            <a href="/admin.php/Else/qrcode_editor/id/<?php echo ($v["id"]); ?>">
                                                <button class='btn btn-primary' style="margin-left:10px">编辑</button>
                                            </a>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <!--<button onclick="del(this,<?php echo ($v["id"]); ?>)" class='btn btn-danger'>删除</button>-->
                                            <!--&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-->
                                        </td>
                                    </tr><?php endforeach; endif; ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Footer-part-->
<div class="row-fluid">
  <div id="footer" class="span12"> 2017 &copy; 员工项目管理系统 --<a href="http://www.dingzankj.com">鼎赞网络科技</a> </div>
</div>
<!--end-Footer-part-->
<script src="/Pub/admin/js/jquery.min.js"></script>
<script src="/Pub/admin/js/jquery.ui.custom.js"></script>
<script src="/Pub/admin/js/bootstrap.min.js"></script>
<script src="/Pub/admin/js/jquery.uniform.js"></script>
<script src="/Pub/admin/js/select2.min.js"></script>
<script src="/Pub/admin/js/jquery.dataTables.min.js"></script>
<script src="/Pub/admin/js/matrix.js"></script>
<script src="/Pub/admin/js/matrix.tables.js"></script>

<script type="text/javascript">
    // 删除数据方法
    function del(obj, id) {
        // 发送sql语句
        if (confirm("确定删除吗？")) {
            $.post('/admin.php/Index/banner_del', {id: id}, function (data) {
                // 判断是否成功
                if (data.statu == 200) {
                    $(obj).parent().parent().remove();
                    alert(data.info);
                } else {
                    alert(data.info);
                }
            });
        }
    }
</script>
</body>
</html>