<?php
ob_start();
session_start();
include('connection.php');
$unique_id = 'unique_id'.uniqid();
	$query = mysqli_query($con,"select * from tapp_twilio_number where number like '%".$_POST['twilio_number']."'") ;
$check_blacklist = mysqli_query($con,"select * from tapp_blacklist where number like '%".$_POST['number']."%'");
if(mysqli_num_rows($check_blacklist)<1)
{
	while($row = mysqli_fetch_array($query) )
	{
	 $sid=$row['twilio_sid'];
	$token=$row['twilio_token'];
	$service_type=$row['service_type'];
	}
	 $num=$_POST['number'];

$twilio_number=$_POST['twilio_number'];
$mes=$_POST['message'];
$str = str_replace(PHP_EOL, '', $mes);
$message= mysqli_real_escape_string($con, stripslashes($str));
$message= str_replace('rnrn','',$str);
 $msg= str_replace('\r',' ',$message);
  $msg = preg_replace('/\s+/', ' ', $msg);

require "twilio/Services/Twilio.php";

$AccountSid = $sid;

$AuthToken = $token;

$client = new Services_Twilio($AccountSid, $AuthToken);

$mediaUrl ='';
include_once('get_dir.php');
$target_dir = get_dir();
if(isset($_FILES["file"]["name"]))
{
    if($_FILES["file"]["name"] != '')
    {
   $temp = explode(".", $_FILES["file"]["name"]);
$newfilename = round(microtime(true)) . '.' . end($temp);
move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $newfilename);
 $mediaUrl = 'http://'.$_SERVER['SERVER_NAME'].$target_dir.'upload/'.$newfilename;
    }
}


	try
	{
		if(isset($_FILES["file"]["name"]))
{
	//echo "file name found<br>";
	if($_FILES["file"]["name"] != '')
	{
		//echo "file not blank<br>";
				$sms = $client->account->messages->sendMessage($twilio_number,$num,$msg,$mediaUrl);
	}
	else{
		//echo "file blank<br>";
		$sms = $client->account->messages->sendMessage($twilio_number,$num,$msg);
	}

}
else {

		$sms = $client->account->messages->sendMessage($twilio_number,$num,$msg);
}
		echo $sms->sid;
		$sql1 = mysqli_query($con,"INSERT INTO tapp_sent_msg_log(sms_number,twilio_num,message,images,bulk_name,date_time) VALUES ('".$num."','".$twilio_number."','".$message."','".$mediaUrl."','".$unique_id."',now())");
		$sqlrec5 = mysqli_query($con,"insert into table_data (sender,body,date_time,sending_status) values('".$num."','".$msg."',now(),'S')");
		$_SESSION['flash_message'] = 'Message has been sent to '.$num;
	}
	catch (Exception $e)
	{
	echo $e->getMessage();
		$sql1 = mysqli_query($con,"INSERT INTO tapp_sent_msg_failed(sms_number,twilio_num,message,images,bulk_name,date_time) VALUES ('".$num."','".$twilio_number."','".$message."','".$mediaUrl."','".$unique_id."',now())");
$_SESSION['failure_message'] = "Sorry! SMS couldn't sent to ".$num;
	}
	
	
}
else
{
	$_SESSION['failure_message'] = "Sorry! the number is blacklisted or user stop the receiving sms";
}
			header('Location:clients.php?f=2');

exit();

ob_flush(); ?>



