<?php 
ini_set('session.cache_limiter','public');
session_cache_limiter(false);
session_start();
include("config.php");
if(!isset($_SESSION['uemail']))
{
	header("location:login.php");
}

////// code
$error='';
$msg='';
$uid=$_REQUEST['uid'];

if(isset($_POST['update']))
{
	$name=mysqli_real_escape_string($con,$_POST['name']);
	$email=mysqli_real_escape_string($con,$_POST['email']);
	$phone=mysqli_real_escape_string($con,$_POST['phone']);


	
	
	$uid=$_SESSION['uid'];
	$row=mysqli_fetch_assoc(mysqli_query($con,"select * from user where uid=$uid"));
	if($row['uname']!=$name || $row['uemail']!=$email || $row['uphone']!=$phone){
	if(!empty($name) && !empty($phone) && !empty($email))
	{
		
		$sql="update user set uname='$name', uemail='$email',uphone='$phone' where uid=$uid";
		   $result=mysqli_query($con, $sql);
		   if($result){
			   $msg = "<p class='alert alert-success'>Profail updated Successfully <a href='profile.php'>Go to profail</a></p> ";
		   }
		   else{
			   $error = "<p class='alert alert-warning'>Profail not Updated</p> ";
		   }
	}else{
		$error = "<p class='alert alert-warning'>Please Fill all the fields</p>";
	}
}else{
	$error = "<p class='alert alert-warning'>You cannot done any update!!!!!!!</p> ";
}
}								
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Update Profail</title>
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>        
		<link rel="stylesheet" href="https://unpkg.com/dropzone/dist/dropzone.css" />
		<link href="https://unpkg.com/cropperjs/dist/cropper.css" rel="stylesheet"/>
		<script src="https://unpkg.com/dropzone"></script>
		<script src="https://unpkg.com/cropperjs"></script>
		
		<style>

		.image_area {
		  position: relative;
         
      
		}

		img {
		  	display: block;
		  	max-width: 100%;
		}

		.preview {
  			overflow: hidden;
  			width: 160px; 
  			height: 160px;
  			margin: 10px;
  			border: 1px solid red;
		}

		.modal-lg{
  			max-width: 1000px !important;
		}

		.overlay {
		  position: absolute;
		  bottom: 10px;
		  left: 0;
		  right: 0;
		  background-color: rgba(255, 255, 255, 0.5);
		  overflow: hidden;
		  height: 0;
		  transition: .5s ease;
		  width: 100%;
		}

		.image_area:hover .overlay {
		  height: 50%;
		  cursor: pointer;
		}

		.text {
		  color: #333;
		  font-size: 20px;
		  position: absolute;
		  top: 50%;
		  left: 50%;
		  -webkit-transform: translate(-50%, -50%);
		  -ms-transform: translate(-50%, -50%);
		  transform: translate(-50%, -50%);
		  text-align: center;
		}
		
		</style>
	</head>
	<body>
        
		<div class="container bg-light" align="center">
        <div CLASS="">
			<div class="alert alert-success" id="imgshow"></div>
			<a id="imgtxt" class="btn btn-success btn-block" href="profile.php">Reaload Page</a>
            <?PHP
           echo $msg;
		   echo $error;
		   
         if(isset($_GET['uid'])){
            $q="select * from user where uid=".$_SESSION['uid'];
            if ($_GET['uid']==md5($_SESSION['uid']))
            {
            ?>
			<h3 align="center">Update Profail</h3>
			
			<div class="row ">
				<div class="col-md-4">&nbsp;</div>
				<div class="col-md-4">
					<div class="image_area">
						<form method="post">
							<label for="upload_image">
                            <?PHP $row=mysqli_fetch_assoc(mysqli_query($con,"select * from user where uid=".$_SESSION['uid']))?>
								<img src="<?PHP if(file_exists($row['uimage'])) echo $row['uimage'];?>" id="uploaded_image" style="border-radius:50%;" />
								<div class="overlay">
								    <div class="text">Click to Change Profile Image</div>
								</div>
			    				<input type="file" name="image" class="image" id="upload_image" style="display:none">
                              
			    			</label>
			    		</form>
			    	</div>
			    </div>
    	    	<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
			  	<div class="modal-dialog modal-lg" role="document">
			    	<div class="modal-content">
			      		<div class="modal-header">
			        		<h5 class="modal-title" id="modalLabel">Crop Image Before Upload</h5>
			        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          			<span aria-hidden="true">×</span>
			        		</button>
			      		</div>
			      		<div class="modal-body">
			        		<div class="img-container">
			            		<div class="row">
			                		<div class="col-md-8">
			                    		<img src="" id="sample_image" />
			                		</div>
			                		<div class="col-md-4">
			                    		<div class="preview"></div>
			                		</div>
			            		</div>
			        		</div>
			      		</div>
			      		<div class="modal-footer">
			        		<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
			        		<button type="button" class="btn btn-primary" id="crop">Crop</button>
							<input type="hidden" id="uid" name="uid"  value="<?PHP echo $_SESSION['uid']?>">
			      		</div>
			    	</div>
			  	</div>
                
			</div>	
              
		</div>
		<hr>
        <div class="row justify-content-center">
            <div class=" col-lg-5 col-md-5 col-sm-8 " >
                <div class="jumbotron">
                <form method="post">
                   
                    <div class="form-group ">
                      
                        <input class="form-control" type="text" name="name" require placeholder="Name"  value="<?PHP if(isset($row['uname'])){echo $row['uname'];}?>" />
                    </div>
                    <div class="form-group ">
                        <input class="form-control" type="email" name="email" require placeholder="Email" value="<?PHP if(isset($row['uemail'])){echo $row['uemail'];}?>" />
                    </div>
                    <div class="form-group ">
                        <input class="form-control" type="text" name="phone" require placeholder="phone" value="<?PHP if(isset($row['uphone'])){echo $row['uphone'];}?>"/>
                    </div>
                    <div class="form-group ">
                        <input class="btn btn-success" type="submit" name="update" value="update"/>
                    </div>
                </form>

                </div>
            </div>

        </div>
        </div>
        <?php } else{?>
            <div class="alert alert-danger text">This User name is Not Exist <a href="profile.php"> Back</a></div>
            <?PHP }}else{header("location:profile.php");}?>
        </div>
	</body>
