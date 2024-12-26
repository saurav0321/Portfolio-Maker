<?php  
session_start(); 
if(!isset($_SESSION['user']) && empty($_SESSION['user']))
{
	$_SESSION['security'] = "Please Login to access this page.";
    header("location:index.php");
}
?>