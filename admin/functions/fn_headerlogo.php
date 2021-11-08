<?php 
	session_start();
	error_reporting(0);

	include("config/dbconnect.php");

	$msg = null;
	$sql = "SELECT * from config LIMIT 1;";
	$query = $dbh -> prepare($sql);
	$query->execute();
	$result_config=$query->fetch(PDO::FETCH_OBJ);

	if(isset($_POST['submit'])){
		$filename = '';
		$header = '';
		if($result_config) {
			$filename = $result_config->logo;
			$header = $result_config->header;
		}
		if($_FILES['logo']) {
			$target_dir = "uploads/";
			$target_file = $target_dir . basename($_FILES["logo"]["name"]);
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
			$filename = time() . '.'.$imageFileType;
			$filepath = $target_dir . $filename;
			if (move_uploaded_file($_FILES["logo"]["tmp_name"], $filepath)) {
			} else {
				//$msg = "Logo upload failed";
			}	
		}
		if($_POST['header']) $header = $_POST['header'];
		if(!$result_config) {
			$sql ="INSERT INTO config(logo, header) VALUES(:logo, :header)";
			$query= $dbh -> prepare($sql);
			$query-> bindParam(':logo', $filename, PDO::PARAM_STR);
			$query-> bindParam(':header', $header, PDO::PARAM_STR);
			$query->execute();	
		} else {
			$sql = "UPDATE config SET logo=(:logo), header=(:header)";
			$query = $dbh->prepare($sql);
			$query-> bindParam(':logo', $filename, PDO::PARAM_STR);
			$query-> bindParam(':header', $header, PDO::PARAM_STR);
			$query->execute();
		}
		$result_config['logo'] = $filename;
		$result_config['header'] = $header;
	}
?>