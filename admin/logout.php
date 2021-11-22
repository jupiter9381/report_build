<?php
session_start(); 
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 60*60,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}
$user_type = $_SESSION['user_type'];
unset($_SESSION['login']);
unset($_SESSION['alogin']);
unset($_SESSION['user_type']);
//session_destroy(); // destroy session
if($user_type == "viewer") header("location:/index.php"); 
if($user_type == "admin") header("location:index.php"); 
?>

