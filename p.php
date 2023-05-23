<?PHP

include("config.php");
$time=time();
$r=mysqli_query($con,"select * from user where last_login>$time");

while($row=mysqli_fetch_assoc($r))
{
    echo $row['uname'];
    echo "<br>";
}

print_r($row);


?>