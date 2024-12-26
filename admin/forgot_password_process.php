<?php  

	include("connection.php");
	session_start();

	if (isset($_POST['submit']))
	{
		$username = $_POST['username'];
		$_SESSION['temp_user'] = $username;

		$captcha = $_SESSION['captcha'];
		$otp_entered = $_POST['otp'];

		$query = mysqli_query($con,"select * from admin_detail where a_uname='$username'");
		
		$count=mysqli_num_rows($query);
		if($count>0)
		{
			if ($otp_entered!=$captcha)
			{
				$_SESSION['err_otp'] = "Please provide valid captcha code to process further";
				header("location:forgotpasswd.php");
			}
			else
			{
				header("location:changepasswd.php");
			}
		}
		else
		{
			$err="Email you have provide is invalid. Please check your email.";
			$_SESSION['err']=$err;
			header("location:forgotpasswd.php");
		}
	}
?>