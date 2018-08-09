/**
 * 父子表格
 */
(function (factory) {
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
	function LBTreegrid(){
		this.pargm = {};
		this.BuildTr = function(obj){
			var tbody = document.getElementById(obj.id);
			var data = obj.data;
			if(data == null){
				return false;
			}
			var parentchild = obj.parentchild;
			if(data.length != parentchild.length){
				
				return false;
			}
			var defaultcolum = obj.defaultcolumn;
			var defaultBefCol = obj.defaultBefCol;
			for(var i=0; i<data.length;i++){
				var tr = document.createElement('tr');
				tr.setAttribute("data-id",parentchild[i].data_id);
				tr.setAttribute("data-pid",parentchild[i].data_pid);
				if(i==0 || parentchild[i].data_pid==0){
					tr.setAttribute("class","treegrid-"+parentchild[i].data_id);}
				else{
					tr.setAttribute("class","treegrid-"+parentchild[i].data_id+"  treegrid-parent-"+parentchild[i].data_pid);
				}
				for(var a = 0;a<defaultBefCol.length;a++){
					var td = document.createElement('td');
					td.setAttribute("class",defaultBefCol[a].css);
					td.innerHTML = defaultBefCol[a].title;
					tr.appendChild(td);
				}
				for(var a = 0;a<data[i].length;a++){
					var td = document.createElement('td');
					td.setAttribute("class",data[i][a].css);
					td.innerHTML = data[i][a].title;
					tr.appendChild(td);
				}
				for(var a = 0;a<defaultcolum.length;a++){
					var td = document.createElement('td');
					td.setAttribute("class",defaultcolum[a].css);
					td.innerHTML = defaultcolum[a].title;
					tr.appendChild(td);
				}
				tbody.appendChild(tr);
			}
			return true;
		};
		this.create = function(){
			$("#"+this.pargm.table.id).treegrid({
				treeColumn:this.pargm.table.treeColumn,initialState: this.pargm.table.initialState,
				expanderExpandedClass: this.pargm.table.expanderExpandedClass,
				expanderCollapsedClass: this.pargm.table.expanderCollapsedClass
			    }
			);
		};
		//合成组件
		this.compose = function(config){
			this.pargm = config;
			var result = this.BuildTr(this.pargm);
			if( !result ){
				return false;
			}
			this.create();
			
		}
	}
	$(document).ready(function (){
		
		window.LBTreegrid = new LBTreegrid();
		
	});
	
});