<?php
//********* Connection ********
//****** Connection Class *******
class connection
{	
	function dbConnect(){
		$con = mysqli_connect("localhost","root","123","urbestdb");
		//mysqli_select_db($con,"urbestdb");
		return $con;
	}
//****** Check Duplicate Method *****
	function is_dp($con,$sql){
		$sql_ch=mysqli_query($con, $sql);
		
		$count=mysqli_num_rows($sql_ch);
		if($count>0){
			return true;
		}
		else{
			return false;
		}
	}
}
?>