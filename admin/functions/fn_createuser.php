<?php 
	session_start();
	error_reporting(0);

	include("config/dbconnect.php");

	$msg = null;
	if(isset($_POST['submit'])){	
      
	    $email=$_POST['email'];
		$name=$_POST['name'];
		$password=md5($_POST['password']);
		$level=$_POST['level'];
		$department=$_POST['department'];
		$role=$_POST['role'];

		$sql ="INSERT INTO users(email, password, status,name,level,department,role) VALUES(:email, :password, 1, :name,:level,:department, :role)";
		$query= $dbh -> prepare($sql);
		$query-> bindParam(':email', $email, PDO::PARAM_STR);
		$query-> bindParam(':password', $password, PDO::PARAM_STR);
		$query-> bindParam(':name', $name, PDO::PARAM_STR);
		$query-> bindParam(':level', $level, PDO::PARAM_STR);
		$query-> bindParam(':department', $department, PDO::PARAM_STR);
		$query-> bindParam(':role', $role, PDO::PARAM_STR);
		$query->execute();
		$lastInsertId = $dbh->lastInsertId();
		if($lastInsertId) {
			echo "<script type='text/javascript'>alert('Registration Sucessfull!');</script>";
			echo "<script type='text/javascript'> document.location = 'createuser.php'; </script>";
		} else {
			$error="Something went wrong. Please try again";
		}
	}
?>