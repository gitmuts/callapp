<?php
include("connection.php");
session_start();
 $number=$_POST['number1'];

$query1 =  mysqli_query($con,"delete from table_data where sender='$number' ");
$query2 =  mysqli_query($con,"delete from tapp_msg_receive where sender='$number' ");

if($query1 == true)
{
	$_SESSION['flash_message'] = 'Reuested conversation has been deleted.';
}
else
{
	$_SESSION['failure_message'] = 'Sorry! there was an error to delete the conversation';
}
header('location:chat.php');
?>
