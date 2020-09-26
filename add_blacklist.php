<?php
session_start();
include_once('connection.php');
$query = mysqli_query($con,"insert into tapp_blacklist(number,keyword,datetime) values('".$_POST['number']."','1',now())");
if($query)
{
$_SESSION['flash_message'] = 'Number has been added to blacklist';
}
else
{
$_SESSION['failure_message'] = "Could'nt add the Number to blacklist";
}
header("location:blacklist_numbers.php");
?>