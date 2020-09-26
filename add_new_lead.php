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

$mobile = $_POST['mobile'];

$first_name=$_POST['first_name'];
$email=$_POST['email'];

$address=$_POST['address'];
$status=$_POST['status'];
$job_title=$_POST['job_title'];
$job_location=$_POST['job_location'];
$date=$_POST['date_lead'];
$interest_level=$_POST['interest_level'];
$source=$_POST['source'];

$check_dup = mysqli_query($con,"select * from tapp_tbl_leads where sender = '".$mobile."'");
if(mysqli_num_rows($check_dup)<1)
{
$sql=mysqli_query($con,"insert into tapp_tbl_leads (sender,first_name,last_name,email,country,date_time,address,postal_code,job_title,job_location,lead_date,interest_level,source,status) values('".$mobile."','".$first_name."','','".$email."','',now(),'".$address."','','".$job_title."','".$job_location."','".$date."','".$interest_level."','".$source."','".$status."')");
if($sql)
{
	$_SESSION['flash_message'] = 'Lead Added Successfully.';
}
else
{
$_SESSION['failure_message'] = 'Sorry! Something went wrong.';	
}
}
else{
	$_SESSION['failure_message'] = $mobile.' is already exists'; 
}
header("Location:leads.php");



ob_flush();

?>