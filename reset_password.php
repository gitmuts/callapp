<?php
ob_start();
session_start();
include_once("connection.php");
$email = $_POST['username'];
$date = date('Y-m-d h:m:s');
$query = mysqli_query($con,"select * from tapp_user_login where email='".$email."'");
if(mysqli_num_rows($query)>0)
{
	$key = md5($email). uniqid();
	$query = mysqli_query($con,"insert into tapp_reset_pass(email,unique_key,date_time) values('".$email."','".$key."','".$date."')");
	$message = 'Hi,<br> You just requested to reset your password. click the link below to reset your password.<br><br>Note:- The link will be expired once you click the link and the link is valid for 24 hr.<br>here is the link http://ezoffer.us/smsapp_new/re-set_password.php?key='.$key;
	require("class.phpmailer.php");
	$mail = new PHPMailer();
$mail->IsSMTP();
$mail->MailerDebug = false;
$mail->CharSet="UTF-8";
//$mail->SMTPSecure = 'ssl';
$mail->Host = 'smtpout.secureserver.net';
$mail->Port = 80;
$mail->Username = 'info@virtuemantra.com';
$mail->Password = 'vm@123';
$mail->SMTPAuth = true;
$mail->SMTPDebug = 1;
$mail->From ='info@virtuemantra.com';
$mail->FromName ='SMSApp';
$mail->AddAddress($email);
//$mail->AddReplyTo($email,'Information');
$mail->IsHTML(true);

$mail->Subject ='Reset Password';

$mail->Body =$message;
//$mail->send();
if (!$mail->send())
	{
     "Mailer Error: " . $mail->ErrorInfo;
	$_SESSION['failure_message'] = 'There was an error to send reset password link. Please try again.';
} else 
{
     $_SESSION['flash_message'] = 'A reset Password link has been sent to '.$email;
}


	
	
	
}
else
{
	$_SESSION['failure_message'] = 'The email you enter does not exists.';
}
header("location:index.php");
ob_flush();
?>