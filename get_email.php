<?php 
session_start();
include_once('connection.php');
$id = $_POST['id'];
$sql = mysqli_query($con,"select * from email_log where id='".$id."'");
while ($data = mysqli_fetch_assoc($sql)) {
	$email_message = $data['email'];
}

echo $email_message;
?>