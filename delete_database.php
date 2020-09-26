<?php
ob_start();
session_start();
include("connection.php");
$pdo = new \PDO("mysql:host=localhost;dbname=$dbname", $dbuser, $dbpass);
$tables = $pdo->prepare('SHOW TABLES');
$tables->execute();
foreach($tables->fetchAll(\PDO::FETCH_COLUMN) as $table)
{
	if($table != 'tapp_twilio_account' && $table != 'tapp_user_login')
	{
	$pdo->query('TRUNCATE TABLE `' . $table . '`')->execute();
	}
	$_SESSION['flash_message'] = true;
}



 if(isset($_SESSION['flash_message']))
{
$_SESSION['flash_message'] = 'Database cleared successfully';
}
else
{
$_SESSION['failure_message'] = "Sorry! database coudn't cleared completly";
} 

header("Location:clear_database.php?s=2");
exit();

ob_flush();

?>