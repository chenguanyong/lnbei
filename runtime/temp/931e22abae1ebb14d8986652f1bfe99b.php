<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:64:"E:\f\phpace_dev\public/../application/web\view\index\design.html";i:1531189063;}*/ ?>
		<title>页面设计</title>
		<link rel="stylesheet" href="<?php echo \think\Config::get('__PUBLIC__'); ?>/js/ztree/css/zTreeStyle/zTreeStyle.css" />	
		<style>
		.width-100{
	
			width:100%;	
		}
		
		</style>
		<div class="widget-box ui-sortable-handle" id="widget-box-main">
			<div class="row" style="margin:0px;">
				<div class="row" style="margin:0px;">
				<nav class="navbar navbar-default">
					  <div class="container-fluid">
	
					    <!-- Collect the nav links, forms, and other content for toggling -->
					    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					      <ul class="nav navbar-nav">
					        <li class="dropdown">
					          <a  class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">文件 <span class="caret"></span></a>
					          <ul class="dropdown-menu">
					            <li><a href="#" lb-name="newPage" lb-action="newPage" menucode="1" lb-isAction="true"  >新建页面</a></li>
					            <li><a href="#" lb-name="newTemplate" lb-action="newTemplate" menucode="2" lb-isAction="true" >新建模板</a></li>
					            <li><a href="#" lb-name="save" lb-action="save" menucode="3" lb-isAction="true" >保存</a></li>
					            <li role="separator" class="divider"></li>
					            <li><a href="#" lb-name="saveAs" lb-action="saveAs" menucode="4" lb-isAction="true" >保存为</a></li>
					            <li role="separator" class="divider"></li>
					          </ul>
					        </li>
					      </ul>
					      <ul class="nav navbar-nav">
					        <li class="dropdown">
					          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">编辑 <span class="caret"></span></a>
					          <ul class="dropdown-menu">
					            <li><a href="#" lb-name="cut" lb-action="newPage" menucode="9"  lb-isAction="true" >剪切</a></li>
					            <li><a href="#" lb-name="copy" lb-action="newPage" menucode="5" lb-isAction="true" >复制</a></li>
					            <li><a href="#" lb-name="paste" lb-action="newPage"  menucode="6" lb-isAction="true" >粘贴</a></li>
					            <li role="separator" class="divider"></li>
					            <li><a href="#" lb-name="find" lb-action="newPage" menucode="8" lb-isAction="true" >查找</a></li>
					            <li role="separator" class="divider"></li>
					            <li><a href="#" lb-name="dele" lb-action="newPage" menucode="7" lb-isAction="true" >删除</a></li>
					          </ul>
					        </li>
					      </ul>
					      <ul class="nav navbar-nav">
					        <li class="dropdown">
					          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">工具箱<span class="caret"></span></a>
					          <ul class="dropdown-menu">
					            <li><a href="#" lb-name="sort" lb-action="sort" menucode="11" lb-isAction="true" >排序</a></li>
					            <li><a href="#" lb-name="find" lb-action="find" menucode="8" lb-isAction="true" >查找</a></li>
					            <li><a href="#" lb-name="serch" lb-action="serch" menucode="10" lb-isAction="true" >搜索</a></li>
					            <li role="separator" class="divider"></li>
					            <li><a href="javascript:void(0)" lb-name="fullScreen" menucode="12" lb-action="fullScreen" lb-isAction="true" >全屏</a></li>
					            <li><a href="javascript:void(0)" lb-name="exitFullScreen" menucode="13" lb-action="exitFullScreen" lb-isAction="true" >退出全屏</a></li>
					          </ul>
					        </li>
					      </ul>
					      <ul class="nav navbar-nav">
					        <li class="dropdown">
					          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">窗口<span class="caret"></span></a>
					          <ul class="dropdown-menu">
					            <li><a href="#" lb-name="newPage" lb-action="newPage" lb-isAction="true" >页面列表</a></li>
					            <li><a href="#" lb-name="newPage" lb-action="newPage" lb-isAction="true" >空间列表</a></li>
					            <li><a href="#" lb-name="newPage" lb-action="newPage" lb-isAction="true" >属性列表</a></li>
					            <li role="separator" class="divider"></li>
					            <li><a href="#" lb-name="help" lb-action="help" menucode="14" lb-isAction="true" >帮助</a></li>
					          </ul>
					        </li>
					      </ul>
					    </div><!-- /.navbar-collapse -->
					  </div><!-- /.container-fluid -->
				</nav>
				</div>
				<div class="row">
					<div class="col-xs-2" style="margin:0px;  padding-right:2px;">
							<div class="row" style="margin:0px">
								<div class="col-xs-12" style="padding-left:0px; padding-right:0px">
									<div id="sidebar2" class="sidebar responsive ace-save-state width-100"  data-sidebar="true" data-sidebar-scroll="true" data-sidebar-hover="true">
											<div class="widget-box widget-color-blue2">
												<div class="widget-header">
													<h4 class="widget-title lighter smaller">页面列表</h4>
												</div>
												<div class="widget-body" style="height:270px;">
													<div class="widget-main padding-8" style="max-height:270px;overflow:auto">
														<ul id="pageTree" class="ztree" ></ul>
													</div>
												</div>
											</div>
											<div class="widget-box widget-color-blue2" >
												<div class="widget-header" style="height:15px">
													<h5 class="widget-title lighter smaller">控件列表</h5>
												</div>
										
												<div class="widget-body" style="height:250px; ">
													<div class="widget-main padding-8" style="max-height:250px;overflow:auto">
														<ul id="widgetTree" class="ztree" ></ul>
													</div>
												</div>
											</div>
											<div class="sidebar-toggle sidebar-collapse">
												<i id="sidebar3-toggle-icon" class="ace-save-state ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
											</div>
									</div>
								</div>
							</div>
					</div>	
					<div class="col-xs-10" style="margin:0px; padding:0px">
							<div class="main-content " style="margin:0px; padding:0px 0px;width:99%" >
									<div class="widget-box ui-sortable-handle" id="widget-box-1">
											<div class="widget-header">
													<h5 class="widget-title">设计面板</h5>
													<!-- #section:custom/widget-box.toolbar -->
														<div class="widget-toolbar">
															<div class="widget-menu">
																<a href="#" data-action="settings" data-toggle="dropdown">
																	<i class="ace-icon fa fa-bars"></i>
																</a>
																<ul class="dropdown-menu dropdown-menu-right dropdown-light-blue dropdown-caret dropdown-closer">
																	<li>
																		<a data-toggle="tab" href="#dropdown1">设计页面</a>
																	</li>
														
																	<li>
																		<a data-toggle="tab" href="#dropdown2">HTML</a>
																	</li>
																</ul>
															</div>
														
															<a href="#" data-action="fullscreen" class="orange2">
																<i class="ace-icon fa fa-expand"></i>
															</a>
														
															<a href="#" data-action="reload">
																<i class="ace-icon fa fa-refresh"></i>
															</a>
														
															<a href="#" data-action="collapse">
																<i class="ace-icon fa fa-chevron-up"></i>
															</a>
														
															<a href="#" data-action="close">
																<i class="ace-icon fa fa-times"></i>
															</a>
														</div>
											
											<!-- /section:custom/widget-box.toolbar -->
											</div>
									
											<div class="widget-body" id="page_main" style="height:570px; background-color:#ffffff">
				
												<div id="draggable" class="ui-widget-content">
												  <!--  <p>Drag me around</p> -->
												  <iframe src="web\Design_Action\index" frameborder=0 scrolling="auto" name="workSpace" style="height: -webkit-fill-available;" class="col-sm-12" >
												  </iframe>
												</div>
												
											</div>
									</div>								
							</div>
					</div>
				</div>
			</div>
		</div>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
  测试
