<?php 
	// check if user has license key
	$sql = "SELECT * FROM license WHERE expire_date > :today";
	$today = date('Y-m-d');
	$query = $dbh -> prepare($sql);
	$query-> bindParam(':today', $today, PDO::PARAM_STR);
	$query->execute();
	$result = $query->fetch(PDO::FETCH_OBJ);
	if(!$result) {
		$path = './system.config';
		if (file_exists('../system.config')) { 
			unlink( $path);
			
		}
		header("Location: install.php");
	}
?>