/**
 *设计框js 
 */

(function (factory){
	
  if (typeof define === 'function' && define.amd) {
	    // AMD. Register as anonymous module.
	    define(['jquery'], factory);
	  }else if(typeof lbax === 'object'){
		  throw new Error('LB.Design\'s JavaScript requires lbax')
	  } else if (typeof exports === 'object') {
	    // Node / CommonJS
	    factory(require('jquery'));
	  } else {
	    // Browser globals.
	    factory(jQuery);
	  }
	
})(function ($){

	'use strict';
	
	function MenuAction(){
		this.config={
				model:$("model")
				modelTag:"model"
		}
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
				$(this.config.modelTag + " div[name="+name+"]").model("show");
			}else{
				_this = this;
				this.ajaxParam.url = url;
				this.ajaxParam.callback= function(e,str){
					_this.comCallBack(str);
				}
				this.ajaxParam.param={
						id:0
				}
				lbax.post(this.ajaxParam);
			}
		};
		//公共的回调函数
		this.comCallBack = function (str){
			_this = this;
			if(str.code == 1){
				_this.config.model.append(str.data);
			}else{
				alert('请求出错');
			}
		}
		
	}
	function ParentActionListen(){
		this.onAction = function (object,param,event){
			
		}
	}
	$(document).ready(function(){
		
		window.lbParentActionListen = new ParentActionListen();
		
		$(document).on("click","[lb-action]",function (){
			
			var menuAction = new MenuAction();
			var action = $(this).attr("lb-action");
			var url = $(this).attr("lb-url");
			var modelType = $(this).attr("lb-model");
			if(modelType == "undefined" || modelType == "model"){
				menuAction.action(action,url);
			}
		});
	 
	});
	
	
})