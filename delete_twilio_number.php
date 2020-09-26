<?php
ob_start();
include("connection.php");
$type =  $_GET['f'] ;

$sql=mysqli_query($con,"delete from tapp_twilio_number where id='".$_GET['id']."'");

echo "delete from health_products where id='".$_GET['id']."'";

header("Location:add_twilio_number.php?s=2");
exit();
ob_flush();
?>