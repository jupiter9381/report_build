<?php
	include("../config/dbconnect.php");
	if(isset($_POST['method']) && $_POST['method'] == "delete_report") {
		$report_id = $_POST['id'];
		$sql = "DELETE FROM reports WHERE id = '$report_id'";
		$query = $dbh -> prepare($sql);
		$query->execute();
		echo json_encode(array('status' => true, 'msg' => 'Report deleted'));
	}
	if(isset($_POST['method']) && $_POST['method'] == "get_report_content") {
		$report_id = $_POST['id'];
		$sql = "SELECT * from reports where id = (:id) LIMIT 1;";
		$query = $dbh -> prepare($sql);
		$query-> bindParam(':id', $report_id, PDO::PARAM_STR);
		$query->execute();
		$result_report=$query->fetch(PDO::FETCH_OBJ);
		$db_connect = json_decode($result_report->db_connect);
		$query = $result_report->query;
		$conn = new mysqli($db_connect->host,$db_connect->username, $db_connect->password,$db_connect->name);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		$result_query = $conn->query($query);
		if ($result_query->num_rows > 0) { 
			$data = array();
			while($row = $result_query->fetch_assoc()) {
				$data[]=$row;
			}
		}
		echo json_encode(array('status' => true, 'content' => $data));
		$conn->close();
	}
?>