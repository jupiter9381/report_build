<?php 
	if(isset($_GET['method']) && $_GET['method']=='complete') {
		$email = $_GET['email'];

		$ch = curl_init();

		$url = "http://localhost:82?method=complete&email=".$email;
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

	    echo $output;
	    exit;
	}
?>