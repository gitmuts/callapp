<?php
ob_start();
session_start();
$email = $_POST['email'];
$password = md5($_POST['password']);
include_once("connection.php");
$query = mysqli_query($con,"update tapp_user_login set password='".$password."' where email='".$email."'");
if(!$query)
{
	$_SESSION['failure_message'] = 'Something went wrong to reset your password! Please try again.';
}
else
{
	$_SESSION['flash_message'] = 'Password changed successfully. Please login to continue';
}
header("location:login.php");
ob_flush();
?>