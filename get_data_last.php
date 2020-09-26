<?php
include('connection.php');
require "twilio/Services/Twilio.php";
//$AccountSid = "AC0805cbe925d50c27ea53161253ff5ec9";
//$AuthToken = "65ac49a4f15a826693a2ccd75bb38918";
//$client = new Services_Twilio($AccountSid, $AuthToken);
$from=$_REQUEST['From'];
//$from='+61410640540';
$to=$_REQUEST['To'];
//$to='+61429293636';
$body1=$_REQUEST['Body'];
//$body1='Hello this is Nitesh from virtuemantra.com';
$from=substr($from,1);
$to=substr($to,1);

$sqlrec4 = mysqli_query($con,"insert into tapp_msg_receive (sender,body,date_time,read_status,msg_read,twilio_num) values('".$from."','".$body1."',now(),'N','0','".$to."')");
$sqlrec5 = mysqli_query($con,"insert into table_data (sender,body,date_time,sending_status) values('".$from."','".$body1."',now(),'R')");

?>


