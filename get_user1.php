<?php
ob_start();
session_start();
include('connection.php');

$user_name=$_POST['user_name'];
$email=$_POST['email'];
$password=$_POST['password']; if($_FILES["profileimage"]["name"])
{	
$profile_image=$_FILES["profileimage"]["name"]; }
else{
	$profile_image = 'user-default.png';
	}
$folder="img/avatars/";

$query = mysqli_query($con,"select * from tapp_user_login where email='".$email."'");
if(mysqli_num_rows($query)>0){
	echo "hello";
	$_SESSION['failure_message'] = $email.' is already exists.';
	}
else
{	
echo "INSERT INTO tapp_user_login(user_name,email,password,profile_image,date_time) VALUES ('".$user_name."','".$email."','".$password."','".$profile_image."',now())";
move_uploaded_file($_FILES["profileimage"]["tmp_name"], "$folder".$_FILES["profileimage"]["name"]);	
$sql1 = mysqli_query($con,"INSERT INTO tapp_user_login(user_name,email,password,profile_image,date_time) VALUES ('".$user_name."','".$email."','".$password."','".$profile_image."',now())");

$_SESSION['flash_message'] = 'User has been added successfully.';


}
header('Location:user_list.php?s=1');
exit();
ob_flush();
 ?>

