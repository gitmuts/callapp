<?php
session_start();
include_once('connection.php');
$query = mysqli_query($con,"delete from  tapp_blacklist where id='".$_GET['id']."'");
if($query)
{
$_SESSION['flash_message'] = 'Number has been deleted';
}
else
{
$_SESSION['failure_message'] = "Could'nt delete the Number ";
}
header("location:blacklist_numbers.php");
?>