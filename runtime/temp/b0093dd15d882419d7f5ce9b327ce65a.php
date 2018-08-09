<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:63:"E:\f\phpace_dev\public/../application/index\view\menu\menu.html";i:1506131048;}*/ ?>

<title>菜单管理</title>
<link rel="stylesheet" href="<?php echo \think\Config::get('__PUBLIC__'); ?>/js/ztree/css/zTreeStyle/zTreeStyle.css" />	
<div class="row"  >
<div class="col-xs-2" style="border:#000 0px solid; padding-left: 16px;    padding-right: 0px;">
   <div class="row">
    <div class="col-xs-12">
      <div class="widget-box">
        <div class="widget-header widget-header-flat">
          <h4 class="widget-title smaller">部门列表</h4>
        </div>

        <div class="widget-body" style="font-size:10px; height:500px; overflow:auto">
          <div class="widget-main" style="font-size:10px;">
            <ul id="treeDemocompany" class="ztree" style="font-size:8px; "></ul>
          </div>
        </div>
      </div>
    </div>
    </div>
  </div>
<div class="col-xs-10" >
	<div class="panel panel-default">
      <div class="panel-body">
        <div class="row">
        	<div class="col-sm-3">
				<div class="input-group">
					<span id="menuBtn"  class="input-group-addon">
						归属地区
					</span>
					<input type="text" id="citySel" class="form-control search-query" placeholder="请选择城市">
					<div id="menuContentareas" class="menuContent" style="display:none; z-index:333;border:1px #dddddd solid;background-color: #ffffff; position: absolute; max-height:200px; overflow: auto;">
						<ul id="treeDemoareas" class="ztree" style="margin-top:0; width:160px;"></ul>
					</div>
				</div>
			</div>
        </div>
      </div>
    </div><!-- div.dataTables_borderWrap -->

	<div class="space-6"></div>										
	<div class="row">
	      <div class="col-xs-5">
        <div class="clearfix">
          <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#myModal" data-type='1' data-whatever="修改用户" data-action="doEdit">修改</button>
          <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#myModal" data-type='1' data-whatever="新增用户" data-action="doAdd">添加</button> 
          <button class="btn btn-sm btn-primary"  data-type='1' data-whatever="删除用户" data-action="doDele">删除</button> 
        </div>
      </div>
	</div>									
	<div class="space-4"></div>								
	<table id="simple-table" class="table  table-bordered table-hover">
		<thead>
			<tr>
				<th class="detail-col"><label class="pos-rel"><input type="checkbox" class="ace" id="allcheckbox"><span class="lbl"></span></label></th>
				<th>菜单</th>
				<th>URL</th>
				<th>样式</th>
				<th>状态</th>
				<th>操作</th>
			</tr>
		</thead>

		<tbody id="gh">
			
		</tbody>
	</table>
	<div class="row"><div class="col-xs-7"></div><div class="col-xs-5"><ul id="page"></ul></div></div>
</div><!-- /.span -->
</div><!-- /.row -->

<!-- ff -->
<div class="modal fade bs-example-modal-sm" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"></h4>
      </div>
      <div class="modal-body">
						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<form class="form-horizontal" id="submitform" role="form">
									<!-- #section:elements.form -->
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" > 节点: </label>

										<div for="node" class="col-sm-8">
												<input type="text" id="node" name="node"  placeholder="请输入节点" class="form-control" />
										</div>
									</div>									
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" > 菜单名: </label>

										<div for="MenuName" class="col-sm-8">
											<input type="text" id="MenuName" name="MenuName" placeholder="Username" class="form-control" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> 样式: </label>

										<div for="css" class="col-sm-8">
											<input type="text" id="css" name="css" placeholder="Text Field" class="form-control" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> URL: </label>

										<div for="URL" class="col-sm-8">
											<input type="text" id="URL" name="URL" placeholder="Text Field" class="form-control" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> 备注: </label>

										<div for="bz"  class="col-sm-8">
											<input type="text" id="bz" name="bz" placeholder="Text Field" class="form-control" />
										</div>
									</div>																			
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> 状态: </label>

										<div for="IsDelete" class="col-sm-8">
													<label>
														<input id="IsDelete" name="IsDelete" class="ace ace-switch ace-switch-4" type="checkbox">
														<span class="lbl"></span>
													</label>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> 是否菜单: </label>

										<div for="Flag" class="col-sm-8">
													<label>
														<input id="Flag" name="Flag" class="ace ace-switch ace-switch-4" type="checkbox">
														<span class="lbl"></span>
													</label>
										</div>
									</div>
									      <div class="modal-footer">
        										<button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
       										    <button type="submit" id="submitbutton" class="btn btn-primary">确定</button>
      									  </div>
								</form>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<div id="dialog" title="提示信息" style='display:none'>
  <p>确定要删除这一行！</p>
</div>
<div id="dialogs" title="提示信息" style='display:none'>
  <p>请先选中一行！</p>
