<?php 
	include("config/base.php");
	include("functions/fn_userlist.php");
	$title = "Manage Users";
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
	                            <div class="content-header">Manage Users</div>
	                        </div>
	                	</div>
	                	<section id="configuration">
	                		<div class="row">
	                			<div class="col-12">
	                				<div class="card">
	                					<div class="card-header">
	                                        <h4 class="card-title">List Users</h4>
	                                    </div>
	                                    <div class="card-content">
	                                    	<div class="card-body">
	                                    		<div class="table-responsive">
	                                    			<table class="table table-striped table-bordered user-table">
	                                    				<thead>
	                                    					<tr>
	                                    						<th>#</th>
	                                    						<th>Email</th>
	                                    						<th>Name</th>
	                                    						<th>Level</th>
	                                    						<th>Department</th>
	                                    						<th>Role</th>
	                                    						<th>Action</th>
	                                    					</tr>
	                                    				</thead>
	                                    				<tbody>
	                                    					
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

    	<script>
    		$(document).ready(function(e){
    			$(".user-table").DataTable();
    		});
    	</script>
	</body>
</html>