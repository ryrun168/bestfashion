<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>AJAX Database</title>

<script>
	// declare global variables
	var xmlhttp,name,clsname,status;
	
	// check XMLHttpRequest if support create XMLHttpRequest Object else create ActionXObject
	if(window.XMLHttpRequest){
		
		// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	}else{
		
		// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	// onreadystatechange get respone from server
	xmlhttp.onreadystatechange=function(){
		var status="", cate_status="";
		//var table="<tr><th>ID</th><th>Name</th><th>Gender</th><th>University</th><th>Class</th><th>Status</th></tr>";
		var table ='<tr class="top"><th class="center" width="80">N<sup>o</sup></th><th class="left">Category Name</th><th class="left">Description</th><th class="center">Range</th><th class="right">Date Modified</th><th class="action">Action</th></tr>';
		// check xmlhttp readyState is request finished and response is ready
		// and check status is "OK"
		
		if(xmlhttp.readyState==4 && xmlhttp.status==200){		
	
			// get data from sever 
			var data=eval(xmlhttp.responseText);
			//var data=JSON.parse(xmlhttp.responseText);
			//create table
			for(i=0;i<data.length;i++){
				status="unlock";
				if(data[i].status==0) status="unlock-alt";
				
				table+="<tr class='tr-data'><td class='center'>"+(i+1)+"</td>";
				table+="<td>"+data[i].category_name.substring(0, 20)+"</td>";
				table+="<td>"+data[i].description.substring(0, 30)+"</td>";
				table+="<td class='center'>"+data[i].sort_order+"</td>";
				table+="<td class='right'>"+data[i].date_added+"</td>";
				table+='<td class="action"><a href="#" title="Update" class="left"><i class="fa fa-edit" id="'+data[i].category_id+'"></i></a><a href="#" title="Status" id="status"><i class="fa fa-'+status+'" id="'+data[i].category_id+'"></i></a><a href="#" title="Delete" class="right"><i class="fa fa-trash" id="'+data[i].category_id+'"></i></a></td></tr>';
			}
			$("#tbData").html(table);
			
			$(".fa-trash").bind("click", function (e) {
				e.preventDefault();
				if (window.confirm('Are you sure?'))
				{
					name=$("#search").val();
					xmlhttp.open("GET","category/viewCategory.action.php?id="+this.id+"&name="+name,true);
					xmlhttp.send();			
				}
			});
			$(".fa-edit").click(function(e){
				//showLoad();
					$.post("category/updateCategory.php",
									{opr:'updCategory',
									  id:this.id}, 
									  function(response){
										  $("#content").html(response);
										  //alert("abc");
										  });
					});
			$("#status i").click(function(e){
				name=$("#search").val();
					if(status=='unlock') cate_status=1;
					else cate_status=0;
					xmlhttp.open("GET","category/viewCategory.action.php?status="+this.id+"&chst="+cate_status+"&name="+name,true);
					xmlhttp.send();		
			});
			$("#new").click(function(e){
				showLoad();
				$.post("category/addCategory.php",
									{opr:'addCategory'},
									function(response){
										$("#content").html(response);
										hideLoad();
									});	
			});
		}
	}
	function loadData(){
		var sel="abc";
		name=$("#search").val();
		xmlhttp.open("GET","category/viewCategory.action.php?sel="+sel+"&name="+name,true);
		xmlhttp.send();
	}
	if($("#search").keyup(function(){
		loadData();	
	}));

$(document).ready(function(e) {
    	loadData();
});
</script>
</head>

<body>
    <div class="headlines">
       <h3><span>View Category</span></h3>
    </div>

    <div class="filter">
        <div class="filter-left">
          <input type="text" class="input" id="search" placeholder="Search"/>
        </div>
        <div class="filter-right">
          <a href="#" class="alink" rel="newCategory" id="new" ><i class="fa fa-plus-circle"></i> New</a>
        </div>
    </div>
    
  <!-- table -->
  	<div class="list-data">
    	<table  class="table" id="tbData" cellspacing="0"></table>
    </div>
  <!-- /table -->
</body>
</html>