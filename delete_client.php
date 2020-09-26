<?php
ob_start();
include("connection.php");
session_start();
$file_name=$_GET['f'];

$res=mysqli_query($con,"delete from tapp_tbl_clients where id='".$_POST['id']."'");
if($res)
{
$_SESSION['flash_message'] = 'Contact Deleted Succssfully!';
}
else{
$_SESSION['failure_message'] = "Sorry! There was an error";
}

header("location:clients.php");
ob_flush();
exit();
?>