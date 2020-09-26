<?php
/**
 * @Author: Sanjay bhatt
 * @Date:   2016-02-15 14:05:55
 * @Last Modified by:   Nadim Ahmad
 * @Last Modified time: 2016-12-27 18:18:40
 */
ob_start();
session_start();
include("connection.php");
$token = '';
//$client_name =  $_POST['client_name'] ;
$num =  $_POST['num'] ;
$service_type = 'twilio';
$is_default = $_POST['is_default'];
if($is_default =='yes')
{
	$set_all_as_not_default = mysqli_query($con,"update tapp_twilio_number set is_default='no'");
}
$get_twilio_token = mysqli_query($con,"select * from tapp_twilio_account where twilio_sid='".$_POST['sid']."'");
while($row_twil = mysqli_fetch_array($get_twilio_token))
{	
$token = $row_twil['twilio_token'];
$service_type = $row_twil['service_type'];
}

$query11 = mysqli_query($con,"select * from  tapp_twilio_number where number='".$num."'");
while($row=mysqli_fetch_array($query11))
{
$key=  $row['number'] ;
echo $key;
}
if($key==$num)
{
echo "exist";
$_SESSION['failure_message'] = 'Number already exists.';

}
else
{
echo "not exist";
$query = mysqli_query($con,"insert into tapp_twilio_number(service_type,number,twilio_sid,twilio_token,email,is_default,date_time) values('".$service_type."','".$num."','".$_POST['sid']."','".$token."','".$_SESSION['user']."','".$is_default."',NOW())");




if (!$query) {$_SESSION['failure_message'] = 'Sorry! Something went wrong.';
  } 
  
  else{
	$_SESSION['flash_message'] = 'Number has been added successfully.';

}

}header("Location:add_twilio_number.php?s=1");
ob_flush();


?>