</html>

<script>

$(document).ready(function(){

	// function readURL(input)
	// {
  	// 	if(input.files && input.files[0])
  	// 	{
    // 		var reader = new FileReader();
    
	// 	    reader.onload = function(event) {
	// 	      	$('#uploaded_image').attr('src', event.target.result);
	// 	      	$('#uploaded_image').removeClass('img-circle');
	// 	      	$('#upload_image').after('<div align="center" id="crop_button_area"><br /><button type="button" class="btn btn-primary" id="crop">Crop</button></div>')
	// 	    }
	// 	    reader.readAsDataURL(input.files[0]); // convert to base64 string
  	// 	}
  	// }

  	// $("#upload_image").change(function() {
  	// 	//readURL(this);
	// 	  $("#upload_image").load();
  		
	// });
	
	var $modal = $('#modal');
	var image = document.getElementById('sample_image');
	var cropper;
	$('#imgshow').hide();
	$('#imgtxt').hide();
						
	
	$('#upload_image').change(function(event){
    	var files = event.target.files;
    	var done = function (url) {
      		image.src = url;
      		$modal.modal('show');
    	};
    	
    	if (files && files.length > 0)
    	{
      		
        		reader = new FileReader();
		        reader.onload = function (event) {
		          	done(reader.result);
		        };
        		reader.readAsDataURL(files[0]);
      		
    	}
	});

	$modal.on('shown.bs.modal', function() {
    	cropper = new Cropper(image, {
    		aspectRatio: 1,
    		viewMode: 3,
    		preview: '.preview'
    	});
	}).on('hidden.bs.modal', function() {
   		cropper.destroy();
   		cropper = null;
	});

	$("#crop").click(function(){
    	canvas = cropper.getCroppedCanvas({
      		width: 400,
      		height: 400,
    	});

    	canvas.toBlob(function(blob) {
        	
        	var reader = new FileReader();
         	reader.readAsDataURL(blob); 
         	reader.onloadend = function() {
            	var base64data = reader.result;  
            var uid=$("#uid").val();
            	$.ajax({
            		url: "upload.php",
                	method: "POST",                	
                	data: {image: base64data},
                	success: function(data){
                    	console.log(data);
                    	$modal.modal('hide');
                    	$('#uploaded_image').attr('src', data);
                    	//alert("success upload image");
						$('#imgshow').show();
						$('#imgshow').html("Your Image was uploaded successfully ");
						$('#imgtxt').show();
						
						
                	}
              	});
         	}
    	});
    });
	
});
</script>

