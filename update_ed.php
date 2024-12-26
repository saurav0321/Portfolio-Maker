<?php  
	session_start();
	include("connection.php");

	if (isset($_POST['update']))
	{
		$reg_id = $_POST['reg_id']; 
		$e_id = $_POST['e_id'];

		$edu_qualification = $_POST['edu_qualification'];
		$year = $_POST['year'];
		$uni = $_POST['uni'];
		$grade = $_POST['grade'];

		$sql = "update education_detail set edu_qua='$edu_qualification',edu_year='$year',edu_uni='$uni',edu_grade='$grade' where edu_id='$e_id'";
		if ($con->query($sql) === TRUE)
		{
  			header("location:portfolio.php");
		}
	}
?>