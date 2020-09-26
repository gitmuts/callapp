<?php
ob_start();
session_start();
include("connection.php");


$delete = mysqli_query($con,"delete  from tapp_template_msg  where id='".$_POST['id']."'");
if($delete)
{
$_SESSION['flash_message'] = 'Template message has been deleted successfully';
}
else{
$_SESSION['failure_message'] = "Sorry! There was an error";
}




	header("location:templates.php");
?>