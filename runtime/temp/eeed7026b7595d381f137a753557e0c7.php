<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:63:"E:\f\phpace_dev\public/../application/index\view\log\index.html";i:1527495199;}*/ ?>
<title>日志管理</title>
<div class="row" style="margin:0px;">
  <div class="panel panel-default col-xs-12" style="border:#000 0px solid; padding:2px">
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
					<div id="menuContentareas" class="menuContent" style="display:none; z-index:333;border:1px #ffaaff solid;background-color: #ffffff; position: absolute;">
						<ul id="treeDemoareas" class="ztree" style="margin-top:0; width:160px;"></ul>
					</div>
				</div>
			</div>
        	<div class="col-sm-3">
				<div class="input-group">
					<span id="menuBtns" class="input-group-addon">
						归属公司
					</span>
					<input type="text" id="companySels"  class="form-control search-query" placeholder="请选择公司">
					<div id="menuContentcompany" class="menuContent" style="display:none; position: absolute; z-index:333;border:1px #ffaaff solid;background-color: #ffffff">
						<ul id="treeDemocompany" class="ztree" style="margin-top:0; width:160px;"></ul>
					</div>					
				</div>
			</div>
        	<div class="col-sm-3">
				<div class="input-group">
					<span id="menuBtnss" class="input-group-addon">
						归属部门
					</span>
					<input type="text" id="departSelss"  class="form-control search-query" placeholder="请选择部门">
					<div id="menuContentdepart" class="menuContent" style="display:none; position: absolute; z-index:333;border:1px #ffaaff solid;background-color: #ffffff">
						<ul id="treeDemodepart" class="ztree" style="margin-top:0; width:160px;"></ul>
					</div>					
				</div>
			</div>			
        </div>
     
     
      </div>
    </div>
    
    
    
    <!-- div.dataTables_borderWrap -->

    <div class="row">
      <div class="col-xs-5">
        <div class="clearfix">
         <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#myModal2" data-whatever="查看日志内容">查看</button>
        </div>
      </div>

      <div class="clearfix">
        <div class="pull-right tableTools-container"></div>
      </div>
    </div>

    <div style="clear:both">
      <table id="dynamic-table" class="table table-striped table-bordered table-hover" style="font-size:10px;">
   
      </table>
    </div>
  </div>
</div>

<div>
 

</div><!-- Button trigger modal -->
<!-- Modal -->

<div class="modal fade bs-example-modal-sm" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">查看</h4>
      </div>

      <div class="modal-body">

			<div class="row">
				<div class="col-sm-3">标题</div>
				<div class="col-sm-9" id="modal-title"></div>
				<div class="col-sm-3">内容</div>
				<div class="col-sm-9" ><p id="modal-body"></p></div>
				<div class="col-sm-3">错误代码</div>
				<div class="col-sm-9" ><p id="modal-code"></p></div>
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