</button>
<div id="model">
<!-- Modal -->
<div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">对象属性</h4>
      </div>
      <div class="modal-body" style="padding:1px">
        <table class="table table-bordered table-striped" style="margin:0px">
														<tbody>
															<tr class="active ">
																<td class="width-15">名称:</td>
																<td class="width-35">
																		<input type="text" id="name" placeholder="请输入名称" class="col-xs-12 col-sm-12">
																</td>
																<td class="width-15">背景颜色:</td>
																<td class="width-35">
																		
																		<div class="btn-group">
																		<input type="text" id="backgroudcolor" value="#668899"  class="col-xs-9 col-sm-9 colorwell">
												<a data-toggle="dropdown" class="btn btn-success dropdown-toggle col-xs-2 col-sm-2" style="padding:4px;" aria-expanded="false">
													<span class="ace-icon fa fa-caret-down icon-on-right"></span>
												</a>

												<div class="dropdown-menu dropdown-default">
													<div id="picker" ></div>
													 <script type="text/javascript" charset="utf-8">
													  $(document).ready(function() {
													    //$('#demo').hide();
													    var f = $.farbtastic('#picker');
													    var p = $('#picker').css('opacity', 1);
													    var selected;
													    $('.colorwell')
													      .each(function () { f.linkTo(this);  });
													 
													  });
													 </script>
												</div>
											</div>
																</td>
																
															</tr>
															<tr class="success">
																<td class="width-15">宽度:</td>
																<td class="width-35">
																		<div class="input-group"><input type="text" id="spinner_width" class="spinbox-input form-control text-center"></div>
																</td>
																<td class="width-15">高度:</td>
																<td class="width-35">
																		<div class="input-group"><input type="text" id="spinner_height" class="spinbox-input form-control text-center"></div>
																</td>
															</tr>
															 <tr class="active">
																<td class="width-15">数据表</td>
																<td class="width-35">
																<select class="form-control" id="form-field-select-1">
																<option value=""></option>
																<option value="AL">Alabama</option>
																<option value="AK">Alaska</option>
															
															</select>
																</td>
																<td class="width-15">条件1：</td>
																<td class="width-35">
															<select class="col-xs-5 col-sm-5" style="padding:0px;" id="form-field-select-1">
																<option value=""></option>
																<option value="AL">Alabama</option>
																<option value="AK">Alaska</option>
														
															</select>
															<select class="col-xs-2 col-sm-2" style="padding:0px; " id="form-field-select-1">
																<option value=""></option>
																<option value="1">=</option>
																<option value="2">></option>
																<option value="3">&lt;</option>
																<option value="4">!=</option>
														
															</select>
															<input type="text" id="form-field-1" placeholder="Username"  class="small col-xs-5 col-sm-5" style="padding-bottom:4px;">															
																</td>
															</tr >
																 <tr class="success">
																<td class="width-15">条件2:</td>
																<td class="width-35">
															<select class="col-xs-5 col-sm-5" style="padding:0px;" id="form-field-select-1">
																<option value=""></option>
																<option value="AL">Alabama</option>
																<option value="AK">Alaska</option>
														
															</select>
															<select class="col-xs-2 col-sm-2" style="padding:0px; " id="form-field-select-1">
																<option value=""></option>
																<option value="1">=</option>
																<option value="2">></option>
																<option value="3">&lt;</option>
																<option value="4">!=</option>
														
															</select>
															<input type="text" id="form-field-1" placeholder="Username"  class="small col-xs-5 col-sm-5" style="padding-bottom:4px;">															
																																		
																</td>
																<td class="width-15">条件3:</td>
																<td class="width-35">
																		
															<select class="col-xs-5 col-sm-5" style="padding:0px;" id="form-field-select-1">
																<option value=""></option>
																<option value="AL">Alabama</option>
																<option value="AK">Alaska</option>
														
															</select>
															<select class="col-xs-2 col-sm-2" style="padding:0px; " id="form-field-select-1">
																<option value=""></option>
																<option value="1">=</option>
																<option value="2">></option>
																<option value="3">&lt;</option>
																<option value="4">!=</option>
														
															</select>
															<input type="text" id="form-field-1" placeholder="Username"  class="small col-xs-5 col-sm-5" style="padding-bottom:4px;">															
																
																</td>
																
															</tr>
															 <tr class="active">
																<td class="width-15">标题:</td>

																<td class="width-35">
																		<input type="text" id="form-field-1" placeholder="Username" class="col-xs-12 col-sm-12">
																</td>

																<td class="width-15">是否显示</td>

																<td class="width-35">
																		<div class="col-xs-3">
																			<label>
																				<input name="switch-field-1" class="ace ace-switch ace-switch-5" type="checkbox">
																				<span class="lbl"></span>
																			</label>
																		</div>
																</td>
																
															</tr>
														 <tr class="success">
																<td class="width-15">主题</td>

																<td class="width-35">
															<select class="col-xs-12 col-sm-12"  id="form-field-select-1">
																<option value=""></option>
																<option value="1">=</option>
																<option value="2">></option>
																<option value="3">&lt;</option>
																<option value="4">!=</option>
														
															</select>
																</td>

																<td class="width-15">数据容量</td>

																<td class="width-35">
																			<div class="input-group"><input type="text" id="spinner3" class="spinbox-input form-control text-center"></div>																		
																</td>
																
															</tr>
														</tbody>
													</table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>							
