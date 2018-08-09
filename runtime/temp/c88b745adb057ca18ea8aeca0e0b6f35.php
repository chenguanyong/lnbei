<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:64:"E:\f\phpace_dev\public/../application/index\view\role\index.html";i:1506130927;}*/ ?>
<title>角色管理</title>
<style>

.tree {
    margin: auto;
    padding: 0 0 0 9px;
     overflow-x: auto; 
    overflow-y: auto;
    position: relative;
}

</style>
<div class="row" style="margin:0px;">
  <div class="col-xs-2" style="border:#000 0px solid;  padding-left: 5px;    padding-right: 10px;">
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

  <div class="panel panel-default col-xs-10" style="border:#000 0px solid; padding:2px">
    <!-- div.table-responsive -->

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

    <div class="row">
      <div class="col-xs-5">
        <div class="clearfix">
          <button class="btn btn-sm btn-primary" data-type='3' data-toggle="modal" data-target="#myModal" data-whatever="修改角色">修改</button> <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#myModal" data-type='1' data-whatever="新增角色">添加</button> <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#myModal" data-type='2' data-whatever="删除角色">删除</button>
        </div>
      </div>

      <div class="clearfix">
        <div class="pull-right tableTools-container"></div>
      </div>
    </div>

    <div style="clear:both">
      <table id="dynamic-table" class="table table-striped table-bordered table-hover" style="font-size:10px;">
       <thead>
          <tr>
            <th style="width:5%"><label class="pos-rel"><input type="checkbox" class="ace" /> </label></th>


            <th style="width:10%">position</th>

            <th style="width:8%">office</th>

            <th style="width:10%">start_date</th>
            <th style="width:10%"></th>
            <th style="width:10%">salary</th>
			<th style="width:1%">salaryL</th>
            <th style="width:20%"></th>
          </tr>
        </thead>
      </table>
    </div>
  </div>
</div>


<!-- ff -->
<div class="modal fade bs-example-modal-sm" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<form class="form-horizontal"  id="submitform" role="form" >
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" > 菜单名: </label>

										<div for="RoleName" class="col-sm-8">
											<input type="text" id="RoleName" name="RoleName" placeholder="Username" class="form-control" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> 样式: </label>

										<div for="Css" class="col-sm-8">
											<input type="text" id="css" name="Css" placeholder="Text Field" class="form-control" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> 状态: </label>

										<div for="IsState" class="col-sm-8">
													<label>
														<input id="IsState"   class="ace ace-switch ace-switch-4" type="checkbox">
														<span class="lbl"></span>
													</label>
										</div>
									</div>
							      	<div class="modal-footer">
      										<button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
     										<button type="submit" id="submitbutton" data-url="" class="btn btn-primary">确定</button>
    								</div>
								</form>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<!-- 结束模态框 -->
<div id="authmodal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">分配权限</h4>
      </div>
      <div class="modal-body" >
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
        <button type="button" id="authbutton" class="btn btn-primary">确定</button>
      </div>
    </div>
  </div>
</div>
<div class="col-sm-6">
  <div id="dialog-message" class="hide">
    <p>您确定要删除该用户？</p>
  </div><!-- #dialog-message -->
  <!-- #dialog-confirm -->
</div>

<div id="dialog" title="提示信息" style='display:none'>
  <p>请先选中一行！</p>
</div>

<div id="dialog_delete" title="提示信息" style='display:none'>
  <p>确定要删除！</p>
