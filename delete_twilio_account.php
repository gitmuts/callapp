<?php

ob_start();

include("connection.php");


session_start();

$sql=mysqli_query($con,"delete from tapp_twilio_account where id='".$_POST['id']."'");



if(!$sql)
{
	$_SESSION['failure_message'] = 'Sorry! Something went wrong.';
}

else
{
	$_SESSION['flash_message'] = 'Twilio account has been deleted successfully.';
}

header("Location:add_twilio_account.php?s=2");

exit();

ob_flush();

?>