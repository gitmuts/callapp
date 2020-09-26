<?php
$filename = "Outgoing_call_logs.csv";
 
//set headers to download file
header( 'Content-Type: text/csv' );
header( 'Content-Disposition: attachment;filename='.$filename);
 
$file = fopen('php://output', 'w');            
    
									
									
//set the column names
$cells[] = array('S.No.', 'To', 'From',  'Voice',  'Date' );
     include("connection.php");
	               

	$result=mysqli_query($con,"select * from tapp_voice_broadcast_logs order by date_time desc");

	$i=1;
	while($row=mysqli_fetch_array($result))
	{                             
	//pass all the form values
	$cells[] = array( $i, $row['user_number'], $row['twilio_number'],  $row['voice_file'],   $row['date_time'] );
	$i++;
	} 
	foreach($cells as $cell)
	{
	fputcsv($file,$cell);
	}
fclose($file); 

?>