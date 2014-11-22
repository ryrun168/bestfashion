<?php
require_once("connection.php");
//****** Category Class *****
class category extends connection
{
	var $category_id;
	var $category_name;
	var $date_added;
	var $date_modified;
	var $description;
	var $note;
	var $sort_order;
	var $status;
	var $user_modified;
	var $active;
//***** Declare Connnection *****
	public function __construct()
	{
		$dbConnect = new connection();
		$dbConnect->dbConnect();
	}
//***** Function Add Category ********
	function AddCategory()
	{
		$sql = "SELECT * FROM TBLCATEGORY WHERE CATEGORY_NAME = '$this->category_name'";
		if($this->is_dp($this->dbConnect(),$sql))
		{
			$msg_fail=array("status"=>false,"msg"=>"Data is Duplicate...!");
			return $msg_fail;
		}
		else
		{
		$sql = mysqli_query($this->dbConnect(), "INSERT INTO TBLCATEGORY VALUES(
							  null,
							  '$this->category_name',
							  '$this->description',
							  '$this->date_added',
							  '$this->date_modified',
							  '$this->note',
							  '$this->status',
							  '$this->sort_order',
							  '$this->user_modified',
							  '$this->active'
			)");	
			if($sql)
			{
				$msg_fail=array("status"=>true,"msg"=>"One record inserted...!");
				return $msg_fail;	
			}
			else
			{
				$msg_fail=array("status"=>false,"msg"=>"Error:".mysqli_error($this->dbConnect()));
				return $msg_fail;	
			}
		}
  }
  
//***** Function Update Category **********

  function updateCategory()
		{
			$sql = mysqli_query($this->dbConnect(),"UPDATE TBLCATEGORY 
								SET
								  category_name='$this->category_name',
								  description='$this->description',
								  date_modified='$this->date_modified',
								  note='$this->note',
								  status='$this->status',
								  sort_order='$this->sort_order',
								  user_modified='$this->user_modified'
								WHERE category_id=$this->category_id
							");	
				if($sql)
				{
					$msg_fail=array("status"=>true,"msg"=>"Data Update Successful!");
					return $msg_fail;
				}
				else
				{
					$msg_fail=array("status"=>false,"msg"=>"Error-Cannot Update:".mysqli_error($this->dbConnect()));
					return $msg_fail;	
				}
	 	 }
//********* Get Max Category Name **************
	function getMaxCategory()
		{
		  $max_sql=mysqli_query($this->dbConnect(),"SELECT MAX(sort_order) FROM TBLCATEGORY");
		  $max_range=mysqli_result($max_sql);
		  if($max_range>0)
			  return 2;
		  else
			  return 1;
		}
}

?>













