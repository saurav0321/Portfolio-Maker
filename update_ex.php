<?php  
	session_start();
	include("connection.php");

	if (isset($_POST['update']))
	{
		$reg_id = $_POST['reg_id']; 
		$we_id = $_POST['we_id'];

		$title = $_POST['title'];
		$dur = $_POST['dur'];
		$desc = $_POST['desc'];
		$comp = $_POST['comp'];
		$ach = $_POST['ach'];

		$sql = "update work_experiance_detail set we_title='$title',we_comp='$comp',we_dur='$dur',we_desc='$desc',we_ach='$ach' where we_id='$we_id'";
		if ($con->query($sql) === TRUE)
		{
  			header("location:portfolio.php");
		}
	}
?>