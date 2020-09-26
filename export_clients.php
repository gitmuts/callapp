<?php
$filename = date('Y-m-d')."-contacts.csv";
 $num_msg = $_GET['num_msg'];
  $year = $_GET['year'];
 $month = $_GET['month'];

//set headers to download file
header( 'Content-Type: text/csv' );
header( 'Content-Disposition: attachment;filename='.$filename);

$file = fopen('php://output', 'w');



//set the column names
$cells[] = array('S.No.', 'Name','Email','Phone','Address','Date' );
     include("connection.php");

					if($num_msg=='' && $year=='')
					{

					$result=mysqli_query($con,"select * from tapp_tbl_clients");
					}
					else if($num_msg=='')
					{

					$result=mysqli_query($con,"select * from tapp_tbl_clients where  MONTH( date_time ) =$month AND YEAR( date_time ) =$year    order by date_time desc");
					}
					else
					{

					$result=mysqli_query($con,"select * from tapp_tbl_clients where sender='".$num_msg."' OR body like '%".$num_msg."%'    order by date_time desc");
					}
									$i=1;
									while($row=mysqli_fetch_array($result))
									{
//pass all the form values
$cells[] = array( $i, $row['first_name'],$row['email'],$row['sender'],$row['address'],$row['date_time'],);
$i++;
}
foreach($cells as $cell)
{
	fputcsv($file,$cell);
}
fclose($file);

?>