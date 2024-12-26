<?php 
	include("connection.php");	
	session_start();
	if(isset($_POST['submit']))
	{
		$username = $_POST['username'];
		$passwd = $_POST['password'];

		$sql = "select reg_email, reg_passwd,block_status from reg_details where reg_email = '$username' and reg_passwd='$passwd'";
		$result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
		
		if ($count==1)
		{
			if($row['block_status']==1)
			{
				$_SESSION['block'] = "Sorry! You are blocked by admin due to some restrictions. You are not able to login for the same.";
				header("location:index.php");
			}
			else
			{
				$_SESSION['user'] = $username;
			
				$sql = "update reg_details set login_status=1 where reg_email = '$username'";
				$result = mysqli_query($con, $sql); 
				header("location:portfolio.php");
				
				if(isset($_POST["rememberme"]))
				{
					setcookie("username",$_POST['username'],time()+(86400 * 30)); //1 day expire
				}
				else{
					setcookie("username","");
				}
			}
		}
		
		else
		{
			$_SESSION['err_login'] = "Invalid Login Attempt. Please Verify your Email and Password for the same.";
			header("location:index.php");
		}
	}
?>