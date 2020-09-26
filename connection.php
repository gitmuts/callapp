<?php


$dbhost = 'localhost';

$dbuser = 'root';

$dbpass = '!QAZ2wsx';

$dbname = 'snowbros_chessy';
$con= new mysqli($dbhost, $dbuser, $dbpass,$dbname);
$a = mysqli_query($con,"SHOW TABLES FROM $dbname");

$tables = '';
//mysql_select_db("sendmach_sms",$con);

if ($con->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>
