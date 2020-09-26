<?php
ob_start();
include('connection.php');
require "twilio/Services/Twilio.php";
$AccountSid = "AC0805cbe925d50c27ea53161253ff5ec9";
$AuthToken = "65ac49a4f15a826693a2ccd75bb38918";
$client = new Services_Twilio($AccountSid, $AuthToken);
$id=$_POST['id'];
$num=$_POST['number'];
echo $num;
$schedule_for=$_POST['schedule_for'];
$query333 = mysqli_query($con,"select * from tapp_url_id") ;
		while($row33 = mysqli_fetch_array($query333) ) 
		{
		$link_id=$row33['link_id'];
		}
$url=$_POST['url'];

$type=$_POST['type'];
$message=$_POST['message'];
$message=str_replace("'", "", $message);
$msg=$message.'  <a href="update_url.php?link_id='.$link_id.'&url='.$url.'"/>'.substr($url, 0, 20).'...</a>';

$sms_number_lenth=strlen($num);
	
$allowedExts = array("png","jpg","gif");
$extension = explode(".", $_FILES["file"]["name"]);

if ($extension!=".png" || $extension!=".jpg" || $extension!=".gif"
&& ($_FILES["file"]["size"] < 90000000)
&& in_array($extension, $allowedExts))
{
if ($_FILES["file"]["error"] > 0)
{
echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
}
else
{

$file=$_FILES["file"]["name"];

// $file = $temp[0].".".$temp[1];
$temp[0] = rand(0, 3000); //Set to random number
$file;

if (file_exists("../xls/imageDirectory/" . $_FILES["file"]["name"]))
{
echo $_FILES["file"]["name"] . " already exists. ";
}
else
{

$temp = explode(".",$_FILES["file"]["name"]);
$newfilename = rand(1,89768) . '.' .end($temp);
move_uploaded_file($_FILES["file"]["tmp_name"],"images/".$newfilename);

//echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
"upload/".$newfilename;
echo "upload/".$newfilename;
$path="images/".$newfilename;
}
}
}
else
{
echo "Invalid file";
}
	// Remove all illegal characters from email
	$email = filter_var($num, FILTER_SANITIZE_EMAIL);
	if (is_numeric($num))
	{
	echo "Numbers";
	if($type=='draft' || $type=='scheduled')
	{
	echo $type;
	$sql11=mysqli_query($con,"update tapp_sent_msg set sms_number='".$num."',message='".$message."',url='".$url."',images='".$path."',scheduled_for='".$schedule_for."',type='".$type."',date_time=now() where id='".$id."'");
	echo "update tapp_sent_msg set sms_number='".$num."',message='".$message."',scheduled_for='".$schedule_for."',date_time=now() where id='".$id."'";
	}
	else if($type=='update')
	{
	echo $type;
	$sql11=mysqli_query($con,"update tapp_sent_msg set sms_number='".$num."',message='".$message."',url='".$url."',images='".$path."',scheduled_for='".$schedule_for."',date_time=now() where id='".$id."'");
	echo "update tapp_sent_msg set sms_number='".$num."',message='".$message."',scheduled_for='".$schedule_for."',date_time=now() where id='".$id."'";
	}
	
	else
	{
	echo $type;
	$sms_number='+61'.$num;
	if($sms_number_lenth==10)
	{
	$sms = $client->account->messages->sendMessage("0448711713",$sms_number,$msg);
	echo "message has been sent";
	}
	$sql1 = mysqli_query($con,"INSERT INTO tapp_sent_msg_log(sms_number,message,url,images,scheduled_for,date_time) VALUES ('".$num."','".$message."','".$url."','".$path."','".$schedule_for."',now())");
	echo "INSERT INTO tapp_sent_msg_log(sms_number,message,images,scheduled_for,date_time) VALUES ('".$num."','".$message."','".$path."','".$schedule_for."','".$link_id."',now())";
	$sql23231 = mysqli_query($con,"delete from tapp_sent_msg where id='".$id."'");
	$link_new_id=$link_id+1;
$sql235231 = mysqli_query($con,"delete from tapp_url_id");
	$sql1 = mysqli_query($con,"INSERT INTO tapp_url_count(url,link_id,date_time) VALUES ('".$url."','".$link_id."',now())");

$sql1 = mysqli_query($con,"INSERT INTO tapp_url_id(link_id,date_time) VALUES ('".$link_new_id."',now())");
	}
	
	}
	// Validate e-mail
	else if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
	echo("$email is a  email address");
	
	$query33 = mysqli_query($con,"select * from tapp_newsletter where email='".$num."'") ;
	echo "select * from tapp_newsletter where email='".$num."'";
	while($row3 = mysqli_fetch_array($query33) ) 
	{
	$nume=$row3['mobile_no'];
	if($type=='draft' || $type=='scheduled')
	{
	echo $type;
	$sql11=mysqli_query($con,"update tapp_sent_msg set sms_number='".$nume."',message='".$message."',url='".$url."',images='".$path."',scheduled_for='".$schedule_for."',type='".$type."',date_time=now() where id='".$id."'");
	echo "update tapp_sent_msg set sms_number='".$nume."',message='".$message."',images='".$path."',scheduled_for='".$schedule_for."',type='".$type."',date_time=now() where id='".$id."'";
	}
	else if($type=='update')
	{
	echo $type;
	$sql11=mysqli_query($con,"update tapp_sent_msg set sms_number='".$nume."',message='".$message."',url='".$url."',images='".$path."',scheduled_for='".$schedule_for."',date_time=now() where id='".$id."'");
	echo "update tapp_sent_msg set sms_number='".$nume."',message='".$message."',scheduled_for='".$schedule_for."',date_time=now() where id='".$id."'";
	}
	
	else
	{
	echo $type;
	$sms_number='+61'.$num;
	if($sms_number_lenth==10)
	{
	//$sms = $client->account->messages->sendMessage("0448711713",$sms_number,$msg);
	echo "message has been sent";
	}
	$sql1 = mysqli_query($con,"INSERT INTO tapp_sent_msg_log(sms_number,message,url,images,scheduled_for,date_time) VALUES ('".$nume."','".$message."','".$url."','".$path."','".$schedule_for."',now())");
	echo "INSERT INTO tapp_sent_msg_log(sms_number,message,images,scheduled_for,date_time) VALUES ('".$nume."','".$message."','".$path."','".$schedule_for."',now())";
$sql2231 = mysqli_query($con,"delete from tapp_sent_msg where id='".$id."'");
$link_new_id=$link_id+1;
$sql235231 = mysqli_query($con,"delete from tapp_url_id");
	$sql1 = mysqli_query($con,"INSERT INTO tapp_url_count(url,link_id,date_time) VALUES ('".$url."','".$link_id."',now())");

$sql1 = mysqli_query($con,"INSERT INTO tapp_url_id(link_id,date_time) VALUES ('".$link_new_id."',now())");
	}
	}
	
	
	}
	
	
	else
	{
	echo "string";
	$query331 = mysqli_query($con,"select * from tapp_suscribers_list where list_name='".$num."'") ;
	while($row331 = mysqli_fetch_array($query331) ) 
	{
	echo $row331['list_name'];
	
	$nume=$row331['numbers'];
	$nu=explode(',',$nume);
	echo sizeof($nu);
	
	if($type=='draft' || $type=='scheduled')
	{
	echo $type;
	$sql11=mysqli_query($con,"update tapp_sent_msg set sms_number='".$num."',message='".$message."',url='".$url."',images='".$path."',scheduled_for='".$schedule_for."',type='".$type."',date_time=now() where id='".$id."'");
	echo "update tapp_sent_msg set sms_number='".$num."',message='".$message."',images='".$path."',scheduled_for='".$schedule_for."',type='".$type."',date_time=now() where id='".$id."'";
	}
	else if($type=='update')
	{
	echo $type;
	$sql11=mysqli_query($con,"update tapp_sent_msg set sms_number='".$num."',message='".$message."',url='".$url."',images='".$path."',scheduled_for='".$schedule_for."',date_time=now() where id='".$id."'");
	echo "update tapp_sent_msg set sms_number='".$num."',message='".$message."',images='".$path."',scheduled_for='".$schedule_for."',date_time=now() where id='".$id."'";
	}
	else
	{
	for($i=0;$i<sizeof($nu);$i++)
	{
	$query3363 = mysqli_query($con,"select * from tapp_url_id") ;
		while($row33 = mysqli_fetch_array($query3363) ) 
		{
		$link_id=$row33['link_id'];
		echo $link_id;
		}
$msg=$message.'  <a href="update_url.php?link_id='.$link_id.'&url='.$url.'"/>'.substr($url, 0, 20).'...</a>';

	echo $nu[$i];
	echo $type;
	$sms_number='+61'.$num;
	if($sms_number_lenth==10)
	{
	$sms = $client->account->messages->sendMessage("0448711713",$sms_number,$msg);
	echo "message has been sent";
	}
	
	$sql1 = mysqli_query($con,"INSERT INTO tapp_sent_msg_log(sms_number,message,url,images,scheduled_for,date_time) VALUES ('".$nu[$i]."','".$message."','".$url."','".$path."','".$schedule_for."',now())");
	echo "INSERT INTO tapp_sent_msg_log(sms_number,message,images,scheduled_for,date_time) VALUES ('".$nu[$i]."','".$message."','".$path."','".$schedule_for."',now())";
	$sql2231 = mysqli_query($con,"delete from tapp_sent_msg where id='".$id."'");
$link_new_id=$link_id+1;
$sql235231 = mysqli_query($con,"delete from tapp_url_id");
	$sql1 = mysqli_query($con,"INSERT INTO tapp_url_count(url,link_id,date_time) VALUES ('".$url."','".$link_id."',now())");

$sql1 = mysqli_query($con,"INSERT INTO tapp_url_id(link_id,date_time) VALUES ('".$link_new_id."',now())");
	}
	}
	
	}
	
	}
header("Location:scheduled.php?s=3");
	exit();
	ob_flush();
	?>
	
