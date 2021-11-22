<?php 
	session_start();
	error_reporting(0);
	include("admin/config/dbconnect.php");

	if(strlen($_SESSION['alogin'])==0){
		header('location:index.php');
	}
	if(isset($_GET['del'])) {
		$id = $_GET['del'];
		$sql = "DELETE FROM reports WHERE id = '$id'";
		$query = $dbh -> prepare($sql);
		$query->execute();
		header('location:userlist.php');
	}
	$level = $_SESSION['level'];
	$department = $_SESSION['department'];
	$sql = "SELECT * from  reports where level = :level AND department = :department AND live != 1";
	$query = $dbh -> prepare($sql);
	$query-> bindParam(':level', $level, PDO::PARAM_STR);
	$query-> bindParam(':department', $department, PDO::PARAM_STR);
	$query->execute();
	
	$results=$query->fetchAll(PDO::FETCH_OBJ);

	$cnt=1;

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