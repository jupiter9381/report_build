<?php 
	session_start();
	if(isset($_POST['login'])){
		$email=$_POST['username'];
		$password=md5($_POST['password']);
		$sql ="SELECT email,password, role, level, department FROM users WHERE email=:email and password=:password";
		$query= $dbh -> prepare($sql);
		$query-> bindParam(':email', $email, PDO::PARAM_STR);
		$query-> bindParam(':password', $password, PDO::PARAM_STR);
		$query-> execute();
		$results=$query->fetch(PDO::FETCH_OBJ);
		if(isset($results->level) and isset($results->department)){
			$_SESSION['alogin']=$_POST['username'];
			$_SESSION['level']=$results->level;
			$_SESSION['department']=$results->department;
			$_SESSION['user_type'] = 'viewer';
			echo "<script type='text/javascript'> document.location = 'profile.php'; </script>";
		} else{
		  
		  echo "<script>alert('Invalid Details Or Account Not Confirmed');</script>";

		}
	}
?>