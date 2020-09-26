<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
ob_start();
session_start();

include("connection.php");
require("class.phpmailer.php");



	 /*********************************sending code for mail ***************************************/
// $configs = mysqli_query($con,"select * from tapp_email_configuaration");
 //while($row = mysqli_fetch_array($query))
 //{
 //$from = $row['from_email'];
 //$add_reply= $row['add_reply_to'];
 //}

	$add_reply="abc";
	
			$query11 = mysqli_query($con,"select * from  tapp_sent_email order by date_time desc limit 140");

		

while($row=mysqli_fetch_array($query11))

		{
		$id=  $row['id'];
		$email=  $row['email'];
		$num1=  "+".$number ;
		$twilio_number=  $row['twilio_num'];
		$msg=  $row['message'];

		/**
		* To send a text message.
		*
		*/

		// Step 1: Declare new NexmoMessage.



		echo "try";
		
	$to = $email;
$subject = 'texting84.com Notification';
$from='usmanchatha1996@gmail.com';

$headers = 'From: $from' . "\r\n" .
    'Reply-To: $add_reply' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
// send email
if(mail($to,$subject,$msg))
{
echo "sent";
$sql1 = mysqli_query($con,"INSERT INTO tapp_sent_email_log(service_type,email,twilio_num,message,date_time) VALUES ('','".$email."','','".$msg."',now())");
echo "mail se";
				$sql2 = mysqli_query($con,"delete from tapp_sent_email  where id='".$id."'");
}
else
{
$_SESSION['failure_message'] = "Sorry! Mail couldn't sent to ".$email;
}


	    usleep(3600);
		}
	

	
ob_flush();
?>