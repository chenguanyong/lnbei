(function ($){

  //构建表格
	  function BuildTr(obj){
			var tbody = document.getElementById(obj.id);
			var data = obj.data;
			var parentchild = obj.parentchild;
			if(data.length != parentchild.length){
				
				return false;
			}
			for(var i=0; i<data.length;i++){
				var tr = document.createElement('tr');
				tr.setAttribute("data-id",parentchild[i].data_id);
				tr.setAttribute("data-pid",parentchild[i].data_pid);
				if(i==0){
					tr.setAttribute("class","treegrid-"+parentchild[i].data_id);}else{
					
					tr.setAttribute("class","treegrid-"+parentchild[i].data_id+"  treegrid-parent-"+parentchild[i].data_pid);
				}
				for(var a = 0;a<data[i].length;a++){
					var td = document.createElement('td');
					td.setAttribute("class",data[i][a].css);
					td.innerHTML = data[i][a].title;
					tr.appendChild(td);
				}
				tbody.appendChild(tr);
			}
		}
	var ff = {
			id:"gh",
			data:[[{"title":"chen","css":'fdd'},{"title":"chen1","css":'fdd'},{"title":"chen7","css":'fdd'}],
			      [{"title":"chenf","css":'fdd'},{"title":"chen2","css":'fdd'},{"title":"chen8","css":'fdd'}],
			      [{"title":"cheng","css":'fdd'},{"title":"chen3","css":'fdd'},{"title":"chenr","css":'fdd'}],
			      [{"title":"chenh","css":'fdd'},{"title":"chen4","css":'fdd'},{"title":"cheng","css":'fdd'}],
			      [{"title":"chenj","css":'fdd'},{"title":"chen5","css":'fdd'},{"title":"chenv","css":'fdd'}],
			      [{"title":"chenk","css":'fdd'},{"title":"chen6","css":'fdd'},{"title":"chenx","css":'fdd'}]
			],
			column:[0],
			parentchild:[{"data_id":1,"data_pid":0}
			,{"data_id":2,"data_pid":1}
			,{"data_id":5,"data_pid":2}
			,{"data_id":3,"data_pid":1}
			,{"data_id":6,"data_pid":3}
			,{"data_id":4,"data_pid":0}			
			]
		}
	BuildTr(ff);
	//	初始化表格

	$('.table.table-bordered.table-hover').treegrid({
		treeColumn:'1',
		expanderExpandedClass: 'ace-icon fa fa-home home-icon',
		expanderCollapsedClass: 'glyphicon glyphicon-cloud'
	    }
	); 
  
})(jQuery);