</div>
<script>
(function ($){
var scripts = [null,"__js__/LB.AuthTree.js", "<?php echo \think\Config::get('__PUBLIC__'); ?>/static/components/datatables/media/js/jquery.dataTables.js", "<?php echo \think\Config::get('__PUBLIC__'); ?>/static/components/_mod/datatables/jquery.dataTables.bootstrap.js", "<?php echo \think\Config::get('__PUBLIC__'); ?>/static/components/datatables.net-buttons/js/dataTables.buttons.js", "<?php echo \think\Config::get('__PUBLIC__'); ?>/static/components/datatables.net-buttons/js/buttons.flash.js", "<?php echo \think\Config::get('__PUBLIC__'); ?>/static/components/datatables.net-buttons/js/buttons.html5.js", "<?php echo \think\Config::get('__PUBLIC__'); ?>/static/components/datatables.net-buttons/js/buttons.print.js", "<?php echo \think\Config::get('__PUBLIC__'); ?>/static/components/datatables.net-buttons/js/buttons.colVis.js", "<?php echo \think\Config::get('__PUBLIC__'); ?>/static/components/datatables.net-select/js/dataTables.select.js", null]
var $scrpe = {
		param:{
			companyID:1,//公司ID
			cityID:1,//城市ID
			departID:1,//部门ID
			keyword:null,//关键字
		},
		url:"<?php echo url('index/Role/getRole'); ?>",//全局URL
		input:{}
}
$('.page-content-area').ace_ajax('loadScripts', scripts, function ()
{

    //inline scripts related to this page
    jQuery(function ($)
    {
    	
    	//构造url
        var datatable = function(){

    		//构造url
    		this.makeUrl = function (){
    			
    			var url = "?cash=0";
    			if($scrpe.param.companyID != 0){
    				url += "&cp="+$scrpe.param.companyID;
    			}
    			if($scrpe.param.cityID !=0){
    				url += "&ct="+$scrpe.param.cityID;
    			}
    			if($scrpe.param.keyword !=null){
    				url += "&kw="+$scrpe.param.keyword;
    			}
    			url = $scrpe.url +url;
    			return url;
    		}
    }
    	
        //initiate dataTables plugin
        var myTable =
            $('#dynamic-table')
            .DataTable(
            {
       		 "scrollX": false,
             "scrollY": 430,
             "scrollCollapse": true,
                "columns" : [
                    {
                        "data" : "",
                        "orderable" : false,
                    },
                    {
                        "data" : "RoleName",
                        "title" : "角色名",
                        "orderable" : false,
                    },
                    {
                        "data" : "IsDelete",
                        "title" : "状态",
                        "orderable" : false,
                    },
                    {
                        "data" : "Css",
                        "title" : "样式",
                        "orderable" : false,
                    },
                    {
                        "data" : "DatetimeCreated",
                        "title" : "创建时间",
                        "orderable" : false,
                    },
                    {
                        "data" : "DatetimeUpdated",
                        "title" : "更新时间",
                        "orderable" : false,
                    },
                    {
                        "data" : "ID",
                        "title" : "ID",
                        "orderable" : false,
                    },

                    {
                        "data" : ""
                    }
                ],
                "columnDefs" : [
                    {
                        "orderable" : false,
                        "targets" : 0,
                        "data" : null,
                        "defaultContent" : "<label class='pos-rel'><input type='checkbox' class='ace' /><span class='lbl'></span></label>"
                    },
                    {
                        "orderable" : false,
                        "targets" : 7,
                        "data" : null,
                        "defaultContent" : "<a data-type='1' data-action='editRole' data-whatever='修改角色' class='btn btn-success btn-xs'><i class='fa fa-edit'></i> 修改</a><a  data-type='1' data-action='deleRole' data-whatever='删除角色' class='btn btn-danger btn-xs'><i class='fa fa-trash'></i> 删除</a><a  id='allotAuth' data-whatever='分配权限' class='btn  btn-primary btn-xs'><i class='fa fa-trash'></i>分配权限</a>"
                    },
                    {
                        "targets": [ 6 ],
                        "visible": false,
                        "searchable": false
                      },

                ],

                "drawCallback" : function (settings)  {},
                "language": {
                    "sProcessing": "处理中...",
                    "sLengthMenu": "显示 _MENU_ 项结果",
                    "sZeroRecords": "没有匹配结果",
                    "sInfo": "显示第 _START_ 至 _END_ 项结果，共 _TOTAL_ 项",
                    "sInfoEmpty": "显示第 0 至 0 项结果，共 0 项",
                    "sInfoFiltered": "(由 _MAX_ 项结果过滤)",
                    "sInfoPostFix": "",
                    "sSearch": "搜索:",
                    "sUrl": "",
                    "sEmptyTable": "表中数据为空",
                    "sLoadingRecords": "载入中...",
                    "sInfoThousands": ",",
                    "oPaginate": {
                        "sFirst": "首页",
                        "sPrevious": "上页",
                        "sNext": "下页",
                        "sLast": "末页"
                    },
                    "oAria": {
                        "sSortAscending": ": 以升序排列此列",
                        "sSortDescending": ": 以降序排列此列"
                    }
                },

                "bProcessing" : true,
                "bServerSide" : true,
                "sAjaxSource" : new datatable().makeUrl(),
            }
            );
         datatable.prototype.reDreaw = function(){
        		//重新绘制database
        			url = this.makeUrl();
        			myTable.ajax.url(url).load();
        			return true;
        }
        $('#myModal').on('show.bs.modal', function (event)
        {
            var button = $(event.relatedTarget);
            var recipient = button.data('whatever');
            var type = button.data('type');
            var modal = $(this);
            modal.find('.modal-title').text(recipient);
            if (type == 1)
            {
            	$("#myModal input[type=text]").val("");
            	$("#submitbutton").attr("data-url","<?php echo url('index/role/addRole'); ?>");
            	$("#submitbutton").attr("data-type",'1');
                return;
            }
            var checked_count = $('#dynamic-table tbody').find('[data-checked=1]').toArray().length;
            if (checked_count == 0)
            {
                $('#myModal').modal('hide');
                $("#dialog").dialog(
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
            }
            else
            {	
                var mytables = myTable.rows($('#dynamic-table tbody').find('[data-checked=1]').parent('label').parent('td').parent('tr'))[0][0];
                var d = myTable.row(mytables).data();
            if (type == 2)
            {

                $('#myModal').modal('hide');
                $("#dialog_delete").dialog(
                {
                    modal : true,
                    dialogClass : "no-close",
                    buttons : [
                        {
                            text : "取消",
                            click : function ()
                            {
                                $(this).dialog("close");
                            }
                        },
                        {
                            text : "确定",
                            click : function ()  {
                            	$(this).dialog("close");
                                $.post("<?php echo url('index/Role/deleRole'); ?>",
                                        {
                                            id:d.ID,
                                        }, function (data)
                                        {
                                            if(data.code == 1){
                                            	
                                            	alert(data.msg);
                                            	myTable.rows($('#dynamic-table tbody').find('[data-checked=1]').parent('label').parent('td').parent('tr')).remove()
                                                .draw();
                                            }else{
                                            	alert(data.msg);
                                            }

                                        }, 'Json');
                            }
                        }
                    ]
                }
                );
                return false;
            }
            	$("#submitbutton").attr("data-type",'3');
                $("#submitbutton").attr("data-id",d.ID);
                $('#RoleName').val(d.RoleName); //获取归属公司id和值
                $('#css').val(d.Css); //获取归属公司id和值
                $("#submitbutton").attr("data-url","<?php echo url('index/role/editRole'); ?>");
                if(d.IsDelete == 0){
                	$("#IsDelete").prop("checked",false);
                }else{
                	$("#IsDelete").prop("checked",true);
                }
            }
        });
        
        $("#submitbutton").on("click",function(){
			$("#submitform").find("input[name]").each(function(){
				eval("$scrpe.input."+$(this).attr("name")+"='"+$(this).val()+"';");
			});
	      	var IsDelete = $("#IsState").is(":checked");
	      	if(IsDelete == true){
	      		$scrpe.input.State = 1;
	      	}else{
	      		$scrpe.input.State = 0;
	      	}
	      	$scrpe.input.CompanyID = $scrpe.param.companyID;
	      	$scrpe.input.CityID =	$scrpe.param.cityID;
        });
    	$.validator.setDefaults({
    	    submitHandler: function() {
    	        //$('#myModal').modal('hide');
    	        var id = $("#submitbutton").attr("data-id");
   	    		if(id != undefined){
   	    			$scrpe.input.ID = id;
   	    		}
    	        $.post($("#submitbutton").attr("data-url"),
    	        		$scrpe.input,
    	        function (data)
    	        {
    	            if(data.code == 1){
    	            	 $('#myModal').modal('hide');
        	             myTable.draw();
    	            }else{
    	            	alert(data.msg);
    	            }
    	         
    	        }, 'Json');
    	
    	    }
    	});

    	  $("#submitform").validate({
    		    rules: {
    		    	RoleName: {
    		        required: true,
    		      },
    		      Css: {
    		        required: true,
    		      },
    		    },
    		    messages: {
    		    	MenuName: {
    		        required: "请输入角色名",
    		      },
    		      Css: {
    		        required: "请输入样式",
    		      },
    		    }
    		});
		//编辑权限
        $(document).on('click', '[data-action=editRole]', function ()
        {
        	$("#submitbutton").attr("data-type",'3');
            var mytables = myTable.rows($(this).parent('td').parent('tr'))[0][0];
            var d = myTable.row(mytables).data();
            $("#submitbutton").attr("data-id",d.ID);
            $('#RoleName').val(d.RoleName); //获取归属公司id和值
            $('#css').val(d.Css); //获取归属公司id和值
            if(d.IsDelete == 0){
            	$("#IsDelete").prop("checked",false);
            }else{
            	$("#IsDelete").prop("checked",true);
            }
            $('#myModal').modal('show');
        });
		//删除角色
        $('#dynamic-table tbody').on('click', '[data-action=deleRole]', function ()
        {

            $("#dialog_delete").dialog(
            {
                modal : true,
                dialogClass : "no-close",
                buttons : [
                    {
                        text : "取消",
                        click : function ()
                        {
                            $(this).dialog("close");
                        }
                    },
                    {
                        text : "确定",
                        click : function ()  {
                        	$(this).dialog("close");
                            var mytables = myTable.rows($('#dynamic-table tbody').find('[data-checked=1]').parent('label').parent('td').parent('tr'))[0][0];
                            var d = myTable.row(mytables).data();
                            $.post("<?php echo url('index/Role/deleRole'); ?>",
                                    {
                                        id:d.ID,
                                    }, function (data)
                                    {
                                        if(data.code == 1){
                                        	
                                        	alert(data.msg);
                                        	myTable.rows($('#dynamic-table tbody').find('[data-checked=1]').parent('label').parent('td').parent('tr')).remove().draw(false);
                                        }else{
                                        	alert(data.msg);
                                        }

                                    }, 'Json');
                        }
                    }
                ]
            });
        });
        $('#dynamic-table tbody').on('click', 'tr', function ()
        {
            if ($(this).hasClass('selected'))
            {
                $(this).removeClass('selected');
                $('#dynamic-table tbody').find('input:checkbox').prop('checked', false).attr('data-checked', 0); ;
                //$(this).find('input:checkbox').prop('checked', false);
            }
            else
            {
                myTable.$('tr.selected').removeClass('selected');
                $(this).addClass('selected');
                $('#dynamic-table tbody').find('input:checkbox').prop('checked', false);
                $('#dynamic-table tbody').find('input:checkbox').attr('data-checked', 0);
                $(this).find('input:checkbox').prop('checked', true).attr('data-checked', 1); ;
            }
        });

        /////////////////////////////////
        //table checkboxes
        $('th input[type=checkbox], td input[type=checkbox]').prop('checked', false);

        //select/deselect all rows according to table header checkbox
        $('#dynamic-table > thead > tr > th input[type=checkbox], #dynamic-table_wrapper input[type=checkbox]').eq(0).on('click', function ()
        {
            var th_checked = this.checked; //checkbox inside "TH" table header

            $('#dynamic-table').find('tbody > tr').each(function ()
            {
                var row = this;
                if (th_checked)
                    myTable.row(row).select();
                else
                    myTable.row(row).deselect();
            });
        });

        //select/deselect a row when the checkbox is checked/unchecked
        $('#dynamic-table').on('click', 'td input[type=checkbox]', function ()
	        {
	            var row = $(this).closest('tr').get(0);
	            if (this.checked)
	                myTable.row(row).deselect();
	            else
	                myTable.row(row).select();
	        }
        );

        $(document).on('click', '#dynamic-table .dropdown-toggle', function (e)
	        {
	            e.stopImmediatePropagation();
	            e.stopPropagation();
	            e.preventDefault();
	        }
        );

	
    /***
     * 城市列表
     */
    	var settingCity = {
    			async: {
    				enable: true,
    				url:"<?php echo url('index/Area/getCityTree'); ?>",
    				autoParam:["id", "name=n", "level=lv"],
    				otherParam:{"otherParam":"1"},
    				dataFilter: filter
    			},
    			callback: {
    				onClick: zTreeCityOnClick
    			}
    		};
    	function zTreeCityOnClick(event, treeId, treeNode){
    		//console.dir(treeNode.id);
    		//alert(treeNode.tId + ", " + treeNode.name);
    		$scrpe.param.cityID=treeNode.id;
    		 new datatable().reDreaw();
    		
    		$("#citySel").val(treeNode.name);
    		$.fn.zTree.init($("#treeDemocompany"),settingcompany );
    		hideMenu();
    	}
    	function filter(treeId, parentNode, childNodes) {
    		if (!childNodes) return null;
    		for (var i=0, l=childNodes.length; i<l; i++) {
    			childNodes[i].name = childNodes[i].name.replace(/\.n/g, '.');
    		}
    		return childNodes;
    	}
    /****
     * 归属公司
     */

    	var settingcompany = {
    			async: {
    				enable: true,
    				url:"<?php echo url('index/department/ajaxGetDepart'); ?>?flag=0",
    				autoParam:["id", "name=n", "level=lv"],
    				otherParam:{"otherParam":$scrpe.param.cityID},
    			},
    			callback: {
    				onClick: zTreeCompanyOnClick
    			}
    		};
    		function zTreeCompanyOnClick(event, treeId, treeNode){
    			$("#companySels").val(treeNode.name);
    			$scrpe.param.companyID=treeNode.id;
    			 new datatable().reDreaw();
    		}
        		function showMenu() {
        			$("body").bind("mousedown", onBodyDown);
        			$(".menuContent").fadeOut("fast");
        			var cityObj = $("#citySel");
        			$("#menuContentareas").addClass("active");
        			var cityOffset = $("#citySel").offset();
        			$("#menuContentareas").css({top: cityObj.outerHeight() + "px"}).slideDown("fast");
        		}
        		function hideMenu() {
        			$("#menuContentareas").fadeOut("fast");
        			$("body").unbind("mousedown", onBodyDown);
        		}
        		$(document).ready(function(){
        			$.fn.zTree.init($("#treeDemoareas"), settingCity);

        		});
        		function onBodyDown(event) {
					if (!(event.target.id == "menuBtn" || event.target.id == "citySel" || event.target.id == "menuContentareas" || $(event.target).parents("#menuContentareas").length>0)) {
						hideMenu();
					}
				}
        		$("#menuBtn").on("click",showMenu);


        		//分配权限
        		$(document).on("click","#allotAuth",function (){
                    var mytables = myTable.rows($('#dynamic-table tbody').find('[data-checked=1]').parent('label').parent('td').parent('tr'))[0][0];
                    var d = myTable.row(mytables).data();
                    $("#authmodal #authbutton").attr("data-id",d.ID);
        			$.post("<?php echo url('index/role/allotAuth'); ?>",{cach:"123"},function (str){
        				//console.log(str);
        				$("#authmodal .modal-body").html(str);
        				//$("#authmodal").modal("show");
        				$('#authmodal').modal('show');
  
        			AuthTree({citytreeurl:"<?php echo url('index/Area/ajaxGetArea'); ?>",companyurl:"<?php echo url('index/department/ajaxGetDepart'); ?>?flag=0",authmenuurl:"<?php echo url('index/department/ajaxGetDepart'); ?>?flag=1",citytagid:$("[data-action=citytree]"),companyid:$("[data-action=companytree]"),authid:$("[data-action=authtree]")});
        			},"text");
        			//$('#authmodal').modal('show');
        		});
        		//确定权限
        		$(document).on("click","#authbutton",function (){
        			var roleid = $(this).data("id");
        			var ff = new authtree();ff.init({citytreeurl:"<?php echo url('index/Area/ajaxGetArea'); ?>",companyurl:"<?php echo url('index/department/ajaxGetDepart'); ?>?flag=0",authmenuurl:"<?php echo url('index/department/ajaxGetDepart'); ?>?flag=1",citytagid:$("[data-action=citytree]"),companyid:$("[data-action=companytree]"),authid:$("[data-action=authtree]")});
        			var cityauth = ff.getcityvalue(); 
        			var companyauth = ff.getcompanyvalue();
        			var auth = treevalue.getValue();
        			console.log(cityauth);
        			console.log(companyauth);
        			console.log(auth);
        			$.post("<?php echo url('index/Role/addAuth'); ?>",{roleid:roleid,city:cityauth,company:companyauth,auth:auth},function (str){
        				
        			},"json");
        		});
    	});
	});
})($)

</script>