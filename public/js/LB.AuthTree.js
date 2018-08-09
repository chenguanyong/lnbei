/**
 * 权限树
 */

if(typeof($) == "undefined"){console.log("LB.AuthTree need jquery support");}

function AuthTree(obj){	
	"use strict";
		
				//树的值
        		var treevalue = {
						auth:[],//权限列表
						currcityid:0,
						currcompanyid:0,
						//更新树
						updatetree:function (cityid,company,auth){
							for(var x in this.auth){
								if(this.auth[x].cityid == cityid && this.auth[x].companyid == company){
									this.auth[x].auth = auth;
									return ;
								}
							}
							var temp = {cityid:cityid,companyid:company,auth:auth};
							this.auth.push(temp);
						},
						//恢复tree数据
						restoretree:function (cityid,companyid,id){
		        		//	var ff = new authtree();ff.init({citytreeurl:"{:url('index/Area/ajaxGetArea')}",companyurl:"{:url('index/department/ajaxGetDepart')}?flag=0",authmenuurl:"{:url('index/department/ajaxGetDepart')}?flag=1",citytagid:$("[data-action=citytree]"),companyid:$("[data-action=companytree]"),authid:$("[data-action=authtree]")});
							var auth = $.fn.zTree.getZTreeObj(ff.authid.attr('id'));
							if(auth == null){
								return ;
							}
							for(var x in this.auth){
								if(this.auth[x].cityid == cityid){
									var node = treeObj.getNodeByParam("id", this.auth[x].companyid, null);
									if(node == null){
										continue;
									}
									auth.checkNode(node, true, false);
								}
							}
							auth.refresh();
						},
						//恢复规则树
						restoreauth:function(cityid,companyid,id){
							var auths = $.fn.zTree.getZTreeObj(id);
							for( var x in this.auth){
								if(this.auth[x].cityid == cityid && this.auth[x].companyid == companyid){
									var temp = this.auth[x].auth.split(",");
									for(var a in temp){
										if(temp[a] == ""){
											continue;
										}
										var node = auths.getNodeByParam("id", temp[a], null);
										auths.checkNode(node, true, false);
									}
								}
							}
						},
						//删除数据
						deletreevalue: function (cityid,companyid,id){
							
							for(var x in this.auth){
								if(this.auth[x].cityid == cityid && this.auth[x].companyid == companyid){
									this.auth[x].auth="";
									this.auth[x].companyid = "-1";//表示删除
								}
							}
						},
						//删除规则树数据
						deleauthtreevalue:function (cityid,companyid,id,auth){
							for(var x in this.auth){
								if(this.auth[x].cityid == cityid && this.auth[x].companyid == companyid){
									this.auth[x].auth=auth;
								}
							}
						},
						//删除区域树
						delecitytreevalue:function(cityid,companyid,id){
							for(var x in this.auth){
								if(this.auth[x].cityid == cityid ){
									this.auth[x].cityid ="-1";
									this.auth[x].auth="";
									this.auth[x].companyid == "-1";
								}
							}
						},
						//获取数据
						getValue:function (){
							var param = "";
							for(var x in this.auth){
								if(this.auth[x].cityid != "-1" && this.auth[x].companyid != "-1" && this.auth[x].auth != ""){
									param +=";" + this.auth[x].cityid +"_"+this.auth[x].companyid+"_" +this.auth[x].auth+";"
								}
							}
							return param;
							
						}
						
				}
				
												//
        		 var authtree = function() {
        				this.citytreeurl=null,//地区树
        				this.companyurl=null,//部门树
        				this.authmenuurl=null,//规则树
        				this.citytagid=null,//地区树ID
        				this.companyid=null,//部门树id
        				this.authid=null,
        				this.citytagdefault=0,//地区树ID
        				this.companydefault=0,//部门树id
        				this.authdefault=0,
        				this.authList =new Array(),
						this.currcity=0,//当前地区
						this.currcompany=0,//当前部门
        				this.cityconf= {  
        						check: {
        							enable: true,
        							chkboxType: {"Y":"", "N":""}
        						},
        						view: {
        							dblClickExpand: false
        						},
	        					async: {
		            				enable: true,
		            				url:this.citytreeurl,
		            				autoParam:["id", "name=n", "level=lv"],
		            				otherParam:{"otherParam":"1"},
	            				},
		            			callback: {
		            				onClick: this.zTreeCityOnClick,
		            				onCheck:this.zTreeCityOnCheck
		            			}
        				},
        				this.companyconf={
        						check: {
        							enable: true,
        							chkboxType: {"Y":"", "N":""}
        						},
        						view: {
        							dblClickExpand: false
        						},
        					async: {
	            				enable: true,
	            				url:this.citytreeurl,
	            				autoParam:["id", "name=n", "level=lv"],
	            				otherParam:{"otherParam":this.citytagdefault},
            				},
            				callback: {
            					onClick: "",
            					onCheck:this.zTreeCompanyOnCheck
	            			}

        				},
        				this.authconf={
        						check: {
        							enable: true,
        							chkboxType: {"Y":"", "N":""}
        						},
        						view: {
        							dblClickExpand: false
        						},
        					async: {
	            				enable: true,
	            				url:this.citytreeurl,
	            				autoParam:["id", "name=n", "level=lv"],
	            				otherParam:{"otherParam":this.authdefault},
            				},
	            			callback: {
	            				onClick: "",
            					onCheck:""
	            			}
        				},
        				this.zTreeCityOnClick=function(event, treeId, treeNode){
        					treevalue.currcityid = treeNode.id;
        					treeNode.checked =true;
        					ff.citytagdefault = treeNode.id;
        					var auth = $.fn.zTree.getZTreeObj(ff.authid.attr('id'));
        					if(auth != null){
        						treevalue.updatetree(treevalue.currcityid,treevalue.currcompanyid,ff.getauthvalue());
        						auth.destroy();
        					}else{
        						treevalue.updatetree(treevalue.currcityid,treevalue.currcompanyid,"");
        					}
        					$.fn.zTree.init(ff.companyid, ff.companyconf);
        					treevalue.currcompanyid=0;
        					treevalue.restoretree(treevalue.currcityid,treevalue.currcompanyid,ff.companyid.attr("id"));//更新树
        				},
        				this.zTreeCityOnCheck = function(event, treeId, treeNode){
        					
	        				if(!treeNode.checked){
	        					treevalue.delecitytreevalue(treevalue.currcityid,treevalue.currcompanyid,ff.citytagid.attr("id"));
	        				}else{
	        					var ff = new authtree();ff.init({citytreeurl:"{:url('index/Area/ajaxGetArea')}",companyurl:"{:url('index/department/ajaxGetDepart')}?flag=0",authmenuurl:"{:url('index/department/ajaxGetDepart')}?flag=1",citytagid:$("[data-action=citytree]"),companyid:$("[data-action=companytree]"),authid:$("[data-action=authtree]")});
	        					treevalue.updatetree(treevalue.currcityid,treevalue.currcompanyid,ff.getauthvalue());
	        				}
        				},
        				this.zTreeCompanyOnCheck = function(event, treeId, treeNode){
            				if(!treeNode.checked){
            					treevalue.deletreevalue(treevalue.currcityid,treevalue.currcompanyid,ff.companyid.attr("id"));
            				}else{
            					treevalue.updatetree(treevalue.currcityid,treevalue.currcompanyid,ff.getauthvalue());
            				}
        				},
        				this.zTreeAuthOnCheck = function(event, treeId, treeNode){
            				if(!treeNode.checked){
            					treevalue.delecitytreevalue(treevalue.currcityid,treevalue.currcompanyid,ff.citytagid.attr("id"),ff.getauthvalue());
            				}else{
            					treevalue.updatetree(treevalue.currcityid,treevalue.currcompanyid,ff.getauthvalue());
            				}
        				},
        				this.zTreeCompanyOnClick=function(event, treeId, treeNode){
        					treevalue.currcompanyid = treeNode.id;
        					treeNode.checked =true;
        					ff.authdefault = treeNode.id;
        				    var auth = $.fn.zTree.getZTreeObj(ff.authid.attr('id'));
        					
        				    if(auth != null){
        						treevalue.updatetree(treevalue.currcityid,treevalue.currcompanyid,ff.getauthvalue());
        						auth.destroy();
        					}else{
        						treevalue.updatetree(treevalue.currcityid,treevalue.currcompanyid,"");
        					}
        					$.fn.zTree.init(ff.authid, ff.authconf);
        				
        					treevalue.restoreauth(treevalue.currcityid,treevalue.currcompanyid,ff.authid.attr("id"));//更新树
						},
						this.zTreeAuthOnClick=function(event, treeId, treeNode){
        				
        				},
						//{citytreeurl:"",companyurl:"",authmenuurl:"",citytagid:"",companyid:"",authid:""}
        				this.init=function(obj){
            				this.citytreeurl=obj.citytreeurl;//地区树
            				this.companyurl=obj.companyurl;//部门树
            				this.authmenuurl=obj.authmenuurl;//规则树
            				this.citytagid=obj.citytagid;//地区树ID
            				this.companyid=obj.companyid;//部门树id
            				this.authid=obj.authid;
            				this.cityconf.async.url = this.citytreeurl;
            				this.companyconf.async.url = this.companyurl;
            				this.authconf.async.url = this.authmenuurl;
            				this.authconf.callback.onClick = this.zTreeAuthOnClick;
            				this.cityconf.callback.onClick = this.zTreeCityOnClick;
            				this.companyconf.callback.onClick = this.zTreeCompanyOnClick;
            				this.authconf.callback.onCheck = this.zTreeAuthOnCheck;
            				this.cityconf.callback.onCheck = this.zTreeCityOnCheck;
            				this.companyconf.callback.onCheck = this.zTreeCompanyOnCheck;
            				
        				},
        				this.citytreeinit = function(){
        					$.fn.zTree.init(this.citytagid, this.cityconf);
        				},
        				this.getcityvalue=function(){
        					return this.getvalue(this.citytagid.attr("id"));
        				},
        				this.getcompanyvalue=function(){
        					return this.getvalue(this.companyid.attr("id"));
        				},
        				this.getauthvalue=function(){
							return this.getvalue(this.authid.attr("id"));
        				},
        				this.getvalue=function (id){
    						var zTree = $.fn.zTree.getZTreeObj(id);
    						
    						if(zTree == null){
    							return '';
    						}
    						var v = "",nodes = zTree.getCheckedNodes(true);
    						for (var i=0, l=nodes.length; i<l; i++) {
    							v += nodes[i].id + ",";
    						}
    						if (v.length > 0 ) v = v.substring(0, v.length-1);
    						return v;
        				}
        			
        		}
				var ff = new authtree();//ff.init({citytreeurl:"{:url('index/Area/ajaxGetArea')}",companyurl:"{:url('index/department/ajaxGetDepart')}?flag=0",authmenuurl:"{:url('index/department/ajaxGetDepart')}?flag=1",citytagid:$("[data-action=citytree]"),companyid:$("[data-action=companytree]"),authid:$("[data-action=authtree]")});
				ff.init(obj);
				ff.citytreeinit();
				

}
