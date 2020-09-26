<?php
ob_start();
session_start();
include("connection.php");
$id=$_GET['id'];
$res=mysqli_query($con,"delete from tapp_sent_msg_log where id='".$_GET['id']."'");
if($res)
{
$_SESSION['flash_message'] = 'Message Deleted Succssfully!';
}
else{
$_SESSION['failure_message'] = "Sorry! There was an error";
}

header("location:sent_messages.php");
ob_flush();
exit();
?>