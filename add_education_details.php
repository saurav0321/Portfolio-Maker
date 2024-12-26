<?php  
	session_start();
	include("connection.php");

	if (isset($_POST['submit']))
	{
		$uname = $_SESSION['temp_user'];
		$select_query = "select reg_id from reg_details where reg_email='$uname'";
		$res = $con->query($select_query);

		if($res->num_rows > 0)
		{
			while ($row = $res->fetch_assoc()) {
				$reg_id = $row['reg_id'];
			}
		}

		$edu_qualification = $_POST['edu_qualification'];
		$year = $_POST['year'];
		$uni = $_POST['uni'];
		$grade = $_POST['grade'];

		$ins = "insert into education_detail(edu_qua,edu_year,edu_uni,edu_grade,reg_id) values('$edu_qualification','$year','$uni','$grade','$reg_id')";
		if (mysqli_query($con, $ins))
		{
			$_SESSION['ed_success'] = "Your Education Details are added successfully.";
			header("location:education_details.php");
		}
		else
		{
			$_SESSION['ed_fail'] = "Some error occurs to add your details";
			header("location:education_details.php");
		}
	}
?>