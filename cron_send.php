<?php
ob_start();
session_start();
 require 'vendor/autoload.php';
    use Plivo\RestAPI; 
error_reporting(E_ALL);
ini_set("display_errors", 1);
include("connection.php");
$mediaUrl = '';
$date_time = date('Y-m-d h:i:s');
require "twilio/Services/Twilio.php";
$check_service = mysqli_query($con,"select * from  tapp_sent_msg where scheduled_time < now() order by date_time desc limit 70");
	while($check_service_type = mysqli_fetch_array($check_service))
	{
		$service_type = $check_service_type ['service_type'];
	if($service_type == 'twilio')
	{
		$query = mysqli_query($con,"select * from tapp_twilio_account where service_type='twilio'") ;

	while($row = mysqli_fetch_array($query) )
	{
	$sid=$row['twilio_sid'];
	$service_type=$row['service_type'];
	$token=$row['twilio_token'];
	}

$AccountSid = $sid;
$AuthToken = $token;

$client = new Services_Twilio($AccountSid, $AuthToken);



	$query11 = mysqli_query($con,"select * from  tapp_sent_msg where scheduled_time < now() order by date_time desc limit 70");
	
	
	try
	{
		while($row=mysqli_fetch_array($query11))

		{
			$check_blacklist = mysqli_query($con,"select * from tapp_blacklist where number like '%".$row['sms_number']."%'");
			if(mysqli_num_rows($check_blacklist)<1)
	{
		$id=  $row['id'] ;
		$number=  $row['sms_number'] ;
		$num1=  "+".$number ;
		$twilio_number=  $row['twilio_num'] ;
		$msg=  $row['message'] ;
		$mediaUrl=  $row['images'] ;
		$bulk_name=  $row['bulk_name'] ;
		try
			{
if($mediaUrl != '')
{
	$sms = $client->account->messages->sendMessage($twilio_number,$num1,$msg,$mediaUrl);
}
else
{

				$sms = $client->account->messages->sendMessage($twilio_number,$num1,$msg);	
}
				echo $sms->sid;
					$msg= mysqli_real_escape_string($con, $msg);
				$sql1 = mysqli_query($con,"INSERT INTO tapp_sent_msg_log(sms_number,twilio_num,message,images,bulk_name,date_time) VALUES ('".$number."','".$twilio_number."','".$msg."','".$mediaUrl."','".$bulk_name."',now())");
				$sqlrec5 = mysqli_query($con,"insert into table_data (sender,body,date_time,sending_status) values('".$number."','".$msg."',now(),'S')");
				$sql2 = mysqli_query($con,"delete from tapp_sent_msg  where id='".$id."'");
			}
			catch (Exception $e)
			{
				$msg= mysqli_real_escape_string($con, stripslashes($msg));
				$sql1 = mysqli_query($con,"INSERT INTO tapp_sent_msg_failed(sms_number,twilio_num,message,bulk_name,date_time) VALUES ('".$number."','".$twilio_number."','".$msg."','".$bulk_name."',now())");
				$sql2 = mysqli_query($con,"delete from tapp_sent_msg  where id='".$id."'");
			}

		}
		}
	}
	catch (Exception $e)
	{


	}
	
	}
	else
	{
		$query = mysqli_query($con,"select * from tapp_twilio_account where service_type='plivo'") ;

	while($row = mysqli_fetch_array($query) )
	{
	$sid=$row['twilio_sid'];
	$service_type=$row['service_type'];
	$token=$row['twilio_token'];
	}
		
    $auth_id = $sid;
    $auth_token = $token;

    $p = new RestAPI($auth_id, $auth_token);
$query11 = mysqli_query($con,"select * from  tapp_sent_msg where scheduled_time< '$date_time' order by date_time desc limit 70");
while($row=mysqli_fetch_array($query11))

		{
				$check_blacklist = mysqli_query($con,"select * from tapp_blacklist where number like '%".$row['sms_number']."%'");
			if(mysqli_num_rows($check_blacklist)<1)
	{
$id=  $row['id'] ;
		$number=  $row['sms_number'] ;
		$num1=  "+".$number ;
		$twilio_number=  $row['twilio_num'] ;
		$msg=  $row['message'] ;
    // Set message parameters
    $params = array(
        'src' => $twilio_number, // Sender's phone number with country code
        'dst' => $num1, // Receiver's phone number with country code
        'text' => $msg, // Your SMS text message
        // To send Unicode text
        //'text' => 'こんにちは、元気ですか？' # Your SMS Text Message - Japanese
        //'text' => 'Ce est texte généré aléatoirement' # Your SMS Text Message - French
     //   'url' => 'https://texting84.com/status_report.php', // The URL to which with the status of the message is sent
        'method' => 'POST' // The method used to call the url
    );
    // Send message
    $response = $p->send_message($params);

    // Print the response
    echo "Response : ";
  //  print_r ($response['response']);

    // Print the Api ID
    echo "<br> Api ID : {$response['response']['api_id']} <br>";

    // Print the Message UUID
  echo $a = "Message UUID : {$response['response']['message_uuid'][0]} <br>";
    
    if($a != '')
    {
    $_SESSION['flash_message'] = 'Message has been sent to '.$num1;
    $sql1 = mysqli_query($con,"INSERT INTO tapp_sent_msg_log(service_type,sms_number,twilio_num,message,bulk_name,date_time) VALUES ('plivo','".$number."','".$twilio_number."','".$msg."','".$bulk_name."',now())");
    }
    else
    {
    $_SESSION['failure_message'] = "Sorry! SMS couldn't sent to ".$num1;
    $sql1 = mysqli_query($con,"INSERT INTO tapp_sent_msg_failed(service_type,sms_number,twilio_num,message,bulk_name,date_time) VALUES ('plivo','".$number."','".$twilio_number."','".$msg."','".$bulk_name."',now())");
    }
	$sql2 = mysqli_query($con,"delete from tapp_sent_msg  where id='".$id."'");
		}
		}
	}
	}
	echo "done";


ob_flush();





?>