var scripts = [null, "<?php echo \think\Config::get('__PUBLIC__'); ?>/static/components/datatables/media/js/jquery.dataTables.js", "<?php echo \think\Config::get('__PUBLIC__'); ?>/static/components/_mod/datatables/jquery.dataTables.bootstrap.js", "<?php echo \think\Config::get('__PUBLIC__'); ?>/static/components/datatables.net-buttons/js/dataTables.buttons.js", "<?php echo \think\Config::get('__PUBLIC__'); ?>/static/components/datatables.net-buttons/js/buttons.flash.js", "<?php echo \think\Config::get('__PUBLIC__'); ?>/static/components/datatables.net-buttons/js/buttons.html5.js", "<?php echo \think\Config::get('__PUBLIC__'); ?>/static/components/datatables.net-buttons/js/buttons.print.js", "<?php echo \think\Config::get('__PUBLIC__'); ?>/static/components/datatables.net-buttons/js/buttons.colVis.js", "<?php echo \think\Config::get('__PUBLIC__'); ?>/static/components/datatables.net-select/js/dataTables.select.js", null]
$('.page-content-area').ace_ajax('loadScripts', scripts, function ()
{
    //inline scripts related to this page
    jQuery(function ($)
    {
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
                        "data" : "Title",
                        "title" : "标题",
                        "orderable" : false,
                    },
                    {
                        "data" : "Content",
                        "title" : "内容",
                        "orderable" : false,
                    },
                    {
                        "data" : "ErrorID",
                        "title" : "日志代码",
                        "orderable" : false,
                    },
                    {
                        "data" : "Type",
                        "title" : "类型",
                        "orderable" : false,
                    },
                    {
                        "data" : "UserID",
                        "title" : "用户ID",
                        "orderable" : false,
                    },
                    {
                        "data" : "IsDelete",
                        "title" : "状态",
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
                        "defaultContent" : "<a data-action='doview' class='btn btn-info btn-xs'><i class='fa fa-search-plus'></i> 查看</a>"
                    },
                    {
                        "targets": [ 7 ],
                        "visible": false,
                        "searchable": false
                      },

                ],

                "drawCallback" : function (settings)  {},
                "language" :
                {
                    "lengthMenu" : "每页 _MENU_ 条记录",
                    "zeroRecords" : "没有找到记录",
                    "info" : "第 _PAGE_ 页 ( 总共 _PAGES_ 页 )",
                    "infoEmpty" : "无记录",
                    "infoFiltered" : "(从 _MAX_ 条记录过滤)"
                },
                "oPaginate" :
                {
                    "sFirst" : "首页",
                    "sPrevious" : " 上一页 ",
                    "sNext" : " 下一页 ",
                    "sLast" : " 尾页 "
                },

                "bProcessing" : true,
                "bServerSide" : true,
                "sAjaxSource" : "<?php echo \think\Config::get('__PUBLIC__'); ?>/index/Log/getLogList?id=0",
                //"http://localhost/phpace/table.php?id=0"	,

                //,
                //"sScrollY": "200px",
                //"bPaginate": false,

                //"sScrollX": "100%",
                //"sScrollXInner": "120%",
                //"bScrollCollapse": true,
                //Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
                //you may want to wrap the table inside a "div.dataTables_borderWrap" element

                //"iDisplayLength": 50


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
        $(document).on("click","[data-action=doview]",function(){
        	
        	$("#sure_button").attr("data-type",'4');
            var mytables = myTable.rows($(this).parent('td').parent('tr'))[0][0];
            var d = myTable.row(mytables).data();
            $('#modal-title').text(d.Title); //获取归属公司id和值
            $('#modal-body').text(d.Content);
            $('#modal-code').text(d.ErrorID); //归属办公室
            $('#myModal2').modal('show');	
        	
        });
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

        //And for the first simple table, which doesn't have TableTools or dataTables
        //select/deselect all rows according to table header checkbox
        var active_class = 'active';
        $('#simple-table > thead > tr > th input[type=checkbox]').eq(0).on('click', function ()
        {
            var th_checked = this.checked; //checkbox inside "TH" table header

            $(this).closest('table').find('tbody > tr').each(function ()
            {
                var row = this;
                if (th_checked)
                    $(row).addClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', true);
                else
                    $(row).removeClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', false);
            }
            );
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

/***
 * 城市列表
 */
 var treeobj = {
			city:0,
			company:0
	};
	var settingCity = {
			async: {
				enable: true,
				url:"<?php echo url('index/Area/ajaxGetArea'); ?>",
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
		treeobj.city=treeNode.id;
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
				otherParam:{"otherParam":treeobj.city},
				
			},
			callback: {
				onClick: zTreeCompanyOnClick
			}
		};
		function zTreeCompanyOnClick(event, treeId, treeNode){
			$("#companySels").val(treeNode.name);
			treeobj.company=treeNode.id;
			$.fn.zTree.init($("#treeDemodepart"), settingdepart );
			hideMenus();
		}

/****
 * 归属部门
 */
	var settingdepart = {
			async: {
				enable: true,
				url:"<?php echo url('index/department/ajaxGetDepart'); ?>?flag=1",
				autoParam:["id", "name=n", "level=lv"],
				otherParam:{"otherParam":treeobj.company},
				
			},
	callback: {
		onClick: zTreeDepartOnClick
	}
		
		};
	function zTreeDepartOnClick(event, treeId, treeNode){
		$("#departSelss").val(treeNode.name);
		hideMenuss();
	}
 			function beforeClick(treeId, treeNode) {
    			var check = (treeNode && !treeNode.isParent);
    			if (!check) alert("只能选择城市...");
    			return check;
    		}
    		
    		function onClick(e, treeId, treeNode) {
    			var zTree = $.fn.zTree.getZTreeObj("treeDemoareas"),
    			nodes = zTree.getSelectedNodes(),
    			v = "";
    			nodes.sort(function compare(a,b){return a.id-b.id;});
    			for (var i=0, l=nodes.length; i<l; i++) {
    				v += nodes[i].name + ",";
    			}
    			if (v.length > 0 ) v = v.substring(0, v.length-1);
    			var cityObj = $("#citySel");
    			cityObj.attr("value", v);
    		}
    		
    		function showMenu() {
				
    			$(".menuContent").fadeOut("fast");
    			var cityObj = $("#citySel");
    			$("#menuContentareas").addClass("active");
    			var cityOffset = $("#citySel").offset();
    			$("#menuContentareas").css({top: cityObj.outerHeight() + "px"}).slideDown("fast");
    			
    		}
    		function hideMenu() {
    			$("#menuContentareas").fadeOut("fast");
    		}
    		function showMenus() {
    			$(".menuContent").fadeOut("fast");
    			var cityObj = $("#companySels");
    			$("#menuContentcompany").addClass("active");
    			var cityOffset = $("#companySels").offset();
    			$("#menuContentcompany").css({top: cityObj.outerHeight() + "px"}).slideDown("fast");
    			
    		}
    		function hideMenus() {
    			$("#menuContentcompany").fadeOut("fast");
    		}
    		function showMenuss() {
    			$(".menuContent").fadeOut("fast");
    			var cityObj = $("#departSelss");
    			$("#menuContentdepart").addClass("active");
    			var cityOffset = $("#departSelss").offset();
    			$("#menuContentdepart").css({top: cityObj.outerHeight() + "px"}).slideDown("fast");
    		}
    		function hideMenuss() {
    			$("#menuContentdepart").fadeOut("fast");
    		}
    		$(document).ready(function(){
    			$.fn.zTree.init($("#treeDemoareas"), settingCity);

    		});
    		
    		$("#menuBtn").on("click",showMenu);
    		$("#menuBtns").on("click",showMenus);
    		$("#menuBtnss").on("click",showMenuss);
    }
    );
    $(document).on("click","body",function(){
    	$(".menuContent.active").removeClass("active");
    });

}
);
</script>