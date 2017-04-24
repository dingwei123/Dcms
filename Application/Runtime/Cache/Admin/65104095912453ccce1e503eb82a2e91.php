<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <title>『Alone-agoni』</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="format-detection" content="telephone=no">

    <link rel="stylesheet" href="/Public/Admin/plugins/layui/css/layui.css" media="all"/>
    <link rel="stylesheet" href="/Public/Admin/css/global.css" media="all">
    <link rel="stylesheet" type="text/css" href="http://www.jq22.com/jquery/font-awesome.4.6.0.css">

</head>

<body>
<div class="layui-layout layui-layout-admin">
    <div class="layui-header header header-demo">
        <div class="layui-main">
            <div class="admin-login-box">
                <a class="logo" style="left: 0;" href="javascript:;">
                    <span style="font-size: 22px;">『Alone-agoni』</span>
                </a>
                <div class="admin-side-toggle">
                    <i class="fa fa-bars" aria-hidden="true"></i>
                </div>
            </div>
            <ul class="layui-nav admin-header-item">
                <li class="layui-nav-item">
                    <a href="javascript:;">上次登录时间:<?php echo session('LAST_LOGIN');?></a>
                </li>
                <li class="layui-nav-item">
                    <a href="javascript:;">上次登录IP地址:<?php echo session('LOGIN_IP');?></a>
                </li>
                <li class="layui-nav-item">
                    <a href="javascript:;">登录次数:<?php echo session('LOGIN_NUMBER');?></a>
                </li>
                <li class="layui-nav-item">
                    <a href="javascript:;" onclick="clearCache()">清除缓存</a>
                </li>
                <li class="layui-nav-item">
                    <a target="_blank" href="/">浏览网站</a>
                </li>
                <li class="layui-nav-item">
                    <a href="javascript:;" class="admin-header-user">
                        <img src="/Public/Admin/images/0.jpg"/>
                        <span><?php echo session('U_NAME');?></span>
                    </a>
                    <dl class="layui-nav-child">
                        <dd>
                            <a href="javascript:;" onclick="userInfo()"><i class="fa fa-gear" aria-hidden="true"></i> 个人信息</a>
                        </dd>
                        <dd>
                            <a href="<?php echo U('Login/logout');?>"><i class="fa fa-sign-out" aria-hidden="true"></i> 注销</a>
                        </dd>
                    </dl>
                </li>
            </ul>
            <ul class="layui-nav admin-header-item-mobile">
                <li class="layui-nav-item">
                    <a href="login.html"><i class="fa fa-sign-out" aria-hidden="true"></i> 注销</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="layui-side layui-bg-black" id="admin-side">
        <div class="layui-side-scroll" id="admin-navbar-side" lay-filter="side"></div>
    </div>
    <div class="layui-body" style="bottom: 0;border-left: solid 2px #1AA094;" id="admin-body">
        <div class="layui-tab admin-nav-card layui-tab-brief" lay-filter="admin-tab">
            <ul class="layui-tab-title">
                <li class="layui-this">
                    <i class="fa fa-dashboard" aria-hidden="true"></i>
                    <cite>控制面板</cite>
                </li>
            </ul>
            <div class="layui-tab-content" style="min-height: 150px; padding: 5px 0 0 0;">
                <div class="layui-tab-item layui-show">
                    <iframe src="<?php echo U('Default/dashboard');?>"></iframe>
                </div>
            </div>
        </div>
    </div>
    <div class="layui-footer footer footer-demo" id="admin-footer">
        <div class="layui-main">
            <p>2016 &copy;
                <a href="#">『Alone-agoni』</a> Wei.Ding
            </p>
        </div>
    </div>
    <div class="site-tree-mobile layui-hide">
        <i class="layui-icon">&#xe602;</i>
    </div>
    <div class="site-mobile-shade"></div>

    <script type="text/javascript" src="/Public/Admin/plugins/layui/layui.js"></script>
    <script type="text/javascript" src="/Public/Admin/datas/nav.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/index.js"></script>
    <script type="text/javascript">
        function clearCache() {
            layui.use(['layer'], function () {
                var layer = layui.layer,
                        $ = layui.jquery;

                layer.confirm("Are you sure clear cache?", function (index) {
                    $.post("<?php echo U('Default/clearCache');?>", {}, function (info) {
                        layer.msg(info.msg);
                    }, "json");
                    layer.close(index);
                });
            });
        }

        function userInfo()
        {
            layui.use(['layer'], function () {
                var layer = layui.layer,
                        $ = layui.jquery;
                layer.open({
                    type: 2,
                    title: "个人信息",
                    area: ['800px', '600px'],
                    content: "<?php echo U('Default/userInfo');?>" //这里content是一个URL，如果你不想让iframe出现滚动条，你还可以content: ['http://sentsin.com', 'no']
                });
            });
        }
    </script>
</div>
</body>

</html>