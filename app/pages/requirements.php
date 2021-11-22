<?php 
$ReqCheck = $Requirement->check([ 
    './database/Connection.inc.php',
    './app/templates/php_template.php',
]);
?>
<div class="content">
    <div class="row">
	    <div class="col-sm-12">

			<table>
				<h3>Directory/File Permission</h3>
				<thead>
					<tr><td>Directory/File Path</td><td width="100">Writable</td></tr>
				</thead>
				<tbody>
					<?php foreach ($ReqCheck['permissions'] as $key => $value) { ?>
					<tr><td><?php echo $key; ?></td><td><?php echo $value ?></td></tr>
					<?php } ?> 
				</tbody> 
			</table>

			<table>
				<h3>Require Extensions</h3>
				<thead>
					<tr><td>Load Extensions</td><td width="100">Status</td></tr>
				</thead>
				<tbody>
					<?php foreach ($ReqCheck['extensions'] as $key => $value) { ?>
					<tr><td><?php echo $key; ?></td><td><?php echo $value ?></td></tr>
					<?php } ?> 
				</tbody> 
			</table>
			 
			<table>
				<h3>Require Version</h3>
				<thead>
					<tr><td>Load Version</td><td>Status</td></tr>
				</thead>
				<tbody>
					<?php foreach ($ReqCheck['versions'] as $key => $value) { ?>
					<tr><td><?php echo $key; ?></td><td><?php echo $value ?></td></tr>
					<?php } ?> 
				</tbody> 
			</table>
			 
			<div class="divider"></div>
			<a href="?step=setup" class="cbtn pull-right">Next <i class="fa fa-forward"></i></a>
			<a href="?step=intro" class="cbtn pull-right"><i class="fa fa-backward"></i> Previous </a>
		</div>
	</div>
</div>
