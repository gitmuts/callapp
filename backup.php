<?php
$con = new mysqli('localhost','vm_school','school@456','vm_school');
if (!mysql_connect('localhost', 'vm_school', 'school@456')) {
    echo 'Could not connect to mysql';
    exit;
}
$a = mysqli_query($con,"SHOW TABLES FROM vm_school");
//$q = mysqli_query($a);
$tables = '';
while($row = mysqli_fetch_row($a))
{
	  $prefix =  substr($row[0],0,5);
	if($prefix == 'tapp_')
	{
		if($tables == '')
		{
		$tables =	$row[0];
		}
		else
		{
		 $tables = $tables.','.$row[0];
		}
	}
	
	
}
echo $tables;


?>