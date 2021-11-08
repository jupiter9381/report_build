<?php 
	session_start();
	error_reporting(0);

	include("config/dbconnect.php");

	$msg = null;

	if(isset($_POST['submit']) && isset($_POST['type']) && $_POST['type'] == "db"){
	  
		$host=$_POST['host'];
		$user=$_POST['user'];
		$pass=$_POST['pass'];
		$db=$_POST['db'];
		$sql="UPDATE wdb SET host=(:host), user=(:user) , pass=(:pass) , db=(:db)";
		$query = $dbh->prepare($sql);
		$query-> bindParam(':host', $host, PDO::PARAM_STR);
		$query-> bindParam(':user', $user, PDO::PARAM_STR);
		$query-> bindParam(':pass', $pass, PDO::PARAM_STR);
		$query-> bindParam(':db', $db, PDO::PARAM_STR);
		$query->execute();
		$msg="Information Updated Successfully";
	} else if(isset($_POST['submit']) && isset($_POST['type']) && $_POST['type'] == "queryresult"){
		$level=$_POST['ulevel'];
		$department=$_POST['department'];
		$content=$_POST['result'];
		$name=$_POST['rname'];
		$chart_type=$_POST['chart_type'];
		$x_axis=$_POST['x_axis'];
		$y_axis=$_POST['y_axis'];
		$live=$_POST['live'] == "on" ? '1' : '0';
		$sqlsave="insert into reports (level,department,content,name, live, chart_type, x_axis, y_axis) values ('$level','$department','$content','$name','$live','$chart_type','$x_axis','$y_axis')";
		//var_dump($sqlsave);
		try {
			$dbh->exec($sqlsave);
		} catch(Exception $e) {
		}

		$msg="Information Saved Successfully";
    }

	$sql = "SELECT * from wdb order by id asc LIMIT 1";
	$query = $dbh -> prepare($sql);
	$query->execute();
	$result_db=$query->fetch(PDO::FETCH_OBJ);

	function jsonToTable ($data)
	{
	    $table = '';
	    foreach ($data as $key => $value) {
	    	//var_dump($value);
	        //$table .= '<td>';
	        if(is_object($value) || is_array($value)) {
	            $table .= jsonToTable($value);
	        } else if ($value==''){
				$table .= '<td>0</td>';
			} else {
				$table .= '<td>'.$value . '</td>';
			}
	        //$table .= '</td>';
	    }
	    if($table != '') return "<tr>".$table."</tr>";
	}

	// function jsonToTable ($data){
	//     $table = '';
	//     foreach ($data as $key => $value) {
	//         $table .= '<td>';
	//         if(is_object($value) || is_array($value)) {
	//             $table .= jsonToTable($value);
	//         } else if ($value==''){
	// 			$table .= '0';
	// 		} else {
	// 			$table .= $value;
	// 		}
	//         $table .= '</td>';
	//     }
		
	//     return "<tr>".$table."</tr>";
	// }

?>