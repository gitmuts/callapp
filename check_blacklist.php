<?php
include_once("connection.php");
$number = $_REQUEST['number'];
$blacklist = mysqli_query($con,"select * from tapp_blacklist where number ='".$number."'") ;
if(mysqli_num_rows($blacklist)>0)
{
	echo $blacklist_status = 'Number is blacklisted';
}
else{
	echo $blacklist_status = 'Ready';
}

?>