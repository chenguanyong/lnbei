<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:65:"E:\f\phpace_dev\public/../application/index\view\index\index.html";i:1507509414;s:65:"E:\f\phpace_dev\public/../application/index\view\public\head.html";i:1527577934;s:67:"E:\f\phpace_dev\public/../application/index\view\public\header.html";i:1504146065;s:65:"E:\f\phpace_dev\public/../application/index\view\public\menu.html";i:1503993943;s:67:"E:\f\phpace_dev\public/../application/index\view\public\footer.html";i:1527577871;}*/ ?>

	<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>后台管理系统</title>

		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!--[if !IE]> -->

		<!-- <link rel="stylesheet" href="<?php echo \think\Config::get('__PUBLIC__'); ?>/static/assets/css/pace.css" />
		<script data-pace-options='{ "ajax": true, "document": true, "eventLag": false, "elements": false }' src="<?php echo \think\Config::get('__PUBLIC__'); ?>/static/components/PACE/pace.js"></script> -->

		<!-- <![endif]-->

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="<?php echo \think\Config::get('__PUBLIC__'); ?>/static/assets/css/bootstrap.css" />
		<link rel="stylesheet" href="<?php echo \think\Config::get('__PUBLIC__'); ?>/css/treegrid/jquery.treegrid.css" />
		<link rel="stylesheet" href="<?php echo \think\Config::get('__PUBLIC__'); ?>/static/components/font-awesome/css/font-awesome.css" />

		<!-- text fonts -->
		<link rel="stylesheet" href="<?php echo \think\Config::get('__PUBLIC__'); ?>/static/assets/css/ace-fonts.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="<?php echo \think\Config::get('__PUBLIC__'); ?>/static/assets/css/ace.css" class="ace-main-stylesheet" id="main-ace-style" />
		<!--[if lte IE 9]>
			<link rel="stylesheet" href="<?php echo \think\Config::get('__PUBLIC__'); ?>/static/assets/css/ace-part2.css" class="ace-main-stylesheet" />
		<![endif]-->
		<link rel="stylesheet" href="<?php echo \think\Config::get('__PUBLIC__'); ?>/static/assets/css/ace-skins.css" />
		<link rel="stylesheet" href="<?php echo \think\Config::get('__PUBLIC__'); ?>/static/assets/css/ace-rtl.css" />
		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="<?php echo \think\Config::get('__PUBLIC__'); ?>/static/assets/css/ace-ie.css" />
		<![endif]-->
		<link rel="stylesheet" href="<?php echo \think\Config::get('__PUBLIC__'); ?>/css/common.css" />
		<link rel="stylesheet" href="<?php echo \think\Config::get('__PUBLIC__'); ?>/js/zTree/css/zTreeStyle/zTreeStyle.css" />
		<!-- ace settings handler -->
		<script src="<?php echo \think\Config::get('__PUBLIC__'); ?>/static/assets/js/ace-extra.js"></script>
		<script src="<?php echo \think\Config::get('__PUBLIC__'); ?>/static/components/jquery/dist/jquery.js"></script>
		<script src="<?php echo \think\Config::get('__PUBLIC__'); ?>/js/treegrid/jquery.treegrid.js"></script>
		<script type="text/javascript" src="<?php echo \think\Config::get('__PUBLIC__'); ?>/js/treegrid/jquery.treegrid.js"></script>
        <script type="text/javascript" src="<?php echo \think\Config::get('__PUBLIC__'); ?>/js/treegrid/jquery.treegrid.bootstrap2.js"></script>
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='<?php echo \think\Config::get('__PUBLIC__'); ?>/static/components/_mod/jquery.mobile.custom/jquery.mobile.custom.js'>"+"<"+"/script>");
		</script>
		<script src="<?php echo \think\Config::get('__PUBLIC__'); ?>/static/components/bootstrap/dist/js/bootstrap.js"></script>
		<script src="<?php echo \think\Config::get('__PUBLIC__'); ?>/static/components/_mod/jquery-ui.custom/jquery-ui.custom.js"></script>
		<script src="<?php echo \think\Config::get('__PUBLIC__'); ?>/static/components/jqueryui-touch-punch/jquery.ui.touch-punch.js"></script>
		<script src="<?php echo \think\Config::get('__PUBLIC__'); ?>/static/components/bootbox.js/bootbox.js"></script>
		<script src="<?php echo \think\Config::get('__PUBLIC__'); ?>/static/components/_mod/easypiechart/jquery.easypiechart.js"></script>
		<script src="<?php echo \think\Config::get('__PUBLIC__'); ?>/static/components/jquery.gritter/js/jquery.gritter.js"></script>
		<script src="<?php echo \think\Config::get('__PUBLIC__'); ?>/static/components/spin.js/spin.js"></script>
		<script src="<?php echo \think\Config::get('__PUBLIC__'); ?>/static/components/jquery-ui/jquery-ui.js"></script>
		<script src="<?php echo \think\Config::get('__PUBLIC__'); ?>/static/components/jqueryui-touch-punch/jquery.ui.touch-punch.js"></script>
		<link rel="stylesheet" href="<?php echo \think\Config::get('__PUBLIC__'); ?>/static/components/_mod/jquery-ui/jquery-ui.css" />
		<link rel="stylesheet" href="<?php echo \think\Config::get('__PUBLIC__'); ?>/static/components/bootstrap-datepicker/dist/css/bootstrap-datepicker3.css" />
		<link rel="stylesheet" href="<?php echo \think\Config::get('__PUBLIC__'); ?>/static/components/_mod/jqgrid/ui.jqgrid.css" />
		<!-- ace scripts -->
		<script src="<?php echo \think\Config::get('__PUBLIC__'); ?>/static/components/bootstrap-datepicker/dist/js/bootstrap-datepicker.js"></script>
		<script src="<?php echo \think\Config::get('__PUBLIC__'); ?>/static/assets/js/src/elements.scroller.js"></script>
		<script src="<?php echo \think\Config::get('__PUBLIC__'); ?>/static/assets/js/src/elements.colorpicker.js"></script>
		<script src="<?php echo \think\Config::get('__PUBLIC__'); ?>/static/assets/js/src/elements.fileinput.js"></script>
		<script src="<?php echo \think\Config::get('__PUBLIC__'); ?>/static/assets/js/src/elements.typeahead.js"></script>
		<script src="<?php echo \think\Config::get('__PUBLIC__'); ?>/static/assets/js/src/elements.wysiwyg.js"></script>
		<script src="<?php echo \think\Config::get('__PUBLIC__'); ?>/static/assets/js/src/elements.spinner.js"></script>
		<script src="<?php echo \think\Config::get('__PUBLIC__'); ?>/static/assets/js/src/elements.treeview.js"></script>
		<script src="<?php echo \think\Config::get('__PUBLIC__'); ?>/static/assets/js/src/elements.wizard.js"></script>
		<script src="<?php echo \think\Config::get('__PUBLIC__'); ?>/static/assets/js/src/elements.aside.js"></script>
		<script src="<?php echo \think\Config::get('__PUBLIC__'); ?>/static/assets/js/src/ace.js"></script>
		<script src="<?php echo \think\Config::get('__PUBLIC__'); ?>/static/assets/js/src/ace.basics.js"></script>
		<script src="<?php echo \think\Config::get('__PUBLIC__'); ?>/static/assets/js/src/ace.scrolltop.js"></script>
		<script src="<?php echo \think\Config::get('__PUBLIC__'); ?>/static/assets/js/src/ace.ajax-content.js"></script>
		<script src="<?php echo \think\Config::get('__PUBLIC__'); ?>/static/assets/js/src/ace.touch-drag.js"></script>
		<script src="<?php echo \think\Config::get('__PUBLIC__'); ?>/static/assets/js/src/ace.sidebar.js"></script>
		<script src="<?php echo \think\Config::get('__PUBLIC__'); ?>/static/assets/js/src/ace.sidebar-scroll-1.js"></script>
		<script src="<?php echo \think\Config::get('__PUBLIC__'); ?>/static/assets/js/src/ace.submenu-hover.js"></script>
		<script src="<?php echo \think\Config::get('__PUBLIC__'); ?>/static/assets/js/src/ace.widget-box.js"></script>
		<script src="<?php echo \think\Config::get('__PUBLIC__'); ?>/static/assets/js/src/ace.settings.js"></script>
		<script src="<?php echo \think\Config::get('__PUBLIC__'); ?>/static/assets/js/src/ace.settings-rtl.js"></script>
		<script src="<?php echo \think\Config::get('__PUBLIC__'); ?>/static/assets/js/src/ace.settings-skin.js"></script>
		<script src="<?php echo \think\Config::get('__PUBLIC__'); ?>/static/assets/js/src/ace.widget-on-reload.js"></script>
		<script src="<?php echo \think\Config::get('__PUBLIC__'); ?>/static/assets/js/src/ace.searchbox-autocomplete.js"></script>
		<script src="<?php echo \think\Config::get('__PUBLIC__'); ?>/static/components/_mod/fuelux/tree.js"></script><!---ace树结构库-->
		<script src="<?php echo \think\Config::get('__PUBLIC__'); ?>/static/assets/js/src/elements.treeview.js"></script><!---ace树结构库-->
		<script src="<?php echo \think\Config::get('__PUBLIC__'); ?>/static/assets/js/ace-elements.js"></script>
		<script src="<?php echo \think\Config::get('__PUBLIC__'); ?>/static/components/jqGrid/js/jquery.jqGrid.js"></script>
		<script src="<?php echo \think\Config::get('__PUBLIC__'); ?>/static/components/jqGrid/js/i18n/grid.locale-en.js"></script>
		<script src="<?php echo \think\Config::get('__PUBLIC__'); ?>/static/assets/js/src/ace.ajax-content.js"></script>
		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="<?php echo \think\Config::get('__PUBLIC__'); ?>/static/components/html5shiv/dist/html5shiv.min.js"></script>
		<script src="<?php echo \think\Config::get('__PUBLIC__'); ?>/static/components/respond/dest/respond.min.js"></script>
		<![endif]-->
		<!-- layui laypage -->

		<link rel="stylesheet" href="<?php echo \think\Config::get('__PUBLIC__'); ?>/js/layui/css/layui.css" />
		<script type="text/javascript"  src="<?php echo \think\Config::get('__PUBLIC__'); ?>/js/layui/layui.js"></script>
		<script type="text/javascript"  src="<?php echo \think\Config::get('__PUBLIC__'); ?>/js/layui/lay/modules/laytpl.js"></script>
		<script type="text/javascript" src="<?php echo \think\Config::get('__PUBLIC__'); ?>/js/ztree/js/jquery.ztree.core.js"></script>
		<script type="text/javascript" src="<?php echo \think\Config::get('__PUBLIC__'); ?>/js/ztree/js/jquery.ztree.excheck.js"></script>
		<script type="text/javascript" src="<?php echo \think\Config::get('__PUBLIC__'); ?>/js/ztree/js/jquery.ztree.exedit.js"></script>
		<!-- farbtastic -->
		<link rel="stylesheet" href="<?php echo \think\Config::get('__PUBLIC__'); ?>/js/farbtastic/farbtastic.css" />
		<script type="text/javascript" src="<?php echo \think\Config::get('__PUBLIC__'); ?>/js/farbtastic/farbtastic.js"></script>
		<!-- jquery.validate -->
		<script type="text/javascript" src="<?php echo \think\Config::get('__PUBLIC__'); ?>/js/jquery.validate.min.js"></script>
		<script type="text/javascript" src="<?php echo \think\Config::get('__PUBLIC__'); ?>/js/messages_zh.min.js"></script>
		<!-- lbhttp -->
		<script type="text/javascript" src="__js__/LBHttp/lbajax.js"></script>
		<script type="text/javascript" src="__js__/LBInput/LB.Input.js"></script>

	</head>
