<?php  
	session_start();
	include("connection.php");

	if (isset($_POST['submit']))
	{
		$uname = $_SESSION['temp_user'];
		$select_query = "select reg_id from reg_details where reg_email='$uname'";
		$res = $con->query($select_query);

		if($res->num_rows > 0){
			while ($row = $res->fetch_assoc()) {
				$reg_id = $row['reg_id'];
			}
		}

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

		if (isset($_FILES['profile']))
		{
			$file_name = $_FILES['profile']['name'];
			$file_tmp =$_FILES['profile']['tmp_name'];
			move_uploaded_file($file_tmp,"profile/".$file_name);
		}

		$ins_data = "insert into personal_detail(pd_gender,pd_hobby,pd_contact,pd_dob,pd_skill,pd_add,pd_profile,pd_nation,pd_status,pd_lang,pd_pitch,reg_id) values('$gender','$hobbies','$mobile','$dob','$skills','$add','$file_name','$nationality','$status','$lang','$pitch','$reg_id')";	
		if (mysqli_query($con, $ins_data))
		{
			header("location:education_details.php");
		}
		else
		{
			$_SESSION['pd_fail'] = "Some error occurs to add your details";
			header("location:personal_details.php");
		}
	}
?>