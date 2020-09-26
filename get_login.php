<?php
ob_start();
session_start();
error_reporting(E_ALL);
include("connection.php");
$user_name=$_POST['username'];
$password = md5($_POST["password"]);
echo "1";
$result = mysqli_query($con,"select * from  tapp_user_login where email='".$user_name."' and password ='".$password."'");
echo "2";
if(mysqli_num_rows($result)>0){
while($row=mysqli_fetch_array($result))
{
$_SESSION['user_type']=$row['type']; $_SESSION['user']=$user_name;
$_SESSION['flash_message']='Welcome '.$user_name;
header("Location: dashboard.php");
}
}
else 
{
	$_SESSION['failure_message']='The email or password you entered is incorrect';
header("Location: index.php?v=0");
}  
ob_flush();
?>