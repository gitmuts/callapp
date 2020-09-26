<?php
ob_start();
session_start();
include("connection.php");
$message = mysqli_real_escape_string($con,$_POST['message']);
$query = mysqli_query($con,"select * from tapp_template_msg where title='".$_POST['title']."'");
if(mysqli_num_rows($query)<1)
{
$insert = mysqli_query($con,"insert into tapp_template_msg(title,message,temp_type,date_time) values('".$_POST['title']."','".$message."','".$_POST['temp_type']."',now())");
if($insert)
{
$_SESSION['flash_message'] = 'Template message has been saved successfully';
}
else{
$_SESSION['failure_message'] = "Sorry! There was an error";
}

}

else
{
	$_SESSION['failure_message'] = "Sorry! Template already exists";

}
	header("location:templates.php");
?>