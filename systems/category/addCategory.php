<?php
require_once("../class/category.php");
$category = new category();

$msg="";
$opr="";
$dt = new DateTime();

$category_name="";
$date_added=$dt->format('Y-m-d H:i:s');

$date_modified=$date_added;
$description="";
$note="";
$sort_order="";
$status="";
$user_modified=1;
$active=1;

if(isset($_POST['opr'])){
	$opr=$_POST['opr'];
}

if($opr=="exec_add"){
	
	$category_name=$_POST["category_name"];
	$description=$_POST["description"];
	$note=$_POST['note'];
	$sort_order=$_POST["sort_order"];
	$status=$_POST["status"];
	
		$category->category_name=$category_name;
		$category->date_added=$date_added;
		$category->date_modified=$date_modified;
		$category->description=$description;
		$category->note=$note;
		$category->sort_order=$sort_order;
		$category->status=$status;
		$category->user_modified=$user_modified;
		$category->active=$active;
		
		$ch_pro = $category->AddCategory();
		
		if($ch_pro['status']==false){
			echo $ch_pro['msg'];
		}
		else{
			echo $ch_pro['msg'];	
		}
	}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="css/datePicker.css" />
<script src="js/date.js"></script>
<script src="js/jquery.datePicker.js"></script>

<script type="text/javascript">
	$(function() {
		var tabs = $('div.tabs ul li').length;	// count the tab
		for(var i = 0; i  < tabs + 1; i++) {
			$('li#tabHeader_'+ i ).click(function() {		
				$('li.active_tab').removeClass('active_tab');	// remove class
				$(this).addClass('active_tab'); // addClass to tab		
				var tab_id = $(this).attr('id'); // return: tabHeader_1		
				var id = tab_id.split("_")[1]; // 
				var tabpage_id = $('div#tabpage_'+id).attr('id'); // return: tabpage_1
				var get_id = tabpage_id.split("_")[1]; // return: 1	
				$('div.tabpage').css('display', 'none');
				$('div.tabscontent div#tabpage_'+ get_id).css('display', 'block');
				//if(tabpage_id == 'tabpage_3'){
					// ajax here, if the data from database
				//}
			});
		}
	});
</script>

<script type="text/javascript">
//-------------------------------------------------
$(document).ready(function(e) {	
	hideLoad();
//----------------------add button--------------------
$("#opration").click(function(e){
	
	var category_name=$("#txt_CategoryName").val();
	var description=$("#txt_Description").text();
	var note =$("#txt_Note").val();
	var sort_order=$("#txt_SortOrder").val();
	var status=$("#txt_Status").val();
	var user_modified=1;
	var active=1;
		if(category_name !='')
		{
		  showLoad();
		  $("#if_error").load("category/addCategory.php",
						  {"opr":"exec_add",
						   "category_name":category_name,
						   "description":description,
						   "note":note,
						   "sort_order":sort_order,
						   "status":status,
						   "active":active,
						   },hideLoad()
						  );
		}else
		{
			alert("This Field Required!");	
		}
	});	
//-------------------------end ready function----------------------
});
</script>
<style>
	#if_error{
		position:fixed;
		//top:75%;
		bottom:4%;
		//left:45%;
		right:2%;
		background:#0C9;
		border-radius:3px;
		color:#FFF;
		padding:10px 30px;
		z-index:100;
		}
</style>
<!--<script type="text/javascript">
    $(document).ready(function () {
        setTimeout(function () {
            $(".message").fadeOut(1500);
        }, 3000);
    });
</script>-->
</head>

<body>

<div id="if_error" class="message"><?php echo $msg;?></div>
<?php
if($opr=="view_location"){
	$location->view_location();	
}
elseif($opr=="addCategory")
{
?>
<div class="headlines">
  <h3><span>New Category</span></h3>
</div>
<div class="datalines">
    <div id="tabContainer"> 	
            <div class="tabs">
              <ul class="simpleTabsNavigation">
                <li id="tabHeader_1" class="active_tab"><a href="#">General</a></li>
                <li id="tabHeader_2"><a href="#">Data</a></li>
              </ul>
            </div> 
        <form method="post">
            <div class="tabscontent content-width100">
                  <div class="tabpage" id="tabpage_1">
                    <div class="clearfix">
                        <div class="lab"><label>Category Name<span>*</span></label></div>
                        <div class="con-50"><input type="text" class="input" value="" name="txt_CategoryName" id="txt_CategoryName" /><span></span></div>
                    </div>
                    <div class="clearfix">
                        <div class="lab"><label for="textarea-one">Description</label></div>
                         
                         <div class="con-100">
                              <textarea class="textarea-100" id="txt_Description"> </textarea>
                          </div>
                        </div>
                  </div>
                  <div class="tabpage" id="tabpage_2">
                    <div class="clearfix">
                        <div class="lab"><label for="input-three">Note</label></div>
                        <div class="con-50"><textarea rows="" class="textarea" id="txt_Note"></textarea></div>
                    </div>
                    <div class="clearfix">
                        <div class="lab"><label for="input-three">Sort Order</label></div>
                        <div class="con-50"><input type="text" class="input" value="<?php //echo $category->getMaxCategory();?>" name="txt_SortOrder" id="txt_SortOrder" /></div>
                    </div>
                    <div class="clearfix">
                        <div class="lab"><label for="input-three">Status</label></div>
                        <div class="con-50" id="input-width"><select class="select" id="txt_Status" name="txt_Status">
                                                 <option value="1">Enabled</option>
                                                 <option value="0">Disabled</option>
                                         </select>
                        </div>
                    </div>
                  </div>
            </div>   
            <div class="btn-submit"><!-- Submit form -->
                  <a href="#" class="button" rel="addCategory" id="opration">Submit</a>
                  <a href="" class="cancel">Cancel</a>
            </div>
    	</form>     
    </div>
</div>
<?php
	}
?>
</body>
</html>