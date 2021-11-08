<?php 
	include("config/base.php");
	include("functions/fn_dashboard.php");
	$title = "Dashboard";
	$page = "dashboard";
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
		<link rel="stylesheet" href="<?=SITE_ADMIN_ASSET_CSS?>/pages/charts-apex.css">

		<?php include("includes/basic_css.php");?>

	    <!-- BEGIN Page Level CSS-->
	    <link rel="stylesheet" type="text/css" href="<?=SITE_ADMIN_ASSET_CSS?>/core/menu/horizontal-menu.css">
	    <link rel="stylesheet" type="text/css" href="<?=SITE_ADMIN_ASSET_CSS?>/pages/authentication.css">

	    <style>
	    	.card-body {
	    		min-height: 320px;
	    	}
	    	.card-footer i {
	    		font-size: 30px;
	    	}
	    	.card-footer i:hover {
	    		font-size: 32px;
	    		color: red;
	    	}
	    </style>
	</head>
	<body class="vertical-layout vertical-menu 2-columns  navbar-sticky" data-menu="vertical-menu" data-col="2-columns">
		<?php include('includes/navbar_header.php'); ?>
		<div class="wrapper">
			<?php include('includes/sidebar_menu.php'); ?>
			<div class="main-panel">
				<div class="main-content">
	                <div class="content-overlay"></div>
	                <div class="content-wrapper">
	                	<!-- <div class="row">
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
	                    </div> -->
	                    <div class="row">
	                		<div class="col-12">
	                            <div class="content-header">Dashboard</div>
	                        </div>
	                	</div>
	                	<div class="row">
	                		<?php foreach($results as $result) { ?>
	                			<?php if($result->live == "1") {?>
			                		<div class="col-md-4 report_section" data-report="<?= $result->id?>">
			                			<div class="card">
			                				<div class="card-header">
		                                        <h4 class="card-title"><?= $result->name?></h4>
		                                    </div>
		                                    <div class="card-content">
		                                    	<div class="card-body">
		                                    		<img src="<?= SITE_ADMIN_ASSET_IMG?>/chart/<?= $result->chart_type?>.png" width="100%">
		                                    	</div>
		                                    	<div class="card-footer mr-2 ml-2">
		                                    		<div class="float-left">
		                                    			<a href="javascript:void(0);"><img src="<?= SITE_ADMIN_ASSET_IMG?>/chart/pdf.jpg" width="30" class="mr-2"></a>
		                                    			<a href="javascript:void(0);"><img src="<?= SITE_ADMIN_ASSET_IMG?>/chart/csv.png" width="35"></a>
		                                    		</div>
		                                    		<div class="float-right"> 
		                                    			<a href="javascript:void(0);" class="view_report" data-id="<?= $result->id?>" data-xaxis="<?= $result->x_axis?>" data-yaxis="<?= $result->y_axis?>" data-content='<?= $result->content?>' data-name="<?= $result->name?>" data-type="<?= $result->chart_type?>"><i class="ft-eye mr-2"></i></a>
		                                    			<a href="javascript:void(0);" data-id="<?= $result->id?>" class="remove_btn"><i class="ft-trash"></i></a>	
		                                    		</div>
		                                    	</div>
		                                    </div>
			                			</div>
			                		</div>
	                			<?php }
	                		} ?>
	                	</div>
	                </div>
	            </div>
			</div>
		</div>
		
		<div class="modal fade text-left" id="reportGraphModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel17">Report Graph</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="ft-x font-medium-2 text-bold-700"></i></span>
                        </button>
                    </div>
                    <div class="modal-body">
                    	<div id="line-chart"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn bg-light-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
		
		<?php include('includes/vendor_js.php');?>

	    <?php include('includes/basic_js.php');?>

	    <script src="<?= SITE_ADMIN_ASSET_VENDOR?>/js/apexcharts.min.js"></script>

	    <script>
	    	$(document).ready(function(e){

	    		$(".remove_btn").click(function(e){
	    			var report_id = $(this).data('id');
	    			$(".report_section[data-report='"+report_id+"']").remove();

	    			$.ajax({
			            type: "POST",
			            url: './functions/method.php',
			            data: {id: report_id, method: 'delete_report'},
			            dataType: 'json',
			            success: function(result) {

			            }
			        });
	    		});

	    		var $primary = "#975AFF",
			    $success = "#40C057",
			    $info = "#2F8BE6",
			    $warning = "#F77E17",
			    $danger = "#F55252",
			    $label_color_light = "#E6EAEE";
  				var themeColors = [$primary, $warning, $success, $danger, $info];

	    		$(".view_report").click(function(e){
	    			let xaxis = $(this).data('xaxis');
	    			let yaxis = $(this).data('yaxis');
	    			let content = $(this).data('content');
	    			let title = $(this).data('name');
	    			let type = $(this).data('type');
	    			let xaxisArray = [];
	    			let yaxisArray = [];
	    			content.forEach(item => {
	    				xaxisArray.push(item[xaxis])
	    				yaxisArray.push(Number(item[yaxis]))
	    			});
	    			console.log(type);
	    			var chartOptions;
	    			if(type == "line") {
	    				//-------------- Line Chart starts --------------
						chartOptions = {
						    chart: {
						      height: 350,
						      type: 'line',
						      zoom: {
						        enabled: false
						      }
						    },
						    colors: themeColors,
						    dataLabels: {
						      enabled: false
						    },
						    stroke: {
						      curve: 'straight'
						    },
						    series: [{
						      name: xaxis,
						      data: yaxisArray,
						    }],
						    title: {
						      text: title,
						      align: 'left'
						    },
						    grid: {
						      row: {
						        colors: ['#F5F5F5', 'transparent'], // takes an array which will be repeated on columns
						        opacity: 0.8
						      },
						    },
						    xaxis: {
						      categories: xaxisArray,
						    },
						    yaxis: {
						      tickAmount: 5,
						    }
						}
	    			} else if (type == "bar") {
	    				chartOptions = {
						    chart: {
						      height: 350,
						      type: 'bar',
						    },
						    colors: themeColors,
						    plotOptions: {
						      bar: {
						        horizontal: false,
						        //endingShape: 'rounded',
						        columnWidth: '55%',
						      },
						    },
						    dataLabels: {
						      enabled: false
						    },
						    stroke: {
						      show: true,
						      width: 2,
						      colors: ['transparent']
						    },
						    series: [{
						      name: yaxis,
						      data: yaxisArray
						    }],
						    legend: {
						      offsetY: -10
						    },
						    xaxis: {
						      categories: xaxisArray,
						    },
						    yaxis: {
						    },
						    fill: {
						      opacity: 1
						    },
						    tooltip: {
						     
						    }
						}
	    			} else if (type == "pie"){
	    				chartOptions = {
						    chart: {
						      type: 'pie',
						      height: 320
						    },
						    colors: themeColors,
						    labels: xaxisArray,
						    series: yaxisArray,
						    legend: {
						      itemMargin: {
						        horizontal: 2
						      },
						    },
						    responsive: [{
						      breakpoint: 576,
						      options: {
						        chart: {
						          width: 300
						        },
						        legend: {
						          position: 'bottom'
						        }
						      }
						    }]
						  }
	    			} else if(type == 'area') {
	    				chartOptions = {
						    chart: {
						      height: 350,
						      type: 'area',
						    },
						    colors: themeColors,
						    dataLabels: {
						      enabled: false
						    },
						    stroke: {
						      curve: 'smooth'
						    },
						    series: [{
						      name: yaxis,
						      data: yaxisArray
						    }],
						    legend: {
						      offsetY: -10
						    },
						    xaxis: {
						      categories: xaxisArray,
						    },
						    tooltip: {
						      x: {
						        format: 'dd/MM/yy HH:mm'
						      },
						    }
						  }
	    			}
	    			console.log(chartOptions)
					var lineChart = new ApexCharts(
					    document.querySelector("#line-chart"),
					    chartOptions
					);
					lineChart.render();

					$("#reportGraphModal").modal('show');
	    		});
	    		
	    		

	    		
	    	});
	    </script>
	</body>
</html>