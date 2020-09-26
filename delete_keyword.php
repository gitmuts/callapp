<?php
ob_start();
include("connection.php");
$type =  $_GET['f'] ;
if($type=='unsub')
{
$sql=mysqli_query($con,"delete from tapp_unsub_keywords where id='".$_GET['id']."'");

echo "delete from health_products where id='".$_GET['id']."'";

header("Location:keywords.php?s=2");
}
else
{
$sql=mysqli_query($con,"delete from tapp_keywords where id='".$_GET['id']."'");

echo "delete from health_products where id='".$_GET['id']."'";

header("Location:keywords.php?s=2");
}
exit();
ob_flush();
?>