<?php
	//create connection
	$con=mysqli_connect("localhost","root","123","urbestdb");
	//require_once("../class/connection.php");
	$stat="";	
	/*	$name get value name from client 
		$class get value classname from client 
	*/
	
	//get id from client and update server's status
	if(isset($_GET['id']))
	mysqli_query($con,"UPDATE TBLCATEGORY SET ACTIVE=0 where CATEGORY_ID='".$_GET['id']."'");
	
	if(isset($_GET['status'])){
			if($_GET['chst']==0){
				$stat=1;
			}
			else{
				$stat=0;
			}
		mysqli_query($con, "UPDATE TBLCATEGORY SET status='".$stat."' WHERE CATEGORY_ID='".$_GET['status']."'");
	}
	
	//if(isset($_GET['delete'])
	/*	check status from client
		if status = " " set $stat= stu_status=0 or 1
		else get client's status value
	*/
	
	//creat query select by pass valus $name,$class,$stat
	if(isset($_GET['name'])){
		$name=$_GET['name'];
		$query="SELECT * FROM TBLCATEGORY WHERE CATEGORY_NAME LIKE '%".$name."%' AND active ORDER BY CATEGORY_ID DESC LIMIT 15";
	}
	//execute query pass to $result
	
	if(isset($_GET['cate_id'])){
		$category_id = $_GET['cate_id'];
		$query="SELECT * FROM TBLCATEGORY WHERE CATEGORY_ID=".$category_id;
		}
	$result=mysqli_query($con,$query);
	//create array object
	$json_arr=array();
	while($r=mysqli_fetch_array($result)){
		//pass server data as an array to array json_arr
		$json_arr[]=$r;
	}
	//using json_encode method to change $json_arr in array form
	echo json_encode($json_arr);
	//close connection
	mysqli_close($con);
 ?>