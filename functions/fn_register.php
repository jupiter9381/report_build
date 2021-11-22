<?php 
	session_start();
	if(isset($_POST['register'])){

		$email=$_POST['email'];
		$name=$_POST['name'];
		$password=md5($_POST['password']);
		$sql ="INSERT INTO users(email, password, status,name) VALUES(:email, :password, 1, :name)";
		$query= $dbh -> prepare($sql);
		$query-> bindParam(':email', $email, PDO::PARAM_STR);
		$query-> bindParam(':password', $password, PDO::PARAM_STR);
		$query-> bindParam(':name', $name, PDO::PARAM_STR);
		$query->execute();
		$lastInsertId = $dbh->lastInsertId();
		if($lastInsertId){
			echo "<script type='text/javascript'>alert('Registration Sucessfull!');</script>";
			echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
		}else{
			$error="Something went wrong. Please try again";
		}

	}
?>