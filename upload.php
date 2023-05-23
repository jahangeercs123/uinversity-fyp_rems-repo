<?php

//upload.php

/*$folderPath = 'upload/';

$image_parts = explode(";base64,", $_POST['image']);
$image_type_aux = explode("image/", $image_parts[0]);
$image_type = $image_type_aux[1];
$image_base64 = base64_decode($image_parts[1]);
$file = $folderPath . uniqid() . '.png';

file_put_contents($file, $image_base64);

echo $file;*/
session_start();
include("config.php");
if(isset($_POST["image"]))
{
	$data = $_POST["image"];

	$image_array_1 = explode(";", $data);

	$image_array_2 = explode(",", $image_array_1[1]);

	$data = base64_decode($image_array_2[1]);
	$imgrand=random_int(00000,99999);
	$imageName ='admin/user/'. $imgrand. '.jpg';
	$row=mysqli_fetch_assoc(mysqli_query($con,"select uimage from user where uid=".$_SESSION['uid']));
	unlink($row['uimage']);
	if(mysqli_query($con,"update user set uimage='$imageName' where uid=".$_SESSION['uid']))
	{
		file_put_contents($imageName, $data);
		echo 1;
	}
	else {
		echo 0;
	}

}







?>