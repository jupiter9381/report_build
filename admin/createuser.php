<?php 
	include("config/base.php");
	include("functions/fn_createuser.php");
	$title = "Edit Admin";
	$page = "createuser";
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
	                            <div class="content-header">Create User</div>
	                        </div>
	                	</div>
	                	<section id="simple-validation">
	                		<div class="row">
	                			<div class="col-md-12">
	                				<div class="card">
	                					<div class="card-header">
	                                        <h4 class="card-title">Enter User Info</h4>
	                                    </div>
	                                    <div class="card-content">
	                                    	<div class="card-body">
	                                    		<form novalidate method="post" autocomplete="off">
	                                    			<div class="row">
	                                    				<div class="col-sm-8 col-12">
	                                    					<div class="form-group row">
	                                    						<label class="col-md-3 col-form-label" for="email">Name</label>
	                                    						<div class="col-md-9">
	                                    							<div class="controls">
	                                    								<input type="text" class="form-control square" name="name" id="name" data-validation-required-message="This Name field is required" required value="">
	                                    							</div>
	                                    						</div>
	                                    					</div>
	                                    				</div>
	                                    			</div>
	                                    			<div class="row">
	                                    				<div class="col-sm-8 col-12">
	                                    					<div class="form-group row">
	                                    						<label class="col-md-3 col-form-label" for="email">Email</label>
	                                    						<div class="col-md-9">
	                                    							<div class="controls">
	                                    								<input type="email" class="form-control square" name="email" id="email" data-validation-required-message="This Email field is required" required>
	                                    							</div>
	                                    						</div>
	                                    					</div>
	                                    				</div>
	                                    			</div>
	                                    			<div class="row">
	                                    				<div class="col-sm-8 col-12">
	                                    					<div class="form-group row">
	                                    						<label class="col-md-3 col-form-label" for="password">Password</label>
	                                    						<div class="col-md-9">
	                                    							<div class="controls">
	                                    								<input type="password" class="form-control square" name="password" id="password" data-validation-required-message="This Password field is required" required>
	                                    							</div>
	                                    						</div>
	                                    					</div>
	                                    				</div>
	                                    			</div>
	                                    			<div class="row">
	                                    				<div class="col-sm-8 col-12">
	                                    					<div class="form-group row">
	                                    						<label class="col-md-3 col-form-label" for="level">Level</label>
	                                    						<div class="col-md-9">
	                                    							<div class="controls">
	                                    								<select class="form-control square" name="level" id="level" data-validation-required-message="This level field is required" required>
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
	                                    				<div class="col-sm-8 col-12">
	                                    					<div class="form-group row">
	                                    						<label class="col-md-3 col-form-label" for="department">Department</label>
	                                    						<div class="col-md-9">
	                                    							<div class="controls">
	                                    								<select class="form-control square" name="department" id="department" data-validation-required-message="This department field is required" required>
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
	                                    			<div class="row">
	                                    				<div class="col-sm-8 col-12">
	                                    					<div class="form-group row">
	                                    						<label class="col-md-3 col-form-label" for="role">Role</label>
	                                    						<div class="col-md-9">
	                                    							<div class="controls">
	                                    								<select class="form-control square" name="role" id="role" data-validation-required-message="This role field is required" required>
	                                    									<option value="<?php echo htmlentities($result->role);?>"><?php echo htmlentities($result->role);?></option>
												                            <option value="Admin">Admin</option>
												                            <option value="Viewer">Viewer</option>
	                                    								</select>
	                                    							</div>
	                                    						</div>
	                                    					</div>
	                                    				</div>
	                                    			</div>
	                                    			<div class="row">
	                                    				<div class="col-12">
	                                    					<button type="submit" name="submit" class="btn btn-primary">Create User</button>		
	                                    				</div>
	                                    				
	                                    			</div>
	                                    			
	                                    		</form>
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
				
			})
    	</script>
	</body>
</html>