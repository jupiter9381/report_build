<?php 
	session_start();
	error_reporting(0);

	include("config/dbconnect.php");

	if(strlen($_SESSION['alogin'])==0){
		header('location:index.php');
	}
	$msg = null;
	if(isset($_POST['submit']) && $_SERVER['REQUEST_METHOD'] == "POST"){	
		$name=$_POST['name'];
		$email=$_POST['email'];

		$sql="UPDATE users SET email=(:email), name=(:name) WHERE email=(:bemail)";
		$query = $dbh->prepare($sql);
		$query-> bindParam(':email', $email, PDO::PARAM_STR);
		$query-> bindParam(':bemail', $_SESSION['alogin'], PDO::PARAM_STR);
		$query-> bindParam(':name', $name, PDO::PARAM_STR);
		$query->execute();
		$_SESSION['alogin'] = $email;
		$_SESSION['message']="Information Updated Successfully";
	}   
	$email = $_SESSION['alogin'];
	$sql = "SELECT * from users where email = (:email) LIMIT 1;";
	$query = $dbh -> prepare($sql);
	$query-> bindParam(':email', $email, PDO::PARAM_STR);
	$query->execute();
	$result_admin=$query->fetch(PDO::FETCH_OBJ);
	$cnt=1;	
?>