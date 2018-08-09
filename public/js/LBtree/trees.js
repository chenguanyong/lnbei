/**
 * 三棵树级联（依赖jquery和ztree）
 */

(function ($,$scrpe,config){
	
		var $scrpe = {
				param:{
					companyID:1,//公司ID
					cityID:1,//城市ID
					departID:1,//部门ID
					keyword:null,//关键字
					companyName:"无",//公司名称
					cityName:"",//城市名称
					departName:""//部门名称
				},
				url:'index/Role/getRole',//全局URL
				input:{}
		}
		var config = {
				cityID:"treeDemoareas",//树ID
				cityURL:'index/Area/ajaxGetArea',//城市树的URL
				cityInput:'citySel',//城市input框
				cityTreeDiv:'menuContentareas',//容纳树的div
				cityButton:"menuBtn",//点击按钮
				companyID:"treeDemocompany",
				companyURL:"index/department/ajaxGetDepart?flag=0",//公司树URL
				companyInput:'companySels',
				companyTreeDiv:'menuContentcompany',
				companyButton:"menuBtns",
				departID:"treeDemodepart",
				departURL:"index/department/ajaxGetDepart?flag=1",//部门树URL
				departInput:"departSelss",
				departTreeDiv:'menuContentdepart',
				departButton:"menuBtnss"
		}
		/***
		 * 城市列表
		 */
	   var settingCity = {
				async: {
					enable: true,
					url:config.cityURL,
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
			$("#"+config.cityInput+"").val(treeNode.name);
			$.fn.zTree.init($("#"+config.companyID+""),settingcompany );
			hideMenu();
		}
		function filter(treeId, parentNode, childNodes) {
			if (!childNodes) return null;
			for (var i=0, l=childNodes.length; i<l; i++) {
				childNodes[i].name = childNodes[i].name.replace(/\.n/g, '.');
			}
			return childNodes;
		}
		//异步加载成功回调函数
		function zTreeOnAsyncSuccessCity(event, treeId, treeNode, msg) {
		    if(treeNode == null){
				var treeObj = $.fn.zTree.getZTreeObj(config.cityID);
				var nodes  = treeObj.getNodes();
				//console.log(nodes);
				if (nodes.length>0) {
					for( var x in nodes){
						if(nodes[x].id == $scrpe.param.cityID){
							treeObj.selectNode(nodes[x]);
						}
					}
				}
				$("#" +config.cityInput+ "").val($scrpe.param.cityID);
		    }
		}
		/****
		 * 归属公司
		 */
		var settingcompany = {
				async: {
					enable: true,
					url:config.companyURL,//"index/department/ajaxGetDepart?flag=0",
					autoParam:["id", "name=n", "level=lv"],
					otherParam:{"otherParam":$scrpe.param.cityID},
					
				},
				callback: {
					onClick: zTreeCompanyOnClick,
					onAsyncSuccess: zTreeOnAsyncSuccessCompany
				}
		};
		function zTreeCompanyOnClick(event, treeId, treeNode){
			$("#"+config.companyInput+"").val(treeNode.name);
			$scrpe.param.companyID=treeNode.id;
			$.fn.zTree.init($("#"+config.departID+""), settingdepart );
			hideMenus();
		}
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
				$("#"+config.companyInput+"").val($scrpe.param.companyName);
		    }
		};
		/****
		 * 归属部门
		 */
		var settingdepart = {
				async: {
					enable: true,
					url:config.departURL,//"index/department/ajaxGetDepart?flag=1",
					autoParam:["id", "name=n", "level=lv"],
					otherParam:{"otherParam":$scrpe.param.companyID},
				},
				callback: {
					onClick: zTreeDepartOnClick,
					onAsyncSuccess: zTreeOnAsyncSuccessDepart
				}
		};
		function zTreeOnAsyncSuccessDepart(event, treeId, treeNode, msg) {
		    if(treeNode == null){
				var treeObj = $.fn.zTree.getZTreeObj(config.departID);
				var nodes  = treeObj.getNodes();
				//console.log(nodes);
				if (nodes.length>0) {
					for( var x in nodes){
						if(nodes[x].id == $scrpe.param.departID){
							treeObj.selectNode(nodes[x]);
						}
					}
				}
				$("#"+config.departInput+"").val($scrpe.param.departName);
		    }
		};
		function zTreeDepartOnClick(event, treeId, treeNode){
			$scrpe.param.departID=treeNode.id;
			$("#"+config.departInput+"").val(treeNode.name);
			hideMenuss();
		}
		function beforeClick(treeId, treeNode) {
			var check = (treeNode && !treeNode.isParent);
			if (!check) alert("只能选择城市...");
			return check;
		}
		function onClick(e, treeId, treeNode) {
			var zTree = $.fn.zTree.getZTreeObj(config.cityID),
			nodes = zTree.getSelectedNodes(),
			v = "";
			nodes.sort(function compare(a,b){return a.id-b.id;});
			for (var i=0, l=nodes.length; i<l; i++) {
				v += nodes[i].name + ",";
			}
			if (v.length > 0 ) v = v.substring(0, v.length-1);
			$("#"+config.cityInput+"").val(v);
			
		}
		function showMenu() {
			$("body").bind("mousedown", onBodyDown);
			$(".menuContent").fadeOut("fast");
			var cityObj = $("#"+config.cityInput+"");
			$("#"+config.cityTreeDiv).addClass("active");
			var cityOffset = $("#"+config.cityInput+"").offset();
			$("#"+config.cityTreeDiv).css({top: cityObj.outerHeight() + "px"}).slideDown("fast");
		}
		function hideMenu() {
			$("#"+config.cityTreeDiv).fadeOut("fast");
		}
		function showMenus() {
			$("body").bind("mousedown", onBodyDown);
			$(".menuContent").fadeOut("fast");
			var cityObj = $("#"+config.companyInput+"");
			$("#"+config.companyTreeDiv).addClass("active");
			var cityOffset = $("#"+config.companyInput+"").offset();
			$("#"+config.companyTreeDiv).css({top: cityObj.outerHeight() + "px"}).slideDown("fast");
		}
		function hideMenus() {
			$("#"+config.companyTreeDiv).fadeOut("fast");
		}
		function showMenuss() {
			$("body").bind("mousedown", onBodyDown);
			$(".menuContent").fadeOut("fast");
			var cityObj = $("#"+config.departInput+"");//$("#departSelss");
			$("#"+config.departTreeDiv).addClass("active");
			var cityOffset = $("#"+config.departInput+"").offset();
			$("#"+config.departTreeDiv).css({top: cityObj.outerHeight() + "px"}).slideDown("fast");
		}
		function hideMenuss() {
			$("#"+config.departTreeDiv).fadeOut("fast");
		}
		$(document).ready(function(){
			
			$("#"+config.cityButton).on("click",showMenu);
			$("#"+config.companyButton).on("click",showMenus);
			$("#"+config.departButton).on("click",showMenuss);
			$.fn.zTree.init($("#" + config.cityID + ""), settingCity );
			$.fn.zTree.init($("#" + config.companyID ), settingcompany );
			$.fn.zTree.init($("#" + config.departID ), settingdepart );
		});
		function onBodyDown(event) {
			if (!(event.target.id == config.cityButton || event.target.id == config.companyButton || event.target.id == config.departButton || event.target.id == config.cityInput || event.target.id == config.cityTreeDiv || $(event.target).parents("#"+config.cityTreeDiv).length>0)) {
				hideMenu();
				hideMenus();
				hideMenuss();
			}
		}
})($);