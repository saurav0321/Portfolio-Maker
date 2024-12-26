<?php  
	include("connection.php");
	session_start();

	if (isset($_POST['submit']))
	{

		$id = $_POST['id'];
		$hobbies = $_POST['hobbies'];
		$gender = $_POST['gender'];
		$mobile = $_POST['mobile'];
		$dob = $_POST['dob'];
		$skills = $_POST['skills'];
		$add = $_POST['add'];
		$status = $_POST['status'];
		$lang = $_POST['lang'];
		$pitch = $_POST['pitch'];
		$nationality = $_POST['nationality'];
		$profile_old = $_POST['profile_img'];

		if (isset($_FILES['profile']['name']) && $_FILES['profile']['name']!="")
		{
			$file_name = $_FILES['profile']['name'];
			$file_tmp =$_FILES['profile']['tmp_name'];
			unlink("profile/$profile_old");
			move_uploaded_file($file_tmp,"profile/".$file_name);
		}
		else
		{
			$file_name = $profile_old;
		}

		$update = "update personal_detail set pd_gender='$gender',pd_hobby='$hobbies',pd_contact='$mobile',pd_dob='$dob',pd_skill='$skills',pd_add='$add',pd_profile='$file_name',pd_nation='$nationality',pd_status='$status',pd_lang='lang',pd_pitch='$pitch' where reg_id = '$id'";

		if ($con->query($update) === TRUE)
		{
			header("location:portfolio.php");
		}
	}
?>