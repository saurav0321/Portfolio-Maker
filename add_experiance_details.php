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

		$work_name = $_POST['work_name'];
		$company = $_POST['company'];
		$time = $_POST['time'];
		$desc = $_POST['desc'];
		$achievement = $_POST['achievement'];

		$ins = "insert into work_experiance_detail(we_title,we_comp,we_dur,we_desc,we_ach,reg_id) values('$work_name','$company','$time','$desc','$achievement','$reg_id')";
		if (mysqli_query($con, $ins))
		{
			header("location:experiance_details.php");
		}
		else
		{
			$_SESSION['ex_fail'] = "Some error occurs to add your details";
			header("location:experiance_details.php");
		}
	}
?>