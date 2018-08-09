
if (typeof jQuery === 'undefined') { throw new Error('LB\'s JavaScript requires jQuery') }
//
var lb_ajax = function (){
	this.url = null;
	this.type = 'post';
	this.callback = function (event,data){};//回调函数
	this.dataType = "json";
	this.param = {};
	//post的方式提交
	this.post = function (obj){
		this.init(obj);
		$.post(this.url,this.param,this.callback,this.dataType);
	}
	//get的方式提交
	this.get = function (obj){
		this.init(obj);
		$.get(this.url,this.callback,this.dataType);
	}
	//综合
	this.ajax = function (obj,type){
		if(type === "post"){
			this.post(obj);
		}else{
			this.get(obj);
		}
	}
	this.init = function (obj){
		this.url = obj.url;
		this.type = obj.type;
		this.callback = obj.callback;//function (event,data){};//回调函数
		this.dataType = obj.dataType;//"json";
		this.param = obj.param;//{};
	}
}
window.$lbajax = new lb_ajax();