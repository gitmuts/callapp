<?php
ob_start();
include('connection.php');
include('connection_test.php');

/*require "twilio/Services/Twilio.php";
$AccountSid = "AC89bf8152f59edd0287d7247a0ce3c877";
$AuthToken = "50b91e537def6c5af4a93975a0ce7ae1";
$client = new Services_Twilio($AccountSid, $AuthToken);*/

# Plivo AUTH ID
$AUTH_ID = 'MAMZQXODKWZJRHY2QXMT';
# Plivo AUTH TOKEN
$AUTH_TOKEN = 'ODVkYzk2MmUxOGQ2YjUzN2UzMjE2ZTgwYWU1YmRi';
# SMS sender ID.
$src = '+12162497830';
$message=$_POST['message'];
$message=str_replace("'", "", $message);

$sms_number=str_replace('+','',$_POST['number']);
 $query33 = mysqli_query($con,"select * from twilio_numbers") ;

	while($row3 = mysqli_fetch_array($query33) ) 
	{
	$client_name=$row3['client_name'];
	 $twilio_number=$row3['number'];
	}

$result=mysqli_query($conn,"select * from black_list where sms_number='".$sms_number."'");
$i=1;
 $row11=mysqli_num_rows($result);
if($row11>0)
{
header('Location:single_sms.php?f=1');
}
else
{
if(strlen($sms_number)==10)
{
echo $sms_number1='+1'.$sms_number;
echo $sms_number;

try
			{

				
			//$sms = $client->account->messages->sendMessage($twilio_number,$sms_number1,$message);
			
			$url = 'https://api.plivo.com/v1/Account/'.$AUTH_ID.'/Message/';
$data = array("src" => "$src", "dst" => "$sms_number1", "text" => "$message");
$data_string = json_encode($data);
$ch=curl_init($url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
curl_setopt($ch, CURLOPT_HEADER, true);
curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
curl_setopt($ch, CURLOPT_USERPWD, $AUTH_ID . ":" . $AUTH_TOKEN);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
echo $response = curl_exec( $ch );
curl_close($ch);
			echo "Message has been sent";
			$sql1 = mysqli_query($con,"INSERT INTO stored_numbers(sms_number,message) VALUES ('".$sms_number."','".$message."')");

			}
			catch (Exception $e)
			{
			$sql1 = mysqli_query($con,"INSERT INTO stored_numbers(sms_number,message) VALUES ('".$sms_number."','".$message."')");

			}


}
header('Location:single_sms.php?f=2');
}
exit();
ob_flush(); ?>