</div>								
<script>
  ( function() {
	var setting = {
			data: {
				simpleData: {
					enable: true
				}
			},
			async: {
				enable: true,
				url:"../web/WebDesign.Page/ajaxGetPage",
				autoParam:["id", "name=n", "level=lv"],
				otherParam:{"otherParam":"zTreeAsyncTest"},
				dataFilter: filter
			}
		};
	var widgetsetting = {
			edit: {
				enable: true,
				showRemoveBtn: false,
				showRenameBtn: false,
				drag: {
					isCopy : true,
				    isMove : true,
					prev: false,
					inner: false,
					next: false
				}
			},
			check: {
				enable: false
			},
			callback: {
				beforeDrag: beforeDrag,
			},
			async: {
				enable: true,
				url:"../web/WebDesign.Widget/ajaxGetWidget",
				autoParam:["id", "name=n", "level=lv"],
				otherParam:{"otherParam":"zTreeAsyncTest"},
				dataFilter: filter
			}
		};

		function filter(treeId, parentNode, childNodes) {
			if (!childNodes) return null;
			for (var i=0, l=childNodes.length; i<l; i++) {
				childNodes[i].name = childNodes[i].name.replace(/\.n/g, '.');
			}
			return childNodes;
		}

		function beforeDrag(treeId, treeNodes) {
			for (var i=0,l=treeNodes.length; i<l; i++) {
				if (treeNodes[i].drag == false) {
					console.log(treeNodes[i]);
					return false;
				} 
			}
			window.lbParent.lnbeiDesignParent.isState = true;
			window.lbParent.lnbeiDesignParent.widget.name = treeNodes[0].name;
			console.log(window.lbParent.lnbeiDesignParent);
			return true;
		}
		$(document).ready(function(){
			$.fn.zTree.init($("#pageTree"), setting);
			$.fn.zTree.init($("#widgetTree"), widgetsetting);
		});    
  } )();
  function ajaxSocket(obj){
	  
	  $.post(url,data,succes,"json");
  }
  
	var scripts = [null,"__js__/LBHttp/LB.Ajax.js","__js__/LBDesign/LB.Design.js","<?php echo \think\Config::get('__PUBLIC__'); ?>/static/components/_mod/jquery-ui.custom/jquery-ui.custom.js","<?php echo \think\Config::get('__PUBLIC__'); ?>/static/components/jqueryui-touch-punch/jquery.ui.touch-punch.js","<?php echo \think\Config::get('__PUBLIC__'); ?>/static/components/chosen/chosen.jquery.js","<?php echo \think\Config::get('__PUBLIC__'); ?>/static/components/fuelux/js/spinbox.js","<?php echo \think\Config::get('__PUBLIC__'); ?>/static/components/bootstrap-datepicker/dist/js/bootstrap-datepicker.js","<?php echo \think\Config::get('__PUBLIC__'); ?>/static/components/bootstrap-timepicker/js/bootstrap-timepicker.js","<?php echo \think\Config::get('__PUBLIC__'); ?>/static/components/moment/moment.js","<?php echo \think\Config::get('__PUBLIC__'); ?>/static/components/bootstrap-daterangepicker/daterangepicker.js","<?php echo \think\Config::get('__PUBLIC__'); ?>/static/components/eonasdan-bootstrap-datetimepicker/src/js/bootstrap-datetimepicker.js","<?php echo \think\Config::get('__PUBLIC__'); ?>/static/components/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.js","<?php echo \think\Config::get('__PUBLIC__'); ?>/static/components/jquery-knob/js/jquery.knob.js","<?php echo \think\Config::get('__PUBLIC__'); ?>/static/components/autosize/dist/autosize.js","<?php echo \think\Config::get('__PUBLIC__'); ?>/static/components/jquery-inputlimiter/jquery.inputlimiter.js","<?php echo \think\Config::get('__PUBLIC__'); ?>/static/components/jquery.maskedinput/dist/jquery.maskedinput.js","<?php echo \think\Config::get('__PUBLIC__'); ?>/static/components/_mod/bootstrap-tag/bootstrap-tag.js", null]
	$('.page-content-area').ace_ajax('loadScripts', scripts, function() {
	  //inline scripts related to this page
		 jQuery(function($) {
			 $('#spinner_height').ace_spinner({value:0,min:0,max:12,step:1, on_sides: true, icon_up:'ace-icon fa fa-plus', icon_down:'ace-icon fa fa-minus', btn_up_class:'btn-purple' , btn_down_class:'btn-purple'});
			 $('#spinner_width').ace_spinner({value:0,min:0,max:12,step:1, on_sides: true, icon_up:'ace-icon fa fa-plus', icon_down:'ace-icon fa fa-minus', btn_up_class:'btn-purple' , btn_down_class:'btn-purple'}); 
			 $('#spinner3').ace_spinner({value:0,min:0,max:30,step:2, on_sides: true, icon_up:'ace-icon fa fa-plus', icon_down:'ace-icon fa fa-minus', btn_up_class:'btn-purple' , btn_down_class:'btn-purple'});
		 });
	});
	/**
	处理向服务器请求控件的请求
	
	*/
	
(function ($){
	
	
	$(document).on("click","#sidebar3-toggle-icon",function (){
		if($("#sidebar2").hasClass("menu-min")){
			//alert("dsfs");
			$("#sidebar2").addClass("width-100");
		}else{
			$("#sidebar2").removeClass("width-100");
		}
	});

})(jQuery);	

</script>							
								