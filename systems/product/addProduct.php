<?php
include("../class/product.php");

$product=new product();
$opr="";
$msg="";

if(isset($_POST['opr']))
	$opr=$_POST['opr'];
	
$dt = new DateTime();
$date_import=$dt->format('Y-m-d H:i:s');

if($opr=="exec_add")
{
	$product_code=$_POST["product_code"];
	$product_name=$_POST["product_name"];	
	$category_id=$_POST['category_id'];
	$description =$_POST['description'];
	$keyword=$_POST['keyword'];
	$image=isset($_POST['image'])?$_POST['image']:'none';
	$product_cost=$_POST['product_cost'];
	$product_price=$_POST['product_price'];
	$quantity=$_POST['quantity'];
	$date_avaible=$_POST['date_avaible'];
	$discount_quantity=$_POST['discount_quantity'];
	$discount_price=$_POST['discount_price'];
	$discount_priority=$_POST['discount_priority'];
	$discount_start_date=$_POST['discount_start_date'];
	$discount_end_date=$_POST['discount_end_date'];

//**********************************
	$product->product_code=$product_code;
	$product->product_name=$product_name;
	$product->description=$description;
	$product->keyword=$keyword;
	$product->quantity=$quantity;
	$product->category_id=$category_id;
	$product->image=$image;
	$product->date_import=$date_import;
	$product->date_availablev=$date_avaible;
	
	$product->cost=$product_cost;
	$product->price=$product_price;
	
	$product->date_start=$discount_start_date;
	$product->date_end=$discount_end_date;
	$product->discount_quantity=$discount_quantity;
	$product->discount_price=$discount_price;
	$product->discount_priority=$discount_priority;
	
	$addProduct=$product->addProduct();
	$addProductUnit=$product->addProductUnit();
	$addProductDiscount=$product->addProductDiscount();
	
	if($addProduct['status']==false || $addProductUnit['status']==false || $addProductDiscount['status']==false){
			echo $addProduct['msg'];
			echo $addProductUnit['msg'];
			echo $addProductDiscount['msg'];
	}
	else{
		echo $addProduct['msg'];
		echo $addProductUnit['msg'];
		echo $addProductDiscount['msg'];
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
$(document).ready(function(e) {
    $("#addProduct").click(function(e){
		
		var product_code=$("#txtProductCode").val();
		var product_name=$("#txtProductName").val();
		var category_id=$("#category_id").val();
		var description =$("#txtDescription").val();
		var keyword=$("#txtKeyword").val();
		var image=$("#file").val();
		var product_cost=$("#txtProductCost").val();
		var product_price=$("#txtProductPrice").val();
		var quantity=$("#txtQuantity").val();
		var date_avaible=$("#txtDateAvaible").val();
		var discount_quantity=$("#txtDiscountQuantity").val();
		var discount_price=$("#txtDiscountPrice").val();
		var discount_priority=$("#txtDiscountPriority").val();
		var discount_start_date=$("#txtDiscountStartDate").val();
		var discount_end_date=$("#txtDiscountEndDate").val();
		
		var a = date_avaible.toString('Y-m-d H:i:s');
			if(product_code !='')
			{
				alert(a.toString('yyyy-mm-dd HH:mm:ss'));
			  showLoad();
			  $("#if_error").load("product/addProduct.php",
							  {"opr":"exec_add",
							   "product_code":product_code,
							   "product_name":product_name,
							   "category_id":category_id,
							   "description":description,
							   "keyword":keyword,
							   "image":image,
							   "product_cost":product_cost,
							   "product_price":product_price,
							   "quantity":quantity,
							   "date_avaible":date_avaible,
							   "discount_quantity":discount_quantity,
							   "discount_price":discount_price,
							   "discount_priority":discount_priority,
							   "discount_start_date":discount_start_date,
							   "discount_end_date":discount_end_date,
							   },hideLoad()
							  );
			}
	});
});

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
	function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result)
                        .width(100)
                        .height(100);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
</script>
</head>

<body>
<div id="if_error" class="message"><?php echo $msg;?></div>

<div class="headlines">
  <h3><span>New Product</span></h3>
</div>
<div class="datalines">
    <div id="tabContainer"> 	
        <div class="tabs"> 
               <ul class="simpleTabsNavigation">
                  <li id="tabHeader_1" class="active_tab"><a href="#">General</a></li>
                  <li id="tabHeader_2"><a href="#">Data</a></li>
                  <li id="tabHeader_3"><a href="#">Discount</a></li>
                  <li id="tabHeader_4"><a href="#">Images</a></li>
               </ul>
            </div> 
    	<form method="post" action="#">
        <div class="tabscontent content-width100">
              <!--- Tab General --->
              <div class="tabpage" id="tabpage_1">
                  <div id="width-50" class="fl">
                    <div class="clearfix">
                        <div class="lab"><label for="input-three">Product Code<span>*</span></label></div>
                        <div class="con-100"><input type="text" class="input" value="" name="txtProductCode" id="txtProductCode" /></div>
                    </div>
                    <div class="clearfix">
                        <div class="lab"><label for="input-three">Product Name<span>*</span></label></div>
                        <div class="con-100"><input type="text" class="input" value="" name="txtProductName" id="txtProductName" /></div>
                    </div>
                    <div class="clearfix">
                        <div class="lab"><label for="input-three">Category<span>*</span></label></div>
                        <div class="con-50" id="input-width">
                            <!--<select class="select" name="status" id="status">
                                            <option value="1">Enabled</option>
                                            <option value="0">Disabled</option>
                            </select>-->
                            <?php
                                $product->getCategory();
                            ?>
                        </div>
                    </div>
                  </div>
                  <div id="width-50" class="fr">
                    <div class="clearfix">
                    <div class="lab"><label for="input-three">Keyword</label></div>
                        <div class="con-100"><input type="text" class="input" value="" name="txtKeyword" id="txtKeyword" /></div>
                    </div>
                    <div class="clearfix" style="height:100px;">
                        <div class="lab"><label for="textarea-one">Image</label></div>
                            <div class="con1">
                                <input type="file" onchange="readURL(this);" id="input-width" name="image" id="image"/>
                                <img id="blah" src="#" alt="your image" />
                            </div>
                    </div>
                  </div>
                  <p class="clear"/>
                  <div class="clearfix">
                    <div class="lab"><label for="textarea-one">Description</label></div>
                        <div class="con-100">
                            <textarea name="txtDescription" id="txtDescription" class="ckeditor"></textarea>
                            
                        </div>
                    </div>
              </div>
              <!--- End Tab General --->
              
              <!--- Start Tab Data --->
              <div class="tabpage" id="tabpage_2">
                <div class="clearfix">
                    <div class="lab"><label for="input-three">Cost In<span>*</span></label></div>
                    <div class="con-50"><input type="text" class="input" value="" name="txtProductCost" id="txtProductCost" /></div>
                </div>
                <div class="clearfix">
                    <div class="lab"><label for="input-three">Price Out</label></div>
                    <div class="con-50"><input type="text" class="input" value="" name="txtProductPrice" id="txtProductPrice" /></div>
                </div>
                <div class="clearfix">
                    <div class="lab"><label for="input-three">Quantity<span>*</span></label></div>
                    <div class="con-50"><input type="text" class="input" value="" name="txtQuantity" id="txtQuantity" /></div>
                </div>
                <div class="clearfix">
                    <div class="lab"><label for="input-three">Date Avaible</label></div>
                    <div class="con-50" id="input-width"><input type="text" class="input datepicker" name="txtDateAvaible" id="txtDateAvaible"/></div>
                </div>
                <div class="clearfix">
                    <div class="lab"><label for="input-three">Status</label></div>
                    <div class="con-50" id="input-width"><select class="select" name="status" id="status">
                                        <option value="1">Enabled</option>
                                        <option value="0">Disabled</option>
                                    </select>
                    </div>
                </div>
              </div>
              <!--- End Tab Data --->
              
              <!--- Tab Discount--->
              <div class="tabpage" id="tabpage_3">
                	<div class="clearfix">
                        <div class="lab"><label for="input-three">Discount Quantity</label></div>
                        <div class="con-50"><input type="text" class="input" value="" name="txtDiscountQuantity" id="txtDiscountQuantity" /></div>
                    </div>
                    <div class="clearfix">
                        <div class="lab"><label for="input-three">Discount Price</label></div>
                        <div class="con-50"><input type="text" class="input" value="" name="txtDiscountPrice" id="txtDiscountPrice" /></div>
                    </div>
                    <div class="clearfix">
                        <div class="lab"><label for="input-three">Proirity</label></div>
                        <div class="con-50"><input type="text" class="input" value="" name="txtDiscountPriority" id="txtDiscountPriority" /></div>
                    </div>
                    <div class="clearfix">
                        <div class="lab"><label for="input-three">Start Date</label></div>
                        <div class="con-50" id="input-width"><input type="text" class="input datepicker" value="" name="txtDiscountStartDate" id="txtDiscountStartDate"/></div>
                    </div>
                    <div class="clearfix">
                        <div class="lab"><label for="input-three">End Date</label></div>
                        <div class="con-50" id="input-width"><input type="text" class="input datepicker" value="" name="txtDiscountEndDate" id="txtDiscountEndDate"/></div>
                    </div>
              </div>
              <!--- End Tab Discount--->
              
              <!--- Tab Images --->
              <div class="tabpage" id="tabpage_4">
              	<div class="clearfix">
                	<table class="tbl-full">
                    	<tr id="imageRow">
                        	<td><img src="images/logo.png" width="80" height="80" /><input type="file" name="file" id="file" /> </td>
                            <td><input type="text" size="5" name="image_sort"/></td>
                            <td ><a href="#" class="btnAdd"><i class="fa fa-plus-circle"></i></a></td>
                        </tr>
                    </table>
                </div>
              </div>
              <!--- End Tab Images --->
        </div>
        <div class="btn-submit"><!-- Submit form -->
              <a href="#" class="button" id="addProduct">Submit</a>
              <a href="" class="cancel">Cancel</a>
        </div>
    	</form>
    </div>
</div>
</body>
</html>