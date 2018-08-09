$.validator.setDefaults({
	    submitHandler: function() {
	        //$('#myModal').modal('hide');
	        var id = $("#submitbutton").attr("data-id");
	      	var IsDelete = $("#IsDelete").is(":checked");
	      	var type = $("#submitbutton").attr("data-type");
	      	if(IsDelete == true){
	      		IsDelete = 1;
	      	}else{
	      		IsDelete = 0;
	      	}
	      	var oper = null;
	      	if(type ==3 ){
	      		oper = "edit";
	      	}else {
	      		oper = "add";
	      	}
	      	alert(IsDelete);
	      	alert(id);
	      	alert(oper);
	        $.post('http://lnbei.com/index.php/index/Role/setRole',,
	        {
	        	RoleName : $('#RoleName').val(),
	        	css : $('#css').val(),
	        	IsDelete : noID,
	            id:id,
	            oper:oper
	        }, function (data)
	        {
	            if(data.code == 1){
	            	alert(data.msg);
	            }else{
	            	alert(data.msg);
	            }
	            return false;
	        }, 'Json');
	        
	        return false;
	    }
	});

	  $("#submitform").validate({
		    rules: {
		    	RoleName: {
		        required: true,
		      },
		      Css: {
		        required: true,
		      },
		    },
		    messages: {
		    	MenuName: {
		        required: "请输入角色名",
		      },
		      Css: {
		        required: "请输入样式",
		      },
		    }
		});
