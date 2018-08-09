/**
 * 处理表单提交事件
 */
$(function (){
	
function LBInput(obj){
	this.param = obj;
	this.bindFrom = function (objectclass){
	  this.param = objectclass;
	  objConfig[objConfig.length] = objectclass;
	  $(this.param.form).validate({
		    rules: this.param.rules,
		    messages: this.param.messages,
		    submitHandler: this.submitfun
		});
	};
	
	this.submitfun = function (f,events){
		var id = events.target.id;
		var obj = {};
		for(var x in objConfig){
			if(objConfig[x].form == "#"+id){
				obj = objConfig[x];
			}
		}
		var lbinput  =	new LBInput(obj);
		//console.log(lbinput);
		var input = lbinput.doParam(lbinput);
		if(lbinput.param.type == undefined || lbinput.param.type == 0 ){
			$.post(lbinput.param.url,input,function(str){
				return lbinput.param.submitFun(str);
			},"json");
		}else{
			if(lbinput.param.parameter != undefined){
				lbinput.param.submitFunCallback(input,lbinput.param.submitFun,lbinput.param.parameter);
			}else{
				lbinput.param.submitFunCallback(input,lbinput.param.submitFun,new Array());
			}
		}
		return false;
	};
	this.doParam = function (obj){
		//alert("dd");
		var input = {};
		$(obj.param.form).find("input[name]").each(function(){
			var type = $(this).attr("type");
			switch(type){
			
				case "checkbox":
				case "radio": {
					var name = $(this).attr("name");
					var value = $("[name="+name+"]"+":checked").val();
					//console.log(value);
					if(value == "on"){
						value = 1;
					}else{
						value = 0;
					}
					eval("input." + name + "='" + value + "';");
					break;}
				case "hidden":break;
				default:{
					eval("input."+$(this).attr("name")+"='"+$(this).val()+"';");
				}
			}
		});
		return input;
	};
	this.buildRuleAndMessage = function (data){
		var rule = {};
		var message = {};
		for(var i=0;i<data.length;i++){
			eval("rule."+data[i].name+"={"+data[i].rule+"}");
			eval("rule."+data[i].name+"={"+data[i].message+"}");
		}
		return {rule:rule,msg:message};	
	}
}

 var objConfig = new Array();
 window.LbInput = new LBInput();
 //window.LbInput.;
 //console.log(objConfig);
});
//console.log(window.lbInput);
//构造规则和提示信息的
