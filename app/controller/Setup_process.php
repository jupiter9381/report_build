<?php
require '../Config.php'; 

if($_SERVER['REQUEST_METHOD'] == "POST") {

	$validate = $Validation->validate([
	    'hostname'   => $_POST['hostname'],
	    'username'   => $_POST['username'],
	    'password'   => $_POST['password'],
	    'database'   => $_POST['database'],  
	    'email'      => $_POST['email'],
	    'csrf_token' => $_SESSION['csrf_token'],
	]); 

	if (($validate) === true 
		&& $Write->fileExists(SQL_FILE)) {
// it is use to create core php database.php
		$data = [
			'templatePath' => PHP_DATABASE_TEMPLATE,
			'outputPath'   => PHP_DATABASE_OUTPUT,
			'hostname'  => $_POST['hostname'],
			'username'  => $_POST['username'],
			'password'  => $_POST['password'],
			'database'  => $_POST['database'],
			'email'     => $_POST['email']
		];

		$Write->createFileWithDirectory([
		 'outputPath' => PHP_DATABASE_OUTPUT, 
		 'content'    => null
		]);
		$Write->createDatabaseFile($data);
 		
 		$_SESSION['admin_email'] = $_POST['email'];
		//create database & tables
		$data = [
			'hostname'  => $_POST['hostname'],
			'username'  => $_POST['username'],
			'password'  => $_POST['password'],
			'database'  => $_POST['database']   
		];
		
		$DB->createDatabase($data);
		$DB->createTables($data); 

        $data['status']  = true;
        $data['success'] = "Success!";
 
	} else { 

		$errors  = "";
		$errors .= "<ul>";
		foreach ($validate as $error) {
		    $errors .= "<li>$error</li>";
		}
		$errors .= "</ul>";

		$data['status'] = false;
		$data['exception']  = $errors;	
	}

    echo json_encode($data);
}
