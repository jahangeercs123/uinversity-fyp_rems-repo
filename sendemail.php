<?php
include("config.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';


$mail = new PHPMailer(true);

try {
 
                  
    $mail->isSMTP();                                           
    $mail->Host       = 'smtp.gmail.com';                     
    $mail->SMTPAuth   = true;                                   
    $mail->Username   = 'ubunerstudent@gmail.com';                    
    $mail->Password   = 'apydosgfgmjnzmab';                             
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
    $mail->Port       = 465;                                    

    
    $mail->setFrom('ubunerstudent@gmail.com');
    $email=$_POST['email'];
    $mail->addAddress($email);   //reciver addAddress          
    $otp=random_int(0000000,999999);

    $mail->isHTML(true);                                 
    $mail->Subject = 'OTP';
    $mail->Body    = 'This is you otp '.$otp;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'yes';
    mysqli_query($con,"delete from user_otp where email='$email'");
    mysqli_query($con,"insert into user_otp(email,otp) values('$email',$otp)");
} catch (Exception $e) {
    echo "NO";
}