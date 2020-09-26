<?php
$filename = "received_messages.csv";
 $num_msg = $_GET['num_msg'];
  $year = $_GET['year'];
 $month = $_GET['month'];
 
//set headers to download file
header( 'Content-Type: text/csv' );
header( 'Content-Disposition: attachment;filename='.$filename);
 
$file = fopen('php://output', 'w');            
    
									
									
//set the column names
$cells[] = array('S.No.', 'Mobile Number','Twilio Number', 'Message', 'Date' );
     include("connection.php");
					
					if($num_msg=='' && $year=='')
					{
					
					$result=mysqli_query($con,"select * from msg_receive");
					}
					else if($num_msg=='')
					{
					
					$result=mysqli_query($con,"select * from msg_receive where  MONTH( date_time ) =$month AND YEAR( date_time ) =$year    order by date_time desc");
					}
					else
					{
					
					$result=mysqli_query($con,"select * from msg_receive where sender='".$num_msg."' OR body like '%".$num_msg."%'    order by date_time desc");
					}
									$i=1;
									while($row=mysqli_fetch_array($result))
									{                             
//pass all the form values
$cells[] = array( $i, $row['sender'],$row['twilio_num'], $row['body'],  $row['date_time'] );
$i++;
} 
foreach($cells as $cell)
{
	fputcsv($file,$cell);
}
fclose($file); 

?>