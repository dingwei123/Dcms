<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>

<html>

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<title>『ぼ瘋吙隵豬猴』后台登录</title>
		<link rel="stylesheet" type="text/css" href="/Public/Admin/plugins/layui/css/layui.css" media="all" />
		<link rel="stylesheet" type="text/css" href="/Public/Admin/css/login.css" />
	</head>

	<body class="beg-login-bg">
		<div class="beg-login-box">
			<header>
				<h1>『ぼ瘋吙隵豬猴』后台管理系统</h1>
			</header>
			<div class="beg-login-main">
				<form action="/manage/login" class="layui-form" method="post">
					<div class="layui-form-item">
						<label class="beg-login-icon"><i class="layui-icon">&#xe612;</i></label>
						<input type="text" name="userName" id="userName" autocomplete="off" placeholder="这里输入登录名" class="layui-input">
					</div>
					<div class="layui-form-item">
						<label class="beg-login-icon"><i class="layui-icon">&#xe642;</i></label>
						<input type="password" name="password" id="password" autocomplete="off" placeholder="这里输入密码" class="layui-input">
					</div>
					<div class="layui-form-item">
						<label class="beg-login-icon"><i class="layui-icon">&#xe60c;</i></label>
						<input type="text" name="verify"  id="verify" autocomplete="off" placeholder="这里输入验证码" class="layui-input" style="width:58%;">
						<div class="verify"> <img src="<?php echo U('Login/verify');?>"
											onclick="javascript:this.src='<?php echo U('Login/verify');?>&tm='+Math.random()"
											alt="点击刷新" style="cursor: pointer;" width="75" height="34" /></div>
					</div>
					<div class="layui-form-item">
						<div class="beg-pull">
							<button  lay-submit lay-filter="login" class="layui-btn layui-btn-radius layui-btn-normal" style="width:100%;">
								<i class="layui-icon">&#xe650;</i> 登录
							</button>
						</div>
						<div class="beg-clear"></div>
					</div>
				</form>
			</div>
			<footer>
				<p>『ぼ瘋吙隵豬猴』 © </p>
			</footer>
		</div>
		
		<script type="text/javascript" src="/Public/Admin/plugins/layui/layui.js"></script>
		<script type="text/javascript" src="http://cdn.bootcss.com/blueimp-md5/1.1.0/js/md5.min.js"></script>
		<script type="text/javascript">
			layui.use(['layer', 'form'], function() {
				var layer = layui.layer,
					$ = layui.jquery,
					form = layui.form();
					
				form.on('submit(login)',function(data){
					var userName = $("#userName").val();
					if($.trim(userName) == ""){
						layer.tips("请输入登录名!", "#userName");
						$("#userName").focus();
						return false;
					}
					var password = $("#password").val();
					if($.trim(password) == ""){
						layer.tips("请输入密码!", "#password");
						$("#password").focus();
						return false;
					}
					var verify = $("#verify").val();
					if($.trim(verify) == ""){
						layer.tips("请输入验证码!", "#verify");
						$("#verify").focus();
						return false;
					}
					data.field.password = md5(data.field.password);
					$.post("<?php echo U('Login/index');?>",{params:JSON.stringify(data.field)},function(response){
						layer.alert(response.msg, {icon:response.code});
						if(response.jump != null){
							location.href = response.jump;
						}else{
							$(".verify img").trigger("click")
						}
					},"json");
					return false;
				});
			});
		</script>
	</body>
</html>