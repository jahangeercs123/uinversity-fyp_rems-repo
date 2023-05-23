<?php
session_start();

include('config.php');

$time=time()+10;
$res=mysqli_query($con,"update user set last_login=$time where is_login='yes'");

?>