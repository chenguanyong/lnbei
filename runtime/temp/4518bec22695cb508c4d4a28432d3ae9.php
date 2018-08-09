<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:65:"E:\f\phpace_dev\public/../application/index\view\login\login.html";i:1514425757;}*/ ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>欢迎登录lnbei.com</title>

		<meta name="description" content="User login page" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="<?php echo \think\Config::get('__PUBLIC__'); ?>/static/assets/css/bootstrap.css" />
		<link rel="stylesheet" href="<?php echo \think\Config::get('__PUBLIC__'); ?>/static/components/font-awesome/css/font-awesome.css" />

		<!-- text fonts -->
		<link rel="stylesheet" href="<?php echo \think\Config::get('__PUBLIC__'); ?>/static/assets/css/ace-fonts.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="<?php echo \think\Config::get('__PUBLIC__'); ?>/static/assets/css/ace.css" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="assets/css/ace-part2.css" />
		<![endif]-->
		<link rel="stylesheet" href="<?php echo \think\Config::get('__PUBLIC__'); ?>/static/assets/css/ace-rtl.css" />

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="<?php echo \think\Config::get('__PUBLIC__'); ?>/static/assets/css/ace-ie.css" />
		<![endif]-->

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="<?php echo \think\Config::get('__PUBLIC__'); ?>/static/components/html5shiv/dist/html5shiv.min.js"></script>
		<script src="<?php echo \think\Config::get('__PUBLIC__'); ?>/static/components/respond/dest/respond.min.js"></script>
		<![endif]-->
	</head>

	<body class="login-layout">
	<style>
		label.error{
			color:#ff0000
		}
	</style>
		<div class="main-container">
			<div class="main-content">
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1">
						<div class="login-container">
							<div class="center">
								<h1>
									<i class="ace-icon fa fa-leaf green"></i>
									<span class="red">lnbei</span>
									<span class="white" id="id-text2">后台管理系统</span>
								</h1>
								<h4 class="blue" id="id-company-text">&copy;林北软件</h4>
							</div>

							<div class="space-6"></div>

							<div class="position-relative">
								<div id="login-box" class="login-box visible widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header blue lighter bigger">
												<i class="ace-icon fa fa-coffee green"></i>
												请输入账号
											</h4>

											<div class="space-6"></div>

											<form id="loginForm">
												<fieldset>
													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input id="login_name" type="text" class="form-control" name="Username" placeholder="用户名" />
															<i class="ace-icon fa fa-user"></i>
														</span>
													</label>

													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input id="password" type="password" class="form-control" name="Password" placeholder="密码" />
															<i class="ace-icon fa fa-lock"></i>
														</span>
													</label>

													<div class="space"></div>

													<div class="clearfix">
														<label class="inline">
															<input id="remember_me" type="checkbox" class="ace" />
															<span class="lbl"> 记住用户名 </span>
														</label>

														<button  type="submit" class="width-35 pull-right btn btn-sm btn-primary">
															<i class="ace-icon fa fa-key"></i>
															<span class="bigger-110">登录</span>
														</button>
													</div>

													<div class="space-4"></div>
												</fieldset>
											</form>

										</div><!-- /.widget-main -->

										<div class="toolbar clearfix">
											<div>
												<a href="#" data-target="#forgot-box" class="forgot-password-link">
													<i class="ace-icon fa fa-arrow-left"></i>
													忘记密码
												</a>
											</div>

											<div>
												<a href="#" data-target="#signup-box" class="user-signup-link">
													注册
													<i class="ace-icon fa fa-arrow-right"></i>
												</a>
											</div>
										</div>
									</div><!-- /.widget-body -->
								</div><!-- /.login-box -->

								<div id="forgot-box" class="forgot-box widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header red lighter bigger">
												<i class="ace-icon fa fa-key"></i>
												找回密码
											</h4>

											<div class="space-6"></div>
											<p>
												输入注册时的邮箱
											</p>

											<form id="retrieveForm">
												<fieldset>
													<label class="block clearfix">
														<span  for="userEmail" class="block input-icon input-icon-right">
															<input type="email" name="userEmail" class="form-control" placeholder="请输入邮箱" />
															<i class="ace-icon fa fa-envelope"></i>
														</span>
													</label>

													<div class="clearfix">
														<button type="submit" id="retrievesubmit" data-url="<?php echo url('index/index'); ?>" class="width-35 pull-right btn btn-sm btn-danger">
															<i class="ace-icon fa fa-lightbulb-o"></i>
															<span class="bigger-110" >获取验证码</span>
														</button>
													</div>
												</fieldset>
											</form>
										</div><!-- /.widget-main -->

										<div class="toolbar center">
											<a href="#" data-target="#login-box" class="back-to-login-link">
												返回登录
												<i class="ace-icon fa fa-arrow-right"></i>
											</a>
										</div>
									</div><!-- /.widget-body -->
								</div><!-- /.forgot-box -->

								<div id="signup-box" class="signup-box widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header green lighter bigger">
												<i class="ace-icon fa fa-users blue"></i>
												注册新用户
											</h4>

											<div class="space-6"></div>
											<p> 开始输入你的资料: </p>

											<form  id="registerform">
												<fieldset>
													<label for="Email" class="block clearfix">
														<span form="Email" class="block input-icon input-icon-right">
															<input type="email" name="Email" class="form-control" placeholder="邮箱" />
															<i class="ace-icon fa fa-envelope"></i>
														</span>
													</label>

													<label for="UserName" class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" name="UserName" class="form-control" placeholder="用户名" />
															<i class="ace-icon fa fa-user"></i>
														</span>
													</label>

													<label for="PassWord" class="block clearfix">
														<span  class="block input-icon input-icon-right">
															<input type="password" class="form-control" name="PassWord" id="onePassword" placeholder="密码" />
															<i class="ace-icon fa fa-lock"></i>
														</span>
													</label>

													<label for="rePassword" class="block clearfix">
														<span  class="block input-icon input-icon-right">
															<input type="password" class="form-control" name="rePassword" placeholder="重新输入密码" />
															<i class="ace-icon fa fa-retweet"></i>
														</span>
													</label>

													<label  class="block">
														<input name="agree" id="agree" type="checkbox" class="ace" />
														<span  class="lbl">
															我同意
															<a href="#">《用户协议》</a>
														</span>
													</label>

													<div class="space-24"></div>

													<div class="clearfix">
														<button type="reset" class="width-30 pull-left btn btn-sm">
															<i class="ace-icon fa fa-refresh"></i>
															<span class="bigger-110">重置</span>
														</button>

														<button type="submit" data-url="<?php echo url('index/login/register'); ?>" id="registersubmit" class="width-65 pull-right btn btn-sm btn-success">
															<span class="bigger-110">注册</span>

															<i class="ace-icon fa fa-arrow-right icon-on-right"></i>
														</button>
													</div>
												</fieldset>
											</form>
										</div>

										<div class="toolbar center">
											<a href="#" data-target="#login-box" class="back-to-login-link">
												<i class="ace-icon fa fa-arrow-left"></i>
												返回登录
											</a>
										</div>
									</div><!-- /.widget-body -->
								</div><!-- /.signup-box -->
							</div><!-- /.position-relative -->

							<div class="navbar-fixed-top align-right">
								<br />
								&nbsp;
								<a id="btn-login-dark" href="#">Dark</a>
								&nbsp;
								<span class="blue">/</span>
								&nbsp;
								<a id="btn-login-blur" href="#">Blur</a>
								&nbsp;
								<span class="blue">/</span>
								&nbsp;
								<a id="btn-login-light" href="#">Light</a>
								&nbsp; &nbsp; &nbsp;
							</div>
						</div>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.main-content -->
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script src="<?php echo \think\Config::get('__PUBLIC__'); ?>/static/components/jquery/dist/jquery.js"></script>

		<!-- <![endif]-->

		<script src="<?php echo \think\Config::get('__PUBLIC__'); ?>/js/cookie.js"></script>
		<script src="<?php echo \think\Config::get('__PUBLIC__'); ?>/js/form.js"></script>
		<script src="<?php echo \think\Config::get('__PUBLIC__'); ?>/js/jquery_js.js"></script>
		<script type="text/javascript" src="<?php echo \think\Config::get('__PUBLIC__'); ?>/js/jquery.validate.min.js"></script>
		<script type="text/javascript" src="<?php echo \think\Config::get('__PUBLIC__'); ?>/js/messages_zh.min.js"></script>
		<!--[if IE]>
