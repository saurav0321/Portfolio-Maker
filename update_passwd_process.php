<?php  
	
	include("connection.php");
	session_start();

	if (isset($_POST['change'])) {
		$newpasswd = $_POST['newpasswd'];
		$cnpasswd = $_POST['cnpasswd'];

		$uname = $_SESSION['temp_user'];

		if ($newpasswd != $cnpasswd) {
			$_SESSION['change-passwd'] = "Password does not match. Please Provide valid one.";
			header("location:changepasswd.php");
		}
		else
		{
			$query = mysqli_query($con,"update reg_details set reg_passwd='$newpasswd' where reg_email='$uname'");
			unset($_SESSION['temp_user']);

			if($query){
				$_SESSION['pass-succ'] = "Password is changed successfully. You may login now.";
				header("location:changepasswd.php");
			}
			else{
				$_SESSION['pass-err'] = "Something is wrong. Please try again later.";
				header("location:changepasswd.php");	
			}
		}
	}
?>