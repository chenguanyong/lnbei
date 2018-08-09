/**
 * iframe框架中的脚本程序调用父框架中的脚本
 */
(function (factory){
	if (typeof jQuery === 'undefined') { throw new Error('LB\'s JavaScript requires jQuery') }
	if (typeof define === 'function' && define.amd) {
	// AMD. Register as anonymous module.
		define(['jquery'], factory);
	} else if (typeof exports === 'object') {
	// Node / CommonJS
		factory(require('jquery'));
	} else {
	// Browser globals.
		factory(jQuery);
	}
	
})(function ($){

	'use strict';


	(function (LB_MODEL){
		var LB_MODEL_LIST = window.document.getElementById("LB_MODEL_LIST");
		if (typeof jQuery === 'undefined') { throw new Error('LB\'s JavaScript requires jQuery') }
		if(LB_MODEL_LIST == null){
			throw new Error("LB\'S need div that it is attr of LB_MODEL_LIST");
		}else{
			LB_MODEL(jQuery,LB_MODEL_LIST);
		}
	})(function LB_MODEL($,LB_MODEL_LIST){
		
		'use strict';
		
		$(document).ready(function (){
			
		});
		function Model(){
			this.uniqueCode = "";//特征码
			this.html="";//返回的模态框码
			this.timeOut=20;//超时时间
			this.modal = "";//实际的modal类
		}
		function ModelManage(id){
			this.timeOut = 20;
			this.div = $("#"+id);
			this.uniqueCodes = new Array();
			this.intervalTime = 2000;//间隔时间
			this.add = function (model){
				var timeNow = new Date().getTime();
				this.uniqueCodes.push(model);
				var tempHtml = "<div uniqueCode='"+model.uniqueCode+"' currenttime='"+timeNow+"'>" + model.html + "</div>";	
				this.div.append(tempHtml);
			}
			this.dele = function (uniqueCode){
				this._deleUniqueCodes(uniqueCode);
				this.getModalByUniqueCode(uniqueCode).detach();
			}
			/**
			 * 是否已经存在model
			 */
			this.isContain = function (uniqueCode){
				for(var i=0; i<this.uniqueCodes; i++){
					if(this.uniqueCodes[i].uniqueCode == uniqueCode){
						return true;
					}
				}
				return false;
			}
			/**
			 * 删除特征码
			 */
			this._deleUniqueCodes = function (uniqueCode){
				for(var i=0; i<this.uniqueCodes; i++){
					if(this.uniqueCodes[i].uniqueCode == uniqueCode){
						this.uniqueCodes.splice(i,1);
						return true;
					}
				}
				return false;
			}
			/**
			 * 获取指定modal模态框根据指定的唯一特征码
			 * 
			 */
			this.getModalViewByUniqueCode = function (uniquecode){
				for(var i=0; i<this.uniqueCodes; i++){
					if(this.uniqueCodes[i].uniqueCode == uniqueCode){
					return this.uniqueCodes[i].modal;
					}
				}
				return false;
			}
			this.refreshTimeOut = function (uniqueCode){
				
				var model = this.getModalByUniqueCode(uniqueCode);
				var timeNow = new Date().getTime()+20*60*1000;
				model.attr("timeOut",timeNow);
				
			}
			this.getModalByUniqueCode = function (uniqueCode){
				
				return this.div.childen("div[uniqueCode="+uniqueCode+"]");
			}

			this.autoDele = function (){
				var childenModel = this.div.childen("div");
				var timeNow = new Date().getTime();
				for(var i=0; i<childenModel.length; i++){
					if(childenModel[i].attr("timeOut") < timeNow ){
						this.dele(childenModel[i].attr("uniqueCode"));
						return true;
					}
				}
				return false;
			}

		}
		var intervalTime = 2000;//自动删除的间隔时间
		if(window.modelManage == 'undefined'){
			window.modelManage = new ModelManage(LB_MODEL_LIST);
			setInterval(function (){
				window.modelManage.autoDele();
			},intervalTime);
		}
		var ModalData = {
			headerTitle:"关闭",		//头部标题
			headerHtml:"",			//头部Html
			isAnimation:true,		//是否动画
			bodyHtml:"",			//中部HTML			
			footerColseButton:"",	//底部关闭按钮
			footerSureButton:"",	//底部提交按钮
			footerHtml:"",			//底部HTML
			ID:""					//模态框ID
		}
		/**
		 * 生成模态框
		 */
		function ModalView(obj){
			this.modalViewData = obj;//配置
			this.modal = $('#'+this.modalViewData.id);
			this.toString = function (){
				this._init();
				var modalhtml = '<div class="modal fade" id=' + this.modalViewData.id + ' tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">';
				modalhtml += '<div class="modal-dialog" role="document">';
				modalhtml += '<div class="modal-content">';
				modalhtml += '<div class="modal-header">';
				modalhtml += this.modalViewData.headerHtml;
				modalhtml += '</div>';
				modalhtml += '<div class="modal-body">';
				modalhtml += this.modalViewData.bodyHtml;
				modalhtml += '</div>';
				modalhtml += '<div class="modal-footer">';
				modalhtml += this.modalViewData.footerHtml;
				modalhtml += '</div>';
				modalhtml += '</div>';
				modalhtml += '</div>';
				modalhtml += '</div>';
				return modalhtml;				
			}
			this._init = function (){
				/**
				 * 是否禁止动画
				 */
				if(typeof this.modalViewData.isAnimation == 'undefined'){
					this.modalViewData.isAnimation = true;
				}
				/**
				 * 模态框头部标题
				 */
				if(typeof this.modalViewData.headerTitle == 'undefined'){
					this.modalViewData.headerTitle = "关闭";
				}
				/**
				 * 模态框头部
				 */
				if(typeof this.modalViewData.headerHtml == 'undefined'){
					var	modalhtml = "<button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>";
						modalhtml += '<h4 class="modal-title" id="gridSystemModalLabel">' + this.modalViewData.headerTitle + '</h4>';
					this.modalViewData.headerHtml = modalhtml;
				}
				if(typeof this.modalViewData.bodyHtml == 'undefined'){
					var	modalhtml = '空';
					this.modalViewData.bodyHtml = modalhtml;
				}
				if(typeof this.modalViewData.footerColseButton == 'undefined'){
					
					this.modalViewData.footerColseButton = '关闭';
				}
				if(typeof this.modalViewData.footerSureButton == 'undefined'){
					
					this.modalViewData.footerColseButton = '确定';
				}
				if(typeof this.modalViewData.footerHtml == 'undefined'){
					var	modalhtml = '<button type="button" class="btn btn-default" data-dismiss="modal">'+this.modalViewData.footerColseButton+'</button>';
					modalhtml += '<button type="button" class="btn btn-primary">' + this.modalViewData.footerColseButton + '</button>';
					this.modalViewData.footerHtml = modalhtml;
				}
				//模态框ID
				if(typeof this.modalViewData.id == 'undefined' || this.modalViewData.id ==""){
					
					throw new Error("ModalView need ID");
				}
			}
			//模态框操作
			this.modal = function (option){
				
				this.modal.modal(option);
			}
			//模态框事件
			this.on = function (eventName,eventFunction){
				
				this.modal.on(eventName,eventFunction);
			}
		}
		
		var lbParent = {
				move:function(toID,toPid,fromID,fromPid){
					/**
					 * 网络通信
					 * 
					 */
					lbax.post({
						url:"web/Design_Action/moveWidget",
						callback:function(str){
							if(str.code == 1){
								//调用子框架的函数
								window.workSpace.CallbackFun.actionSelector("move",toID,toPid,data,fromID,fromPid);	
							}else{
								console.log(str.msg);
							}
						},
						param:{toID:toID,toPid:toPid,fromID:fromID,fromPid:fromPid}
					});
				},
				doOutput:function(id,pid){
					/**
					 * 网络通信
					 * 
					 */
					lbax.post({
						url:"web/Design_Action/doOutput",
						callback:function(str){
							if(str.code == 1){
								//调用子框架的函数
								window.workSpace.CallbackFun.actionSelector("add",id,pid,data);	
							}else{
								console.log(str.msg);
							}
						},
						param:{id:id,pid:pid}
					});
					
				},
				doInput:function(id,pid,data){
					/**
					 * 网络通信
					 * 
					 */
					lbax.post({
						url:"web/Design_Action/doInput",
						callback:function(str){
							if(str.code == 1){
								//调用子框架的函数
								window.workSpace.CallbackFun.actionSelector("add",id,pid,data);	
							}else{
								console.log(str.msg);
							}
						},
						param:{id:id,pid:pid,data:data}
					});
				},
				dele:function(id,pid){
					/**
					 * 网络通信
					 * 
					 */
					lbax.post({
						url:"web/Design_Action/deleWidget",
						callback:function(str){
							if(str.code == 1){
								//调用子框架的函数
								window.workSpace.CallbackFun.actionSelector("add",id,pid,data);	
							}else{
								console.log(str.msg);
							}
						},
						param:{id:id,pid:pid}
					});
				},
				add:function(id,pid,widgetCode){
					console.log(widgetCode);
					console.log(window.workSpace);
					/**
					 * 网络通信
					 * 
					 */
					lbax.post({
						url:"web/Design_Action/addWidget",
						callback:function(str){
							if(str.code == 1){
								//调用子框架的函数
								//console.log(ChiledenWindow);
								window.workSpace.CallbackFun.actionSelector("add",id,pid,str.data.html);	
							}else{
								console.log(str.msg);
							}
						},
						param:{id:id,pid:pid,widgetCode:widgetCode.name}
					});
				},
				update:function(id,pid){
					
					/**
					 * 网络通信
					 * 
					 */
					lbax.post({
						url:"web/Design_Action/updateWidget",
						callback:function(str){
							if(str.code == 1){
								//调用子框架的函数
								window.workSpace.CallbackFun.actionSelector("update",id,pid,data);	
							}else{
								console.log(str.msg);
							}
						},
						param:{id:id,pid:pid}
					});
				},
				copy:function(id,pid){
					
					
				},
				paste:function(toID,toPid,fromID,fromPid){
					
					/**
					 * 网络通信
					 * 
					 */
					lbax.get({
						url:"web/Design_Action/pasteWidget",
						callback:function(str){
							if(str.code == 1){
								//调用子框架的函数
								window.workSpace.CallbackFun.actionSelector("paste",id,pid,data);	
							}else{
								console.log(str.msg);
							}
						},
						param:{toID:toID,toPid:toPid,fromID:fromID,fromPid:fromPid}
					});
				}
		}
		var LnbeiDesignParent = {
				isState:false,
				widget:{},
		}
		if (typeof window.lbParent === 'undefined'){
			lbParent.lnbeiDesignParent = LnbeiDesignParent;
			window.lbParent = lbParent;
		}
		//事件集合
		$(document).ready(function (){
			
			$(document).on("click","li[lb-action]",function (event){
				var menuCode = $(this).attr("menucode");
				var isEnable = $(this).attr("lb-isAction");
				if(isEnable == "true"){
					distribution(menuCode, obj);
				}else{
					return false;
				}
			});
			
		});
		//菜单代码
		var MenuCode = {
				newPage:1,//新建页面
				newTemplate:2,//新建模板
				save:3,//保存
				saveAs:4,//另存为
				copy:5,//复制
				paste:6,//粘贴
				dele:7,//删除
				find:8,//查找
				cut:9,//剪切
				serch:10,//搜索
				sort:11,//排序
				fullScreen:12,//全屏
				exitFullScreen:13,//退出全屏
				help:14,//帮助
		};
		//事件分配器
		function distribution(menuCode, obj){
			
			switch(menuCode)
			{
				case MenuCode.newPage : {MenuHandle.newPage(menuCode, obj);};break;
				case MenuCode.newTemplate : {MenuHandle.newTemplate(menuCode, obj);};break;
				case MenuCode.save : {MenuHandle.save(menuCode, obj);};break;
				case MenuCode.saveAs : {MenuHandle.saveAs(menuCode, obj);};break;
				case MenuCode.copy : {MenuHandle.copy(menuCode, obj);};break;
				case MenuCode.paste : {MenuHandle.paste(menuCode, obj);};break;
				case MenuCode.dele : {MenuHandle.dele(menuCode, obj);};break;
				case MenuCode.find : {MenuHandle.find(menuCode, obj);};break;
				case MenuCode.cut : {MenuHandle.cut(menuCode, obj);};break;
				case MenuCode.serch : {MenuHandle.serch(menuCode, obj);};break;
				case MenuCode.sort : {MenuHandle.sort(menuCode, obj);};break;
				case MenuCode.fullScreen : {MenuHandle.fullScreen(menuCode, obj);};break;
				case MenuCode.exitFullScreen : {MenuHandle.exitFullScreen(menuCode, obj);};break;
				case MenuCode.help : {MenuHandle.help(menuCode, obj);};break;
			}
		}
		//菜单处理事件
		var MenuHandle = {
				newPage:function (menuCode,obj){
					lbax.post({
						url:"web/Design_Action/updateWidget",
						callback:function(str){
							if(str.code == 1){
								//调用子框架的函数
								window.workSpace.CallbackFun.actionSelector("update",id,pid,data);	
							}else{
								console.log(str.msg);
							}
						},
						param:{id:id,pid:pid}
					});
					
				},//新建页面
				newTemplate:function (menuCode,obj){
					lbax.post({
						url:"web/Design_Action/updateWidget",
						callback:function(str){
							if(str.code == 1){
								//调用子框架的函数
								window.workSpace.CallbackFun.actionSelector("update",id,pid,data);	
							}else{
								console.log(str.msg);
							}
						},
						param:{id:id,pid:pid}
					});
				},//新建模板
				save:function (menuCode,obj){},//保存
				saveAs:function (menuCode,obj){},//另存为
				copy:function (menuCode,obj){},//复制
				paste:function (menuCode,obj){},//粘贴
				dele:function (menuCode,obj){},//删除
				find:function (menuCode,obj){},//查找
				cut:function (menuCode,obj){},//剪切
				serch:function (menuCode,obj){},//搜索
				sort:function (menuCode,obj){},//排序
				fullScreen:function (menuCode,obj){},//全屏
				exitFullScreen:function (menuCode,obj){},//退出全屏
				help:function (menuCode,obj){
					lbax.post({
						url:"web/Design_Action/updateWidget",
						callback:function(str){
							if(str.code == 1){
								//调用子框架的函数
								window.workSpace.CallbackFun.actionSelector("update",id,pid,data);	
							}else{
								console.log(str.msg);
							}
						},
						param:{id:id,pid:pid}
					});
				},//帮助
		};
	});
});