<?php
ob_start();
include("connection.php");
$type =  $_GET['type'] ;
$id =  $_GET['f'] ;
echo $type;

if($type=='draft')
{

$sql=mysqli_query($con,"delete from tapp_sent_msg where id='".$_GET['id']."'");

echo "delete from health_products where id='".$_GET['id']."'";

header("Location:drafts_messages.php?s=2");
}
else
{

$sql=mysqli_query($con,"delete from tapp_sent_msg where id='".$_GET['id']."'");

echo "delete from health_products where id='".$_GET['id']."'";

header("Location:scheduled.php?s=2");
}
exit();
ob_flush();
?>