<?php
include('connection.php');
    // Sender's phone numer
    $from_number = $_REQUEST["From"];
    $from = str_replace('+','',$from_number);
    // Receiver's phone number - Plivo number
    $to_number = $_REQUEST["To"];
    $to = str_replace('+','',$to_number);
   // $to ='19166750234';
   // $from= '12093127983';
    // The SMS text message which was received
    $text = $_REQUEST["Text"];
    $body1 = strtolower($text);
    // Output the text which was received to the log file.
    error_log("Message received - From: $from_number, To: $to_number, Text: $text");
    //$body1 ='hello plivo sms testing for receiving';
    if($body1 == 'stop' || $body1 == 'Stop')
{
	$query = mysqli_query($con,"insert into tapp_blacklist values('".$from."','stop',now())");
}

$sqlrec4 = mysqli_query($con,"insert into tapp_msg_receive (sender,body,date_time,read_status,msg_read,twilio_num) values('".$from."','".$body1."',now(),'N','0','".$to."')");
$sqlrec5 = mysqli_query($con,"insert into table_data (sender,body,date_time,sending_status) values('".$from."','".$body1."',now(),'R')");
?>