$(function ()
{
var scripts = [null,"__js__/LBtree/twotree.js", "{$Think.config.__PUBLIC__}/static/components/datatables/media/js/jquery.dataTables.js", "{$Think.config.__PUBLIC__}/static/components/_mod/datatables/jquery.dataTables.bootstrap.js", "{$Think.config.__PUBLIC__}/static/components/datatables.net-buttons/js/dataTables.buttons.js", "{$Think.config.__PUBLIC__}/static/components/datatables.net-buttons/js/buttons.flash.js", "{$Think.config.__PUBLIC__}/static/components/datatables.net-buttons/js/buttons.html5.js", "{$Think.config.__PUBLIC__}/static/components/datatables.net-buttons/js/buttons.print.js", "{$Think.config.__PUBLIC__}/static/components/datatables.net-buttons/js/buttons.colVis.js", "{$Think.config.__PUBLIC__}/static/components/datatables.net-select/js/dataTables.select.js", null]
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
    	var dataTableConfig = @DATATABLECONFIG@;//表格插件配置文件
        //initiate dataTables plugin
    	dataTableConfig.drawCallback = function (settings)  {}
    	dataTableConfig.sAjaxSource=new datatable().makeUrl();
        var myTable = $('#dynamic-table').DataTable(dataTableConfig);
        console.log(dataTableConfig);
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

    	var EDITVIEWValidatorRuleCallbackFun = function() {
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
	        $.post('@EDITVIEWValidatorRuleCallbackUrl@',
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
	
	    };
    	var CAddValidatorRuleCallbackFun = EDITVIEWValidatorRuleCallbackFun;
    	var CLookValidatorRuleCallbackFun = EDITVIEWValidatorRuleCallbackFun;
    	var CEditValidatorRuleCallbackFun = EDITVIEWValidatorRuleCallbackFun;
    	//编辑表单验证配置文件
    	var EDITVIEWValidatorRuleConfig = @EDITVIEWValidatorRuleConfig@;
    	if(EDITVIEWValidatorRuleConfig != null){
    		
    		$("@EDITVIEWSubmintModal@").validate(EDITVIEWValidatorRuleConfig);
    	}
    	//添加表单验证配置文件
    	var ADDVIEWValidatorRuleConfig = @ADDVIEWValidatorRuleConfig@;
    	if(ADDVIEWValidatorRuleConfig != null){
    		
    		$("@ADDVIEWSubmintModal@").validate(ADDVIEWValidatorRuleConfig);
    	}  	
    	//编辑表单验证配置文件
    	var LOOKVIEWValidatorRuleConfig = @LOOKVIEWValidatorRuleConfig@;
    	if(LOOKVIEWValidatorRuleConfig != null){
    		
    		$("@LOOKVIEWSubmintModal@").validate(LOOKVIEWValidatorRuleConfig);
    	}
    	//编辑表单验证配置文件
    	var DELEVIEWValidatorRuleConfig = @DELEVIEWValidatorRuleConfig@;
    	if(DELEVIEWValidatorRuleConfig != null){
    		
    		$("@DELEVIEWSubmintModal@").validate(DELEVIEWValidatorRuleConfig);
    	}

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
