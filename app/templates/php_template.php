<?php 
/*
* requirements
*   mysql  php <= v5.5 
*   mysqli php >= v5.0 
*   pdo    php >= v5.1  
* include database class
*   include 'db/Database.php';
* create a object for database
*   $db = new Database();
* use database (mysql, mysqli, pdo)
*   $db->Pdo(), $db->MySql(), $db->MySqli(); //return connection true or die
*/

// establish connection
$database = new Database();

if($database->MySql() == true) {
    $database->MySql();
} else if($database->MySqli() == true) {
    $database->MySqli(); 
} else if($database->Pdo() == true) {
    $database->Pdo();
}

// class defination
class Database
{ 
    public $hostname = "|HOSTNAME|";
    public $username = "|USERNAME|";
    public $password = "|PASSWORD|"; 
    public $database = "|DATABASE|";   
    public $email    = "|EMAIL|";
    public function MySql()
    {
        //connect to server
        if (version_compare(phpversion(), '5.5', '<')) {
            $conn = mysql_connect($this->hostname, $this->username, $this->password);
            if (!$conn) {
                die('Could not connect: ' . mysql_error());
            }

            // connect to database
            $db = mysql_select_db($this->database, $conn);
            if (!$db_selected) {
                die ('Could not select database: ' . mysql_error());
            } else {
                return true;
            }
        } else {
            return false;
        }

    }

    //create connection for mysqli
    public function MySqli()
    {
        //connect to server & database
        $conn = new \mysqli(
            $this->hostname, 
            $this->username, 
            $this->password, 
            $this->database
        );

        if ($conn->connect_error) {
            die('Could not connect: ' . mysqli_error());
        } else {
            return true;
        }

        $conn->close();
    }

    //create connection for pdo
    public function Pdo()
    {

        //connect to server & database
		try {
		    $conn = new PDO("mysql:host=$this->hostname;dbname=$this->database", $this->username, $this->password);
		    // set the PDO error mode to exception
		    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		    return true;
		} catch (PDOException $e) {
		    echo "Connection failed: " . $e->getMessage();
		}
		$conn = null; 

    }

}
