<?php 
	session_start();
	if(isset($_POST['login'])){
		$email=$_POST['username'];
		$password=md5($_POST['password']);
		$sql ="SELECT email,password, role FROM users WHERE role = 'Admin' and email=:email and password=:password";
		$query= $dbh -> prepare($sql);
		$query-> bindParam(':email', $email, PDO::PARAM_STR);
		$query-> bindParam(':password', $password, PDO::PARAM_STR);
		$query-> execute();
		$results=$query->fetchAll(PDO::FETCH_OBJ);
		if($query->rowCount() > 0){
			$_SESSION['alogin']=$_POST['username'];
			//$_SESSION['role'] = $results[0]['role'];
			echo "<script type='text/javascript'> document.location = 'admin/dashboard.php'; </script>";
		}else{ 
		  echo "<script>alert('Invalid Details');</script>";
		}
	}
?>