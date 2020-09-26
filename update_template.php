<?php
ob_start();
session_start();
include("connection.php");
$message = mysqli_real_escape_string($con,$_POST['message']);

$insert = mysqli_query($con,"update  tapp_template_msg set title='".$_POST['title']."',message='".$message."',temp_type='".$_POST['temp_type']."'  where id='".$_POST['id']."'");
if($insert)
{
$_SESSION['flash_message'] = 'Template message has been updated successfully';
}
else{
$_SESSION['failure_message'] = "Sorry! There was an error";
}




	header("location:templates.php");
?>