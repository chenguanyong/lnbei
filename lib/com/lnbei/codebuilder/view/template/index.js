$(function ()
{
var scripts = [null,"__js__/LBtree/twotree.js", "{$Think.config.__PUBLIC__}/static/components/datatables/media/js/jquery.dataTables.js", "{$Think.config.__PUBLIC__}/static/components/_mod/datatables/jquery.dataTables.bootstrap.js", "{$Think.config.__PUBLIC__}/static/components/datatables.net-buttons/js/dataTables.buttons.js", "{$Think.config.__PUBLIC__}/static/components/datatables.net-buttons/js/buttons.flash.js", "{$Think.config.__PUBLIC__}/static/components/datatables.net-buttons/js/buttons.html5.js", "{$Think.config.__PUBLIC__}/static/components/datatables.net-buttons/js/buttons.print.js", "{$Think.config.__PUBLIC__}/static/components/datatables.net-buttons/js/buttons.colVis.js", "{$Think.config.__PUBLIC__}/static/components/datatables.net-select/js/dataTables.select.js", null];
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
				url:"index/Department/getDepar?id=0",//全局URL
				input:{},
				fun:function (event, treeId, treeNode){
					createTable();
				}
		}
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
            .DataTable(
            {

                "columns" : [
                    {
                        "data" : "",
                        "orderable" : false,
                    },
                    {
                        "data" : "OrganizationName",
                        "title" : "部门名称",
                        "orderable" : false,
                    },
                    {
                        "data" : "IsDelete",
                        "title" : "状态",
                        "orderable" : false,
                    },
                    {
                        "data" : "ShortName",
                        "title" : "简称",
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
                        "targets" : 8,
                        "data" : null,
                        "defaultContent" : "<a data-type='1' data-whatever='修改角色' class='btn btn-success btn-xs'><i class='fa fa-edit'></i> 修改</a><a  data-type='1' data-whatever='删除角色' class='btn btn-danger btn-xs'><i class='fa fa-trash'></i> 删除</a>"
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
                "sAjaxSource" : new datatable().makeUrl(),//"{$Think.config.__PUBLIC__}/index/Department/getDepar?id=0",
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

        $('[data-tree]').on('click', function ()
        {
            $('#myModal2').modal('hide');
            var id = $('#depart').attr('data-id');
            $(id).val($('#depart').attr('data-tree'))
            .attr('data-companyID', $('#depart').attr('data-value'));
        }
        );
  
        $('#myModal').on('show.bs.modal', function (event)
        {
            var button = $(event.relatedTarget);
            var recipient = button.data('whatever');
            var type = button.data('type');
            var modal = $(this);
            modal.find('.modal-title').text(recipient);
            var mytables = myTable.rows($('#dynamic-table tbody').find('[data-checked=1]').parent('label').parent('td').parent('tr'))[0][0];
            var d = myTable.row(mytables).data();
            if (type == 1)
            {
            	$("#submitbutton").attr("data-type",'1');
            	$("#submitbutton").attr("data-pid",d.Pid);
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
                                $.post('{$Think.config.__PUBLIC__}/index/Department/deleDepart',
                                        {
                                            id:d.ID,
                                            oper:"del"
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
                $("#submitbutton").attr("data-pid",d.Pid);
                $('#RoleName').val(d.OrganizationName); //获取归属公司id和值
                $('#css').val(d.ShortName); //获取归属公司id和值
                if(d.IsDelete == 0){
                	$("#IsDelete").prop("checked",false);
                }else{
                	$("#IsDelete").prop("checked",true);
                }
            }
        });
    	$.validator.setDefaults({
    	    submitHandler: function() {
    	        //$('#myModal').modal('hide');
    	        var id = $("#submitbutton").attr("data-id");
    	      	var IsDelete = $("#IsDelete").is(":checked");
    	      	var parentID = $("#submitbutton").attr("data-pid");
    	      	var type = $("#submitbutton").attr("data-type");
    	      	if(IsDelete == true){
    	      		IsDelete = 1;
    	      	}else{
    	      		IsDelete = 0;
    	      	}
    	      	var oper = null;
    	      	if(type ==3 ){
    	      		oper = "edit";
    	      	}else {
    	      		oper = "add";
    	      	}
    	        $.post('{$Think.config.__PUBLIC__}/index/Department/setDepart',
    	        {
    	        	Name : $('#RoleName').val(),
    	        	shortname : $('#css').val(),
    	        	IsDelete : IsDelete,
    	        	pid:parentID,
    	            id:id,
    	            oper:oper
    	        }, function (data)
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
				required: "请输入公司名",
			  },
			  Css: {
				required: "请输入简称",
			  },
			}
		});

        $('#dynamic-table tbody').on('click', 'td .btn.btn-success.btn-xs', function ()
        {
        	$("#submitbutton").attr("data-type",'3');
            var mytables = myTable.rows($(this).parent('td').parent('tr'))[0][0];
            var d = myTable.row(mytables).data();
            $("#submitbutton").attr("data-id",d.ID);
            $("#submitbutton").attr("data-pid",d.Pid);
            $('#RoleName').val(d.OrganizationName); //获取归属公司id和值
            $('#css').val(d.ShortName); //获取归属公司id和值
            if(d.IsDelete == 0){
            	$("#IsDelete").prop("checked",false);
            }else{
            	$("#IsDelete").prop("checked",true);
            }
            $('#myModal').modal('show');
        });
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
                            $.post('{$Think.config.__PUBLIC__}/index/Department/deleDepart',
                                    {
                                        id:d.ID,
                                        oper:"del"
                                        
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
	});

  });

});
