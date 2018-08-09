<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:64:"E:\f\phpace_dev\public/../application/index\view\user\index.html";i:1506131131;}*/ ?>
<title>管理员管理</title>
<div class="row" style="margin:0px;">
<div class="col-xs-2" style="border:#000 0px solid; padding-left: 3px;    padding-right: 8px;">
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
          <button class="btn btn-sm btn-primary" data-type='3' data-toggle="modal" data-target="#myModal" data-whatever="修改用户">修改</button> <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#myModal" data-type='1' data-whatever="新增用户">添加</button> <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#myModal" data-type='2' data-whatever="删除用户">删除</button> <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#myModal" data-whatever="查看用户信息">查看</button>
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
            <th class="center"><label class="pos-rel"><input type="checkbox" class="ace" /> </label></th>

            <th>first_name</th>

            <th>last_name</th>

            <th class="hidden-480">position</th>

            <th>office</th>

            <th class="hidden-480">start_date</th>

            <th class="hidden-480">salary</th>
			<th class="hidden-480">salaryL</th>
            <th></th>
          </tr>
        </thead>
      </table>
    </div>
  </div>
</div>

<div>
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="bootbox-close-button close" data-dismiss="modal">×</button>

          <h4 class="modal-title" id="ff">新增用户</h4>
        </div>

        <div class="modal-body">
          <div class="row">
            <div class="col-xs-12">
              <table class="table table-bordered table-condensed dataTables-example dataTable no-footer">
                <tbody>
                  <tr>
                    <td class="width-15 active"><label class="pull-right"><font color="red">*</font>头像：</label></td>

                    <td for="Image" class="width-35">
                      <input id="nameImage" name="Image" maxlength="255" class="input-xlarge" type="hidden" value="" />

                      <ol id="nameImagePreview">
                        <li style="list-style:none;padding-top:5px;">无</li>
                      </ol><a href="javascript:" onclick="nameImageFinderOpen();" class="btn btn-primary">选择</a>&nbsp;<a href="javascript:" onclick="nameImageDelAll();" class="btn btn-default">清除</a>
                    </td>

                    <td class="width-15"><label class="pull-right"><font color="red">*</font>归属公司:</label></td>

                    <td  class="width-35">
                      <input id="companyId" name="CompanyID" class="form-control required" type="hidden" value="1" aria-required="true" />

                      <div class="input-group">
                        <input id="companyName" name="companyname" readonly="readonly" type="text" value="河南省投资促进局" data-msg-required="" class="form-control required" style="" aria-required="true" /> <span class="input-group-btn"><button type="button" id="companyButton" class="btn btn-primary" data-toggle="modal" data-target="#myModal2" data-whatever="#companyName">a</button></span>
                      </div><label id="companyName-error" class="error" for="companyName" style="display:none"></label>
                    </td>
                  </tr>

                  <tr>
                    <td class="active"><label class="pull-right"><font color="red">*</font>归属部门:</label></td>

                    <td>
                      <input id="officeId" name="DepartmentID" class="form-control required" type="hidden" value="1" aria-required="true" />

                      <div class="input-group">
                        <input id="officeName" name="office.name" readonly="readonly" type="text" value="河南省投资促进局" data-msg-required="" class="form-control required" style="" aria-required="true" /> <span class="input-group-btn"><button type="button" id="officeButton" class="btn btn-primary" data-toggle="modal" data-target="#myModal2" data-whatever="#officeName">b</button></span>
                      </div><label id="officeName-error" class="error" for="officeName" style="display:none"></label>
                    </td>

                    <td  class="active"><label class="pull-right"><font color="red">*</font>工号:</label></td>

                    <td for="UserID"><input id="no" name="UserID" class="form-control required" type="text" value="" maxlength="50" aria-required="true" /></td>
                  </tr>

                  <tr>
                    <td class="active"><label class="pull-right"><font color="red">*</font>姓名:</label></td>

                    <td for="Names"><input id="name" name="Names" class="form-control required" type="text" value="" maxlength="50" aria-required="true" /></td>

                    <td class="active"><label class="pull-right"><font color="red">*</font>登录名:</label></td>

                    <td for="UserNames"><input id="UserName" name="UserNames" type="hidden" value="" /> <input id="loginName" name="UserName" class="form-control required userName error" type="text" value="" maxlength="50" aria-required="true" aria-invalid="true" /><label id="loginName-error" class="error" for="loginName">这是必填字段</label></td>
                  </tr>

                  <tr>
                    <td class="active"><label class="pull-right"><font color="red">*</font>密码:</label></td>

                    <td for="PassWord"><input id="newPassword" name="PassWord" type="password" value="" maxlength="50" minlength="3" class="form-control required" aria-required="true" /></td>

                    <td class="active"><label class="pull-right"><font color="red">*</font>确认密码:</label></td>

                    <td for="confirmNewPassword"><input id="confirmNewPassword" name="confirmNewPassword" type="password" class="form-control required" value="" maxlength="50" minlength="3" equalto="#newPassword" aria-required="true" /></td>
                  </tr>

                  <tr>
                    <td class="active"><label class="pull-right">邮箱:</label></td>

                    <td for="email"><input id="email" name="email" class="form-control email" type="text" value="" maxlength="100" /></td>

                    <td class="active"><label class="pull-right">电话:</label></td>

                    <td for="phone"><input id="phone" name="phone" class="form-control" type="text" value="" maxlength="100" /></td>
                  </tr>

                  <tr>
                    <td class="active"><label class="pull-right">手机:</label></td>

                    <td for="mobile"><input id="mobile" name="mobile" class="form-control" type="text" value="" maxlength="100" /></td>

                    <td class="active"><label class="pull-right">是否允许登录:</label></td>

                    <td><select id="loginFlag" name="loginFlag" class="form-control">
                      <option value="1" selected="selected">
                        是
                      </option>

                      <option value="0">
                        否
                      </option>
                    </select></td>
                  </tr>

                  <tr>
                    <td class="active"><label class="pull-right">用户类型:</label></td>

                    <td><select id="userType" name="userType" class="form-control">
                      <option value="" selected="selected">
                        请选择
                      </option>

                      <option value="1">
                        系统管理
                      </option>

                      <option value="2">
                        部门经理
                      </option>

                      <option value="3">
                        普通用户
                      </option>
                    </select></td>

                    <td class="active"><label class="pull-right"><font color="red">*</font>用户角色:</label></td>

                    <td>
                      <div class="icheckbox_square-green" style="position: relative;">
                        <span><input id="roleIdList1" name="roleIdList" class="i-checks required" type="checkbox" value="5" aria-required="true" style="position: absolute; opacity: 0;" /><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></span>
                      </div><span><label for="roleIdList1" class="">本部门管理员1</label></span>

                      <div class="icheckbox_square-green" style="position: relative;">
                        <span><input id="roleIdList2" name="roleIdList" class="i-checks required" type="checkbox" value="1c54e003c1fc4dcd9b087ef8d48abac3" aria-required="true" style="position: absolute; opacity: 0;" /><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></span>
                      </div><span><label for="roleIdList2">管理员</label></span>

                      <div class="icheckbox_square-green" style="position: relative;">
                        <span><input id="roleIdList3" name="roleIdList" class="i-checks required" type="checkbox" value="caacf61017114120bcf7bf1049b6d4c3" aria-required="true" style="position: absolute; opacity: 0;" /><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></span>
                      </div><span><label for="roleIdList3">部门管理员</label></span>

                      <div class="icheckbox_square-green" style="position: relative;">
                        <span><input id="roleIdList4" name="roleIdList" class="i-checks required" type="checkbox" value="781acb2361244e49aef509c8688c3ec2" aria-required="true" style="position: absolute; opacity: 0;" /><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></span>
                      </div><span><label for="roleIdList4" class="">投资促进局</label></span><input type="hidden" name="_roleIdList" value="on" /> <label id="roleIdList-error" class="error" for="roleIdList"></label>
                    </td>
                  </tr>

                  <tr>
                    <td  class="active"><label class="pull-right">备注:</label></td>

                    <td>
                    <textarea for="bz" id="remarks" name="bz" maxlength="200" class="form-control" rows="3">
					</textarea></td>

                    <td class="active"></td>

                    <td></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>

        <div class="modal-footer">
          <button data-bb-handler="cancel" type="button" data-dismiss="modal" class="btn btn-default">关闭</button> <button data-bb-handler="confirm" id="sure_button" type="button" data-id="0" data-type="0" class="btn btn-primary">确定</button>
        </div>
      </div>
    </div>
  </div>
