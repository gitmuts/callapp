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
$status=$_POST['status'];
$job_title=$_POST['job_title'];
$job_location=$_POST['job_location'];
$date=$_POST['date_lead'];
$interest_level=$_POST['interest_level'];
$source=$_POST['source'];


$sql=mysqli_query($con,"update tapp_tbl_leads set sender='".$mobile."',first_name='".$first_name."',email='".$email."',date_time=now(),address='".$address."',status='".$status."',job_title='".$job_title."',job_location='".$job_location."',lead_date='".$date."',interest_level='".$interest_level."',source='".$source."' where id='".$id."'");
if($sql)
{
	$_SESSION['flash_message'] = 'Lead Updated Successfully.';
}
else
{
$_SESSION['failure_message'] = 'Sorry! Something went wrong.';	
}
header("Location:leads.php");



ob_flush();

?>