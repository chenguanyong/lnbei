/**
 * 二级树
 */
function twotree($,$scrpe){
	//异步加载成功回调函数
	function zTreeOnAsyncSuccessCity(event, treeId, treeNode, msg) {
	    if(treeNode == null){
			var treeObj = $.fn.zTree.getZTreeObj("treeDemo");
			if(treeObj == null){
				return false;
			}
			var nodes  = treeObj.getNodes();
			//console.log(nodes);
			if (nodes.length>0) {
				for( var x in nodes){
					if(nodes[x].id == $scrpe.param.cityID){
						treeObj.selectNode(nodes[x]);
					}
				}
			}
	    }
	};
	function zTreeOnAsyncSuccessCompany(event, treeId, treeNode, msg) {
	    if(treeNode == null){
			var treeObj = $.fn.zTree.getZTreeObj("treeDemocompany");
			var nodes  = treeObj.getNodes();
			//console.log(nodes);
			if (nodes.length>0) {
				for( var x in nodes){
					if(nodes[x].id == $scrpe.param.companyID){
						treeObj.selectNode(nodes[x]);
					}
				}
			}
	    }
	};
    	var settingCity = {
    			async: {
    				enable: true,
    				url:'index/Area/ajaxGetArea',
    				autoParam:["id", "name=n", "level=lv"],
    				otherParam:{"otherParam":$scrpe.param.cityID},
    				dataFilter: filter
    			},
    			callback: {
    				onClick: zTreeCityOnClick,
    				onAsyncSuccess: zTreeOnAsyncSuccessCity
    			}
    		};
    	function zTreeCityOnClick(event, treeId, treeNode){
    		$scrpe.param.cityID=treeNode.id;
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
    				url:'index/department/ajaxGetDepart?flag=0',
    				autoParam:["id", "name=n", "level=lv"],
    				otherParam:{"otherParam":$scrpe.param.cityID},
    			},
    			callback: {
    				onClick: zTreeCompanyOnClick,
    				onAsyncSuccess: zTreeOnAsyncSuccessCompany
    			}
    		};
    		function zTreeCompanyOnClick(event, treeId, treeNode){
    			$("#companySels").val(treeNode.name);
    			$scrpe.param.companyID=treeNode.id;
    			if($scrpe.fun != null){
    				$scrpe.fun(event, treeId, treeNode);
    			}
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
        			var d = $.fn.zTree.init($("#treeDemoareas"), settingCity);
        			$.fn.zTree.init($("#treeDemocompany"),settingcompany );
        			$("#citySel").val($scrpe.param.cityName = "cbei");

        		});
        		function onBodyDown(event) {
					if (!(event.target.id == "menuBtn" || event.target.id == "citySel" || event.target.id == "menuContentareas" || $(event.target).parents("#menuContentareas").length>0)) {
						hideMenu();
					}
				}
        		$("#menuBtn").on("click",showMenu);
	
}