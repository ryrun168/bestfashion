<?php
	require_once("connection.php");
	
//****** Class Add Product *********

class product extends connection
{
	function __contruct()
	{
		$db_connect=new connection();
		$db_connect->dbConnect();	
	}
	
	var $product_id;
	var $product_code;
	var $product_name;
	var $description;
	var $keyword;
	var $quantity;
	var $status;
	var $sort_order;
	var $category_id;
	var $image="abc";
	var $date_import;
	var $date_available;
	
//------ For Add Product Unit
	var $product_unit_id;
	var $cost;
	var $price;	

//----- For Add Discount Product-----

	var $product_discount_id;
	var $date_start;
	var $date_end;
	var $discount_quantity;
	var $discount_price;
	var $discount_priority;

	function addProduct()
	{
		$sql = "SELECT * FROM TBLPRODUCT WHERE PRODUCT_CODE = '$this->product_code'";
		if($this->is_dp($this->dbConnect(),$sql))
		{
			$msg_fail=array("status"=>false,"msg"=>"Data is Duplicate...!");
			return $msg_fail;
		}
		else
		{
			$sqlAdd = mysqli_query($this->dbConnect(), "INSERT INTO TBLPRODUCT
					VALUES(
						NULL,
						'$this->product_code',
						'$this->product_name',
						'$this->description',
						'$this->keyword',
						'$this->quantity',
						'$this->category_id',
						'$this->image',
						'$this->date_import',
						'$this->date_available',
						'$this->status'
						)
					");
				if($sqlAdd)
				{
					$msg_fail=array("status"=>true,"msg"=>"One record inserted...!");
					return $msg_fail;	
				}
				else
				{
					$msg_fail=array("status"=>false,"msg"=>"Error: Product".mysqli_error($this->dbConnect()));
					return $msg_fail;	
					
				}
		}
	}
	
	function addProductUnit()
	{
		$sqlProd = mysqli_query($this->dbConnect(), "SELECT MAX(product_id+1) FROM TBLPRODUCT");
		$pr_id =mysqli_fetch_array($sqlProd, MYSQLI_BOTH);
		
		$SqlProductUnit = mysqli_query($this->dbConnect(),"INSERT INTO TBLPRODUCT_UNIT
					VALUES(
						NULL,
						'$pr_id',
						'$this->cost',
						'$this->price'
					)");	
		if($SqlProductUnit)
		{
			$msg_fail=array("status"=>false,"msg"=>"Error :".mysqli_error($this->dbConnect()));	
		}
		else
		{
			$msg_fail=array("status"=>false,"msg"=>"Error: Product Unit".mysqli_error($this->dbConnect()));
					return $msg_fail;
		}
	}
	
	function addProductDiscount()
	{
			$SqlProductDisount = mysqli_query($this->dbConnect(), "INSERT INTO TBLPRODUCT_DISCOUNT
					VALUES(
						NULL,
						'$this->product_id',
						'$this->date_start',
						'$this->date_end',
						'$this->discount_quantity',
						'$this->discount_price',
						'$this->discount_priority'
						)
					");
				if($SqlProductDisount)
				{
					$msg_fail=array("status"=>true,"msg"=>"One record inserted...!");
					return $msg_fail;	
				}
				else
				{
					$msg_fail=array("status"=>false,"msg"=>"Error: Product Discount".mysqli_error($this->dbConnect()));
					return $msg_fail;
				}
		}
//********** Get Category *****************

	function getCategory($prod_id=""){
		
		$category=mysqli_query($this->dbConnect(),"SELECT * FROM TBLCATEGORY ORDER BY CATEGORY_NAME ASC");
		echo "<select name='category_id' id='category_id' class='select'>";
		echo "<option value='0'> Select Category</option>";
		$prodCateId="";
		if($prod_id!=""){
			$sqlProdCateId=mysqli_query($this->dbConnect(),"SELECT * FROM TBLCATEGORY WHERE product_id=$prod_id");
			$resProCate=mysqli_fetch_array($sqlProdCateId);
			$prodCateId=$resProCate['category_id'];
		}
		
		while($row=mysqli_fetch_array($category,MYSQLI_BOTH)){
			$select=($prodCateId==$row['category_id'])?"selected":"";
			
			echo "<option value='".$row['category_id']."' $select>";
			echo $row['category_name'];
			echo "</option>";
		}
			echo "</select>";
	}
}
?>