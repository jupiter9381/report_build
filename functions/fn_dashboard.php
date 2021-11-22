<?php 
	session_start();
	error_reporting(0);
	include("admin/config/dbconnect.php");


	if(strlen($_SESSION['alogin'])==0){
		header('location:index.php');
	}

	$sql = "SELECT * from  reports WHERE level = :level AND department = :department AND live = 1";
	$level = $_SESSION['level'];
	$department = $_SESSION['department'];
	$query = $dbh -> prepare($sql);

	$query-> bindParam(':level', $level, PDO::PARAM_STR);
	$query-> bindParam(':department', $department, PDO::PARAM_STR);
	$query->execute();
	$results=$query->fetchAll(PDO::FETCH_OBJ);

	$sql = "SELECT * from  config LIMIT 1";
	$query = $dbh -> prepare($sql);
	$query->execute();
	$results_config=$query->fetch(PDO::FETCH_OBJ);

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
?>	