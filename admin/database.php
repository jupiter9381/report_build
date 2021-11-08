<?php 
	include("config/base.php");
	include("functions/fn_database.php");
	$title = "Edit Database";
	$page = "database";
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
		<link rel="stylesheet" type="text/css" href="<?= SITE_ADMIN_ASSET_VENDOR ?>/css/sweetalert2.min.css">
    	<link rel="stylesheet" type="text/css" href="<?= SITE_ADMIN_ASSET_VENDOR ?>/css/animate.min.css">

    	<link rel="stylesheet" type="text/css" href="<?=SITE_ADMIN_ASSET_VENDOR?>/css/datatables/dataTables.bootstrap4.min.css">
		
		<?php include("includes/basic_css.php");?>
		<link rel="stylesheet" href="<?= SITE_ADMIN_ASSET_CSS?>/pages/ex-component-sweet-alerts.css">

		<link rel="stylesheet" href="<?= SITE_ADMIN_ASSET_CSS?>/plugins/form-validation.css">

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
	                            <div class="content-header">Edit Database : <?php echo htmlentities($result_db->db); ?></div>
	                        </div>
	                	</div>
	                	<section id="simple-validation">
	                		<div class="row">
	                			<div class="col-md-12">
	                				<div class="card">
	                					<div class="card-header">
	                                        <h4 class="card-title">Edit Info</h4>
	                                    </div>
	                                    <div class="card-content">
	                                    	<div class="card-body">
	                                    		<div class="row">
	                                    			<div class="col-sm-8">
	                                    				<form novalidate method="post">
			                                    			<div class="row">
			                                    				<div class="col-sm-12 col-12">
			                                    					<div class="form-group row">
			                                    						<label class="col-md-3 col-form-label" for="host">Host</label>
			                                    						<div class="col-md-9">
			                                    							<div class="controls">
			                                    								<input type="text" class="form-control square" name="host" id="host" data-validation-required-message="This Host field is required" required value="<?= htmlentities($result_db->host);?>">
			                                    							</div>
			                                    						</div>
			                                    					</div>
			                                    				</div>
			                                    			</div>
			                                    			<div class="row">
			                                    				<div class="col-sm-12 col-12">
			                                    					<div class="form-group row">
			                                    						<label class="col-md-3 col-form-label" for="user">Username</label>
			                                    						<div class="col-md-9">
			                                    							<div class="controls">
			                                    								<input type="text" class="form-control square" name="user" id="user" data-validation-required-message="This Username field is required" required value="<?= htmlentities($result_db->user);?>">
			                                    							</div>
			                                    						</div>
			                                    					</div>
			                                    				</div>
			                                    			</div>
			                                    			<div class="row">
			                                    				<div class="col-sm-12 col-12">
			                                    					<div class="form-group row">
			                                    						<label class="col-md-3 col-form-label" for="pass">Password</label>
			                                    						<div class="col-md-9">
			                                    							<div class="controls">
			                                    								<input type="text" class="form-control square" name="pass" id="pass" data-validation-required-message="This password field is required" value="<?= htmlentities($result_db->pass);?>">
			                                    							</div>
			                                    						</div>
			                                    					</div>
			                                    				</div>
			                                    			</div>
			                                    			<div class="row">
			                                    				<div class="col-sm-12 col-12">
			                                    					<div class="form-group row">
			                                    						<label class="col-md-3 col-form-label" for="db">Database</label>
			                                    						<div class="col-md-9">
			                                    							<div class="controls">
			                                    								<input type="text" class="form-control square" name="db" id="db" data-validation-required-message="This Database field is required" required value="<?= htmlentities($result_db->db);?>">
			                                    							</div>
			                                    						</div>
			                                    					</div>
			                                    				</div>
			                                    			</div>
			                                    			<div class="row">
			                                    				<div class="col-12">
			                                    					<input type="hidden" name="type" value="db">
			                                    					<button type="submit" name="submit" class="btn btn-primary">Connect Database</button>		
			                                    				</div>
			                                    			</div>
			                                    		</form>
	                                    			</div>
	                                    			<div class="col-sm-4">
	                                    				<div class="form-group">
	                                    				<?php 
	                                    					if(isset($result_db->host) && isset($result_db->user) && isset($result_db->pass) && isset($result_db->db)){
	                                    						$mysqli = new mysqli($result_db->host,$result_db->user,$result_db->pass,$result_db->db);

	                                    						// Check connection
	                                    						if ($mysqli->connect_errno) {
																  echo "Failed to connect to MySQL: " . $mysqli->connect_error;
																} else {
																	echo "<label>Database Connected</br>Tables:</br> </label>";
																	$qrsql = "SHOW tables";
																	$qrresult = $mysqli->query($qrsql);
																	if ($qrresult->num_rows > 0) {
																		?>
																		<textarea class="form-control" cols='20' rows='5' style='overflow:scroll;'> <?php 
																				while($row = $qrresult->fetch_assoc()) {
																					$key = key($row);
																					echo "$row[$key] \n ";
																				}
																			?>
																		</textarea>
																	<?php
																	} else {
																		echo "0 results";
																	}
																}
	                                    					}
	                                    				?>
	                                    				</div>
	                                    			</div>
	                                    		</div>
	                                    	</div>
	                                    </div>
	                				</div>
	                			</div>
	                		</div>
	                		<div class="row">
	                			<div class="col-md-12">
	                				<div class="card">
	                					<div class="card-header">
	                						<h4 class="card-title">Enter SQL Query</h4>
	                					</div>
	                					<div class="card-content">
	                						<div class="card-body">
	                							<form method="post">
		                							<div class="row">
		                								<div class="col-sm-9">
		                									<div class="form-group">
		                										<textarea class="form-control" rows="4" cols="200" name="query"></textarea>	
		                									</div>
		                								</div> 
		                								<div class="col-sm-3 mt-3">
		                									<input type="hidden" name="type" value="query">
				                                    		<button type="submit" name="submit" class="btn btn-primary">RUN SQL QUERY</button>
		                								</div>
		                							</div>
	                							</form>
	                							<div class="row">
	                								<div class="col-sm-12">
	                									<?php 
	                										if(isset($_POST['submit']) && isset($_POST['type']) && $_POST['type'] == "query") {
	                											$conn = new mysqli($result_db->host,$result_db->user,$result_db->pass,$result_db->db);
																// Check connection
																if ($conn->connect_error) {
																	die("Connection failed: " . $conn->connect_error);
																}
																$sql = $_POST['query'];
																$result = $conn->query($sql);
																if ($result->num_rows > 0) { 
																	$data = array();
																	while($row = $result->fetch_assoc()) {
																	    $data[]=$row;
																	}
																	$jsonDecoded = json_decode(json_encode($data), true);
																	$heads = array_keys($jsonDecoded[0]);
																	?>
																	<table class="table table-bordered" id="queryTable">
																		<thead>
																			<tr>
																				<?php 
																				for($i=0;$i<count($heads);$i++) {
																					?>
																					<th><?= $heads[$i]?></th>
																					<?php 
																				}
																				?>
																			</tr>
																		</thead>
																		<tbody>
																			<?= jsonToTable($jsonDecoded);?>
																		</tbody>
																	</table>
																	<form method="post">
																		<textarea style="display: none;" type="text" name="result" class="form-control" required ><?php echo json_encode($data);?></textarea>
						                								<div class="row">
						                									<div class="col-sm-12 col-12 text-center">
						                										<h4>Save Report</h4>	
						                									</div>
						                								</div>
						                								<div class="row">
						                									<div class="col-sm-6">
						                										<div class="row">
						                											<div class="col-md-12 col-12">
								                                    					<div class="form-group row">
								                                    						<label class="col-md-3 col-form-label" for="rname">Name</label>
								                                    						<div class="col-md-9">
								                                    							<div class="controls">
								                                    								<input type="text" class="form-control square" name="rname" id="rname" data-validation-required-message="This report name field is required" placeholder="Name of The Report" required>
								                                    							</div>
								                                    						</div>
								                                    					</div>
								                                    				</div>
						                										</div>
						                										<div class="row">
						                											<div class="col-md-12 col-12">
								                                    					<div class="form-group row">
								                                    						<label class="col-md-3 col-form-label" for="ulevel">Level</label>
								                                    						<div class="col-md-9">
								                                    							<div class="controls">
								                                    								<select class="form-control square" name="ulevel" id="ulevel" data-validation-required-message="This level field is required" required>
								                                    									<option></option>
								                                    									<option value="1">Leve1</option>
								                                    									<option value="2">Leve2</option>
								                                    									<option value="3">Leve3</option>
								                                    								</select>
								                                    							</div>
								                                    						</div>
								                                    					</div>
								                                    				</div>
						                										</div>
						                										<div class="row">
						                											<div class="col-md-12 col-12">
								                                    					<div class="form-group row">
								                                    						<label class="col-md-3 col-form-label" for="department">Department</label>
								                                    						<div class="col-md-9">
								                                    							<div class="controls">
								                                    								<select class="form-control square" name="department" id="department" data-validation-required-message="This department field is required" required>
								                                    									<option></option>
																			                            <option value="Human Resources">Human Resources</option>
																			                            <option value="Accounts">Accounts</option>
																			                            <option value="Management">Management</option>
																			                            <option value="Operations">Operations</option>
																			                            <option value="Purchasing">Purchasing</option>
																			                            <option value="Marketing">Marketing</option>
																			                            <option value="Sales">Sales</option>
																			                            <option value="Facility Management">Facility Management</option>
																			                            <option value="Information Technology">Information Technology</option>
								                                    								</select>
								                                    							</div>
								                                    						</div>
								                                    					</div>
								                                    				</div>
						                										</div>
						                										<div class="row mb-2">
						                											<div class="col-sm-12 col-6">
								                                    					<div class="checkbox">
									                                                        <input type="checkbox" id="live" name="live">
									                                                        <label for="live"><span>Allow live view of this query to show up on dashboard</span></label>
									                                                    </div>
								                                    				</div>
						                										</div>
						                									</div>
						                									<div class="col-sm-6 chart-info-part d-none">
						                										<div class="row">
						                											<div class="col-md-12 col-12">
								                                    					<div class="form-group row">
								                                    						<label class="col-md-3 col-form-label" for="chart_type">Chart Type</label>
								                                    						<div class="col-md-9">
								                                    							<div class="controls">
								                                    								<select class="form-control square" name="chart_type" id="chart_type" data-validation-required-message="This level field is required">
								                                    									<option></option>
								                                    									<option value="bar">Bar Graph</option>
								                                    									<option value="pie">Pie Chart</option>
								                                    									<option value="line">Line Graph</option>
								                                    									<option value="area">Area Graph</option>
								                                    								</select>
								                                    							</div>
								                                    						</div>
								                                    					</div>
								                                    				</div>
						                										</div>
						                										<div class="row">
						                											<div class="col-md-12 col-12">
								                                    					<div class="form-group row">
								                                    						<label class="col-md-3 col-form-label" for="x_axis">X Axis</label>
								                                    						<div class="col-md-9">
								                                    							<div class="controls">
								                                    								<select class="form-control square" name="x_axis" id="x_axis" data-validation-required-message="This level field is required">
								                                    									<option></option>
								                                    									<?php 
																											for($i=0;$i<count($heads);$i++) {
																												?>
																												<option><?= $heads[$i]?></option>
																												<?php 
																											}
																										?>
								                                    								</select>
								                                    							</div>
								                                    						</div>
								                                    					</div>
								                                    				</div>
						                										</div>
						                										<div class="row">
						                											<div class="col-md-12 col-12">
								                                    					<div class="form-group row">
								                                    						<label class="col-md-3 col-form-label" for="y_axis">Y Axis</label>
								                                    						<div class="col-md-9">
								                                    							<div class="controls">
								                                    								<select class="form-control square" name="y_axis" id="y_axis" data-validation-required-message="This Y Axis field is required">
								                                    									<option></option>
								                                    									<?php 
																											for($i=0;$i<count($heads);$i++) {
																												?>
																												<option><?= $heads[$i]?></option>
																												<?php 
																											}
																										?>
								                                    								</select>
								                                    							</div>
								                                    						</div>
								                                    					</div>
								                                    				</div>
						                										</div>
						                									</div>
						                                    			</div>
						                                    			<div class="row">
						                                    				<div class="col-sm-2 col-6">
						                                    					<input type="hidden" name="type" value="queryresult">
				                                    							<button type="submit" name="submit" class="btn btn-primary">SAVE REPORT</button>
						                                    				</div>
						                                    			</div>
						                							</form>	
																	<?php 
																} else {
																	echo '0 results';
																}
																$conn->close();
	                										}
	                									?>
	                								</div>
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

		<script src="<?= SITE_ADMIN_ASSET_VENDOR ?>/js/jqBootstrapValidation.js"></script>
		<script src="<?= SITE_ADMIN_ASSET_VENDOR ?>/js/sweetalert2.all.min.js"></script>

	    <?php include('includes/basic_js.php');?>

	    <script src="<?=SITE_ADMIN_ASSET_VENDOR?>/js/datatable/jquery.dataTables.min.js"></script>
    	<script src="<?=SITE_ADMIN_ASSET_VENDOR?>/js/datatable/dataTables.bootstrap4.min.js"></script>

    	<script>
    		(function (window, document, $) {
			  'use strict';

			  // Input, Select, Textarea validations except submit button
			  $("input,select,textarea").not("[type=submit]").jqBootstrapValidation();

			})(window, document, jQuery);
			$(document).ready(function(e){
				var message = "<?= $msg?>";
				if(message) {
					Swal.fire({
				      title: message,
				      confirmButtonClass: 'btn btn-primary',
				      buttonsStyling: false,
				    });	
				}
				$("#queryTable tbody tr:first-child").remove();
				$("#queryTable").DataTable();
				
				$("#live").click(function(e){
					if($(this).prop('checked')) $(".chart-info-part").removeClass('d-none');
					else $(".chart-info-part").addClass('d-none');
				});
			})
    	</script>
	</body>
</html>