<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:63:"E:\f\phpace_dev\public/../application/index\view\role\auth.html";i:1503910023;}*/ ?>
<div class="widget-box">
	<div class="widget-body">
		<div class="widget-main">
			<div class="row" >
				<div class="col-sm-4 " >
				选择区域权限
				</div>
				<div class="col-sm-4" >
				选择部门权限
				</div>
				<div class="col-sm-4" >
				选择访问规则
				</div>									
			</div>
			<div class="space-4"></div>
			<div class="row" >
				<div class="col-sm-4" >
					<ul class="ztree" id="citytree" data-action="citytree" style="max-height:200px; height:200px; overflow: auto;"></ul>
				</div>
				<div class="col-sm-4" >
					<ul class="ztree"  id="companytree" data-action="companytree" style="max-height:200px; height:200px; overflow: auto;"></ul>
				</div>
				<div class="col-sm-4">
					<ul class="ztree" id="authtree" data-action="authtree" style="max-height:200px; height:200px; overflow: auto;"></ul>
				</div>
			</div>
		</div>
	</div>
</div>