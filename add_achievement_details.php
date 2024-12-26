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

		$ach_name = $_POST['ach_name'];
		$ach_rank = $_POST['ach_rank'];
		$ach_year = $_POST['ach_year'];
		$ach_certy = $_POST['ach_certy'];

		if (isset($_FILES['ach_certy']))
		{
			$file_name = $_FILES['ach_certy']['name'];
			$file_tmp =$_FILES['ach_certy']['tmp_name'];
			move_uploaded_file($file_tmp,"certificates/".$file_name);
		}
		
		$ins = "insert into achievement_details(ach_name,ach_rank,ach_year,ach_certy,reg_id) values('$ach_name','$ach_rank','$ach_year','$file_name','$reg_id')";
		if (mysqli_query($con, $ins))
		{
			header("location:achievement_details.php");
		}
		else
		{
			$_SESSION['ach_fail'] = "Some error occurs to add your details";
			header("location:achievement_details.php");
		}
	}
?>