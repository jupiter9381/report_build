<?php 
	session_start();
	error_reporting(0);
	include("config/dbconnect.php");
	if(strlen($_SESSION['alogin'])==0){	
		header('location:index.php');	
	}
?>