<?php
$filename = "Unsuscribers_Numbers.csv";

//set headers to download file
header( 'Content-Type: text/csv' );
header( 'Content-Disposition: attachment;filename='.$filename);
 
$file = fopen('php://output', 'w');            
    
									
									
//set the column names
$cells[] = array('S.No.', 'Group Name', 'First Name', 'Last Name', 'Number', 'Date' );
     include("connection.php");
	                
					
					
					$result=mysqli_query($con,"select * from tapp_groups_log");
					
					
									$i=1;
									while($row=mysqli_fetch_array($result))
									{                             
//pass all the form values
$cells[] = array( $i, $row['group_name'], $row['first_name'], $row['last_name'], $row['number'],  $row['date_time'] );
$i++;
} 
foreach($cells as $cell)
{
	fputcsv($file,$cell);
}
fclose($file); 

?>