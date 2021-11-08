<?php 
	include("config/base.php");
	include("functions/fn_headerlogo.php");
	$title = "Header & Logo";
	$page = "header_logo";
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
	<body class="vertical-layout vertical-menu 2-columns navbar-sticky" data-menu="vertical-menu" data-col="2-columns">
		<?php include('includes/navbar_header.php'); ?>
		<div class="wrapper">
			<?php include('includes/sidebar_menu.php'); ?>
			<div class="main-panel">
				<div class="main-content">
	                <div class="content-overlay"></div>
	                <div class="content-wrapper">
	                	<div class="row">
	                		<div class="col-12">
	                            <div class="content-header">Header & Logo</div>
	                        </div>
	                	</div>
	                	<section id="simple-validation">
	                		<div class="row">
	                			<div class="col-md-12">
	                				<div class="card">
	                					<div class="card-header">
	                                        <h4 class="card-title">Header And Logo</h4>
	                                    </div>
	                                    <div class="card-content">
	                                    	<div class="card-body">
	                                    		<form novalidate method="post" enctype="multipart/form-data">
	                                    			<div class="row">
	                                    				<div class="col-sm-8">
	                                    					<div class="row">
			                                    				<div class="col-sm-12 col-12">
			                                    					<div class="form-group row">
			                                    						<label class="col-md-3 col-form-label" for="email">Logo</label>
			                                    						<div class="col-md-9">
			                                    							<div class="custom-file">
					                                                            <input type="file" class="custom-file-input" id="logo" name="logo" accept="image/png, image/gif, image/jpeg">
					                                                            <label class="custom-file-label" for="logo">Choose file</label>
					                                                        </div>
			                                    						</div>
			                                    					</div>
			                                    				</div>
			                                    			</div>
			                                    			<div class="row">
			                                    				<div class="col-sm-12 col-12">
			                                    					<div class="form-group row">
			                                    						<label class="col-md-3 col-form-label" for="email">Header</label>
			                                    						<div class="col-md-9">
			                                    							<div class="controls">
			                                    								<textarea name="header" class="form-control" rows="5"><?= htmlentities($result_config->header)?></textarea>
			                                    							</div>
			                                    						</div>
			                                    					</div>
			                                    				</div>
			                                    			</div>
	                                    				</div>
	                                    				<div class="col-sm-4">
	                                    					<?php if($result_config->logo) { ?>
	                                    					<img src="uploads/<?= $result_config->logo?>" width="150">
	                                    					<?php }?>
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
				var message = "<?= $msg?>";
				if(message) {
					Swal.fire({
				      title: message,
				      confirmButtonClass: 'btn btn-primary',
				      buttonsStyling: false,
				    });	
				}

				$('.custom-file input').change(function (e) {
				  $(this).next('.custom-file-label').html(e.target.files[0].name);
				});
				
			})
    	</script>
	</body>
</html>