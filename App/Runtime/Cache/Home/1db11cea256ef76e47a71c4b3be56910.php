<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="author" content="" />
    <meta name="format-detection" content="telephone=no, email=no" />
    <meta name="renderer" content="webkit">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <title>关于我们</title>
    <link rel="stylesheet" type="text/css" href="/Pub/home/css/slick.css">
    <link rel="stylesheet" type="text/css" href="/Pub/home/css/base-v1.4.css">
    <link rel="stylesheet" type="text/css" href="/Pub/home/css/style.css">
    <!--[if lt IE 9]>
    <script src="https://cdn.bootcss.com/html5shiv/r29/html5.min.js"></script>
    <![endif]-->
</head>
<body class="about">
<!--header start-->
<header class="header">
    <div class="top cw">
        <div class="container clearfix">
            <div class="fl">客服电话：<?php echo ($company["tel"]); ?></div>
            <div class="fr">
                <a href="">联系我们</a>
                <span class="ib"></span>
                <a href="/index.php/Agent/index">代理合作</a>
            </div>
        </div>
    </div>
    <div class="bottom">
        <div class="container clearfix">
            <div class="fl">
                <a href="">
                    <img src="/Pub/home/img/logo.png">
                    <span class="ib"></span>
                    <p class="ib">您贴身的期权管家</p>
                </a>
            </div>
            <div class="fr tac">
                <ul class="clearfix">
                    <li class="<?php echo ($current == 'Index_index' ? 'act' : ''); ?>">
                        <a href="/index.php/Index/index">首页</a>
                    </li>
                    <li class="<?php echo ($current == 'Options_index' ? 'act' : ''); ?>">
                        <a href="/index.php/Options/index">期权服务</a>
                    </li>
                    <li class="<?php echo ($current == 'Plan_index' ? 'act' : ''); ?>">
                        <a href="/index.php/Plan/index">e计划</a>
                    </li>
                    <li class="<?php echo ($current == 'About_index' ? 'act' : ''); ?>">
                        <a href="/index.php/About/index">关于我们</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>
<!--header end-->
<section class="banner">
    <?php if(is_array($banner)): foreach($banner as $key=>$v): ?><div>
            <img src="/Pub/upload/<?php echo ($v["banner_path"]); ?>">
        </div><?php endforeach; endif; ?>
</section>
<section class="main">
    <div class="container clearfix">
        <nav class="leftNav fl">
            <ul>
                <?php if(is_array($menu)): foreach($menu as $key=>$v): ?><li>
                        <a href="/index.php/About/"><?php echo ($v["title"]); ?></a>
                    </li><?php endforeach; endif; ?>
                <!--<li>-->
                <!--<a href="">关于我们</a>-->
                <!--</li>-->
                <!--<li>-->
                <!--<a href="">安全保障</a>-->
                <!--</li>-->
                <!--<li class="act">-->
                <!--<a href="">代理合作</a>-->
                <!--</li>-->
                <!--<li>-->
                <!--<a href="">法律法规</a>-->
                <!--</li>-->
                <!--<li>-->
                <!--<a href="">人才招聘</a>-->
                <!--</li>-->
                <!--<li>-->
                <!--<a href="">联系我们</a>-->
                <!--</li>-->
            </ul>
        </nav>
        <article class="article fl"></article>
    </div>
</section>
<!--footer start-->
<footer class="footer">
    <div class="container clearfix">
        <div class="fl">
            <ul class="c999 clearfix">
                <li>
                    <a href="/index.php/Index/index">首页</a>
                </li>
                <li>
                    <a href="/index.php/Options/index">期权服务</a>
                </li>
                <li>
                    <a href="/index.php/Plan/index">e计划</a>
                </li>
                <li>
                    <a href="/index.php/About/index">关于我们</a>
                </li>
                <li>
                    <a href="/index.php/Agent/index">代理合作</a>
                </li>
            </ul>
            <div class="message">
                <p>
                    <img src="/Pub/home/img/x1.png"><?php echo ($company["tel"]); ?></p>
                <p>
                    <img src="/Pub/home/img/x2.png"><?php echo ($company["address"]); ?></p>
                <p>
                    <a href="">鲁ICP备1466332号</a>
                </p>
            </div>
        </div>
        <div class="fr c999">
            <img src="/Pub/upload/<?php echo ($qrcode["code_img"]); ?>">
            <p>扫一扫关注微信公众号</p>
        </div>
    </div>
</footer>
<!--footer end-->
<script src="/Pub/home/js/jquery-1.12.4.min.js"></script>
<script src="/Pub/home/js/slick.min.js"></script>
<script src="/Pub/home/js/common.js"></script>
<script type="text/javascript">
    $(function() {
        $('.banner').slick({
            arrows:false,
            dots: true,
            infinite: true,
            autoplay: true,
            autoplaySpeed: 2000,
        });
    });
</script>
</body>
</html>