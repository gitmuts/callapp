<?php
/**
 * @Author: Sanjay bhatt
 * @Date:   2016-02-15 14:05:55
 * @Last Modified by:   NADIM AHMAD
 * @Last Modified time: 2017-12-26 18:18:40
 */
ob_start();
session_start();
include("connection.php");

$id =  $_POST['id'] ;
$user_name=$_POST['user_name'];
$email=$_POST['email'];
$email_old=$_POST['email_old'];
$password = $_POST['password'];
$profile_image = $_FILES["profileimage"]["name"];
$folder="img/avatars/";
$get_old_pass = mysqli_query($con,"select * from tapp_user_login where email='".$email."' and password='".$password."'");
if(mysqli_num_rows($get_old_pass)<1)
{
	$password = md5($_POST['password']);
}
if($email==$email_old)
{
if($_FILES["profileimage"]["name"]){move_uploaded_file($_FILES["profileimage"]["tmp_name"], "$folder".$_FILES["profileimage"]["name"]);$sql=mysqli_query($con,"update tapp_user_login set user_name='".$user_name."',email='".$email."',password='".$password."',profile_image='".$profile_image."',date_time=now() where id='".$id."'");}else{$sql=mysqli_query($con,"update tapp_user_login set user_name='".$user_name."',email='".$email."',password='".$password."',date_time=now() where id='".$id."'");}if($sql){	$_SESSION['flash_message'] ='User updated successfully.';}else{	$_SESSION['failure_message'] = 'Sorry! Something went wrong.';}

}
else
{
$query = mysqli_query($con,"select * from tapp_user_login where email='".$email."'");if(mysqli_num_rows($query)>0){	$_SESSION['failure_message'] = $email.' Is already exists.';}else{	if($_FILES["profileimage"]["name"]){move_uploaded_file($_FILES["profileimage"]["tmp_name"], "$folder".$_FILES["profileimage"]["name"]);$sql=mysqli_query($con,"update tapp_user_login set user_name='".$user_name."',email='".$email."',password='".$password."',profile_image='".$profile_image."',date_time=now() where id='".$id."'");}else{$sql=mysqli_query($con,"update tapp_user_login set user_name='".$user_name."',email='".$email."',password='".$password."',date_time=now() where id='".$id."'");}if($sql){	$_SESSION['flash_message'] ='User updated successfully.';}else{	$_SESSION['failure_message'] = 'Sorry! Something went wrong.';}}
}

header('Location:user_list.php');

ob_flush();
?>