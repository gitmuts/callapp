<?php
include('connection.php');
require "twilio/Services/Twilio.php";
//$AccountSid = "AC0805cbe925d50c27ea53161253ff5ec9";
//$AuthToken = "65ac49a4f15a826693a2ccd75bb38918";
//$client = new Services_Twilio($AccountSid, $AuthToken);
$from=$_REQUEST['From'];
//$from='+61410640540';
$to=$_REQUEST['To'];
//$to='+61448104037';
$body1=$_REQUEST['Body'];
//echo $body1='hi';
$from=substr($from,1);
$to=substr($to,1);

$sqlrec4 = mysqli_query($con,"insert into tapp_msg_receive (sender,body,date_time,read_status,msg_read,twilio_num) values('".$from."','".$body1."',now(),'N','0','".$to."')");
$sqlrec5 = mysqli_query($con,"insert into table_data (sender,body,date_time,sending_status) values('".$from."','".$body1."',now(),'R')");

		$query = mysqli_query($con,"select * from tapp_unsub_keywords where keyword='".$body1."'") ;
         $count=mysqli_num_rows($query);
				if($count>0)
				{
					
					
					        while($row = mysqli_fetch_array($query) ) {
								
								 $reply_msg=$row['message'];
								
							}

					
					$query = mysqli_query($con,"select * from tapp_twilio_number where service_type='Twilio'") ;

					while($row = mysqli_fetch_array($query) )
					{
					 $sid=$row['twilio_sid'];
					 $token=$row['twilio_token'];
					$service_type=$row['service_type'];
					}
				//echo "Send Reply to";

					$AccountSid = $sid;

					$AuthToken = $token;

					$client = new Services_Twilio($AccountSid, $AuthToken);




              $to='+'.$to;

				try
				{
					echo "try";
				$sms = $client->account->messages->sendMessage($to,$from,$reply_msg);
				echo $sms->sid;
				$sqlrec5 = mysqli_query($con,"insert into table_data (sender,body,date_time,sending_status) values('".$from."','".$reply_msg."',now(),'S')");

				$sql1 = mysqli_query($con,"INSERT INTO tapp_sent_msg_log(sms_number,twilio_num,message,date_time) VALUES ('".$from."','".$to."','".$reply_msg."',now())");
				$_SESSION['flash_message'] = 'Message has been sent to '.$num1;
				}
				catch (Exception $e)
				{
					
				//echo "catch  :  ".$e->getMessage();
				$sql1 = mysqli_query($con,"INSERT INTO tapp_sent_msg_failed(sms_number,twilio_num,message,date_time) VALUES ('".$from."','".$to."','".$reply_msg."',now())");
				$_SESSION['failure_message'] = "Sorry! SMS couldn't sent to ".$num1;
				}
			
			
		        }
			

?>


