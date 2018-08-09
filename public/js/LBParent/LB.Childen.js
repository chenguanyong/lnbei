// JavaScript Document


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
	//渲染指定标签下的html
	function drawView(id,pid,html){
		var element = $("[uuid=" + id +"]");
		//element.empty();
		element.append(html);
	}

	(function($){
		if (typeof parent.lbParent === 'undefined'){
			throw new Error("LB\'s JavaScript requires Parent.lbParent");
		}
		var LBParent = parent.lbParent;
		//LBParent.move();
		console.log(LBParent);
		var DrawHtmlView = {
				getElement:function(id,pid){
					var element = $("[uuid=" + id +"]");
					return element;
				},
				addView:function (id,pid,html){
					var element = DrawHtmlView.getElement(id,pid);
					//element.empty();
					element.append(html);
				},
				moveView:function(toID,toPid,fromID,fromPid){
					var fromElement = DrawHtmlView.getElement(fromID, fromPid);
					fromElement.attr("puuid",toID);
					var fromHtml = fromElement.parent("[uuid="+fromPid+"]").html();
					fromElement.detach();//销毁自己
					var toElement = DrawHtmlView.getElement(toID, toPid);
					toElement.append(fromElement);
				},
				deleView:function (id){
					var element = DrawHtmlView.getElement(id,pid);
					element.detach();//销毁自己
				},
				pasteView:function(toID,toPid,fromID,fromPid){
					var fromElement = DrawHtmlView.getElement(fromID, fromPid);
					fromElement.attr("puuid",toID);
					var fromHtml = fromElement.parent("[uuid="+fromPid+"]").html();
					var toElement = DrawHtmlView.getElement(toID, toPid);
					toElement.append(fromElement);
				}
				
		}
		var CallbackFun = {
				actionSelector:function (funName,id,pid,data,fromID,fromPID){
					switch(funName){
						case"add":{drawView(id,pid,data);}break;
						case"update":{drawView(id,pid,data);}break;
						case"paste":{drawView(id,pid,data);}break;
						case"doInput":{drawView(id,pid,data);}break;
						case"move":{DrawHtmlView.moveView(id,pid,fromID,fromPID);//
						}break;
					}	
				},
				addWidget:function(){}
		}
		if(typeof window.CallbackFun === 'undefined'){
			window.CallbackFun = CallbackFun;
		}
		var LBEvent = {
				//父控件方法的封装
				move:function (toID,toPid,fromID,fromPid){
					LBParent.move(toID,toPid,fromID,fromPid);
				},
				doOutput:function (id,pid){
					LBParent.doOutput(id,pid);//编辑页面
				},
				doInput:function (id,pid,data){
					LBParent.doInput(id,pid,data);//输入数据
				},
				dele:function (id,pid){
					LBParent.dele(id,pid);
				},
				add:function (id,pid,widgetCode){
					LBParent.add(id,pid,widgetCode);
				},
				update:function (id,pid){
					LBParent.update(id,pid);//刷新内容
				},
				copy:function (id,pid){
					LBParent.copy(id,pid);//复制
				},
				paste:function(id,pid){
					LBParent.paste(id,pid);//操作
				}
		}
		/**
		 * 整个页面的状态器
		 */
		var LnbeiDesignChilden = {
				//当前活动元素
				elementActivity:{},//jquery对象
				//鼠标当前状态
				mouseState:"none",//left|right
				//当前动作
				action:{}	
		}
		var eventCode = {
				ldblclick:1,
				mousedown:2,
				mouseenter:3,
				mouseleave:4,
				mousemove:5,
				mouseout:6,
				mouseover:7,
				mouseup:8,
				lclick:9,
				rclick:10,
				lmclick:11,
				rmclick:12,
				rdblclick:13
		}; 
		$(document).ready(function (){
			//识别拖动的动作
			$("[uuid]").mouseover(function(){
				  var lnbeiDesignParent = LBParent.lnbeiDesignParent;
				  if(lnbeiDesignParent.isState){
					  //从套件库中添加套件
					console.log($(this).attr("uuid"));
					console.log($(this).attr("puuid"));
					lnbeiDesignParent.isState = false;
					LBEvent.add($(this).attr("uuid"),$(this).attr("puuid"),lnbeiDesignParent.widget);
				  }else{
					  
					  
				  }
			});
			var LbEventMap = {
					mousesDown:{
						name:"",
						events:""
						}
					,
					mousesUp:{
						name:"",
						events:""	
					},
					eventObj:{},
					eventCode:0,
					dbclick:false,
					swich:1,//1表示鼠标左键，3表示鼠标右键
					lock:0,//未锁
					
			};

		  $(document).dblclick(function (event){
			// console.log(event);
			  
			  LbEventMap.eventObj = event;
			  LbEventMap.which = event.witch;//识别左键双击还是右键双击
			  if(event.witch == 1){
					LbEventMap.eventCode = eventCode.ldblclick;
			  }	else{

					LbEventMap.eventCode = eventCode.rdblclick;
			  }

		  });
			//鼠标按下事件
		  $(document).mousedown(function(event){
		   // console.log(event);
		    LbEventMap.lock=1;
			LbEventMap.mousesDown.name = event.type;
			LbEventMap.mousesDown.events = event;
			LbEventMap.eventCode = eventCode.mousedown;
			LbEventMap.eventObj = event;
		  });
		  $(document).mouseenter(function(event){
			 // console.log(event);
		   // $("p").slideToggle();
		   		var uuid = event.target.getAttribute("uuid");
		   		if(uuid =="" || uuid == undefined){
		   			return false;
		   		}
		   	  if(LbEventMap.lock == 0){	
				  LbEventMap.eventCode = eventCode.mouseenter;
				  LbEventMap.eventObj = event;
			  }
		  });
		    $(document).mouseleave(function(event){
				//console.log(event);
		   // $("p").slideToggle();
		    	if(LbEventMap.lock == 0){	
		    	LbEventMap.eventCode = eventCode.mouseleave;
		    	LbEventMap.eventObj = event;
		    	}
		  });
		    $(document).mousemove(function(event){
				//console.log(event);
		   // $("p").slideToggle();
		    	if(LbEventMap.lock == 0){	
		    	LbEventMap.eventCode = eventCode.mousemove;
		    	LbEventMap.eventObj = event;
		    	}
		  }); 
		   $(document).mouseout(function(event){
			   //console.log(event);
		   // $("p").slideToggle();
			  // if(LbEventMap.lock == 0){	
				   //LbEventMap.eventCode = eventCode.mouseout;
				  // LbEventMap.eventObj = event;
			   //}
		  });
		   $(document).mouseover(function(event){
			  // console.log(event);
		   // $("p").slideToggle();
			   if(LbEventMap.lock == 0){	
			   LbEventMap.eventCode = eventCode.mouseover;
			   LbEventMap.eventObj = event;
			   }
		  });
		   $(document).mouseup(function(event){
			   console.log(event);
		   // $("p").slideToggle();
			  // if(LbEventMap.lock == 0){	
			   LbEventMap.eventCode = eventCode.mouseup;
			   LbEventMap.eventObj = event;
			   LbEventMap.mousesUp.name = event.type;
			   LbEventMap.mousesUp.events = event;
			  // }
		   var downMouse = LbEventMap.mousesDown;
		   if(downMouse.events.clientX == event.clientX && downMouse.events.clientY == event.clientY ){
			   ///
			   console.log("这是一个鼠标单机事件");
			
				if(event.which == 1){
					console.log("这是一个左键单击事件");
					LbEventMap.eventCode = eventCode.lclick;
					}else if(event.which == 3){
						LbEventMap.eventCode = eventCode.rclick;
						console.log("这是一个右键单击事件");
						
						}   
			   }else if(downMouse.events.target != event.target){
				   
				   console.log("这是一个移动事件");
				   if(event.which == 1){
					console.log("这是一个左键移动事件");
					 LbEventMap.eventCode = eventCode.lmclick;
					}else if(event.which == 3){
						 LbEventMap.eventCode = eventCode.rmclick;
						console.log("这是一个右键移动事件");
						
						}   
				   }
		   
		   window.setTimeout(function (){
			   //LbEventMap.lock = 1;
			   if(LbEventMap.dbclick){
				   LbEventMap.dbclick = false;
				   return false;
				 }
			   	console.log( LbEventMap.eventCode );
				if( LbEventMap.eventCode == 1){
					LbEventMap.dbclick = true;
				}
				divisionEvent(LbEventMap);
		   },500);
		  });
		//识别事件
		function divisionEvent(mLbEventMap){
			console.log("ddddd");
			console.log(mLbEventMap);
			console.log(mLbEventMap.eventCode);
			var toEventTarget = mLbEventMap.mousesUp.events.target;
			var fromEventTarget = mLbEventMap.mousesDown.events.target;
			console.log(fromEventTarget);
			switch(mLbEventMap.eventCode){
			
				case eventCode.ldbclick:{ //左键双击
					
				}break;
				case eventCode.rdbclick:{ //右键双击

				}break;				
				case eventCode.mouseover:{

				}break;
				case eventCode.mouseup:{

				}break; 
				case eventCode.mouseout:{

				}break; 
				case eventCode.mousemove:{

				}break;  
				case eventCode.mouseleave:{

				}break; 
				case eventCode.mouseenter:{

				}break; 
				case eventCode.mousedown:{

				}break; 
				case eventCode.lclick:{//左键单击
					$("#menu").css("display","block");
				}break; 
				case eventCode.rclick:{//右键单击
					var x = mLbEventMap.eventObj.clientX;
					var y = mLbEventMap.eventObj.clientY;
					$("#menu").attr("left",x);
					$("#Menu").attr("top",y);
					$("#menu").css("display","block");
				}break; 
				case eventCode.lmclick:{//左键移动
					var toID = toEventTarget.getAttribute("uuid");
					var toPid = toEventTarget.getAttribute("puuid");
					var fromID = fromEventTarget.getAttribute("uuid");
					var fromPid = fromEventTarget.getAttribute("puuid");
					console.log("toID:"+toID);
					console.log("toPid:"+toPid);
					console.log("fromID:"+fromID);
					console.log("fromPid:"+fromPid);
					LBEvent.move(toID,toPid,fromID,fromPid);//移动套件
				}break; 
				case eventCode.rmclick:{//右键移动

				}break; 

			}
			console.log("---------");
			console.log(LbEventMap);
			console.log("----->----");
			console.log(mLbEventMap.lock);
			console.log("-----<----");
			if(mLbEventMap.lock == 1){
				console.log(mLbEventMap.lock);
				mLbEventMap.lock = 0;
			}
			console.log("---------");
			console.log(mLbEventMap);
			console.log("---------");
			console.log(LbEventMap);
			console.log("---------");
		}
		//创建菜单
		function Menu(){
			var MenuHtml = '<div id="menu" style="display:none; position: absolute" ><ul><li menu="copy">复制</li><li menu="paste">粘贴</li><li menu="edit">编辑</li><li menu="dele">删除</li><li menu="refresh">刷新</li></ul></div>';
			$("body").append(MenuHtml);
		}
		Menu();
		//复制
		$("[menu=copy]").click(function (event){

			var uuid = LbEventMap.eventObj.target.getAttribute("uuid");
			var puuid = LbEventMap.eventObj.target.getAttribute("puuid");
			LBEvent.copy(uuid, puuid);
		});
		//粘贴
		$("[menu=paste]").click(function (event){
			var uuid = LbEventMap.eventObj.target.getAttribute("uuid");
			var puuid = LbEventMap.eventObj.target.getAttribute("puuid");
			LBEvent.paste(uuid, puuid);			
		});
		//编辑
		$("[menu=edit]").click(function (event){
			var uuid = LbEventMap.eventObj.target.getAttribute("uuid");
			var puuid = LbEventMap.eventObj.target.getAttribute("puuid");
			LBEvent.doOutput(uuid, puuid);	
		});	
		//删除
		$("[menu=dele]").click(function (event){
			var uuid = LbEventMap.eventObj.target.getAttribute("uuid");
			var puuid = LbEventMap.eventObj.target.getAttribute("puuid");
			LBEvent.dele(uuid, puuid);	
		});	
		//刷新
		$("[menu=refresh]").click(function (event){
			var uuid = LbEventMap.eventObj.target.getAttribute("uuid");
			var puuid = LbEventMap.eventObj.target.getAttribute("puuid");
			LBEvent.update(uuid, puuid);	
		});	
		//取消window自带的菜单
		window.oncontextmenu=function(e){
			//取消默认的浏览器自带右键 很重要！！
			e.preventDefault();
		}





		});//ready事件结尾
		
	})($);

});