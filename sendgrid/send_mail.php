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

$email->setFrom("info@thecodexsolutions.website", "thecodexsolutions");
$email->setSubject($subject);
$email->addTo($to_email);
$email->addContent("text/html", $message);
// print_r($email);
$apikey = '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';
$sendgrid = new \SendGrid($apikey);
try {
    $response = $sendgrid->send($email);
    $status = $response->statusCode();
    if($status=="200" || $status=="201" || $status=="202"){
        $message = mysqli_real_escape_string($con,$message);

        $sql12 = mysqli_query($con,"INSERT INTO email_log (email,sent_email_id,created_at) VALUES ('".$message."','N/A',now())");
        $sql = mysqli_query($con,"SELECT max(id) from email_log");
        while ($data = mysqli_fetch_assoc($sql)) {
             $sent_email_id = $data['max(id)'];
        }
        $sql1 = mysqli_query($con,"INSERT INTO tapp_sent_email_log(service_type,email,twilio_num,message,date_time) VALUES (' ','".$to_email."',' ','".$sent_email_id."',now())");
	   $_SESSION['flash_message'] = 'Mail has been sent to '.$to_email;
    }
    else {
        $_SESSION['failure_message'] = 'You have used all 100/day emails for your Email API free trial';
    }
} catch (Exception $e) {
    echo 'Caught exception: '. $e->getMessage() ."\n";
    $_SESSION['failure_message'] = 'Mail has been not sent to '.$to_email;
}
header("location: ../single_mail.php");
ob_flush();
?>