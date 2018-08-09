/**
 * 页面设计菜单栏动作js 
 */
(function (factory){
	 
	 if(typeof lbax != 'object'){
		  console.log("LB.Design\'s JavaScript requires lbax");
		  throw new Error('LB.Design\'s JavaScript requires lbax');
		  return;
	  }
	 if(typeof lb != 'object'){
		 window.lb = {};
	  } 
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
	var MenuConfig = {
			model:$("#model"),
			modelTag:"model"
	}
	function MenuAction(){
		this.config={
				model:MenuConfig.model,
				modelTag:MenuConfig.modelTag
		}
		this._this = this;
		//ajax配置参数
		this.ajaxParam = {
				url : null,
				type : 'post',
				callback : function (event,data){},//回调函数
				dataType : "json",
				param : {}	
		}
		//新建页面
		this.action = function (name,url){
			
			var model = this.config.model.children("[name="+name+"]");
			if(model.length != 0){
				$("#"+this.config.modelTag + " [name="+name+"]").modal("show");
			}else{
				var _this = this;
				this.ajaxParam.url = url;
				this.ajaxParam.dataType = "html";
				this.ajaxParam.callback= function(str,data,e){
					
					_this.comCallBack(str,data,e);
				}
				this.ajaxParam.param={
						id:0,
						modal:name
				}
				lbax.post(this.ajaxParam);
			}
		};
		//公共的回调函数
		this.comCallBack = function (str,data,e){
			console.log(str);
			
			if(data == "success"){
				MenuConfig.model.append(str);
				lb.modal.initModal("newPage");
				$("#model [name=newPage]").modal("show");
			}else{
				alert('请求出错');
			}
		}
		
	}
	//处理外部动作
	function IframeActionListen(){
		
		this.onAction = function (object,param,event){
			
		}
	}
	//统一处理modal函数
	function LBModal(){
		this.MODALID="modal";//模态框集合
		this.name="";//模态框id
		this.modal=[];//模态框集合
		this.debug = false;
		this.selectCurrentModal = function (name){
			this.name = name;
			var _this = this;
			$(".modal").each(function (){
				
				var _name = $(this).attr("name");
				if(_name == _this.name){
					
					return $(this);
				}
			});
			return null;
		}
		//注册modal框
		this.registerModal = function (modalObj){
			
			var tempModal = {
					"name":modalObj.name,
					"url":modalObj.url,
					"param":modalObj.param,
					"callback":modalObj.callback
			}
			this.modal[modalObj.name] = tempModal;//注册modal
		}
		//删除模态框
		this.deleModal = function (name){
			var tempModal = Array();
			for(var i in this.modal){
				if( i != name){
					tempModal[i] = this.modal[i];
				}
			}
			this.modal = tempModal;
		}
		//检测是否存在模态框
		this.isModal = function (name){
			var temp = this.modal[name];
			if(temp == undefined){
				return false;
			}else{
				return true;
			}
		}
		//提交
		this.submit = function (name){
			var modal ;//= this.modal[name] == undefined ? {console.log(name+"模态框不存在");return false;}:{this.modal[name];
			
			if(this.isModal(name)){
				modal = this.modal[name];
			}else{
				
				if(this.debug){
					throw new Error(name+"空指针");
				}
				return false;
			}
			var ajaxParam = {};
			ajaxParam.url = modal.url;
			ajaxParam.callback= function(e,str){
				modal.callback(str);
			}
			ajaxParam.param=modal.param;
			lbax.post(ajaxParam);
		}
		//显示
		this.show=function (name){
			var modal = this.selectCurrentModal(name);
			if(modal != null){
				modal.modal("show");
			}else{
				if(this.debug){
					throw new Error(name+"空指针");
				}else{
					console.log(name+"空指针");
				}
				
			}
		}
		//检查是否存在modal
		this.isModal = function (){
			if(this.modal[name] == undefined) {
				
				this.debug ? console.log(name+"模态框不存在"):"";
				return false;
			}else {
				return true;
			}
			
		}
		this.comCallback = function (){
			
			
		}
		//初始化Modal
		this.initModal = function (name,callback){
			
			if(this.isModal(name)){
				return false;
			}else{
				var tempModal = $("#"+this.MODALID+" div[name="+name+"]");	
				var modalObj = {
						"name":tempModal.attr("name"),
						"url":tempModal.attr("lb-url"),
						"param":{},
						"callback":""
				}
				if(callback == undefined){
					modalObj.callback = this.comCallback;
				}else{
					modalObj.callback = callback;
				}
				this.modal[name] = modalObj;
			}
			
		}
	}
	$(document).ready(function(){
		//初始化
		window.lbIframeActionListen = new IframeActionListen();
		window.lb.modal= new LBModal();
		console.log("333");
		$(document).on("click","[lb-action]",function (){
			//
			var menuAction = new MenuAction();
			var action = $(this).attr("lb-action");
			var url = $(this).attr("lb-url");
			var modelType = $(this).attr("lb-model");
			console.log(modelType);
			if(modelType == undefined || modelType == "model"){
				menuAction.action(action,url);
			}else{
				alert("dfsd");
			}
		});
	 
	});
	
	
})