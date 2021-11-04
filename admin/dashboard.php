<?php 
	include("config/base.php");
	include("functions/dashboard.php");
	$title = "Dashboard";
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
		<link rel="stylesheet" type="text/css" href="<?=SITE_ADMIN_ASSET_VENDOR?>/css/chartist.min.css">

		<?php include("includes/basic_css.php");?>

	    <!-- BEGIN Page Level CSS-->
	    <link rel="stylesheet" type="text/css" href="<?=SITE_ADMIN_ASSET_CSS?>/core/menu/horizontal-menu.css">
	    <link rel="stylesheet" type="text/css" href="<?=SITE_ADMIN_ASSET_CSS?>/pages/authentication.css">
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
	                        <div class="col-xl-3 col-lg-6 col-md-6 col-12">
	                            <div class="card gradient-purple-love">
	                                <div class="card-content">
	                                    <div class="card-body py-0">
	                                        <div class="media pb-1">
	                                            <div class="media-body white text-left">
	                                                <h3 class="font-large-1 white mb-0">$2,156</h3>
	                                                <span>Total Tax</span>
	                                            </div>
	                                            <div class="media-right white text-right">
	                                                <i class="ft-activity font-large-1"></i>
	                                            </div>
	                                        </div>
	                                    </div>
	                                    <div id="Widget-line-chart" class="height-75 WidgetlineChart WidgetlineChartshadow mb-2">
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
	                </div>
	            </div>
			</div>
		</div>
		

		
		<?php include('includes/vendor_js.php');?>

	    <?php include('includes/basic_js.php');?>
	</body>
</html>