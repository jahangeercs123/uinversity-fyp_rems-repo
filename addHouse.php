

<?php 
ini_set('session.cache_limiter','public');
session_cache_limiter(false);
session_start();
include("config.php");
if(!isset($_SESSION['uemail']))
{
	header("location:login.php");
}

//// code insert
//// add code
$error="";
$msg="";
if(isset($_POST['add']))
{
	
	$title=$_POST['title'];
	$content=$_POST['description'];
	$bed=$_POST['bed'];
	$balc=$_POST['balc'];
	$hall=$_POST['hall'];
	$stype=$_POST['stype'];
	$bath=$_POST['bath'];
	$kitc=$_POST['kitc'];
	$floor=$_POST['floor'];
	$price=$_POST['price'];
	$city=$_POST['city'];
	$asize=$_POST['asize'];
	$loc=$_POST['loc'];
	
	$status=$_POST['status'];
	$uid=$_SESSION['uid'];
	
	
	$totalfloor=$_POST['totalfl'];

	$isFeatured=$_POST['isFeatured'];
	
	$aimage=$_FILES['aimage']['name'];
	$aimage1=$_FILES['aimage1']['name'];
	$aimage2=$_FILES['aimage2']['name'];
	$aimage3=$_FILES['aimage3']['name'];
	$aimage4=$_FILES['aimage4']['name'];
	
	$fimage=$_FILES['fimage']['name'];
	$fimage1=$_FILES['fimage1']['name'];
	$fimage2=$_FILES['fimage2']['name'];
	
	$temp_name  =$_FILES['aimage']['tmp_name'];
	$temp_name1 =$_FILES['aimage1']['tmp_name'];
	$temp_name2 =$_FILES['aimage2']['tmp_name'];
	$temp_name3 =$_FILES['aimage3']['tmp_name'];
	$temp_name4 =$_FILES['aimage4']['tmp_name'];
	
	$temp_name5 =$_FILES['fimage']['tmp_name'];
	$temp_name6 =$_FILES['fimage1']['tmp_name'];
	$temp_name7 =$_FILES['fimage2']['tmp_name'];
	
	move_uploaded_file($temp_name,"admin/property/$aimage");
	move_uploaded_file($temp_name1,"admin/property/$aimage1");
	move_uploaded_file($temp_name2,"admin/property/$aimage2");
	move_uploaded_file($temp_name3,"admin/property/$aimage3");
	move_uploaded_file($temp_name4,"admin/property/$aimage4");
	
	move_uploaded_file($temp_name5,"admin/property/$fimage");
	move_uploaded_file($temp_name6,"admin/property/$fimage1");
	move_uploaded_file($temp_name7,"admin/property/$fimage2");
	$sql="insert into property (title,pcontent,stype,bedroom,bathroom,balcony,kitchen,hall,floor,size,price,location,city,pimage,pimage1,pimage2,pimage3,pimage4,uid,status,mapimage,topmapimage,groundmapimage,totalfloor, isFeatured,ptype)
	values('$title','$content','$stype','$bed','$bath','$balc','$kitc','$hall','$floor','$asize','$price',
	'$loc','$city','$aimage','$aimage1','$aimage2','$aimage3','$aimage4','$uid','$status','$fimage','$fimage1','$fimage2','$totalfloor', '$isFeatured','House')";
	$result=mysqli_query($con,$sql);
	if($result)
		{
			$msg="<p class='alert alert-success'>House Inserted Successfully</p>";
					
		}
		else
		{
			$error="<p class='alert alert-danger'>House Not Inserted Some Error</p>";
		}
}							
?>
<!DOCTYPE html>
<html lang="en">

<head>
<!--  meta tags -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Meta Tags -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="shortcut icon" href="images/favicon.ico">

<!--	Fonts
	========================================================-->
<link href="https://fonts.googleapis.com/css?family=Muli:400,400i,500,600,700&amp;display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Comfortaa:400,700" rel="stylesheet">
<!--side bar -->
<!--	Css Link
	========================================================-->
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-slider.css">
<link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="css/layerslider.css">
<link rel="stylesheet" type="text/css" href="css/color.css">
<link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="fonts/flaticon/flaticon.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/login.css">

<!--	Title
	=========================================================-->
<title>Real Estate PHP</title>
<style>
/* The side navigation menu */
.sidebar {
  margin: 0;
  padding: 0;
  width: 200px;
  background-color: #f1f1f1;
  
  height: 100%;
  overflow: auto;
}

/* Sidebar links */
.sidebar a {
  display: block;
  color: black;
  padding: 16px;
  text-decoration: none;
}

/* Active/current link */
.sidebar a.active {
  background-color: #04AA6D;
  color: white;
}

/* Links on mouse-over */
.sidebar a:hover:not(.active) {
  background-color: #555;
  color: white;
}

