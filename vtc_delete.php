<?php  
	$connect = mysqli_connect("localhost", "root", "", "jobbuddy");
	$sql = "DELETE FROM vtcenters WHERE ComRegID = '".$_POST["id"]."'";  
	if(mysqli_query($connect, $sql))  
	{  
		echo 'Data Deleted';  
	}  
 ?>