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



$id =  $_POST['id'] ;

$key =  $_POST['keyword'] ;


$mes =  $_POST['message'] ;

$message= mysqli_real_escape_string($con, stripslashes($mes));



$f =  $_GET['f'] ;

if($f=='up')

{

$sql=mysqli_query($con,"update tapp_predrafted_message set message='".$message."',date_time=now(),keywords='".$key."' where id='".$id."'");







if (!$sql) {

header("Location:predrafted_keywords.php?s=0");

  echo "df";

  } 

  

  else{

	

header("Location:predrafted_keywords.php?s=3");

}

}

else

{



$sql=mysqli_query($con,"delete from tapp_predrafted_message where id='".$_GET['id']."'");







echo "delete from health_products where id='".$_GET['id']."'";







header("Location:predrafted_keywords.php?s=2");

}

ob_flush();

?>