/* Page content. The value of the margin-left property should match the value of the sidebar's width property */
div.content {
 
}

/* On screens that are less than 700px wide, make the sidebar into a topbar */
@media screen and (max-width: 700px) {
  .sidebar {
    width: 100%;
    height: auto;
    position: relative;
  }
  .sidebar a {float: left;}
  div.content {margin-left: 0;}
}

/* On screens that are less than 400px, display the bar vertically, instead of horizontally */
@media screen and (max-width: 400px) {
  .sidebar a {
    text-align: center;
    float: none;
  }
}
</style>
</head>
<body>

	<!--Page Loader
=============================================================-->
<div class="page-loader position-fixed z-index-9999 w-100 bg-white vh-100">
	<div class="d-flex justify-content-center y-middle position-relative">
	  <div class="spinner-border" role="status">
		<span class="sr-only">Loading...</span>
	  </div>
	</div>
</div>
 


<div id="page-wrapper">
    <div class="row"> 
        <!--	Header start  -->
		<?php include("include/header.php");?>
        <!--	Header end  -->
        
		<div class="bg-secondary bordered p-2 w-100"></div>
		<!--property submit start -->
		
	<!-- The sidebar -->
	<div class="row">
		<div class="col-md-2">
			<div class="sidebar">
				<a  href="submitproperty.php">Add Apartement</a>
				<a  href="addFlat.php">Add Flat</a>
				<a  href="addOffice.php">Add Office</a>
				<a  href="addHouse.php" class="active">Add House</a>
			</div>

		</div>
		<div class="col-md-10">
			<!-- Page content -->
				<div class="content shadow-lg ml-8 p-4" >
				<form method="post" enctype="multipart/form-data" id="apartment-form">

