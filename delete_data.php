<?php
ob_start();
session_start();
include("connection.php");
$table_name = $_POST['table_name'];
$page_name = $_POST['page_name'];
$flash_message = $_POST['flash_message'];
$failure_message = $_POST['failure_message'];
$id = $_POST['id'];
$sql = mysqli_query($con,"delete from $table_name where id='".$id."' ");
if($sql)
{
	$_SESSION['flash_message'] = $flash_message;
}
else
{
		$_SESSION['failure_message'] = $failure_message;

}
header("Location:$page_name");
exit();
ob_flush();
?>