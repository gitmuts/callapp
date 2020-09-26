<?php
ob_start();
session_start();
include("connection.php");
$sql=mysqli_query($con,"delete from tapp_groups where group_name='".$_GET['group']."'");
if($sql){	$_SESSION['flash_message'] = 'Group deleted successfully';}else{	$_SESSION['failure_message'] = 'Sorry! Something went wrong';}
header("Location:add_group_numbers.php");

exit();

ob_flush();

?>