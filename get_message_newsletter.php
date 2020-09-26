<?php
/**
 * @Author: Sanjay bhatt
 * @Date:   2016-02-15 14:05:55
 * @Last Modified by:   sanjay
 * @Last Modified time: 2016-02-12 18:18:40
 */
ob_start();
session_start();
include("connection.php");

$url =  $_POST['url'] ;
$message1 =  $_POST['message'] ;
$message=$message1.' '.$url;
$message_date =  $_POST['msg_date'] ;

echo "not exist";
$query = mysqli_query($con,"insert into tapp_message_newsletter(message,message_date,date_time) values('".$message."','".$message_date."',NOW())");
echo "insert into tapp_message_newsletter(message,message_date,date_time) values('".$message."','".$message_date."',NOW())";

if (!$query) {
header("Location:message_for_newsletter.php?s=0");
  echo "df";
  }

  else{

header("Location:message_for_newsletter.php?s=1");
}


ob_flush();


?>