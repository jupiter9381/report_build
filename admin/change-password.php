<?php 
	include("config/base.php");
	include("functions/fn_changepassword.php");
	$title = "Change password";
	$page = "change_password";
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
	                            <div class="content-header">Change Password</div>
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
	                                    		<form novalidate method="post">
	                                    			<div class="row">
	                                    				<div class="col-sm-8 col-12">
	                                    					<div class="form-group row">
	                                    						<label class="col-md-3 col-form-label" for="password">Current Password</label>
	                                    						<div class="col-md-9">
	                                    							<div class="controls">
	                                    								<input type="password" class="form-control square" name="password" id="password" data-validation-required-message="This current password field is required" required value="">
	                                    							</div>
	                                    						</div>
	                                    					</div>
	                                    				</div>
	                                    			</div>
	                                    			<div class="row">
	                                    				<div class="col-sm-8 col-12">
	                                    					<div class="form-group row">
	                                    						<label class="col-md-3 col-form-label" for="newpassword">New Password</label>
	                                    						<div class="col-md-9">
	                                    							<div class="controls">
	                                    								<input type="password" class="form-control square" name="newpassword" id="newpassword" data-validation-required-message="This new password field is required" required value="">
	                                    							</div>
	                                    						</div>
	                                    					</div>
	                                    				</div>
	                                    			</div>
	                                    			<div class="row">
	                                    				<div class="col-sm-8 col-12">
	                                    					<div class="form-group row">
	                                    						<label class="col-md-3 col-form-label" for="confirmpassword">Confirm Password</label>
	                                    						<div class="col-md-9">
	                                    							<div class="controls">
	                                    								<input type="password" class="form-control square" name="confirmpassword" id="confirmpassword" data-validation-required-message="This confirm password field is required" required value="">
	                                    							</div>
	                                    						</div>
	                                    					</div>
	                                    				</div>
	                                    			</div>
	                                    			<div class="row">
	                                    				<div class="col-12">
	                                    					<button type="submit" name="submit" class="btn btn-primary">Submit</button>		
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
				var message = "<?= $_SESSION['message']?>";
				if(message) {
					Swal.fire({
				      title: message,
				      confirmButtonClass: 'btn btn-primary',
				      buttonsStyling: false,
				    });	
				}
				
			})
    	</script>
    	<?php $_SESSION['message'] = '';?>
	</body>
</html>