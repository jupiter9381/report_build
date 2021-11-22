<?php 
    include './functions/fn_install.php';
    include './app/Config.php'; 
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Installation Wizard - PHP | <?= (!empty($title) ? $title : null) ?></title>
        <link rel="icon" href="public/img/logo.svg" sizes="any" type="image/svg+xml">
        <link rel="stylesheet" href="public/css/bootstrap.min.css">
        <link rel="stylesheet" href="public/css/font-awesome.min.css">
        <link rel="stylesheet" href="public/css/style.css">
        <script src="public/js/jquery.min.js"></script>
    </head>
    <body>
        <div class="container">

            <div class="row"> 
                <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1"> 
                    <div class="main_wrapper">
                        <div class="page-header"> 
                            <h1><img src="public/img/logo.svg" width="80px" height="50px" /> Installation Wizard - PHP</h1>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <ul class="nav nav-pills nav-stacked">
                                  <li role="presentation" class="<?= (($title == 'Requirements') ? "active" : null) ?>"><a href="?step=requirements"><i class="fa fa-server"></i> Requirements</a></li>
                                  <li role="presentation" class="<?= (($title == 'Setup') ? "active" : null) ?>"><a href="?step=setup"><i class="fa fa-wrench"></i> Setup</a></li>
                                  <li role="presentation" class="<?= (($title == 'Complete') ? "active" : null) ?>"><a href="javascript:void(0)"><i class="fa fa-check"></i> Complete</a></li>
                                </ul>
                            </div>

                            <div class="col-sm-9">
                                <div class="content">
                                    <?php include($content) ?>
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ENDS OF CONTAINER -->  
        
        <script src="public/js/script.js"></script>
    </body>
</html>