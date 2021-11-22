<?php 
	include("admin/config/base.php");
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

		<?php include("admin/includes/fonts.php");?>
		<link rel="stylesheet" href="<?=SITE_ADMIN_ASSET_CSS?>/pages/charts-apex.css">

		<?php include("admin/includes/basic_css.php");?>

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
	    	.light {
	    		color: #342E49 !important;
	    	}
	    </style>
	</head>
	<body class="vertical-layout vertical-menu 2-columns  navbar-sticky" data-menu="vertical-menu" data-col="2-columns">
		<?php include('admin/includes/navbar_header.php'); ?>
		<div class="wrapper">
			<?php include('admin/includes/sidebar_menu.php'); ?>
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
	                		<img id="headerImg" src="<?= SITE_ADMIN_URL?>uploads/<?= $results_config->logo?>" class="d-none">
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
		                                    			<a href="dashboard.php?id=<?= $result->id?>&type=pdf"><img src="<?= SITE_ADMIN_ASSET_IMG?>/chart/pdf.jpg" width="30" class="mr-2"></a>
		                                    			<a href="dashboard.php?id=<?= $result->id?>&type=csv"><img src="<?= SITE_ADMIN_ASSET_IMG?>/chart/csv.png" width="35"></a>
		                                    		</div>
		                                    		<div class="float-right"> 
		                                    			<a href="javascript:void(0);" class="view_report" data-id="<?= $result->id?>" data-xaxis="<?= $result->x_axis?>" data-yaxis="<?= $result->y_axis?>" data-content='<?= $result->content?>' data-name="<?= $result->name?>" data-type="<?= $result->chart_type?>" data-query="<?= $result->query?>"><i class="ft-eye mr-2"></i></a>
		                                    			<!-- <a href="javascript:void(0);" data-id="<?= $result->id?>" class="remove_btn"><i class="ft-trash"></i></a>	 -->
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
                    	<div class="text-center">
                    		<label class="xaxis"></label> &nbsp;&nbsp;&nbsp;
                    		<label class="yaxis" ></label>
                    	</div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn bg-light-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
		
		<?php include('admin/includes/vendor_js.php');?>

	    <?php include('admin/includes/basic_js.php');?>

	    <script src="<?= SITE_ADMIN_ASSET_VENDOR?>/js/apexcharts.min.js"></script>
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
			  var dataURL = canvas.toDataURL("image/jpg");
			  return dataURL;
			}
			var base64 = getBase64Image(document.getElementById("headerImg"));
	    </script>
	    <style>
	    	#jstbl {
	    		background-color: white;
	    	}
	    </style>
	    <?php 
	    	if(isset($_GET['id']) && isset($_GET['type']) && $_GET['type']=='pdf'){
				echo '<div id="jstbl" class="col-md-12 table-responsive">';
				echo '<h3>'.$results_config->header.'</h3>';
				$sql = "SELECT * from reports where id = (:id);";
				$query = $dbh->prepare($sql);
				$query-> bindParam(':id', $_GET['id'], PDO::PARAM_STR);
				$query->execute();
				$result=$query->fetch(PDO::FETCH_OBJ);
				
				//$jsonDecoded = json_decode($result->content, true);
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
						$data[]=$row;
					}
				}
				$heads = array_keys($data[0]);
				$tbl = "<table class='table table-bordered'><thead><tr>";
				$th = "";
				for($i=0;$i<count($heads);$i++){
					$th.="<th>".$heads[$i]."</th>";
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
					location.href = 'dashboard.php';
					
				</script>";
			}
			// pdf.addImage(base64, 130, 10, 40, 40);
			// 		pdf.addHTML($('#jstbl').get(0), function(){
			// 			pdf.save('".$filename."');	
			// 			})
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
				$filename = 'admin/files/'.$_SESSION['alogin'].' report '.$result1->name.'.csv';
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
				location.href = 'dashboard.php';
				</script>";
			}
	    ?>
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
	    			let report_id = $(this).data('id');
	    			let xaxis = $(this).data('xaxis');
	    			let yaxis = $(this).data('yaxis');
	    			let title = $(this).data('name');
	    			let type = $(this).data('type');
	    			let query = $(this).data('query');
	    			let xaxisArray = [];
	    			let yaxisArray = [];
	    			$("#reportGraphModal .xaxis").html("X Axis: " + xaxis);
	    			$("#reportGraphModal .yaxis").html("Y Axis: " + yaxis);
	    			$.ajax({
			            type: "POST",
			            url: './admin/functions/method.php',
			            data: {id: report_id, method: 'get_report_content' },
			            dataType: 'json',
			            success: function(result) {
			            	let content = result['content'];
			            	content.forEach(item => {
			    				xaxisArray.push(item[xaxis])
			    				if(!item[yaxis]) yaxisArray.push(0);
			    				else {
			    					let value;
			    					if(item[yaxis].indexOf('$') > -1) value = Number(item[yaxis].split('$')[1].replaceAll(',', ''));
			    					else value = Number(item[yaxis].replaceAll(',', ''));
			    					if(!value) value = 0;
			    					yaxisArray.push(value);
			    				}
			    				
			    			});
			    			// 			var chartOptions;
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
								      // row: {
								      //   colors: ['#F5F5F5', 'transparent'], // takes an array which will be repeated on columns
								      //   opacity: 0.8
								      // },
								    },
								    xaxis: {
								      categories: xaxisArray,
								    },
								    yaxis: {
								      tickAmount: 5,
								    },
								    tooltip: {
									  shared: true,
									  intersect: false
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
								      categories: xaxisArray
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
							var lineChart = new ApexCharts(
							    document.querySelector("#line-chart"),
							    chartOptions
							);
							lineChart.render();
							$("#reportGraphModal").modal('show');
			            }
			        });
	    			
	    

					
	    		});
	    		
	    		

	    		
	    	});
	    </script>
	</body>
</html>