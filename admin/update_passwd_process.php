<?php  
	
	include("connection.php");
	session_start();

	if (isset($_POST['submit'])) {
		$newpasswd = $_POST['newpasswd'];
		$cnpasswd = $_POST['cnpasswd'];

		$uname = $_SESSION['temp_user'];

		if ($newpasswd != $cnpasswd) {
			$_SESSION['change-passwd'] = "Password does not match. Please Provide valid one.";
			header("location:changepasswd.php");
		}
		else
		{
			$query = mysqli_query($con,"update admin_detail set a_passwd='$newpasswd' where a_uname='$uname'");
			unset($_SESSION['temp_user']);

			if($query){
				header("location:index.php");
			}
			else{
				$_SESSION['pass-err'] = "Something is wrong. Please try again later.";
				header("location:changepasswd.php");	
			}
		}
	}
?>