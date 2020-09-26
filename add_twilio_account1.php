<?php





/**





 * @Author: Sanjay bhatt





 * @Date:   2016-02-15 14:05:55





 * @Last Modified by:   Nadim Ahmad





 * @Last Modified time: 2016-02-12 18:18:40





 */





ob_start();

session_start();

include("connection.php");



 $service_type =  $_POST['service_type'] ;
 $sid =  $_POST['sid'] ;

$token =  $_POST['token'] ;

$check_dup = mysqli_query($con,"select * from tapp_twilio_account where twilio_sid='".$sid."' and twilio_token='".$token."'");
if(mysqli_num_rows($check_dup)>0)
{
	$_SESSION['failure_message']='Account already exists';
}
else{
	
$sql=mysqli_query($con,"insert tapp_twilio_account  (service_type,twilio_sid,twilio_token,date_time) values('".$service_type."','".$sid."','".$token."',now())");

 

if (!$sql) {

$_SESSION['failure_message'] = 'Sorry! Something went wrong.';

  } 

  else{


$_SESSION['flash_message'] = 'Account has been added successfully.';
}
}
header("Location:add_twilio_account.php?s=3");

?>