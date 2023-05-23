<?php
session_start();
require("config.php");
////code
 
if(!isset($_SESSION['auser']))
{
	header("location:index.php");
}

//// code insert
//// add code
$error="";
$msg="";
if(isset($_POST['add']))
{
	$pid=$_REQUEST['id'];
	$title=$_POST['title'];
	$content=$_POST['content'];
	$stype=$_POST['stype'];
	$bed=$_POST['bed'];
	$balc=$_POST['balc'];
	$hall=$_POST['hall'];
	$bath=$_POST['bath'];
	$kitc=$_POST['kitc'];
	$floor=$_POST['floor'];
	$price=$_POST['price'];
	$city=$_POST['city'];
	$asize=$_POST['asize'];
	$loc=$_POST['loc'];
	$state=$_POST['state'];
	$status=$_POST['status'];
	$uid=$_SESSION['uid'];
	$feature=$_POST['feature'];
	$totalfloor=$_POST['totalfl'];
	$ptype=$_POST['ptype'];
	// $aimage=$_FILES['aimage']['name'];
	// $aimage1=$_FILES['aimage1']['name'];
	// $aimage2=$_FILES['aimage2']['name'];
	// $aimage3=$_FILES['aimage3']['name'];
	// $aimage4=$_FILES['aimage4']['name'];
	// $fimage=$_FILES['fimage']['name'];
	// $fimage1=$_FILES['fimage1']['name'];
	// $fimage2=$_FILES['fimage2']['name'];
	// $temp_name  =$_FILES['aimage']['tmp_name'];
	// $temp_name1 =$_FILES['aimage1']['tmp_name'];
	// $temp_name2 =$_FILES['aimage2']['tmp_name'];
	// $temp_name3 =$_FILES['aimage3']['tmp_name'];
	// $temp_name4 =$_FILES['aimage4']['tmp_name'];
	// $temp_name5 =$_FILES['fimage']['tmp_name'];
	// $temp_name6 =$_FILES['fimage1']['tmp_name'];
	// $temp_name7 =$_FILES['fimage2']['tmp_name'];
	// move_uploaded_file($temp_name,"admin/property/$aimage");
	// move_uploaded_file($temp_name1,"admin/property/$aimage1");
	// move_uploaded_file($temp_name2,"admin/property/$aimage2");
	// move_uploaded_file($temp_name3,"admin/property/$aimage3");
	// move_uploaded_file($temp_name4,"admin/property/$aimage4");
	// move_uploaded_file($temp_name5,"admin/property/$fimage");
	// move_uploaded_file($temp_name6,"admin/property/$fimage1");
	// move_uploaded_file($temp_name7,"admin/property/$fimage2");



	
	
	$sql = "UPDATE property SET title= '{$title}', pcontent= '{$content}', stype='{$stype}',
	bedroom='{$bed}', bathroom='{$bath}', balcony='{$balc}', kitchen='{$kitc}', hall='{$hall}',  `floor` ='{$floor}', 
	size='{$asize}', price='{$price}',`location`='{$loc}', city='{$city}', `status`='{$state}', feature='{$feature}',
	
	`uid`='{$uid}', `status`='{$status}',	totalfloor='{$totalfloor}' WHERE pid = {$pid}";
	
	
	

	$result=mysqli_query($con,$sql);
	if($result == true)
	{
		$msg="<p class='alert alert-success'>Property Updated</p>";
		header("Location:propertyview.php?msg=$msg");
	}
	else{
		$msg="<p class='alert alert-warning'>Property Not Updated</p>";
		header("Location:propertyview.php?msg=$msg");
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>LM HOMES | Property</title>
		
		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
		
		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
		
		<!-- Feathericon CSS -->
        <link rel="stylesheet" href="assets/css/feathericon.min.css">
		
		<!-- Main CSS -->
        <link rel="stylesheet" href="assets/css/style.css">
		
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
    </head>
    <body>

		
			<!-- Header -->
			<?php include("header.php"); ?>
			<!-- /Sidebar -->
			
			<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col">
								<h3 class="page-title">Property</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
									<li class="breadcrumb-item active">Property</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="full-row">
            <div class="container">
                    <div class="row">
						<div class="col-lg-12">
							<h2 class="text-secondary double-down-line text-center">Update Property</h2>
                        </div>
					</div>
                    <div class="row p-5 bg-white">
                        <form method="post" enctype="multipart/form-data">
								
								<?php
									
									$pid=$_REQUEST['id'];
									$query=mysqli_query($con,"select * from property where pid='$pid'");
									
									
									while($row=mysqli_fetch_row($query))
									{
								?>
												
								<div class="description">
									<h5 class="text-secondary">Basic Information</h5><hr>
										<div class="row">
											<div class="col-xl-12">
												<div class="form-group row">
													<label class="col-lg-2 col-form-label">Title</label>
													<div class="col-lg-9">
														<input required type="text" class="form-control" name="title"  value="<?php echo $row['1']; ?>">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-2 col-form-label">Description</label>
													<div class="col-lg-9">
														<textarea class="tinymce form-control" name="content" rows="10" cols="30"><?php echo $row['2']; ?></textarea>
													</div>
												</div>
												
											</div>
											<div class="col-xl-6">
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Selling Type</label>
													<div class="col-lg-9">
														<select class="form-control"  name="stype">
															<option value="villa">Select Status</option>
															<option value="rent">Rent</option>
															<option value="sale">Sale</option>
														</select>
													</div>
												</div>
												
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Bathroom</label>
													<div class="col-lg-9">
														<input required type="text" class="form-control" name="bath"  value="<?php echo $row['5']; ?>">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Kitchen</label>
													<div class="col-lg-9">
														<input required type="text" class="form-control" name="kitc"  value="<?php echo $row['7']; ?>">
													</div>
												</div>
												
											</div>   
											<div class="col-xl-6"><!-- FOR MORE PROJECTS visit: codeastro.com -->
												<div class="form-group row mb-3">
													
													
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Bedroom</label>
													<div class="col-lg-9">
														<input required type="text" class="form-control" name="bed"  value="<?php echo $row['4']; ?>">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Balcony</label>
													<div class="col-lg-9">
														<input required type="text" class="form-control" name="balc"  value="<?php echo $row['6']; ?>">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Hall</label>
													<div class="col-lg-9">
														<input required type="text" class="form-control" name="hall"  value="<?php echo $row['8']; ?>">
													</div>
												</div>
												
											</div>
										</div>
										<h5 class="text-secondary">Price & Location</h5><hr>
										<div class="row">
											<div class="col-xl-6">
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Floor</label>
													<div class="col-lg-9">
														<select class="form-control"  name="floor">
															<option value="">Select Floor</option>
															<option value="1st Floor">1st Floor</option>
															<option value="2nd Floor">2nd Floor</option>
															<option value="3rd Floor">3rd Floor</option>
															<option value="4th Floor">4th Floor</option>
															<option value="5th Floor">5th Floor</option>
														</select>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Price</label>
													<div class="col-lg-9">
														<input required type="text" class="form-control" name="price"  value="<?php echo $row['11']; ?>">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">City</label>
													<div class="col-lg-9">
														<input required type="text" class="form-control" name="city"  value="<?php echo $row['13']; ?>">
													</div>
												</div>
												<div class="form-group row">
													
												</div>
											</div><!-- FOR MORE PROJECTS visit: codeastro.com -->
											<div class="col-xl-6">
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Total Floor</label>
													<div class="col-lg-9">
														<select class="form-control"  name="totalfl">
															<option value="">Select Floor</option>
															<option value="1 Floor">1 Floor</option>
															<option value="2 Floor">2 Floor</option>
															<option value="3 Floor">3 Floor</option>
															<option value="4 Floor">4 Floor</option>
															<option value="5 Floor">5 Floor</option>
															<option value="6 Floor">6 Floor</option>
															<option value="7 Floor">7 Floor</option>
															<option value="8 Floor">8 Floor</option>
															<option value="9 Floor">9 Floor</option>
															<option value="10 Floor">10 Floor</option>
															<option value="11 Floor">11 Floor</option>
															<option value="12 Floor">12 Floor</option>
															<option value="13 Floor">13 Floor</option>
															<option value="14 Floor">14 Floor</option>
															<option value="15 Floor">15 Floor</option>
														</select>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Area Size</label>
													<div class="col-lg-9">
														<input required type="text" class="form-control" name="asize"  value="<?php echo $row['10']; ?>">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Address</label>
													<div class="col-lg-9">
														<input required type="text" class="form-control" name="loc"  value="<?php echo $row['12']; ?>">
													</div>
												</div>
												
											</div>
										</div>
										
										<div class="form-group row">
													<label class="col-lg-2 col-form-label">Status</label>
													<div class="col-lg-6">
														<select class="form-control"   name="status">
															<option value="">Select Status</option>
															<option value="available">Available</option>
															<option value="sold out">Sold Out</option>
														</select>
													</div>
												</div>
										</div>
												
										

										
											<input required type="submit" value="Submit" class="btn btn-success"name="add" style="margin-left:200px;">
										
									</div>
								</form>
								
							<?php
								} 
							?>
                    </div>            
            </div>
        </div>
				
				</div>			
			</div>
			<!-- /Main Wrapper -->

		
		<!-- jQuery -->
        <script src="assets/js/jquery-3.2.1.min.js"></script>
		<script src="assets/plugins/tinymce/tinymce.min.js"></script>
		<script src="assets/plugins/tinymce/init-tinymce.min.js"></script>
		<!-- Bootstrap Core JS -->
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
		
		<!-- Slimscroll JS -->
        <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
		
		<!-- Custom JS -->
		<script  src="assets/js/script.js"></script>
		
    </body>

</html>