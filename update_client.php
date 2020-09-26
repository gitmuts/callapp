<?php

/**

 * @Author: Nadim Ahmad

 * @Date:   2016-02-15 14:05:55

 * @Last Modified by:    Nadim Ahmad

 * @Last Modified time: 2017-12-20

 */

ob_start();

session_start();

include("connection.php");








$id = $_POST['id'];
$mobile = $_POST['mobile'];

$first_name=$_POST['first_name'];
$email=$_POST['email'];

$address=$_POST['address'];




$sql=mysqli_query($con,"update tapp_tbl_clients set sender='".$mobile."',first_name='".$first_name."',email='".$email."',date_time=now(),address='".$address."' where id='".$id."'");
if($sql)
{
	$_SESSION['flash_message'] = 'Contact Updated Successfully.';
}
else
{
$_SESSION['failure_message'] = 'Sorry! Something went wrong.';	
}
header("Location:clients.php");



ob_flush();

?>