<div class="description">
	<h5 class="text-secondary">House Information </h5><hr>
	<?php echo $error; ?>
	<?php echo $msg; ?>
	
		<div class="row">
			<div class="col-xl-12">
				<div class="form-group row">
					<label class="col-lg-2 col-form-label">Title</label>
					<div class="col-lg-9">
						<input type="text" class="form-control" name="title" required placeholder="Enter Title">
					</div>
				</div><!-- FOR MORE PROJECTS visit: codeastro.com -->
				<div class="form-group row">
					<label class="col-lg-2 col-form-label">Description</label>
					<div class="col-lg-9">
						<textarea class="tinymce form-control" name="description" rows="10" cols="30"></textarea>
					</div>
				</div>
				
			</div>
			<div class="col-xl-6">
			
				<div class="form-group row">
					<label class="col-lg-3 col-form-label">Selling Type</label>
					<div class="col-lg-9">
						<select class="form-control" required name="stype">
							<option value="">Select Status</option>
							<option  value="rent">Rent</option>
							<option value="sale">Sale</option>
						</select>
					</div>
				</div>
				<div class="form-group row hide" >
					<label class="col-lg-3 col-form-label">Bathroom</label>
					<div class="col-lg-9">
						<input type="text hide" class="form-control" name="bath" required placeholder="Enter Bathroom (only no 1 to 10)">
					</div>
				</div>
				<div class="form-group row hide">
					<label class="col-lg-3 col-form-label">Kitchen</label>
					<div class="col-lg-9">
						<input type="text" class="form-control" name="kitc" required placeholder="Enter Kitchen (only no 1 to 10)">
					</div>
				</div>
				
			</div>   
			<div class="col-xl-6">
				
				<div class="form-group row">
					<label class="col-lg-3 col-form-label">Bedroom</label>
					<div class="col-lg-9">
						<input type="text" class="form-control" name="bed" required placeholder="Enter Bedroom  (only no 1 to 10)">
					</div>
				</div><!-- FOR MORE PROJECTS visit: codeastro.com -->
				<div class="form-group row">
					<label class="col-lg-3 col-form-label">Balcony</label>
					<div class="col-lg-9">
						<input type="text" class="form-control" name="balc" required placeholder="Enter Balcony  (only no 1 to 10)">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-lg-3 col-form-label">Hall</label>
					<div class="col-lg-9">
						<input type="text" class="form-control" name="hall" required placeholder="Enter Hall  (only no 1 to 10)">
					</div>
				</div>
				
			</div><!-- FOR MORE PROJECTS visit: codeastro.com -->
		</div>
		<h5 class="text-secondary">Price & Location</h5><hr>
		<div class="row">
			<div class="col-xl-6">
				<div class="form-group row">
					<label class="col-lg-3 col-form-label">Floor</label>
					<div class="col-lg-9">
						<select class="form-control" required name="floor">
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
						<input type="text" class="form-control" name="price" required placeholder="Enter Price">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-lg-3 col-form-label">City</label>
					<div class="col-lg-9">
						<input type="text" class="form-control" name="city" required placeholder="Enter City">
					</div>
				</div>
			   
			</div>
			<div class="col-xl-6">
				<div class="form-group row">
					<label class="col-lg-3 col-form-label">Total Floor</label>
					<div class="col-lg-9">
						<select class="form-control" required name="totalfl">
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
						<input type="text" class="form-control" name="asize" required placeholder="Enter Area Size (in sqrt)">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-lg-3 col-form-label">Address</label>
					<div class="col-lg-9">
						<input type="text" class="form-control" name="loc" required placeholder="Enter Address">
					</div>
				</div>
				
			</div>
		</div>
		
		<div class="form-group row">
			<label class="col-lg-2 col-form-label">Feature</label>
			<div class="col-lg-9">
		   
		   
			</div>
		</div>
				
		<h5 class="text-secondary">Image & Status</h5><hr>
		<div class="row">
			<div class="col-xl-6">
				
				<div class="form-group row">
					<label class="col-lg-3 col-form-label">Image</label>
					<div class="col-lg-9">
						<input class="form-control" name="aimage" type="file" required="">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-lg-3 col-form-label">Image 2</label>
					<div class="col-lg-9">
						<input class="form-control" name="aimage2" type="file" required="">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-lg-3 col-form-label">Image 4</label>
					<div class="col-lg-9">
						<input class="form-control" name="aimage4" type="file" required="">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-lg-3 col-form-label">Status</label>
					<div class="col-lg-9">
						<select class="form-control"  required name="status">
							<option value="">Select Status</option>
							<option value="available">Available</option>
							<option value="sold out">Sold Out</option>
						</select>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-lg-3 col-form-label">Basement Floor Plan Image</label>
					<div class="col-lg-9">
						<input class="form-control" name="fimage1" type="file">
					</div><!-- FOR MORE PROJECTS visit: codeastro.com -->
				</div>
			</div>
			<div class="col-xl-6">
				
				<div class="form-group row">
					<label class="col-lg-3 col-form-label">Image 1</label>
					<div class="col-lg-9">
						<input class="form-control" name="aimage1" type="file" required="">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-lg-3 col-form-label">image 3</label>
					<div class="col-lg-9">
						<input class="form-control" name="aimage3" type="file" required="">
					</div>
				</div>
				
				<div class="form-group row">
					<label class="col-lg-3 col-form-label">Floor Plan Image</label>
					<div class="col-lg-9">
						<input class="form-control" name="fimage" type="file">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-lg-3 col-form-label">Ground Floor Plan Image</label>
					<div class="col-lg-9">
						<input class="form-control" name="fimage2" type="file">
					</div>
				</div>
			</div>
		</div>

		<hr>

		<div class="row"><!-- FOR MORE PROJECTS visit: codeastro.com -->
			<div class="col-md-6">
				<div class="form-group row">
					<label class="col-lg-3 col-form-label"><b>Is Featured?</b></label>
					<div class="col-lg-9">
						<select class="form-control" required name="isFeatured">
							<option value="">Select...</option>
							<option value="0">No</option>
							<option value="1">Yes</option>
						</select>
					</div>
				</div>
			</div>
		</div>

		
			<input type="submit" value="Submit Property" class="btn btn-info"name="add" style="margin-left:200px;">
		
</div>
</form>

	</div>


		
	
		
		
		

		
	<!--property submit end-->

        
        
        <!--	Footer   start-->
		<?php include("include/footer.php");?>
		<!--	Footer   start-->
        
        <!-- Scroll to top --> 
        <a href="#" class="bg-secondary text-white hover-text-secondary" id="scroll"><i class="fas fa-angle-up"></i></a> 
        <!-- End Scroll To top --> 
    </div>
</div>
<!-- Wrapper End --> 
<!-- FOR MORE PROJECTS visit: codeastro.com -->
<!--	Js Link
============================================================--> 
<script src="js/jquery.min.js"></script> 
<script src="js/tinymce/tinymce.min.js"></script>
<script src="js/tinymce/init-tinymce.min.js"></script>
<!--jQuery Layer Slider --> 
<script src="js/greensock.js"></script> 
<script src="js/layerslider.transitions.js"></script> 
<script src="js/layerslider.kreaturamedia.jquery.js"></script> 
<!--jQuery Layer Slider --> 
<script src="js/popper.min.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/owl.carousel.min.js"></script> 
<script src="js/tmpl.js"></script> 
<script src="js/jquery.dependClass-0.1.js"></script> 
<script src="js/draggable-0.1.js"></script> 
<script src="js/jquery.slider.js"></script> 
<script src="js/wow.js"></script> 
<script src="js/custom.js"></script>

</body>
<script>


	
</script>
</html>