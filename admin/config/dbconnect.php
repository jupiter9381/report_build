<?php 
if(explode('/', $_SERVER['REQUEST_URI'])[1] == 'admin'){
	include('../database/Connection.inc.php');	
} else {
	include('database/Connection.inc.php');
}

// DB credentials.
define('DB_HOST',$database->hostname);
define('DB_USER',$database->username);
define('DB_PASS',$database->password);
define('DB_NAME',$database->database);
// Establish database connection.
try {
	$dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));

} catch (PDOException $e) {
exit("Error: " . $e->getMessage());
}
?>
