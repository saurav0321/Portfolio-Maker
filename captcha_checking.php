<?php  
	include("connection.php");
	session_start();

	if (isset($_POST['confirm'])) 
	{
		$captcha = $_SESSION['captcha'];
		$otp_entered = $_POST['otp-verify'];
		unset($_SESSION['captcha']);

		if ($otp_entered!=$captcha)
		{
			$_SESSION['err_otp'] = "Please provide valid captcha code to process further";
			header("location:captcha_verification.php");
		}
		else
		{
			header("location:changepasswd.php");
		}
	}
?>