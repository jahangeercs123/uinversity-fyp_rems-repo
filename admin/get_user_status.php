<?php
session_start();
include('config.php');

$time=time();
$res=mysqli_query($con,"select * from user where utype='user'");
$i=1;
$html='';

while($row=mysqli_fetch_assoc($res)){
	$status='Offline';
	$class="btn-danger";
	if($row['last_login']>$time){
		$status='Online';
		$class="btn-success";
	}
	$html.='<tr>
                  <th scope="row">'.$i.'</th>
                  
                 <td>'.$row['uname'].'</td>
                 <td>'.$row['uemail'].'; </td>
                 <td>'.$row['uphone'].'</td>
                 <td>'. $row['utype'].'</td>
				<td><img src="../'. $row['uimage'].'" height="50px" width="50px"></td>
                <td><a href="userdelete.php?id='. $row['uid'].'"><button class="btn btn-danger">Delete</button></a></td>
				<td><a ><button class="btn '. $class.'">'.$status.'</button></a></td>
               </tr>';
	$i++;
}
echo $html;

?>