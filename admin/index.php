<?php 
	include("config/base.php");
	include("config/dbconnect.php");
	include("functions/authentication.php");
	$title = "Login Page";
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

		<?php include("includes/basic_css.php");?>

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
	                    <section id="login" class="auth-height">
	                        <div class="row full-height-vh m-0">
	                            <div class="col-12 d-flex align-items-center justify-content-center">
	                                <div class="card overflow-hidden">
	                                    <div class="card-content">
	                                        <div class="card-body auth-img">
	                                        	<form method="post">
	                                        		<div class="row m-0">
		                                                <div class="col-lg-6 d-none d-lg-flex justify-content-center align-items-center auth-img-bg p-3">
		                                                    <img src="<?=SITE_ADMIN_ASSET_IMG?>/gallery/login.png" alt="" class="img-fluid" width="300" height="230">
		                                                </div>
		                                                <div class="col-lg-6 col-12 px-4 py-3">
		                                                    <h4 class="mb-2 card-title">Login</h4>
		                                                    <p>Welcome back, please login to your account.</p>
		                                                    <input type="text" class="form-control mb-3" placeholder="Username" name="username">
		                                                    <input type="password" class="form-control mb-2" placeholder="Password" name="password">
		                                                    <div class="d-sm-flex justify-content-between mb-3 font-small-2">
		                                                        <div class="remember-me mb-2 mb-sm-0">
		                                                            <div class="checkbox auth-checkbox">
		                                                                <input type="checkbox" id="auth-ligin">
		                                                                <label for="auth-ligin"><span>Remember Me</span></label>
		                                                            </div>
		                                                        </div>
		                                                        <a href="auth-forgot-password.html">Forgot Password?</a>
		                                                    </div>
		                                                    <div class="d-flex justify-content-between flex-sm-row flex-column">
		                                                        <a href="auth-register.html" class="btn bg-light-primary mb-2 mb-sm-0">Register</a>
		                                                        <button type="submit" name="login" class="btn btn-primary">Login</button>
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
	    <?php include('includes/vendor_js.php');?>

	    <?php include('includes/basic_js.php');?>
	</body>
</html>