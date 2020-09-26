<?php
ob_start();
include("connection.php");

$number=$_GET['number'];

$explode_file=explode(',',$number);

$size=sizeof($explode_file);
echo $size;

for($f=0;$f<$size;$f++)
{
mysqli_query($con,"update msg_receive set read_status='Y' where sender='$explode_file[$f]' ");

}

header("Location:received_messages_new.php?s=4");

ob_flush();
?>