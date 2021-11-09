<?php 
	session_start();
	error_reporting(0);
	include("config/dbconnect.php");

	if(strlen($_SESSION['alogin'])==0){
		header('location:index.php');
	}
	$sql = "SELECT id, name, email, level, department, role from  users ";
	$query = $dbh -> prepare($sql);
	$query->execute();
	$results=$query->fetchAll(PDO::FETCH_OBJ);

	$cnt=1;

	$level = "Level 1";
	switch($results->level){
		case "1":
		$level = "Level 1";
		break;
	  case "2":
		$level = "Level 2";
		break;
	  case "3":
		$level = "Level 3";
		break;
	}
	
	$department = "Department";
	switch($results2->department){
		case "1":
		$department = "Managment";
		break;
	  case "2":
			$department = "Accounts";
		break;
	  case "3":
		$department = "Human Resources";
		break;
	}

	if($query->rowCount() > 0) {
		foreach($results as $result) {
			
		}
	}	
?>