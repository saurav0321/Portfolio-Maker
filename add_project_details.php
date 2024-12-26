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

		$pro_name = $_POST['pro_name'];
		$pro_dur = $_POST['pro_dur'];
		$pro_desc = $_POST['pro_desc'];

		$ins = "insert into project_detail(p_title,p_dur,p_desc,reg_id) values('$pro_name','$pro_dur','$pro_desc','$reg_id')";
		if (mysqli_query($con, $ins))
		{
			header("location:project_details.php");
		}
		else
		{
			$_SESSION['p_fail'] = "Some error occurs to add your details";
			header("location:project_details.php");
		}
	}
?>