<script src="components/jquery.1x/dist/jquery.js"></script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='<?php echo \think\Config::get('__PUBLIC__'); ?>/static/components/_mod/jquery.mobile.custom/jquery.mobile.custom.js'>"+"<"+"/script>");
		</script>

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			jQuery(function($) {
			 $(document).on('click', '.toolbar a[data-target]', function(e) {
				e.preventDefault();
				var target = $(this).data('target');
				$('.widget-box.visible').removeClass('visible');//hide others
				$(target).addClass('visible');//show target
			 });
			});

			//you don't need this, just used for changing background
			jQuery(function($) {
			 $('#btn-login-dark').on('click', function(e) {
				$('body').attr('class', 'login-layout');
				$('#id-text2').attr('class', 'white');
				$('#id-company-text').attr('class', 'blue');
				
				e.preventDefault();
			 });
			 $('#btn-login-light').on('click', function(e) {
				$('body').attr('class', 'login-layout light-login');
				$('#id-text2').attr('class', 'grey');
				$('#id-company-text').attr('class', 'blue');
				
				e.preventDefault();
			 });
			 $('#btn-login-blur').on('click', function(e) {
				$('body').attr('class', 'login-layout blur-login');
				$('#id-text2').attr('class', 'white');
				$('#id-company-text').attr('class', 'light-blue');
				
				e.preventDefault();
			 });
			 
			});
			
			//------------------------------------
			//JS 检查浏览器是否保存有用户账号，若有则填充表单
		
			var cookies_user_name = '';
			cookies_user_name = Get_Cookie("user_login_name");
		
			if (cookies_user_name != '' && cookies_user_name != null) {
				$("#login_name").val(cookies_user_name);
				$("#remember_me").prop("checked", true);
				$("#password").focus();
			} else {
				$("#login_name").focus();
			}
		
			//------------------------------------
			//JS 检查表单状态
		
			function CheckFormState() {
		
				//检查表单域是否含有特殊字符，是否为空
		
/*				if (FormCheckText('login_name', '用户账号', false, false) == false) {
					return false;
				}
		
				if (FormCheckText('password', '用户密码', false, false) == false) {
					return false;
				}
		
				if (FormCheckText('verify_code', '验证码', false, false) == false) {
					return false;
				}
		
				//检查表单域是否含有汉字
		
				if (FormCheckHasChinese('login_name', '用户账号', false) == false) {
					return false;
				}
		
				if (FormCheckHasChinese('password', '用户密码', false) == false) {
					return false;
				}
		
				if (FormCheckHasChinese('verify_code', '验证码', false) == false) {
					return false;
				}
		
				//检查保存账号设置
		
				if ($("#remember_me").prop("checked") == true) {
		
					//alert("提示：用户选择了记住用户名。");
					Set_Cookie("user_login_name", $("#login_name").val(), 365, '/');
		
				} else {
					Delete_Cookie("user_login_name", '/');
				}*/
				login_post();
				return true;
			}
		
			//------------------------------------
			// 登录表单	
			// 判断浏览器类型
		/*	if (navigator.userAgent.indexOf("MSIE") > 0) {
				//IE
				document.onkeydown = function() {
					if (13 == event.keyCode) {
						//alert('browser is ie and enter key down');
						CheckFormState();
						//login_post();
					}
				}
			} else {
				//非IE
				window.onkeydown = function() {
					if (13 == event.keyCode) {
						//alert('browser is not ie and enter key down');
						//login_post();
						CheckFormState();
					}
				}
			}
			*/
			function login_post() {		
		
				var url = "<?php echo \think\Config::get('__PUBLIC__'); ?>/index/Login";
				$.ajax({
					url : url,
					data :{data:$('#login_name').val()+'-'+$('#password').val()},
					type : "post",
					dataType : "json",
					success : function(data) {
		
							if(data.res == 1){
								//alert(location.protocol+location.hostname);
								window.location.href=location.protocol+"//"+location.hostname+":"+location.port+'/index';
							}else{
								alert('登录失败');
								
							};
					}
				});
			};
		(function($){
			
			var input = {};
			var url=null;
			$("#registersubmit").on("click",function(){
				$("#registerform").find("input[name]").each(function(){
					eval("input."+$(this).attr("name")+"='"+$(this).val()+"';");
				});
				url = $(this).attr("data-url");
				var agree =$(":checked").val();
			});
			$("#retrievesubmit").on("click",function(){
				$("#retrieveForm").find("input[name]").each(function(){
					eval("input."+$(this).attr("name")+"='"+$(this).val()+"';");
				});
				url = $(this).attr("data-url");
			});

	
				// 在键盘按下并释放及提交后验证提交表单
				  $("#registerform").validate({
					    rules: {
					     UserName: {
					        required: true,
					        minlength: 2
					      },
					      Email: {
					        required: true,
					        email: true
					      },
					      PassWord:{
					    	  required: true, 
					    	  rangelength:[5,10]
					      },
					      rePassword:{
					    	  required: true, 
					    	  equalTo: "#onePassword"
					      }
					    },
					    messages: {
					    	UserName: {
					        required: "请输入用户名",
					        minlength: "用户名必需由两个字母组成"
					      },
					      Email: "请输入一个正确的邮箱",
					      PassWord: "请输入一个正确密码",
					      rePassword:{
					    	  required: "请输入密码",
					          minlength: "密码长度不能小于 5 个字母",
					          equalTo: "两次密码输入不一致"
					      }
					    },
					    submitHandler: function() {
					    	if($("#agree").is(':checked')==false){alert("请仔细阅读用户协议");return false;}
					    	if(url == null) return false;
					    	$.post(url,input,function(data){
					    		if(data.code == 1){
					    			window.location="<?php echo url('index/login/sucess'); ?>";
					    		}else{
					    			alert(data.msg);
					    		}
					    		
					    	},"json");
					    	return false;
					    }
					});
				
				  $("#retrieveForm").validate({
					    rules: {
					      userEmail: {
					        required: true,
					        email: true
					      },
					    },
					    messages: {
					      userEmail: "请输入一个正确的邮箱",
					    },
					    submitHandler: function() {
					    	var url = "<?php echo url('index/login/sendCheckCode'); ?>";
					    	if(url == null) return false;
					    	$.post(url,input,function(data){
					    		if(data.code == 1){
					    			alert(data.msg);//window.location="<?php echo url('index/index/index'); ?>";
					    		}else{
					    			alert(data.msg);
					    		}
					    		
					    	},"json");
					    	return false;
					    }
					});
				  $("#loginForm").validate({
					    rules: {
					      userEmail: {
					        required: true,
					        email: true
					      },
					    },
					    messages: {
					      userEmail: "请输入一个正确的邮箱",
					    },
					    submitHandler: function() {
					    	login_post();
					    	return false;
					    }
					});
			
		})(window.jQuery)
		</script>
        
	</body>
</html>
