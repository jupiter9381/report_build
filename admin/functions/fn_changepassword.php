<?php 
	session_start();
	error_reporting(0);

	include("config/dbconnect.php");
	if(strlen($_SESSION['alogin'])==0){
		header('location:index.php');
	}
	if(isset($_POST['submit'])){
		$password=md5($_POST['password']);
		$newpassword=md5($_POST['newpassword']);
		$username=$_SESSION['alogin'];
		$sql ="SELECT Password FROM users WHERE email=:username and password=:password";
		$query= $dbh -> prepare($sql);
		$query-> bindParam(':username', $username, PDO::PARAM_STR);
		$query-> bindParam(':password', $password, PDO::PARAM_STR);
		$query-> execute();
		$results = $query -> fetchAll(PDO::FETCH_OBJ);
		if($query -> rowCount() > 0){
			$con="update users set password=:newpassword where email=:username";
			$chngpwd1 = $dbh->prepare($con);
			$chngpwd1-> bindParam(':username', $username, PDO::PARAM_STR);
			$chngpwd1-> bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
			$chngpwd1->execute();
			$_SESSION['message'] ="Your Password succesfully changed";
		}
	}else {
		$error="Your current password is not valid.";	
	}
?>