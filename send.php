<?php
require 'vendor/autoload.php';
 use Plivo\RestAPI;
ob_start();
session_start();
include('connection.php');
$twilio_num=$_POST['twilio_num'];
echo $service_type = 'twilio';
$query1 = mysqli_query($con,"select * from tapp_twilio_number where number='".$twilio_num."'") ;
while($row = mysqli_fetch_array($query1))
{
	$service_type = $row['service_type'];
}
	$query = mysqli_query($con,"select * from tapp_twilio_account where service_type='".$service_type."'") ;

	while($row = mysqli_fetch_array($query) )
	{
	$sid=$row['twilio_sid'];
	$token=$row['twilio_token'];
	$service_type=$row['service_type'];
	}
	if($service_type == 'twilio')
	{
require "twilio/Services/Twilio.php";

$AccountSid = $sid;
//echo $AccountSid;
$AuthToken = $token;
//echo $AuthToken;

$client = new Services_Twilio($AccountSid, $AuthToken);

$number=$_POST['number1'];

$msg=$_POST['msg'];
$twilio_num=$_POST['twilio_num'];

$status='S';

$sms_number='+'.$number;
try{
$sms = $client->account->messages->sendMessage($twilio_num,$sms_number,$msg);

echo $sms->sid;
		$msg= mysqli_real_escape_string($con, stripslashes($msg));

//echo "insert into table_data(sender,body,date_time,sending_status) values('$number','$msg',now(),'$status')";
mysqli_query($con,"insert into table_data(sender,body,date_time,sending_status) values('$number','$msg',now(),'$status')");
$_SESSION['flash_message'] = "SMS sent to ".$sms_number;
}
catch (Exception $e)
	{
		$sql1 = mysqli_query($con,"INSERT INTO tapp_sent_msg_failed(sms_number,twilio_num,message,date_time) VALUES ('".$sms_number."','".$twilio_num."','".$msg."',now())");
$_SESSION['failure_message'] = "Sorry! SMS couldn't sent to ".$sms_number;
	}
	}
	else
	{
		
    $auth_id = $sid;
    $auth_token = $token;

    $p = new RestAPI($auth_id, $auth_token);
$query11 = mysqli_query($con,"select * from  tapp_sent_msg order by date_time desc limit 80");
while($row=mysqli_fetch_array($query11))

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
        'url' => 'http://ezoffer.us/smsapp_new/status_report_chat.php', // The URL to which with the status of the message is sent
        'method' => 'POST' // The method used to call the url
    );
    // Send message
    $response = $p->send_message($params);

    // Print the response
    echo "Response : ";
    print_r ($response['response']);

    // Print the Api ID
    echo "<br> Api ID : {$response['response']['api_id']} <br>";

    // Print the Message UUID
    echo "Message UUID : {$response['response']['message_uuid'][0]} <br>";
	$sql2 = mysqli_query($con,"delete from tapp_sent_msg  where id='".$id."'");
		}
	}
header('location:chat.php?number=' .$number);

exit();

ob_flush();
?>