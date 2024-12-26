<?php  
	
	include("connection.php");
	session_start();

	if (isset($_POST['submit']))
	{
		$username = $_POST['username'];
		$_SESSION['temp_user'] = $username;

		$query = mysqli_query($con,"select reg_email from reg_details where reg_email='$username'");
		
		$count=mysqli_num_rows($query);
		if($count>0)
		{
			
			header("location:captcha_verification.php");
		}
		else
		{
			$err="Email you have provide is invalid. Please check your email.";
			$_SESSION['err']=$err;
			header("location:forgotpasswd.php");
		}
	}
?>