<?php
    // Sender's phone numer
    $from_number = $_REQUEST["From"];
    // Receiver's phone number - Plivo number
    $to_number = $_REQUEST["To"];
    // The SMS text message which was received
    $text = $_REQUEST["Text"];
    // Output the text which was received to the log file.
    error_log("Message received - From: $from_number, To: $to_number, Text: $text");
	$sqlrec4 = mysqli_query($con,"insert into tapp_msg_receive (sender,body,date_time,read_status,msg_read) values('".$from."','".$body1."',now(),'N','0')");
$sqlrec5 = mysqli_query($con,"insert into tapp_table_data (sender,body,date_time,sending_status) values('".$from_number."','".$text."',now(),'R')");
?>