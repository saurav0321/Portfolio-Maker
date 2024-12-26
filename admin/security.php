<?php  
session_start(); 
if(!isset($_SESSION['admin']) && empty($_SESSION['admin']))
{
	$_SESSION['security'] = "Please Login to access this page.";
    header("location:index.php");
}
?>