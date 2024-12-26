<?php 
	include("connection.php");
	session_start();
	$username = $_SESSION['user'];

	$sql = "update reg_details set login_status=0 where reg_email = '$username'";
	$result = mysqli_query($con, $sql); 

	if ($result)
	{	
		unset($_SESSION['user']);
		header("location:index.php");
	}
?>