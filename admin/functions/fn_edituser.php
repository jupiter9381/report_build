<?php 
	session_start();
	error_reporting(0);
	include("config/dbconnect.php");

	if(isset($_GET['edit'])){
		$editid=$_GET['edit'];
		$sql = "SELECT * from users where id = :editid";
		$query = $dbh -> prepare($sql);
		$query->bindParam(':editid',$editid,PDO::PARAM_INT);
		$query->execute();
		$result=$query->fetch(PDO::FETCH_OBJ);
		$cnt=1;	
		// $level = "Level 1";
		// switch($result->level){
		// 	case "1":
		// 	$level = "Level 1";
		// 	break;
		//   case "2":
		// 	$level = "Level 2";
		// 	break;
		//   case "3":
		// 	$level = "Level 3";
		// 	break;
		// }
		
		$department = "Department";
		// switch($result->department){
		// 	case "1":
		// 	$department = "Management";
		// 	break;
		//   case "2":
		// 	$department = "Human Resources";
		// 	break;
		//   case "3":
		// 	$department = "Accounts";
		// 	break;
			
		// 	case "4":
		// 	$department = "Facility Management";
		// 	break;
		//   case "5":
		// 	$department = "Information Technology";
		// 	break;
		//   case "6":
		// 	$department = "Operations";
		// 	break;
			
		// 	case "7":
		// 	$department = "Sales";
		// 	break;
		//   case "8":
		// 	$department = "Marketing";
		// 	break;
		//   case "9":
		// 	$department = "Purchasing";
		// 	break;
		// }
	}

	if(isset($_POST['submit'])){
	  
		$email=$_POST['email'];
		$name=$_POST['name'];
		//$password=$_POST['password'];
		$password=md5($_POST['password']);
		$level=$_POST['level'];
		$department=$_POST['department'];
		$role=$_POST['role'];
		$sql="UPDATE users SET email=(:email),password=(:password), level=(:level) , department=(:department) , role=(:role) , name=(:name) WHERE id=(:idedit)";
		$query = $dbh->prepare($sql);
		$query-> bindParam(':email', $email, PDO::PARAM_STR);
		$query-> bindParam(':password', $password, PDO::PARAM_STR);
		$query-> bindParam(':level', $level, PDO::PARAM_STR);
		$query-> bindParam(':department', $department, PDO::PARAM_STR);
		$query-> bindParam(':role', $role, PDO::PARAM_STR);
		$query-> bindParam(':name', $name, PDO::PARAM_STR);
		$query-> bindParam(':idedit', $editid, PDO::PARAM_STR);
		$query->execute();
		$msg="Information Updated Successfully";
	}
?>