<?php
include('connection.php');
    // Sender's phone numer
    $from_number = $_REQUEST["From"];
    // Receiver's phone number - Plivo number
    $to_number = $_REQUEST["To"];
    // Status of the message
    $status = $_REQUEST["Status"];
    $body = $_REQUEST["Text"];
    // Message UUID
    $uuid = $_REQUEST["MessageUUID"];

    // Prints the status of the message
    echo("From: $from_number, To: $to_number, Status: $status, MessageUUID: $uuid");
	if($status == 'sent' || $status == 'delivered')
	{
	$sql1 = mysqli_query($con,"INSERT INTO tapp_sent_msg_log(service_type,sms_number,twilio_num,message,date_time) VALUES ('plivo','".$to_number."','".$from_number."','".$body."',now())");
	
	}
	else
	{
	
	$sql1 = mysqli_query($con,"INSERT INTO tapp_sent_msg_failed(service_type,sms_number,twilio_num,message,date_time) VALUES ('plivo','".$to_number."','".$from_number."','".$body."',now())");
}
	?>