<?php 
	include("admin/config/base.php");
	include("admin/config/dbconnect.php");
	include("functions/fn_license.php");
	$title = "License";

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

		<?php include("admin/includes/fonts.php");?>

		<?php include("admin/includes/basic_css.php");?>

	    <!-- BEGIN Page Level CSS-->
	    <link rel="stylesheet" type="text/css" href="<?=SITE_ADMIN_ASSET_CSS?>/core/menu/horizontal-menu.css">
	    <link rel="stylesheet" type="text/css" href="<?=SITE_ADMIN_ASSET_CSS?>/pages/authentication.css">
	</head>
	<body class="horizontal-layout horizontal-menu horizontal-menu-padding 1-column auth-page navbar-sticky blank-page" data-open="hover" data-menu="horizontal-menu" data-col="1-column">
		<div class="wrapper">
	        <div class="main-panel">
	            <!-- BEGIN : Main Content-->
	            <div class="main-content">
	                <div class="content-overlay"></div>
	                <div class="content-wrapper">
	                    <!--Login Page Starts-->
	                    <section id="forgot-password" class="auth-height">
	                        <div class="row full-height-vh m-0 d-flex align-items-center justify-content-center">
	                            <div class="col-md-7 col-12">
	                                <div class="card overflow-hidden">
	                                    <div class="card-content">
	                                        <div class="card-body auth-img">
	                                        	<form method="post">
	                                        		<div class="row m-0">
		                                                <div class="col-lg-6 d-none d-lg-flex justify-content-center align-items-center text-center auth-img-bg py-2">
		                                                    <img src="<?=SITE_ADMIN_ASSET_IMG?>/forgot.png" alt="" class="img-fluid" width="260" height="230">
		                                                </div>
		                                                <div class="col-lg-6 col-md-12 px-4 py-3">
		                                                    <h4 class="mb-2 card-title">License Key</h4>
		                                                    <p class="card-text mb-3">Please enter your license key </p>
		                                                    <input type="hidden" name="email" value="<?= $_GET['email']?>">
		                                                    <input type="text" class="form-control mb-3" placeholder="Key" name="license">
		                                                    <div class="d-flex flex-sm-row flex-column justify-content-between">
		                                                        <a href="auth-login.html" class="btn bg-light-primary mb-2 mb-sm-0">Back To Login</a>
		                                                        <button type="submit" class="btn btn-primary ml-sm-1" name="submit">Submit</button>
		                                                    </div>
		                                                </div>
		                                            </div>
	                                        	</form>
	                                        </div>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
	                    </section>
	                    <!--Login Page Ends-->
	                </div>
	            </div>
	            <!-- END : End Main Content-->
	        </div>
	    </div>
	    <?php include('admin/includes/vendor_js.php');?>

	    <?php include('admin/includes/basic_js.php');?>
	</body>
</html>