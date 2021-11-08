<?php
	include("../config/dbconnect.php");
	if(isset($_POST['method']) && $_POST['method'] == "delete_report") {
		$report_id = $_POST['id'];
		$sql = "DELETE FROM reports WHERE id = '$report_id'";
		$query = $dbh -> prepare($sql);
		$query->execute();
		echo json_encode(array('status' => true, 'msg' => 'Report deleted'));
	}

?>