</div><!-- Button trigger modal -->
<!-- Modal -->

<div class="modal fade bs-example-modal-sm" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

        <h4 class="modal-title" id="myModalLabel">部门列表</h4>
      </div>

      <div class="modal-body">
        <div class="widget-box">
          <div class="widget-body" style="font-size:10px; height:400px; overflow:auto">
            <div class="widget-main">
              <div id="treeviewserch" class="tree"></div>
            </div>
          </div>
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button> <button type="button" id='depart'   data-tree='' data-value='' class="btn btn-primary">确定</button>
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

$(function ()
		{


		var scripts = [null,"__js__/LBtree/twotree.js", "<?php echo \think\Config::get('__PUBLIC__'); ?>/static/components/datatables/media/js/jquery.dataTables.js", "<?php echo \think\Config::get('__PUBLIC__'); ?>/static/components/_mod/datatables/jquery.dataTables.bootstrap.js", "<?php echo \think\Config::get('__PUBLIC__'); ?>/static/components/datatables.net-buttons/js/dataTables.buttons.js", "<?php echo \think\Config::get('__PUBLIC__'); ?>/static/components/datatables.net-buttons/js/buttons.flash.js", "<?php echo \think\Config::get('__PUBLIC__'); ?>/static/components/datatables.net-buttons/js/buttons.html5.js", "<?php echo \think\Config::get('__PUBLIC__'); ?>/static/components/datatables.net-buttons/js/buttons.print.js", "<?php echo \think\Config::get('__PUBLIC__'); ?>/static/components/datatables.net-buttons/js/buttons.colVis.js", "<?php echo \think\Config::get('__PUBLIC__'); ?>/static/components/datatables.net-select/js/dataTables.select.js", null]
		$('.page-content-area').ace_ajax('loadScripts', scripts, function ()
		{	
			
		    //inline scripts related to this page
		    jQuery(function ($)
		    {
				var $scrpe = {
						param:{
							companyID:1,//公司ID
							cityID:1,//城市ID
							departID:1,//部门ID
							keyword:null,//关键字
						},
						url:"index/User/getUserByDepartID?id=0",//全局URL
						input:{},
						fun:function (event, treeId, treeNode){
							createTable();
						}
				}

			    function SubmitFormValue()
			    {

			        var companyName = $('#companyName').val(); //获取归属公司id和值
			        var companyID = $('#companyName').attr("data-companyID");
			        var officeName = $('#officeName').val(); //归属办公室
			        var officeNameID = $('#officeName').attr("data-companyID");
			        var noID = $('#no').val(); //工号
			        var loginName = $('#loginName').val(); //登录名
			        var name = $('#name').val(); //姓名
			        var newPassword = $('#newPassword').val(); //密码
			        var confirmNewPassword = $('#confirmNewPassword').val(); //重复密码
			        var email = $('#email').val(); //邮箱
			        var mobile = $('#mobile').val();
			        var phone = $('#phone').val();
			        var loginFlag = $('#loginFlag').val(); //是否允许登录
			        var userType = $('#userType').val(); //用户类型
			        var userRole = $('[name=roleIdList]').children('[checked=true]').attr('value'); //用户角色
			        var remarks = $('#remarks').val(); //备注
			        var id = $("#sure_button").attr("data-id");
			        var type = $("#sure_button").attr("data-type");
			        $.post('<?php echo \think\Config::get('__PUBLIC__'); ?>/index/User/editUser',
			        {
			            companyID : companyID,
			            officeNameID : officeNameID,
			            noID : noID,
			            loginName : loginName,
			            name : name,
			            newPassword : newPassword,
			            email : email,
			            mobile : mobile,
			            loginFlag : loginFlag,
			            userType : userType,
			            userRole : userRole,
			            remarks : remarks,
			            phone : phone,
			            id:id,
			            type:type
			        },function (data)
			        {
			            if(data.code == 1){
			            	 $('#myModal').modal('hide');
			            	alert(data.msg);
			            	myTable.draw();
			            }else{
			            	alert(data.msg);
			            }
			         
			        }, 'Json');
			    }
			    //提交shuju
				$.validator.setDefaults({
				    submitHandler: function() {
				        $('#myModal').modal('hide');
				        SubmitFormValue();
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
			    //construct the data source object to be used by tree
			    var remoteUrl = '<?php echo \think\Config::get('__PUBLIC__'); ?>/index/Department/getDeparList';

			    var remoteDateSource = function (options, callback)
			    {
			        var parent_id = null;
			        if ('type' in options && options['type'] == 'folder')
			        {

			            if ('additionalParameters' in options && 'children' in options.additionalParameters)
			            {
			                parent_id = options.additionalParameters['id'];
			            }
			        }
			        if (!('text' in options || 'type' in options))
			        {
			            parent_id = 0; //load first level data
			        }
			        if (parent_id !== null)
			        {
			            $.ajax(
			            {
			                url : remoteUrl,
			                data : 'id=' + parent_id,
			                type : 'POST',
			                dataType : 'json',
			                success : function (response)
			                {
			                    if (response.status == "OK")
			                        callback(
			                        {
			                            data : response.data
			                        }
			                        )
			                },
			                error : function (response)
			                {
			                    //console.log(response);
			                }
			            }
			            )
			        }
			    }

			    $('#myModal2').on('show.bs.modal', function (event)
			    {
			        var button = $(event.relatedTarget) // Button that triggered the modal
			            var recipient = button.data('whatever') // Extract info from data-* attributes
			            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
			            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
			            var modal = $(this)
			            //modal.find('.modal-title').text('New message to ' + recipient)
			            modal.find('.modal-footer .btn.btn-primary').attr('data-id', recipient);
			    }
			    )

			    $('#treeviewserch').ace_tree(
			    {
			        dataSource : remoteDateSource,
			        loadingHTML : '<div class="tree-loading"><i class="ace-icon fa fa-refresh fa-spin blue"></i></div>',
			        'open-icon' : 'ace-icon fa fa-folder-open',
			        'close-icon' : 'ace-icon fa fa-folder',
			        'itemSelect' : true,
			        'folderSelect' : true,
			        'multiSelect' : false,
			        'selected-icon' : null,
			        'unselected-icon' : null,
			        'folder-open-icon' : 'ace-icon tree-plus',
			        'folder-close-icon' : 'ace-icon tree-minus',

			    }
			    );
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

		        
		    	twotree($,$scrpe);

		    	//initiate dataTables plugin
		        var myTable =
		            $('#dynamic-table')
		            //.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
		            .DataTable(
		            {

		                "columns" : [
		                    {
		                        "data" : "",
		                        "orderable" : false,
		                    },
		                    {
		                        "data" : "UserName",
		                        "title" : "登录名",
		                        "orderable" : false,
		                    },
		                    {
		                        "data" : "Name",
		                        "title" : "姓名",
		                        "orderable" : false,
		                    },
		                    {
		                        "data" : "phone",
		                        "title" : "电话",
		                        "orderable" : false,
		                    },
		                    {
		                        "data" : "moblie",
		                        "title" : "手机",
		                        "orderable" : false,
		                    },
		                    {
		                        "data" : "CompanyName",
		                        "title" : "归属公司",
		                        "orderable" : false,
		                    },
		                    {
		                        "data" : "DeparName",
		                        "title" : "归属部门",
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
		                        "targets" : 8,
		                        "data" : null,
		                        "defaultContent" : "<a  class='btn btn-info btn-xs'><i class='fa fa-search-plus'></i> 查看</a><a  class='btn btn-success btn-xs'><i class='fa fa-edit'></i> 修改</a><a class='btn btn-danger btn-xs'><i class='fa fa-trash'></i> 删除</a>"
		                    },
		                    {
		                        "targets": [ 7 ],
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
		                "sAjaxSource" : new datatable().makeUrl(),//"<?php echo \think\Config::get('__PUBLIC__'); ?>/index/User/getUserByDepartID?id=0",
		        
		            }
		            );
		         datatable.prototype.reDreaw = function(){
		        		//重新绘制database
		        			url = this.makeUrl();
		        			myTable.ajax.url(url).load();
		        			return true;
		         }
		         //部门树的回调函数
				function createTable(){
					new datatable().reDreaw();
				}
		         
		        $('#treeviewserch')
		        .on('selected.fu.tree', function (e)
		        {

		            var items = $('#treeviewserch').tree('selectedItems');

		            //alert(items[0].text);
		            $('[data-tree]').attr('data-tree', items[0].text).attr('data-value', items[0].additionalParameters['id']);

		        }
		        );
		        $('[data-tree]').on('click', function ()
		        {
		            $('#myModal2').modal('hide');
		            var id = $('#depart').attr('data-id');

		            $(id).val($('#depart').attr('data-tree'))
		            .attr('data-companyID', $('#depart').attr('data-value'));
		            //alert(id);
		            //

		        }
		        );
		        $(window).resize(function ()
		        {
		            myTable.draw();
		        }
		        );
		        //myTable.column( 0 ).visible( false );
		        //alert( 'Data source: '+myTable.ajax.url() );
		        //var idx = myTable.column( 1 ).index( 'visible' );
		        //alert( idx );
		        $.fn.dataTable.Buttons.swfPath = "<?php echo \think\Config::get('__PUBLIC__'); ?>/static/components/datatables.net-buttons-swf/index.swf"; //in Ace demo ../../components will be replaced by correct assets path
		        $.fn.dataTable.Buttons.defaults.dom.container.className = 'dt-buttons btn-overlap btn-group btn-overlap';

		        new $.fn.dataTable.Buttons(myTable,
		        {
		            buttons : [
		                {
		                    "extend" : "colvis",
		                    "text" : "<i class='fa fa-search bigger-110 blue'></i> <span class='hidden'>Show/hide columns</span>",
		                    "className" : "btn btn-white btn-primary btn-bold",
		                    columns : ':not(:first):not(:last)'
		                },
		                {
		                    "extend" : "copy",
		                    "text" : "<i class='fa fa-copy bigger-110 pink'></i> <span class='hidden'>Copy to clipboard</span>",
		                    "className" : "btn btn-white btn-primary btn-bold"
		                },
		                {
		                    "extend" : "csv",
		                    "text" : "<i class='fa fa-database bigger-110 orange'></i> <span class='hidden'>Export to CSV</span>",
		                    "className" : "btn btn-white btn-primary btn-bold"
		                },
		                {
		                    "extend" : "excel",
		                    "text" : "<i class='fa fa-file-excel-o bigger-110 green'></i> <span class='hidden'>Export to Excel</span>",
		                    "className" : "btn btn-white btn-primary btn-bold"
		                },
		                {
		                    "extend" : "pdf",
		                    "text" : "<i class='fa fa-file-pdf-o bigger-110 red'></i> <span class='hidden'>Export to PDF</span>",
		                    "className" : "btn btn-white btn-primary btn-bold"
		                },
		                {
		                    "extend" : "print",
		                    "text" : "<i class='fa fa-print bigger-110 grey'></i> <span class='hidden'>Print</span>",
		                    "className" : "btn btn-white btn-primary btn-bold",
		                    autoPrint : false,
		                    message : 'This print was produced using the Print button for DataTables'
		                }
		            ]
		        }
		        );
		        myTable.buttons().container().appendTo($('.tableTools-container'));

		        //style the message box
		        var defaultCopyAction = myTable.button(1).action();
		        myTable.button(1).action(function (e, dt, button, config)
		        {
		            defaultCopyAction(e, dt, button, config);
		            $('.dt-button-info').addClass('gritter-item-wrapper gritter-info gritter-center white');
		        }
		        );

		        var defaultColvisAction = myTable.button(0).action();
		        myTable.button(0).action(function (e, dt, button, config)
		        {

		            defaultColvisAction(e, dt, button, config);

		            if ($('.dt-button-collection > .dropdown-menu').length == 0)
		            {
		                $('.dt-button-collection')
		                .wrapInner('<ul class="dropdown-menu dropdown-light dropdown-caret dropdown-caret" />')
		                .find('a').attr('href', '#').wrap("<li />")
		            }
		            $('.dt-button-collection').appendTo('.tableTools-container .dt-buttons')
		        }
		        );

		        ////

		        setTimeout(function ()
		        {
		            $($('.tableTools-container')).find('a.dt-button').each(function ()
		            {
		                var div = $(this).find(' > div').first();
		                if (div.length == 1)
		                    div.tooltip(
		                    {
		                        container : 'body',
		                        title : div.parent().text()
		                    }
		                    );
		                else
		                    $(this).tooltip(
		                    {
		                        container : 'body',
		                        title : $(this).text()
		                    }
		                    );
		            }
		            );
		        }, 500);

		        $('#myModal').on('show.bs.modal', function (event)
		        {
		            var button = $(event.relatedTarget);
		            var recipient = button.data('whatever');
		            var type = button.data('type');
		            var modal = $(this);
		            modal.find('.modal-title').text(recipient);
		            if (type == 1)
		            {
		            	$("#sure_button").attr("data-type",'1');
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
		                                $.post('<?php echo \think\Config::get('__PUBLIC__'); ?>/index/User/deleUser',
		                                        {
		                                            id:d.UserID
		                                        }, function (data)
		                                        {
		                                            if(data.code == 1){
		                                            	
		                                            	alert(data.msg);
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
		            	$("#sure_button").attr("data-type",'3');

		                $('#companyName').val(d.CompanyName); //获取归属公司id和值
		                $('#companyName').attr("data-companyID", '1');
		                $('#officeName').val(d.DeparName); //归属办公室
		                $('#officeName').attr("data-companyID", '2');
		                $('#no').val('1234'); //工号
		                $('#loginName').val(d.UserName); //登录名
		                $('#name').val(d.Name); //姓名
		                $('#newPassword').val('123'); //密码
		                $('#confirmNewPassword').val('12'); //重复密码
		                $('#email').val('22'); //邮箱
		                $('#mobile').val('15263');
		                $('#loginFlag').val(); //是否允许登录
		                $('#userType').val(); //用户类型
		                //$('[name=roleIdList]').childen();//用户角色
		                $("#sure_button").attr("data-id",d.ID);
		                $('#remarks').val('dfadsfadsf'); //备注
		            }
		        }
		        );

		        $('#dynamic-table tbody').on('click', '.btn.btn-info.btn-xs', function ()
		        {
		        	$("#sure_button").attr("data-type",'4');
		            var mytables = myTable.rows($(this).parent('td').parent('tr'))[0][0];
		            var d = myTable.row(mytables).data();
		            $('#companyName').val(d.CompanyName); //获取归属公司id和值
		            $('#companyName').attr("data-companyID", '1');
		            $('#officeName').val(d.DeparName); //归属办公室
		            $('#officeName').attr("data-companyID", '2');
		            $('#no').val('1234'); //工号
		            $('#loginName').val(d.UserName); //登录名
		            $('#name').val(d.Name); //姓名
		            $('#newPassword').val('123'); //密码
		            $('#confirmNewPassword').val('12'); //重复密码
		            $('#email').val('22'); //邮箱
		            $('#mobile').val('15263');
		            $('#loginFlag').val(); //是否允许登录
		            $('#userType').val(); //用户类型
		            //$('[name=roleIdList]').childen();//用户角色
		            $('#remarks').val('dfadsfadsf'); //备注
		            $('#myModal').modal('show');
		        }
		        );
		        $('#dynamic-table tbody').on('click', '.btn.btn-success.btn-xs', function ()
		        {
		        	$("#sure_button").attr("data-type",'3');
		            var mytables = myTable.rows($(this).parent('td').parent('tr'))[0][0];
		            var d = myTable.row(mytables).data();
		            $("#sure_button").attr("data-id",d.ID);
		            $('#companyName').val(d.CompanyName); //获取归属公司id和值
		            $('#companyName').attr("data-companyID", '1');
		            $('#officeName').val(d.DeparName); //归属办公室
		            $('#officeName').attr("data-companyID", '2');
		            $('#no').val('1234'); //工号
		            $('#loginName').val(d.UserName); //登录名
		            $('#name').val(d.Name); //姓名
		            $('#newPassword').val('123'); //密码
		            $('#confirmNewPassword').val('12'); //重复密码
		            $('#email').val('22'); //邮箱
		            $('#mobile').val('15263');
		            $('#loginFlag').val(); //是否允许登录
		            $('#userType').val(); //用户类型
		            //$('[name=roleIdList]').childen();//用户角色
		            $('#remarks').val('dfadsfadsf'); //备注
		            $('#myModal').modal('show');
		        }
		        );
		        $('#dynamic-table tbody').on('click', '.btn.btn-danger.btn-xs', function ()
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
		                            $.post('<?php echo \think\Config::get('__PUBLIC__'); ?>/index/User/deleUser',
		                                    {
		                                        id:d.UserID
		                                    }, function (data)
		                                    {
		                                        if(data.code == 1){
		                                        	
		                                        	alert(data.msg);
		                                        }else{
		                                        	alert(data.msg);
		                                        }

		                                    }, 'Json');
		                        }
		                    }
		                ]
		            }
		            );
		        }
		        );
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
		        }
		        );

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
		            }
		            );
		        }
		        );

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



		        /********************************/
		        //add tooltip for small view action buttons in dropdown menu
		        $('[data-rel="tooltip"]').tooltip(
		        {
		            placement : tooltip_placement
		        }
		        );

		        //tooltip placement on right or left
		        function tooltip_placement(context, source)
		        {
		            var $source = $(source);
		            var $parent = $source.closest('table')
		                var off1 = $parent.offset();
		            var w1 = $parent.width();

		            var off2 = $source.offset();
		            //var w2 = $source.width();

		            if (parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2))
		                return 'right';
		            return 'left';
		        }

		        /***************/
		        $('.show-details-btn').on('click', function (e)
		        {
		            e.preventDefault();
		            $(this).closest('tr').next().toggleClass('open');
		            $(this).find(ace.vars['.icon']).toggleClass('fa-angle-double-down').toggleClass('fa-angle-double-up');
		        }
		        );
	    }
	    )
	}
	);
}
);

</script>