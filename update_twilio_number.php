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

$id =  $_POST['id'] ;
$num =  $_POST['num'] ;
$get_twilio_token = mysqli_query($con,"select * from tapp_twilio_account where twilio_sid='".$_POST['sid']."'");
$service_type = 'twilio';
$is_default = $_POST['is_default'];
if($is_default =='yes')
{
	$set_all_as_not_default = mysqli_query($con,"update tapp_twilio_number set is_default='no' where number <> '".$num."'");
}
while($row_twil = mysqli_fetch_array($get_twilio_token)){	
$token = $row_twil['twilio_token'];
$service_type = $row_twil['service_type'];
}
$client_name =  $_POST['client_name'] ;


$sql=mysqli_query($con,"update tapp_twilio_number set service_type = '".$service_type."',client_name='".$client_name."',number='".$num."',twilio_sid='".$_POST['sid']."',twilio_token='".$token."',is_default='".$is_default."',date_time=now() where id='".$id."'");


if (!$sql) {$_SESSION['failure_message'] = 'Sorry! Something went wrong.';

 
  } 
  
  else{
	$_SESSION['flash_message'] = 'Twilio number updated successfully';

}header("Location:add_twilio_number.php?s=3");

?>