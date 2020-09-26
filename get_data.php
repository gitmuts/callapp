<?php
header('Content-Type: text/html'); 
include('connection.php');
require "twilio/Services/Twilio.php";
date_default_timezone_set('America/Los_Angeles');
$date_time = date('Y-m-d H:i:s');
$from= $_REQUEST['From'];
$to= $_REQUEST['To'];
$body1= $_REQUEST['Body'];
$body12= strtolower($_REQUEST['Body']);
$from=substr($from,1);
$to=substr($to,1);
$mediaUrl ='';
$mediaUrl = $_REQUEST['MediaUrl0'];
$body1 = mysqli_real_escape_string($con,$body1);
if($body12 == 'stop' || $body12 == 'Stop')
{
	$query = mysqli_query($con,"insert into tapp_blacklist(number,keyword,datetime) values('".$from."','stop',now())");
}
if($body12 == 'start' || $body12 == 'Start')
{
	$query = mysqli_query($con,"delete from tapp_blacklist where number ='".$from."'");
}

$sqlrec4 = mysqli_query($con,"insert into tapp_msg_receive (sender,body,date_time,read_status,msg_read,twilio_num,mediaUrl) values('".$from."','".$body1."','".$date_time."','N','0','".$to."','".$mediaUrl."')");
$sqlrec5 = mysqli_query($con,"insert into table_data (sender,body,date_time,sending_status) values('".$from."','".$body1."',now(),'R')");
	$query = mysqli_query($con,"select * from tapp_twilio_number  where number like '%".$to."'") ;


$get_keyword = mysqli_query($con,"select * from tapp_unsub_keywords")or die(mysqli_error($con));
while($row = mysqli_fetch_array($query) )
	{
	 $sid=$row['twilio_sid'];
	$token=$row['twilio_token'];
	 $service_type=$row['service_type'];
	}
	$check_blacklist = mysqli_query($con,"select * from tapp_blacklist where number like '%".$from."%'");
	if(mysqli_num_rows($check_blacklist)<1)

	{
while($rowdata = mysqli_fetch_array($get_keyword))
{

if (strpos($body12, strtolower($rowdata['keyword'])) !== false) {
    $message = $rowdata['message'];
	$AccountSid = $sid;

 $AuthToken = $token;
$num=$from;

$twilio_number=$to;

 $mes=$body1;



$message= mysqli_real_escape_string($con, stripslashes($message));
$msg=$message;
 $num1='+'.$num;
$client = new Services_Twilio($AccountSid, $AuthToken);

// $mediaUrl ='';

	try
	{
		$sms = $client->account->messages->sendMessage($twilio_number,$num1,$msg);

		 $sms->sid;
		$sql1 = mysqli_query($con,"INSERT INTO tapp_sent_msg_log(sms_number,twilio_num,message,images,bulk_name,date_time) VALUES ('".$num."','".$twilio_number."','".$message."','".$mediaUrl."','".$unique_id."',now())");
		$sqlrec5 = mysqli_query($con,"insert into table_data (sender,body,date_time,sending_status) values('".$num."','".$msg."',now(),'S')");
		$_SESSION['flash_message'] = 'Message has been sent to '.$num1;
	}
	catch (Exception $e)
	{
	 $e->getMessage();
		$sql1 = mysqli_query($con,"INSERT INTO tapp_sent_msg_failed(sms_number,twilio_num,message,images,'bulk_name',date_time) VALUES ('".$num."','".$twilio_number."','".$message."','".$mediaUrl."','".$unique_id."',now())");
$_SESSION['failure_message'] = "Sorry! SMS couldn't sent to ".$num1;
	}
}	
}
	}

?>


