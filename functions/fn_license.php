<?php 
	session_start();
	if(isset($_POST['submit'])){
		$ch = curl_init();

		$url = SERVER_URL."?method=verify&key=".$_POST['license'].'&email='.$_POST['email'];
	    // set url
	    curl_setopt($ch, CURLOPT_URL, $url);

	    //return the transfer as a string
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	    $headers = array(
		   "Accept: application/json",
		);
		// curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		//for debug only!
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	    // $output contains the output string
	    $output = curl_exec($ch);

	    // close curl resource to free up system resources
	    curl_close($ch);
	    if($output == '1') {
	    	$sql = "INSERT INTO license(license_key, expire_date, type,purchaser) VALUES(:license_key, :expire, :type, :purchaser)";
	    	$license_key = $_POST['license'];
	    	$expire = date('Y-m-d h:i:s', strtotime('+1 months'));
	    	$type = "user";
	    	$purchaser =$_GET['email'];
	    	$query= $dbh -> prepare($sql);
			$query-> bindParam(':license_key', $license_key, PDO::PARAM_STR);
			$query-> bindParam(':expire', $expire, PDO::PARAM_STR);
			$query-> bindParam(':type', $type, PDO::PARAM_STR);
			$query-> bindParam(':purchaser', $purchaser, PDO::PARAM_STR);
			$query->execute();

			$sql = "INSERT INTO users(name, email, password,role) VALUES(:name, :email, :password, :role)";
			$name = 'admin';
			$email = $_GET['email'];
			$password = md5('admin123');
			$role = 'Admin';
			$query= $dbh -> prepare($sql);
			$query-> bindParam(':name', $name, PDO::PARAM_STR);
			$query-> bindParam(':email', $email, PDO::PARAM_STR);
			$query-> bindParam(':password', $password, PDO::PARAM_STR);
			$query-> bindParam(':role', $role, PDO::PARAM_STR);
			$query->execute();
			
			$_SESSION['message'] = "You purchased key successfully!";
			echo "<script type='text/javascript'> document.location = './index.php'; </script>";
	    }
	}
?>