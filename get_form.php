<?php
$dbhost = 'localhost';

$dbuser = 'cubemrl_smsapp';

$dbpass = 'smsapp@567';

$dbname = 'cubemrl_smsapp';
$con= new mysqli($dbhost, $dbuser, $dbpass,$dbname);
$a = mysqli_query($con,"SHOW TABLES FROM $dbname");

//mysql_select_db("sendmach_sms",$con);

if ($con->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$name = $_POST['name'];
$number = $_POST['number'];
$email = $_POST['email'];
$message = mysqli_real_escape_string($con,$_POST['msg']);
$file = $_POST['image'];
// $path = "https://needtopawn.com/wp-content/uploads/wpcf7-submissions/".$file;
$path = $file;
 $sql = "INSERT INTO tapp_msg_receive (sender,body,date_time,read_status,msg_read,twilio_num,mediaUrl) VALUES ('$number','$message',now(),'Y','0','15612207296','$path')";
$sql_2 = "INSERT INTO table_data (sender,body,date_time,sending_status)VALUES('$number','$message',now(),'S')";
mysqli_query($con,$sql_2);
 if(mysqli_query($con,$sql))
 {
 	echo "Data Inserted";
 }
 else
 {
 	echo "Data Not Inserted-->".mysqli_error($con);

 }
?>