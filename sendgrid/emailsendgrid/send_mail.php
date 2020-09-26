<?php
ob_start();
session_start();
include('../connection.php');
require 'vendor/autoload.php';
$to_email = $_POST['email'];
if($_POST['message']) {
	$message = $_POST['message'];
}
else {
	$message = $_POST['message1'];
}
$subject = $_POST['subject'];
$email = new \SendGrid\Mail\Mail(); 
$email->setFrom("info@veronicastext.website", "veronicastext");
$email->setSubject($subject);
$email->addTo($to_email);
$apikey = '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';
$sendgrid = new \SendGrid($apikey);

try {
	$email->addContent(
    "text/html", $message
);
    $response = $sendgrid->send($email);
    $status = $response->statusCode();
    if($status=="200" || $status=="201" || $status=="202"){
        $message = mysqli_real_escape_string($con,$message);
        $sql1 = mysqli_query($con,"INSERT INTO tapp_sent_email_log(service_type,email,twilio_num,message,date_time) VALUES (' ','".$to_email."',' ','".$message."',now())");
	   $_SESSION['flash_message'] = 'Mail has been sent to '.$to_email;
    }
    else {
        $_SESSION['failure_message'] = 'You have used all 100 monthly emails for your Email API free trial';
    }
} catch (Exception $e) {
    echo 'Caught exception: '. $e->getMessage() ."\n";
    $_SESSION['failure_message'] = 'Mail has been not sent to '.$to_email;
}
header("location: ../single_mail.php");
ob_flush();
?>