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
	if($status == 'send' || $status == 'delivered')
	{
	mysqli_query($con,"insert into table_data(sender,body,date_time,sending_status) values('$from_number','$body',now(),'S')");
	
	}
	else
	{
	
	mysqli_query($con,"insert into tapp_table_data(sender,body,date_time,sending_status) values('$from_number','$body',now(),'S')");
}
	?>