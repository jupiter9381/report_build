<?php
require '../Config.php';

if($_SERVER['REQUEST_METHOD'] === "POST") {
	if(isset($_FILES['file'])){
		$Upload->doUpload(SQL_FILE_PATH);
	}
} 
