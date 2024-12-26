<?php  
    include ("connection.php");
    include("security.php");

   	$reg_id = base64_decode($_GET['q']);
   	$q= "update reg_details set block_status='1' where reg_id='$reg_id'";

   	if ($con->query($q) === TRUE)
   	{
   		$_SESSION['block'] = "User blocked successfully";
   		header("location:register_user.php");
   	}
?>