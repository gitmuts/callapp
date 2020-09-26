<?php
$filename = "Sent_messages.csv";
 $num_msg = $_GET['num_msg'];
  $year = $_GET['year'];
 $month = $_GET['month'];
 
//set headers to download file
header( 'Content-Type: text/csv' );
header( 'Content-Disposition: attachment;filename='.$filename);
 
$file = fopen('php://output', 'w');            
    
									
									
//set the column names
$cells[] = array('S.No.', 'Number', 'Twilio Number', 'Message', 'Date' );
     include("connection.php");
	                if($num_msg=='' && $year=='')
					{
					
					$result=mysqli_query($con,"select * from tapp_sent_msg_log");
					}
					else if($num_msg=='')
					{
					
					$result=mysqli_query($con,"select * from tapp_sent_msg_log where  MONTH( date_time ) =$month AND YEAR( date_time ) =$year    order by date_time desc");
					}
					else
					{
					
					$result=mysqli_query($con,"select * from tapp_sent_msg_log where sms_number='".$num_msg."' or message  like '%".$num_msg."%' ");
					}
									$i=1;
									while($row=mysqli_fetch_array($result))
									{                             
//pass all the form values
$cells[] = array( $i, $row['sms_number'], $row['twilio_num'], $row['message'],  $row['date_time'] );
$i++;
} 
foreach($cells as $cell)
{
	fputcsv($file,$cell);
}
fclose($file); 

?>