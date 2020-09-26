<?php
include_once("connection.php");
session_start();
$query = mysqli_query($con,"update tapp_voice_broadcast set readyToCall='".$_REQUEST['status']."'");
if($query)
{
	$_SESSION['flash_message'] = 'All calls status has been changed';
}
else
{
	$_SESSION['failure_message'] ='Sorry! there was an error to update call status';
}
header("location:pending_calls.php");
?>