<?php
//handling error reporting  
error_reporting(E_ALL);
// session start 
//ini_set('session.save_path', './public/tmp');
ini_set('session.use_trans_sid', false);
ini_set('session.use_cookies', true);
ini_set('session.use_only_cookies', true);
$https = false;
if(isset($_SERVER['HTTPS']) and $_SERVER['HTTPS'] != 'off') $https = true;
$dirname = rtrim(dirname($_SERVER['PHP_SELF']), '/').'/';
session_name('installer');
session_set_cookie_params(0, $dirname, $_SERVER['HTTP_HOST'], $https, true);
session_start();

//including vendor/autoload.php
require_once __DIR__.'/../vendor/autoload.php';
 
use App\Core\DatabaseMigration as DB;
use App\Core\WriteContent      as Write;
use App\Core\FormValidation    as Validation;
use App\Core\FileUpload        as Upload;
use App\Core\AppRequirements   as Requirement;
$DB          = new DB();
$Write       = new Write();
$Validation  = new Validation();
$Upload      = new Upload();
$Requirement = new Requirement();

// ------------------DEFAULT VARIABLES----------------
define('PHP_DATABASE_OUTPUT',   '../../database/Connection.inc.php');
define('PHP_DATABASE_TEMPLATE', '../templates/php_template.php');    
define('INSTALL_FLAG',          './system.config');  
define('SQL_FILE_PATH',          dirname(__DIR__).'\public\files\MySql.sql'); 
define('SQL_FILE',              '../../public/files/MySql.sql');

define('SERVER_URL',              'http://localhost:82');  


// -------------CHECK FLAG IS EXISTS------------------
$Validation->checkFlag(INSTALL_FLAG);

// -----------------MENU & VARIABLE SET---------------
if (!empty($_GET['step'])) {
    switch ($_GET['step']) {
        case 'requirements':
            $content = './app/pages/requirements.php';
            $title   = 'Requirements';
            //generate token 
            unset($_SESSION['csrf_token']);
            $_SESSION['csrf_token'] = $Validation::csrfToken(); 
            break;
        case 'setup':
            $content = './app/pages/setup.php';
            $title   = 'Setup';
            break;
        case 'complete':
            $content = './app/pages/complete.php';
            $title   = 'Complete';
            //install flag file
			$Write->createFileWithDirectory([
			 'outputPath' => INSTALL_FLAG, 
			 'content'    => date('d-m-Y h:i:s')
			]); 
			// delete a file
			$Write->deleteFile(SQL_FILE); 

            break;
        
        default:
            $content = './app/pages/requirements.php';
            $title   = 'Requirements';
			//generate token 
			unset($_SESSION['csrf_token']);
			$_SESSION['csrf_token'] = $Validation::csrfToken();
            break;
    }
} else {
    $content = './app/pages/requirements.php';
    $title   = 'Requirements';
	//generate token 
	unset($_SESSION['csrf_token']);
	$_SESSION['csrf_token'] = $Validation::csrfToken();
}  



 