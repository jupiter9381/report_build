<?php 
	include("config/base.php");
	include("functions/fn_reports.php");
	$title = "Manage reports";
	$page = "reports";
?>
<!doctype html>
<html lang="en" class="no-js">

	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<title><?= $title?></title>

		<?php include("includes/fonts.php");?>
		<link rel="stylesheet" type="text/css" href="<?=SITE_ADMIN_ASSET_VENDOR?>/css/datatables/dataTables.bootstrap4.min.css">

		<?php include("includes/basic_css.php");?>

	</head>
	<body class="vertical-layout vertical-menu 2-columns  navbar-sticky" data-menu="vertical-menu" data-col="2-columns">
		<?php include('includes/navbar_header.php'); ?>
		<div class="wrapper">
			<?php include('includes/sidebar_menu.php'); ?>
			<div class="main-panel">
				<div class="main-content">
	                <div class="content-overlay"></div>
	                <div class="content-wrapper">
	                	<div class="row">
	                		<div class="col-12">
	                            <div class="content-header">Manage reports</div>
	                        </div>
	                	</div>
	                	<section id="configuration">
	                		<img id="headerImg" src="<?= SITE_ADMIN_URL?>uploads/<?= $results_config->logo?>" class="d-none">
	                		<div class="row">
	                			<div class="col-12">
	                				<div class="card">
	                					<div class="card-header">
	                                        <h4 class="card-title">List reports</h4>
	                                    </div>
	                                    <div class="card-content">
	                                    	<div class="card-body">
	                                    		<div class="table-responsive">
	                                    			<table class="table table-striped table-bordered user-table">
	                                    				<thead>
	                                    					<tr>
	                                    						<th>#</th>
	                                    						<th>Name</th>
	                                    						<th>Action</th>
	                                    					</tr>
	                                    				</thead>
	                                    				<tbody>
	                                    					<?php 
	                                    						if($query->rowCount() > 0) { 
	                                    							foreach($results as $result) {
	                                    								?>
	                                    								<tr>
	                                    									<td><?php echo htmlentities($cnt);?></td>
								                                            <td><?php echo htmlentities($result->name);?></td>
								                                            <td>
								                                            	<a href="<?= SITE_ADMIN_URL?>reports.php?id=<?= $result->id?>&type=pdf">
								                                            		<img src="<?= SITE_ADMIN_ASSET_IMG?>/chart/pdf.jpg" width="30" class="mr-2">
								                                            	</a>
		                                    									<a href="<?= SITE_ADMIN_URL?>reports.php?id=<?= $result->id?>&type=csv">
		                                    										<img src="<?= SITE_ADMIN_ASSET_IMG?>/chart/csv.png" width="35">
		                                    									</a>
		                                    									<?php if($_SESSION['user_type'] == "admin"){?>
																				<a href="reports.php?del=<?php echo $result->id;?>" onclick="return confirm('Do you want to Delete');">
																					<i class="ft-delete" style="color:red; font-size: 30px; vertical-align: middle; margin-left: 10px;"></i>
																				</a>&nbsp;&nbsp;
																				<?php }?>
								                                            </td>
	                                    								</tr>
	                                    								<?php 
	                                    								$cnt=$cnt+1;
	                                    							}
	                                    						}
	                                    					?>
	                                    				</tbody>
	                                    			</table>
	                                    		</div>
	                                    	</div>
	                                    </div>
	                				</div>
	                			</div>
	                		</div>
	                	</section>
	                </div>
	            </div>
			</div>
		</div>
		

		
		<?php include('includes/vendor_js.php');?>

	    <?php include('includes/basic_js.php');?>

	    <script src="<?=SITE_ADMIN_ASSET_VENDOR?>/js/datatable/jquery.dataTables.min.js"></script>
    	<script src="<?=SITE_ADMIN_ASSET_VENDOR?>/js/datatable/dataTables.bootstrap4.min.js"></script>
    	<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
    	
	    <script src="<?= SITE_ADMIN_ASSET_JS?>/html2canvas.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.0.10/jspdf.plugin.autotable.min.js"></script>

	    <script>
	    	function getBase64Image(img) {
			  var canvas = document.createElement("canvas");
			  canvas.width = img.width;
			  canvas.height = img.height;
			  var ctx = canvas.getContext("2d");
			  ctx.drawImage(img, 0, 0);
			  var dataURL = canvas.toDataURL("image/png");
			  return dataURL;
			}
			var base64 = getBase64Image(document.getElementById("headerImg"));
	    </script>
	    <style>
	    	#jstbl {
	    		background-color: white;
	    	}
	    	#jstbl th, #jstbl td {
	    		padding: 0.8rem 0.5rem;
	    	}
	    	/*#jstbl td {
	    		min-width: 200px;
	    	}*/
	    </style>
	    <?php 
	    	if(isset($_GET['id']) && isset($_GET['type']) && $_GET['type']=='pdf'){
				echo '<div id="jstbl" class="col-md-12">';
				$sql = "SELECT * from reports where id = (:id);";
				$query = $dbh->prepare($sql);
				$query-> bindParam(':id', $_GET['id'], PDO::PARAM_STR);
				$query->execute();
				$result=$query->fetch(PDO::FETCH_OBJ);
				
				$db_connect = json_decode($result->db_connect);
				$sql_report = $result->query;
				$conn = new mysqli($db_connect->host,$db_connect->username, $db_connect->password,$db_connect->name);
				// Check connection
				if ($conn->connect_error) {
					die("Connection failed: " . $conn->connect_error);
				}
				$result_query = $conn->query($sql_report);
				if ($result_query->num_rows > 0) { 
					$data = array();
					while($row = $result_query->fetch_assoc()) {
						$data[] = $row;
					}
				}
				$heads = array_keys($data[0]);
				$pdfData = array();
				foreach($data as $rowData) {
					$tempArray = array();
					for($i=0;$i<count($heads);$i++){
						array_push($tempArray, $rowData[$heads[$i]]);
					}
					array_push($pdfData, $tempArray);
				}
				$tbl = "<table class='table table-bordered' style='width: 100%'><thead><tr>";
				$th = "";
				for($i=0;$i<count($heads);$i++){
					$th.="<th style='width: auto;'>".$heads[$i]."</th>";
				}
				$tbl .= $th."</tr></thead><tbody>";
					
				$tbl .= jsonToTable($data);
				$tbl .= "</tbody></table>";
				echo $tbl;

				echo '</div>';

				$filename = 'files/'.$_SESSION['alogin'].' report '.$result->name.'.pdf';
			
				echo "<script>
					$('td:empty').remove();
					$('tr:empty').remove();
					var l = {
				         orientation: 'p',
				         unit: 'px',
				         autoSize: true,
				         compress: true,
				         format: 'a3',
				         fontSize: 8,
				         printHeaders: true,
				         precision: 4
				     };
				     let columns = JSON.parse('".json_encode($heads)."');
				     let data = []; 
				     $('#jstbl table tbody').find('tr').map(function(e){
				     	let rowData = [];
				     	$(this).find('td').map(function(e){
				     		rowData.push($(this).text());
				     	});
				     	data.push(rowData);
				     })
					var pdf = new jsPDF(l, '', '', '');
					pdf.addImage(base64, 275, 10, 60, 60);
					pdf.setFontSize(18);
					pdf.text('".$results_config->header."', 20, 80);
					pdf.setFontSize(10);
					pdf.autoTable({head: [columns], body: data, margin: {top: 100, left: 20, right: 20, bottom: 30}});
					pdf.save('".$filename."');
					location.href = '/admin/reports.php';
					
				</script>";
			}
			if(isset($_GET['id']) && isset($_GET['type']) && $_GET['type']=='csv'){
				$sql = "SELECT * from reports where id = (:id);";
				$query = $dbh-> prepare($sql);
				$query-> bindParam(':id', $_GET['id'], PDO::PARAM_STR);
				$query->execute();
				$result1=$query->fetch(PDO::FETCH_OBJ);
					
				$jsonDecoded = json_decode($result->content, true); // add true, will handle as associative array    =
				$db_connect = json_decode($result1->db_connect);
				$sql_report = $result1->query;
				$conn1 = new mysqli($db_connect->host,$db_connect->username, $db_connect->password,$db_connect->name);
				// Check connection
				if ($conn1->connect_error) {
					die("Connection failed: " . $conn1->connect_error);
				}
				$result_query = $conn1->query($sql_report);
				if ($result_query->num_rows > 0) { 
					$data = array();
					while($row = $result_query->fetch_assoc()) {
						$data[]=$row;
					}
				}
				$conn1->close();
				$filename = 'files/'.$_SESSION['alogin'].' report '.$result1->name.'.csv';
				$fh = fopen($filename, 'w');
				if (is_array($data)) {
				  foreach ($data as $line) {
				    // with this foreach, if value is array, replace it with first array value
				    foreach ($line as $key => $value) {
				        if (is_array($value)) {
				            $line[$key] = $value[0];
				        }
				    }
				    // no need for foreach, as fputcsv expects array, which we already have
				    if (is_array($line)) {
				      fputcsv($fh,$line);
				    }
				  }
				}
				fclose($fh); 

				echo "<script>

				var anchor = document.createElement('a');

				anchor.download = '".$filename."';
				anchor.href = '".$filename."';
				anchor.dataset.downloadurl = ['text/plain', anchor.download, anchor.href].join(':');
				anchor.click();
				location.href = '/admin/reports.php';
				</script>";
			}
	    ?>
	    <script>
    		$(document).ready(function(e){
    			$(".user-table").DataTable();
    		});
    	</script>
	</body>
</html>