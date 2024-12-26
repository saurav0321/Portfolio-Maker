<?php  
	include("connection.php");
	session_start();

	if (isset($_POST['submit']))
	{

		$id = $_POST['ach_id'];
		$ach_name = $_POST['ach_name'];
		$ach_rank = $_POST['ach_rank'];
		$ach_year = $_POST['ach_year'];
		$certy_old = $_POST['ach_certy_old'];

		if (isset($_FILES['ach_certy']['name']) && $_FILES['ach_certy']['name']!="")
		{
			$file_name = $_FILES['ach_certy']['name'];
			$file_tmp =$_FILES['ach_certy']['tmp_name'];
			unlink("certificates/$certy_old");
			move_uploaded_file($file_tmp,"certificates/".$file_name);
		}
		else
		{
			$file_name = $certy_old;
		}

		$update = "update achievement_details set ach_name='$ach_name',ach_rank='$ach_rank',ach_year='$ach_year',ach_certy='$file_name' where ach_id='$id'";

		if ($con->query($update) === TRUE)
		{
			header("location:portfolio.php");
		}
	}
?>