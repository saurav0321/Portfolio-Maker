<?php  
	session_start();
	include("connection.php");

	if (isset($_POST['update']))
	{
		$reg_id = $_POST['reg_id']; 
		$p_id = $_POST['p_id'];

		$title = $_POST['title'];
		$dur = $_POST['dur'];
		$desc = $_POST['desc'];

		$sql = "update project_detail set p_title='$title',p_dur='$dur',p_desc='$desc' where p_id='$p_id'";
		if ($con->query($sql) === TRUE)
		{
  			header("location:portfolio.php");
		}
	}
?>