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



$key =  $_POST['keyword'] ;
$mes =  $_POST['message'] ;

$message= mysqli_real_escape_string($con, stripslashes($mes));



$query = mysqli_query($con,"insert into tapp_predrafted_message(message,date_time,keywords) values('".$message."',NOW(),'".$key."')");

echo "insert into tapp_predrafted_message(message,date_time) values('".$message."',NOW())";

if (!$query) {

header("Location:predrafted_keywords.php?s=0");

  } 

  

  else{

	

header("Location:predrafted_keywords.php?s=1");

}

ob_flush();



?>