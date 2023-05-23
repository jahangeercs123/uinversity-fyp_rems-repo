<?php
// Initialize the session

session_start();
 include 'config.php';
// Unset all of the session variables
mysqli_query($con,"update user set is_login='no' where uid=".$_SESSION['uid']);
$_SESSION = array();
unset($_SESSION['uid']);
unset($_SESSION['uemail']);
 
// Destroy the session.
session_destroy();
 
// Redirect to login page
header("location: index.php");
exit;
?>