<body class="no-skin">

		<!-- #section:basics/navbar.layout -->
		<div id="navbar" class="navbar navbar-default          ace-save-state">
			<div class="navbar-container ace-save-state" id="navbar-container">
				<!-- #section:basics/sidebar.mobile.toggle -->
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>

				<!-- /section:basics/sidebar.mobile.toggle -->
				<div class="navbar-header pull-left">
					<!-- #section:basics/navbar.layout.brand -->
					<a href="#" class="navbar-brand">
						<small>
							<i class="fa fa-leaf"></i>
							lnbei
						</small>
					</a>

					<!-- /section:basics/navbar.layout.brand -->

					<!-- #section:basics/navbar.toggle -->

					<!-- /section:basics/navbar.toggle -->
				</div>

				<!-- #section:basics/navbar.dropdown -->
				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					{
						task:{
							size:0,//数量
							data:[]//数据
							},
						waring:{
							size:0,//数量
							data:[]
							}
						msg:{
							size:0,//数量
							data:[]//数据
						}
					}
					<script type="text/html" id="msg_task_war">
						
						<li class="grey dropdown-modal">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<i class="ace-icon fa fa-tasks"></i>
								<span class="badge badge-grey">{{ d.task.size }}</span>
							</a>

							<ul class="dropdown-menu-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
								<li class="dropdown-header">
									<i class="ace-icon fa fa-check"></i>
									您有{{ d.task.size }}个任务需要去完成
								</li>
								{{# for(var i=0;i<d.task.size;i++){ }}
									  	<li>
											<a href="#">
												<div class="clearfix">
													<span class="pull-left">{{ d.task.data[i].name }}</span>
													<span class="pull-right">{{ d.task.data[i].prograss }}%</span>
												</div>

												<div class="progress progress-mini">
													<div style="width:{{ d.task.data[i].prograss }}%" class="progress-bar"></div>
												</div>
											</a>
										</li>
								{{# } }}
								<li class="dropdown-footer">
									<a href="#">
										查看详情
										<i class="ace-icon fa fa-arrow-right"></i>
									</a>
								</li>
							</ul>
						</li>
						<li class="purple dropdown-modal">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<i class="ace-icon fa fa-bell icon-animated-bell"></i>
								<span class="badge badge-important">{{ d.waring.size }}</span>
							</a>

							<ul class="dropdown-menu-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-close">
								<li class="dropdown-header">
									<i class="ace-icon fa fa-exclamation-triangle"></i>
									{{ d.waring.size }} 事项
								</li>

								<li class="dropdown-content">
									<ul class="dropdown-menu dropdown-navbar navbar-pink">
											{{# for(var i=0; i<d.waring.size; i++){}}
												<li>
													<a href="#">
														<div class="clearfix">
															<span class="pull-left">
																<i class="btn btn-xs no-hover btn-pink fa fa-comment"></i>
																{{ d.waring.data[i].name }}
															</span>
															<span class="pull-right badge badge-info">+{{ d.waring.data[i].length }}</span>
														</div>
													</a>
												</li>											

											{{# }}}
											<li class="dropdown-footer">
												<a href="#">
													查看详情
													<i class="ace-icon fa fa-arrow-right"></i>
												</a>
										</li>
									</ul>
								</li>
						<li class="green dropdown-modal">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<i class="ace-icon fa fa-envelope icon-animated-vertical"></i>
								<span class="badge badge-success">5</span>
							</a>

							<ul class="dropdown-menu-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
								<li class="dropdown-header">
									<i class="ace-icon fa fa-envelope-o"></i>
									{{ d.msg.size }} 信息
								</li>

								<li class="dropdown-content">
									<ul class="dropdown-menu dropdown-navbar">
{{# for(var i=0; i<d.msg.size;i++){ }}										
<li>

											<a href="#" class="clearfix">
												<img src="<?php echo \think\Config::get('__PUBLIC__'); ?>/static/assets/avatars/avatar.png" class="msg-photo" alt="Alex's Avatar" />
												<span class="msg-body">
													<span class="msg-title">
														<span class="blue">Alex:</span>
														{{ d.msg.data[i].name }}
													</span>

													<span class="msg-time">
														<i class="ace-icon fa fa-clock-o"></i>
														<span>{{d.msg.data[i].size}}</span>
													</span>
												</span>
											</a>
										</li>
{{# } }}									
</ul>
								</li>
<li class="light-blue dropdown-modal">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<img class="nav-user-photo" src="<?php echo \think\Config::get('__PUBLIC__'); ?>/static/assets/avatars/user.jpg" alt="Jason's Photo" />
								<span class="user-info">
									<small>Welcome,</small>
									Jason
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								<li>
									<a href="#">
										<i class="ace-icon fa fa-cog"></i>
										设置
									</a>
								</li>

								<li>
									<a href="#index/user/userProfile">
										<i class="ace-icon fa fa-user"></i>
										个人资料
									</a>
								</li>

								<li class="divider"></li>

								<li>
									<a href="<?php echo url('index/Login/loginout'); ?>">
										<i class="ace-icon fa fa-power-off"></i>
										安全退出
									</a>
								</li>
							</ul>
						</li>

					</script>
					
					
					<ul class="nav ace-nav" id="msg_task_waring">
						<li class="grey dropdown-modal">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<i class="ace-icon fa fa-tasks"></i>
								<span class="badge badge-grey">4</span>
							</a>

							<ul class="dropdown-menu-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
								<li class="dropdown-header">
									<i class="ace-icon fa fa-check"></i>
									4 Tasks to complete
								</li>

								<li class="dropdown-content">
									<ul class="dropdown-menu dropdown-navbar">
										<li>
											<a href="#">
												<div class="clearfix">
													<span class="pull-left">Software Update</span>
													<span class="pull-right">65%</span>
												</div>

												<div class="progress progress-mini">
													<div style="width:65%" class="progress-bar"></div>
												</div>
											</a>
										</li>

										<li>
											<a href="#">
												<div class="clearfix">
													<span class="pull-left">Hardware Upgrade</span>
													<span class="pull-right">35%</span>
												</div>

												<div class="progress progress-mini">
													<div style="width:35%" class="progress-bar progress-bar-danger"></div>
												</div>
											</a>
										</li>

										<li>
											<a href="#">
												<div class="clearfix">
													<span class="pull-left">Unit Testing</span>
													<span class="pull-right">15%</span>
												</div>

												<div class="progress progress-mini">
													<div style="width:15%" class="progress-bar progress-bar-warning"></div>
												</div>
											</a>
										</li>

										<li>
											<a href="#">
												<div class="clearfix">
													<span class="pull-left">Bug Fixes</span>
													<span class="pull-right">90%</span>
												</div>

												<div class="progress progress-mini progress-striped active">
													<div style="width:90%" class="progress-bar progress-bar-success"></div>
												</div>
											</a>
										</li>
									</ul>
								</li>

								<li class="dropdown-footer">
									<a href="#">
										See tasks with details
										<i class="ace-icon fa fa-arrow-right"></i>
									</a>
								</li>
							</ul>
						</li>

						<li class="purple dropdown-modal">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<i class="ace-icon fa fa-bell icon-animated-bell"></i>
								<span class="badge badge-important">8</span>
							</a>

							<ul class="dropdown-menu-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-close">
								<li class="dropdown-header">
									<i class="ace-icon fa fa-exclamation-triangle"></i>
									8 Notifications
								</li>

								<li class="dropdown-content">
									<ul class="dropdown-menu dropdown-navbar navbar-pink">
										<li>
											<a href="#">
												<div class="clearfix">
													<span class="pull-left">
														<i class="btn btn-xs no-hover btn-pink fa fa-comment"></i>
														New Comments
													</span>
													<span class="pull-right badge badge-info">+12</span>
												</div>
											</a>
										</li>

										<li>
											<a href="#">
												<i class="btn btn-xs btn-primary fa fa-user"></i>
												Bob just signed up as an editor ...
											</a>
										</li>

										<li>
											<a href="#">
												<div class="clearfix">
													<span class="pull-left">
														<i class="btn btn-xs no-hover btn-success fa fa-shopping-cart"></i>
														New Orders
													</span>
													<span class="pull-right badge badge-success">+8</span>
												</div>
											</a>
										</li>

										<li>
											<a href="#">
												<div class="clearfix">
													<span class="pull-left">
														<i class="btn btn-xs no-hover btn-info fa fa-twitter"></i>
														Followers
													</span>
													<span class="pull-right badge badge-info">+11</span>
												</div>
											</a>
										</li>
									</ul>
								</li>

								<li class="dropdown-footer">
									<a href="#">
										See all notifications
										<i class="ace-icon fa fa-arrow-right"></i>
									</a>
								</li>
							</ul>
						</li>

						<li class="green dropdown-modal">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<i class="ace-icon fa fa-envelope icon-animated-vertical"></i>
								<span class="badge badge-success">5</span>
							</a>

							<ul class="dropdown-menu-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
								<li class="dropdown-header">
									<i class="ace-icon fa fa-envelope-o"></i>
									5 Messages
								</li>

								<li class="dropdown-content">
									<ul class="dropdown-menu dropdown-navbar">
										<li>
											<a href="#" class="clearfix">
												<img src="<?php echo \think\Config::get('__PUBLIC__'); ?>/static/assets/avatars/avatar.png" class="msg-photo" alt="Alex's Avatar" />
												<span class="msg-body">
													<span class="msg-title">
														<span class="blue">Alex:</span>
														Ciao sociis natoque penatibus et auctor ...
													</span>

													<span class="msg-time">
														<i class="ace-icon fa fa-clock-o"></i>
														<span>a moment ago</span>
													</span>
												</span>
											</a>
										</li>

										<li>
											<a href="#" class="clearfix">
												<img src="<?php echo \think\Config::get('__PUBLIC__'); ?>/static/assets/avatars/avatar3.png" class="msg-photo" alt="Susan's Avatar" />
												<span class="msg-body">
													<span class="msg-title">
														<span class="blue">Susan:</span>
														Vestibulum id ligula porta felis euismod ...
													</span>

													<span class="msg-time">
														<i class="ace-icon fa fa-clock-o"></i>
														<span>20 minutes ago</span>
													</span>
												</span>
											</a>
										</li>

										<li>
											<a href="#" class="clearfix">
												<img src="<?php echo \think\Config::get('__PUBLIC__'); ?>/static/assets/avatars/avatar4.png" class="msg-photo" alt="Bob's Avatar" />
												<span class="msg-body">
													<span class="msg-title">
														<span class="blue">Bob:</span>
														Nullam quis risus eget urna mollis ornare ...
													</span>

													<span class="msg-time">
														<i class="ace-icon fa fa-clock-o"></i>
														<span>3:15 pm</span>
													</span>
												</span>
											</a>
										</li>

										<li>
											<a href="#" class="clearfix">
												<img src="<?php echo \think\Config::get('__PUBLIC__'); ?>/static/assets/avatars/avatar2.png" class="msg-photo" alt="Kate's Avatar" />
												<span class="msg-body">
													<span class="msg-title">
														<span class="blue">Kate:</span>
														Ciao sociis natoque eget urna mollis ornare ...
													</span>

													<span class="msg-time">
														<i class="ace-icon fa fa-clock-o"></i>
														<span>1:33 pm</span>
													</span>
												</span>
											</a>
										</li>

										<li>
											<a href="#" class="clearfix">
												<img src="<?php echo \think\Config::get('__PUBLIC__'); ?>/static/assets/avatars/avatar5.png" class="msg-photo" alt="Fred's Avatar" />
												<span class="msg-body">
													<span class="msg-title">
														<span class="blue">Fred:</span>
														Vestibulum id penatibus et auctor  ...
													</span>

													<span class="msg-time">
														<i class="ace-icon fa fa-clock-o"></i>
														<span>10:09 am</span>
													</span>
												</span>
											</a>
										</li>
									</ul>
								</li>

								<li class="dropdown-footer">
									<a href="#page/inbox">
										See all messages
										<i class="ace-icon fa fa-arrow-right"></i>
									</a>
								</li>
							</ul>
						</li>
						<!-- #section:basics/navbar.user_menu -->
						<li class="light-blue dropdown-modal">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<img class="nav-user-photo" src="<?php echo \think\Config::get('__PUBLIC__'); ?>/static/assets/avatars/user.jpg" alt="Jason's Photo" />
								<span class="user-info">
									<small>Welcome,</small>
									Jason
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								<li>
									<a href="#">
										<i class="ace-icon fa fa-cog"></i>
										璁剧疆
									</a>
								</li>

								<li>
									<a href="#index/user/userProfile">
										<i class="ace-icon fa fa-user"></i>
										鐢ㄦ埛涓績
									</a>
								</li>

								<li class="divider">甯姪</li>

								<li>
									<a href="<?php echo url('index/Login/loginout'); ?>">
										<i class="ace-icon fa fa-power-off"></i>
										瀹夊叏閫�鍑�
									</a>
								</li>
							</ul>
						</li>

						<!-- /section:basics/navbar.user_menu -->
					</ul>
				</div>

				<!-- /section:basics/navbar.dropdown -->
			</div><!-- /.navbar-container -->
		</div>
<script>

$(document).ready(function (){
	layui.use('laytpl', function(){
	function Sms(){
		
			  var laytpl = layui.laytpl;
			  var d=new Date();
			$.post("<?php echo url('netletter/Sms/index'); ?>",{cash:d.getTime()},function (str){
			  //使用方式跟独立组件完全一样
			  if(str.code == 1){
				  var getTpl = headTitle.innerHTML;
				  laytpl(getTpl).render(str.data, function(string){
					  headTitleHtml.innerHTML = string;
				  });
				  getTpl = bordyHtml.innerHTML;
				  laytpl(getTpl).render(str.data, function(string){
					  bodyView.innerHTML = string;
					  objFormInput(str.data);
				  });
			  }else{
				  alert(str.msg);
			  }
			},"json");  
		}
	});
	
});




</script>
<!-- /section:basics/navbar.layout -->
		<div class="main-container" id="main-container">
			<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>

			<!-- #section:basics/sidebar -->
			<div id="sidebar" class="sidebar                  responsive                    ace-save-state">
				<script type="text/javascript">
					try{ace.settings.loadState('sidebar')}catch(e){}
				</script>

				<div class="sidebar-shortcuts" id="sidebar-shortcuts">
					<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
						<button class="btn btn-success">
							<i class="ace-icon fa fa-signal"></i>
						</button>

						<button class="btn btn-info">
							<i class="ace-icon fa fa-pencil"></i>
						</button>

						<!-- #section:basics/sidebar.layout.shortcuts -->
						<button class="btn btn-warning">
							<i class="ace-icon fa fa-users"></i>
						</button>

						<button class="btn btn-danger">
							<i class="ace-icon fa fa-cogs"></i>
						</button>

						<!-- /section:basics/sidebar.layout.shortcuts -->
					</div>

					<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
						<span class="btn btn-success"></span>

						<span class="btn btn-info"></span>

						<span class="btn btn-warning"></span>

						<span class="btn btn-danger"></span>
					</div>
				</div><!-- /.sidebar-shortcuts -->

								<ul class="nav nav-list">
					<?php echo $menuhtml; ?>
				</ul><!-- /.nav-list -->
				<!-- #section:basics/sidebar.layout.minimize -->
				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>

				<!-- /section:basics/sidebar.layout.minimize -->
			</div>

	

			<!-- /section:basics/sidebar -->
			<div class="main-content">
				<div class="main-content-inner">
					<!-- #section:basics/content.breadcrumbs -->
					<div class="breadcrumbs" id="breadcrumbs">
						<script type="text/javascript">
							try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
						</script>

						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="#index/index/content">Home</a>
							</li>
						</ul><!-- /.breadcrumb -->

						<!-- #section:basics/content.searchbox -->
						<div class="nav-search" id="nav-search">
							<form class="form-search">
								<span class="input-icon">
									<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
									<i class="ace-icon fa fa-search nav-search-icon"></i>
								</span>
							</form>
						</div><!-- /.nav-search -->

						<!-- /section:basics/content.searchbox -->
					</div>
					
					
					<div class="breadcrumbs" id="breadcrumbs">
						<script type="text/javascript">
							try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
						</script>

							  <ul id="content-tab" class="nav nav-tabs">
								<li data-name="before" style="float:left"><a ><i class="glyphicon glyphicon-backward"></i></a></li>
								
							
								<li data-name="next" style="float:right"><a ><i class="glyphicon glyphicon-forward"></i></a></li>
								<li data-name="close" style="float:right">
<div class="btn-group roll-nav roll-right">
                    <a class=" btn  btn-small  dropdown" style="border :0px; margin-top:-8px; padding-top:-2px; " data-toggle="dropdown" aria-expanded="false">操作<span class="caret"></span>

                    </a>
                    <ul role="menu" class="dropdown-menu dropdown-menu-right">
                        <li class="J_tabShowActive"><a>关闭当前页</a>
                        </li>
                        <li class="divider"></li>
                        <li class="J_tabCloseAll"><a>关闭所有页面</a>
                        </li>
                        <li class="J_tabCloseOther"><a>关闭右边所有的页面</a>
                        </li>
                    </ul>
                </div>		
		
		
		
		
		</li>
							  </ul>



						<!-- /section:basics/content.searchbox -->
						
						
					</div>
					<script>
				function closetab(obj){
							//alert('dsfs');
							var id = $(obj).parent("a").attr('href');
							$(id).detach();
							$(obj).parent("a").parent("li").detach();
							
						
						}
							
						(function ($ , undefined){
								
						$(window).resize(function(){
							initTab();	
						});				
						$(".J_tabShowActive").on("click",function(){
						
							$("li.active").show();
							$(".tab-pane .active").show();
						
						});
						$(".J_tabCloseAll").on("click",function(){
						
							$("[data-name=item]").detach();
							$("#tab_content").children().detach();
						
						});
						$(".J_tabCloseOther").on("click",function(){
						
							$("[data-name=item]").detach();
							$("#tab_content").children().detach();
						
						});	
						/*$("[data-name=closetab]").on("click",function(){
							alert('dsfs');
							//var id = $(this).parent("a").attr('href');
							//$(id).detach();
							//$(this).parent("a").parent("li").detach();
							
						
						});*/
						
						function initTab(){
							var li_list = $("#content-tab").children();
							if(li_list.length==0){return false;}
							var li_width=0;
							for(var i = 0; i<li_list.length; i++){
							
								li_width = li_width + li_list[i].scrollWidth;
							}
							var con_width = $("#content-tab").width();
							if(con_width < li_width){
						
								var temp = li_width - con_width;
							
								if(temp<0){
							
									return false;
								}else{
									var hide_count = Math.ceil(temp/70);
									var i=0;
									var hide_li = $("[data-name=item]");
									if(hide_li.length < 0){return false;}
									while(i < hide_count){
								
										hide_li[i].style.display = "none";
										i++;
									}
									return ;
								}						
						
							}
						
						}
						$('[data-name="before"]').on("click",function (){
						var li_list = $("#content-tab").children();
							
							
							
							if(li_list.length==0){return false;}
							var li_width=0;
							for(var i = 0; i<li_list.length; i++){
							
								li_width = li_width + li_list[i].scrollWidth;
							}
							var con_width = $("#content-tab").width();
							if(con_width < li_width){
							var i=0,a=0;
							var hide_li = $("[data-name=item]");
							if(hide_li < 0){return false;}
							while(i<2){
							
							if(hide_li[a].style.display == "none"){
							a++;
							if(a>hide_li.length){break;}
							continue;
							}else{
							hide_li[a].style.display == "inline"
							i++;
							}
							
							}
							
							}
							
						
						});
						$('[data-name="next"]').on("click",function (){
							
							var li_list = $("#content-tab").children();
							if(li_list.length==0){return false;}
							var li_width=0;
							for(var i = 0; i<li_list.length; i++){
							
								li_width = li_width + li_list[i].scrollWidth;
							}
							var con_width = $("#content-tab").width;
							if(con_width < li_width){
							var i=0,a=0;
							var hide_li = $("[data-name=item]");
							a = hide_li;
							if(hide_li.length < 0){return false;}
							while(i<2){
							
							if(hide_li[a].style.display == "none"){
							hide_li[a].style.display == "inline";
							i++;
							}else{
							a--;
							if(a<1){break;}
							continue;						
							}
							
							}
							
							}
						
						});						
						
						
						
						})(window.jQuery);
					
					
					</script>

					<!-- /section:basics/content.breadcrumbs -->
					<div class="page-content" style=" padding-left: 5px; padding-right: 5px;">
					
						<div class="page-content-area" data-ajax-content="true">
							<!-- ajax content goes here -->
						</div><!-- /.page-content-area -->
						 <div id="tab_content" class="tab-content"  style="border:0px; display:none">
						 
							
						 </div>						
						
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->	

	

				<div class="footer">
				<div class="footer-inner">
					<!-- #section:basics/footer -->
					<div class="footer-content">
						<span class="bigger-120">
							<span class="blue bolder">林北软件集团</span>
							Application &copy lnbei Software Group; 2013-2099
						</span>

						&nbsp; &nbsp;
						<span class="action-buttons">
							<a href="#">
								<i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>
							</a>

							<a href="#">
								<i class="ace-icon fa fa-facebook-square text-primary bigger-150"></i>
							</a>

							<a href="#">
								<i class="ace-icon fa fa-rss-square orange bigger-150"></i>
							</a>
						</span>
					</div>

					<!-- /section:basics/footer -->
				</div>
			</div>

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->
		
		
		<script type="text/javascript"> ace.vars['base'] = '..'; </script>
		
		<!-- 模态框集合
		每个模态框存在的时间为20分钟，超时后自动清除
		模态框标准格式为div标签嵌套模态框；
		currenttime：当前时间；timeout：超时时间
		 -->
		<div id="LB_MODEL_LIST"></div>
		<script type="text/javascript" src="__js__/LBParent/LB.Parent.js"></script>		
	</body>
</html>





		






<script>
(function ($){
	layui.use('layer', function(){
		  var layer = layui.layer;
		  
		 // layer.msg($("#chen").attr("dref"));
			//layer = layer;

		  
		});	
	
})(window.jQuery);
</script>