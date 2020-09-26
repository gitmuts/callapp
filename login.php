<?php

ob_start();

session_start();



// Turn off all error reporting

error_reporting(0);



include("connection.php");

$user_name=$_POST['username'];

$password=$_POST['password'];



//$password = (md5($_POST["password"]));



$query = mysqli_query($con,"select * from tapp_user_login where email='".$user_name."' AND password ='".$password."' ");

echo "select * from pia_login where username='".$user_name."' AND password ='".$password."' ";

$num_rows = mysqli_num_rows($query);

if($num_rows == '1'){



$_SESSION['user']=$user_name;

header("Location: form.php");

} 

else 

{

header("Location: dashboard.php?v=0");

}  



ob_flush();









?>