<?php
ob_start();
include("connection.php");
$type =  $_GET['f'] ;

$sql=mysqli_query($con,"delete from tapp_user_login where id='".$_GET['id']."'");

echo "delete from health_products where id='".$_GET['id']."'";

header("Location:user_list.php?s=2");
exit();
ob_flush();
?>