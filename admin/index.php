<?php 
	session_start();
	include("config.php");
	$error="";
	
$msg='';
$ip=ip();
$attemp_time=time();
$time=time()-60;
function ip()
{
	return $_SERVER['REMOTE_ADDR'];
}
if(isset($_POST['login']))
{
	


	$res=mysqli_fetch_assoc(mysqli_query($con,"select count(*) as total_count from count_attempt where time_stamp>$time and ip_address='$ip'"));
	$login_count=$res['total_count'];

	if($login_count==3)
	{
		$msg="You Done Exceed Number Of Login Attempts Please Wait";
	}
	else{

		
	$username=mysqli_real_escape_string($con,$_POST['user']);
	$password=mysqli_real_escape_string($con,$_POST['pass']);
	$password=sha1($password);
	
	$sql="select * from admin where auser='$username' and apass='$password'";
	$result=mysqli_query($con,$sql);
	$row=mysqli_fetch_assoc($result);
	if(mysqli_num_rows($result)>0)
	{
	mysqli_query($con,"delete  from count_attempt where ip_address='$ip'");
	$_SESSION['auser']=$username;
	header("location:dashboard.php");
	die();
	}
	else
	{
		$login_count++;
		$remain_count=3-$login_count;
		if($remain_count==0)
		{
			$msg="You Done Exceed Number Of Login Attempts Please Wait 24 Hours";
		}
		else{
		$sql="insert into count_attempt (time_stamp,ip_address)values('$attemp_time','$ip')";
		$result=mysqli_query($con,$sql);
		$msg="Invaild username and password <br> $remain_count attempts are Remaining.";
		}
	}

	}


	
}


?>
<!DOCTYPE html>
<html lang="en">
    
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>Admin Login</title>
		
		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
		
		<!-- Main CSS -->
        <link rel="stylesheet" href="assets/css/style.css">
		
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
		
    </head>
    <body>
	
		<!-- Main Wrapper -->
        <div class="page-wrappers login-body">
            <div class="login-wrapper">
            	<div class="container">
                	<div class="loginbox">
                        <div class="login-right">
							<div class="login-right-wrap">
								<h1>Admin Login Panel</h1>
								<p class="account-subtitle">Access to our dashboard</p>
								<p style="color:red;"><?php echo $msg; ?></p>
								<!-- Form -->
								<form method="post">
									<div class="form-group">
										<input class="form-control" name="user" type="text" placeholder="User Name">
									</div>
									<div class="form-group">
										<input class="form-control" type="password" name="pass" placeholder="Password">
									</div>
									<div class="form-group">
										<button class="btn btn-primary btn-block" name="login" type="submit">Login</button>
									</div>
								</form>
								
																
							</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<!-- /Main Wrapper -->
		
		<!-- jQuery -->
        <script src="assets/js/jquery-3.2.1.min.js"></script>
		<!-- Bootstrap Core JS -->
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
		
		<!-- Custom JS -->
		<script src="assets/js/script.js"></script>
		
    </body>

</html>