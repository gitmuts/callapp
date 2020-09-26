<?php
include('connection.php');
$sql = "UPDATE tapp_groups SET status = 'N' WHERE status = 'Y'";
$result = mysqli_query($con,$result);
if(!$result){
	echo "Change";
}
else{
	echo "Not Change";
}


?>