</div>
<script type="text/javascript" src="__js__/LBtreegrid/LB.Treegrid.js" ></script>
<script type="text/javascript" src="__js__/LBInput/LB.Input.js" ></script>
<script type="text/javascript">
(function ($){
	var $scrpe = {
			param:{
				companyID:1,//公司ID
				cityID:1,//城市ID
				departID:1,//部门ID
				keyword:null,//关键字
			},
			url:"index/Role/getRole",//全局URL
			input:{},
			fun:function (event, treeId, treeNode){
				createTable();
			}
	}
	//全选
    $(document).on("click","thead tr th input",function(){
    	//alert($(this).attr("checked"));
    	if($(this).attr("checked")){
    		$("tbody td label input").prop("checked",false);
    		$(this).attr("checked",false);
    	}else{
    		$(this).attr("checked",true);
    		$("tbody td label input").prop("checked",true);
    	}
    	
    });
	var scripts = [null, "__js__/LBtree/twotree.js", null]
	$('.page-content-area').ace_ajax('loadScripts', scripts, function ()
	{
	    //inline scripts related to this page
	    jQuery(function ($)
	    {
	    	twotree($,$scrpe);
	    	
	    });
	});

	//弹出框
	$('#myModal').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Button that triggered the modal
		  var recipient = button.data('whatever') // Extract info from data-* attributes
		  var modal = $(this)
		  modal.find('.modal-title').text(recipient)
		  var type = button.attr("data-type");
		  var action = button.attr("data-action");
		  if(type == "1"){
			  if(action == "doEdit"){
				 var length = $("tbody tr td :checked").toArray().length;
				 if(length == 0){$('#myModal').modal('hide');
				 	alert("请选择一行!");
				 	return false;
				 }else{
					var id = $("tbody tr td :checked").parent().parent().parent().data("id");
					var td = $("tbody tr[data-id="+id+"]").children("td");//.eq(1).text();
					var tdpid = $("tbody tr[data-id="+id+"]").attr("data-pid");
					var parentName = $("tbody tr[data-id="+tdpid+"]").children("td").eq(1).text();
					$("#node").val(parentName);
					$("#MenuName").val(td.eq(1).text());
					$("#css").val(td.eq(3).text());
					$("#URL").val(td.eq(2).text());
					$("#submitbutton").attr("data-type",2);
					$("#submitbutton").attr("data-id",id);
				 }
			  }else if(action == "doAdd"){
				  //添加节点
				  $("#node").val("dingji");
				  $("#submitbutton").attr("data-type",1);
			  }
			  
		  }else{
				var id = button.parent().parent().data("id");
				
				var td = $("tbody tr[data-id="+id+"]").children("td");//.eq(1).text();
				var tdpid = $("tbody tr[data-id="+id+"]").attr("data-pid");
				var parentName = $("tbody tr[data-id="+tdpid+"]").children("td").eq(1).text();
				if(action == "doEdit"){
						$("#node").val(parentName);
						$("#MenuName").val(td.eq(1).text());
						$("#css").val(td.eq(3).text());
						$("#URL").val(td.eq(2).text());
						 $("#submitbutton").attr("data-type",2);
						 $("#submitbutton").attr("data-id",id);
					 
				  }else if(action == "doAdd"){
					  //添加节点
					  $("#node").val(td.eq(1).text());
					  $("#submitbutton").attr("data-type",1);
				  }
			  
		  }
		})

		$(document).on("click","[data-action=doDele]",function(event){
			  var type = $(this).attr("data-type");
			  var id = 0;
			if(type == 1){
				var length = $("tbody tr td :checked").toArray().length;
				if(length == 0){
	            $("#dialogs").dialog(
	                    {
	                        modal : true,
	                        dialogClass : "no-close",
	                        buttons : [
	                            {
	                                text : "OK",
	                                click : function ()
	                                {
	                                    $(this).dialog("close");
	                                   
	                                }
	                            }
	                        ]
	                    }
	                    );
	            return false;
			}else{
			 $("tbody tr td :checked").parent().parent().parent().each(function(){
					
					id = $(this).attr("data-id")+"_";
				});
			}
				}else{
					 id = $(this).parent().parent().data("id");
				}
            $("#dialog").dialog(
                    {
                        modal : true,
                        dialogClass : "no-close",
                        buttons : [
                            {
                                text : "关闭",
                                click : function ()
                                {
                                    $(this).dialog("close");
                                }
                            },
                            {
                                text : "确定",
                                "class" : "btn btn-primary btn-minier",
                                click : function ()
                                {
                                    $(this).dialog("close");
                                    $.post("<?php echo url('Menu/dele'); ?>",{id:id},function (data){
                                    	if(data.code="1"){
                                    		window.location = "<?php echo url('Menu/index'); ?>";
                                    	}else{
                                    		alert(data.msg);
                                    	}
                                    },"json");
                                }
                            }
                        ]
                    }
                    );
		});


	var ff = {
			table:{
				id:"simple-table",
				treeColumn:"1",
				initialState:"collapsed",
				expanderExpandedClass:"ace-icon fa fa-home home-icon",
				expanderCollapsedClass:"glyphicon glyphicon-cloud"
			},
			id:"gh",
			data:[[{"title":"chen","css":'fdd'},{"title":"chen1","css":'fdd'},{"title":"chen7","css":'fdd'}],
			      [{"title":"chenf","css":'fdd'},{"title":"chen2","css":'fdd'},{"title":"chen8","css":'fdd'}],
			      [{"title":"cheng","css":'fdd'},{"title":"chen3","css":'fdd'},{"title":"chenr","css":'fdd'}],
			      [{"title":"chenh","css":'fdd'},{"title":"chen4","css":'fdd'},{"title":"cheng","css":'fdd'}],
			      [{"title":"chenj","css":'fdd'},{"title":"chen5","css":'fdd'},{"title":"chenv","css":'fdd'}],
			      [{"title":"chenk","css":'fdd'},{"title":"chen6","css":'fdd'},{"title":"chenx","css":'fdd'}]
			],
			column:[0],
			parentchild:[{"data_id":1,"data_pid":0}
			,{"data_id":2,"data_pid":1}
			,{"data_id":5,"data_pid":2}
			,{"data_id":3,"data_pid":1}
			,{"data_id":6,"data_pid":3}
			,{"data_id":4,"data_pid":0}			
			],
	defaultcolumn:
		[{"title":'<a data-toggle="modal" data-target="#myModal"  data-action="doAdd" data-whatever="添加菜单" class="btn btn-info btn-xs"><i class="fa fa-search-plus"></i>添加</a><a data-toggle="modal" data-target="#myModal" data-action="doEdit" data-whatever="修改菜单" class="btn btn-success btn-xs"><i class="fa fa-edit"></i> 修改</a><a data-action="doDele" data-whatever="删除菜单" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> 删除</a>',"css":'detail-col'}
	],
	defaultBefCol:
		[{"title":'<label class="pos-rel"><input type="checkbox" class="ace"><span class="lbl"></span></label>',"css":'detail-col'}
	],
		}

	var input ={};
	$("#submitbutton").on("click",function(){
		$("#myModal").find("input").each(function(){
			eval("input."+$(this).attr("name")+"='"+$(this).val()+"';");
		});
		input.id=$("#submitbutton").attr("data-id");
		input.companyID = $scrpe.companyID;
		input.cityID = $scrpe.cityID;
	});

	$().ready(function() {

	  var validationConfig = {
				form:"#submitform",//form表单的选择器
				rules:{
				      MenuName: {
					        required: true,
					      },
					      css: {
					        required: true,
					      },
					      URL: {
					        required: true,
					      },
					      bz: {
					        required: true,
					      }
					
				},//验证规则
				messages:{
			    	MenuName: {
				        required: "请输入菜单名字",
				      },
				      css: {
				        required: "请输入样式",
				      },
				      URL: "请输入一个链接",
				      bz: "请输入备注"
					
				},//验证弹出的消息
				submitFun:function(str){
					if(str.code == 0){
						
						alert(str.msg);
					}
					return false;
				},	//提交回调函数
				type:1,
				submitFunCallback:function(input,call){
				      var type = $("#submitbutton").attr("data-type");
				      var url="";
				      if(type == 1){
				    	  url = "<?php echo url('Menu/add'); ?>";
				      }else{
				    	  url = "<?php echo url('Menu/update'); ?>";
				      }
				      $.post(url,input,function(data){
				    	  if(data.code==1){
				    		  window.loction="<?php echo url('Menu/index'); ?>";
				    	  }else{
				    		  alert(data.msg);
				    	  }
				    	  
				      },"json");
				}
			  };
	  window.LbInput.bindFrom(validationConfig);
	});
	
	
	
	
	$("#allcheckbox").on("click",function(){
		
		$("#gh").find("input").click();
	});
	$("#simple-table tbody tr td input[type=checkbox]").on("click",function(){
		var th_checked = this.checked;
		
		if(th_checked){
			$(this).parent().parent().parent().css("background-color","#f0f0f0");
		}else{
			$(this).parent().parent().parent().css("background-color","#ffff");
		}
	});	


	function createTable(){
		
		$.post("<?php echo url('ajaxGetMenu'); ?>",{companyID:$scrpe.param.companyID,cityID:$scrpe.param.cityID},function(data){
			ff.data = data.data;
			ff.parentchild = data.datapc;
			//创建表格
			LBTreegrid .compose(ff); 
		
		},"json"); 
	}
	$(document).ready(function(){
		
		createTable();
	});
	//获取单个菜单
	function getMenuOne(id){
		if (typeof id === 'undefined') { throw new Error('id is null') }
		$lbajax.post({
			url:"<?php echo url('index/menu/getMenuInfo'); ?>",
			callback:function (data){
				console.log(data);
			},
			dataType:"json",
			param:{menuID:id}
		});
	}
	//getMenuOne(0);
})(window.jQuery);
  

</script>		