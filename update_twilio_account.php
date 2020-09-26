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

$sql=mysqli_query($con,"update tapp_twilio_account set service_type='".$service_type."',twilio_sid='".$sid."',twilio_token='".$token."' where id='".$_POST['id']."'");
 
if (!$sql) {
$_SESSION['failure_message'] = 'Sorry! Something went wrong.';
  } 
  else{
$_SESSION['flash_message'] = 'Account has been updated successfully.';
}
header("Location:add_twilio_account.php?s=3");
?>