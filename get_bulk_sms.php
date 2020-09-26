<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
ob_start();
session_start();

include("connection.php");
date_default_timezone_set('America/Los_Angeles');
$sending_type = $_POST['sending_type'];
if($sending_type == 'scheduled')
{
$scheduled = $_POST['scheduled'];
$date=date_create($scheduled );
$scheduled_time = date_format($date,"Y-m-d");
$time =$_POST['time'];
echo $scheduled_time = $scheduled_time.' '.$time.':00';

}
else
{
	$qet_sql_time = mysqli_query($con,"select now()");
	while($rowtime = mysqli_fetch_array($qet_sql_time))
	{
		$scheduled_time = $rowtime[0];
	}
//$scheduled_time = date('Y-m-d h:i:s');
}


$msg_type =  $_POST['msg_type'] ;
$service_type =  $_POST['service_type'] ;
$group_name =  $_POST['group_name'] ;
$twilio_number =  $_POST['twilio_number'] ;
if($_POST['message_type'] == 'custom')
{

$message=$_POST['mymessage'];
}
else{
	$message=$_POST['message1'];
}
/* $message =  $_POST['message'] ; */
$msg =  $message ;
$cnt='';
$mediaUrl ='';
include_once('get_dir.php');
$target_dir = get_dir();
if(isset($_FILES["file1"]["name"]) && $_FILES["file1"]["name"] != '')
{
   $temp = explode(".", $_FILES["file1"]["name"]);
$newfilename = round(microtime(true)) . '.' . end($temp);
move_uploaded_file($_FILES["file1"]["tmp_name"], "upload/" . $newfilename);
 $mediaUrl = 'http://'.$_SERVER['SERVER_NAME'].$target_dir.'upload/'.$newfilename;
}
if($msg_type=='group')
{

	$query11 = mysqli_query($con,"select * from  tapp_groups where group_name='".$group_name."'");
	try
	{
		while($row=mysqli_fetch_array($query11))

		{

			$number=  $row['number'] ;
			if($_POST['country_code'] == '84')
{
echo $str_firsttwo = substr($number,0,2);
if($str_firsttwo =='84')
{

}
else
{
$number = '84'.$number;
}
}

elseif(strlen($number) == 10)
{
$number = '1'.$number;
}
else
{
$number = $number;
}
			$first_name=  '';//$row['first_name'] ;
			$last_name=  '';//$row['last_name'] ;

			$msg=str_replace("{{COL1}}", $first_name, $message);
			$msg=str_replace("{{COL2}}", $last_name, $msg);
			$msg= mysqli_real_escape_string($con, stripslashes($msg));
			
			$sql1 = mysqli_query($con,"INSERT INTO tapp_sent_msg(service_type,sms_number,message,twilio_num,images,bulk_name,date_time,scheduled_time) VALUES ('".$service_type."','".$number."','".$msg."','".$twilio_number."','".$mediaUrl."','".$group_name."',now(),'".$scheduled_time."')");
			
		}
		if(!$sql1)
		{
			$_SESSION['failure_message'] = 'Sorry! there was an error to import group numbers.';
		}
		else{
			$_SESSION['flash_message'] = 'Congrats! Group numbers imported successfully.';
		}
	}
	catch (Exception $e)
	{


	}

	echo "done";
header("Location:bulk_sms.php?s=1");

}
elseif($msg_type == 'clients')
{
	$counter = 0;
	$count = sizeof($_POST['clients_name']);
	$explode =$_POST['clients_name'];
	for($i = 0; $i<$count;$i++)
	{
		if($explode[$i] != 'select_all_clients')
		{
		$get_name = mysqli_query($con,"select * from tapp_tbl_clients where sender='".$explode[$i]."'");
			while($name_data = mysqli_fetch_array($get_name))
			{
			$name = $name_data['first_name'];
			}
		if($_POST['country_code'] == '84')
{
echo $str_firsttwo = substr($explode[$i],0,2);
if($str_firsttwo =='84')
{

}
else
{
$explode[$i] = '84'.$explode[$i];
}
}

elseif(strlen($number) == 10)
{
$explode[$i] = '1'.$explode[$i];
}
else
{
$explode[$i] = $explode[$i];
}
			$check_dup = mysqli_query($con,"select * from tapp_sent_msg where sms_number='".$explode[$i]."'");
			
			if(mysqli_num_rows($check_dup)<1)
			{
				$counter = $counter + 1;
			$msg= mysqli_real_escape_string($con, $msg);
			$sql1 = mysqli_query($con,"INSERT INTO tapp_sent_msg(service_type,sms_number,message,twilio_num,images,bulk_name,date_time,scheduled_time) VALUES ('".$service_type."','".$explode[$i]."','".$msg."','".$twilio_number."','".$mediaUrl."','".$name."',now(),'".$scheduled_time."')");
			}
		}
	}
	if($sql1)
	{
		$_SESSION['flash_message'] = 'Congrats! '.$counter.' numbers Queued successfully.';
	}
	else{
		$_SESSION['failure_message'] = 'Sorry! there was an error to import contacts.';
	}
}
elseif($msg_type == 'leads')
{
	$counter = 0;
	$count = sizeof($_POST['leads_name']);
	$explode = $_POST['leads_name'];
	for($i = 0; $i<$count;$i++)
	{
		if($explode[$i] != 'select_all')
		{
			$check_dup = mysqli_query($con,"select * from tapp_sent_msg where sms_number='".$explode[$i]."'");
			if(mysqli_num_rows($check_dup)<1)
			{
				$counter = $counter + 1;
			$msg= mysqli_real_escape_string($con, $msg);
			$sql1 = mysqli_query($con,"INSERT INTO tapp_sent_msg(service_type,sms_number,message,twilio_num,images,date_time,scheduled_time) VALUES ('".$service_type."','".$explode[$i]."','".$msg."','".$twilio_number."','".$mediaUrl."',now(),'".$scheduled_time."')");
			}
		}
	}
	if($sql1)
	{
		$_SESSION['flash_message'] = 'Congrats! '.$counter.' numbers Queued successfully.';
	}
	else{
		$_SESSION['failure_message'] = 'Sorry! there was an error to import group numbers.';
	}
}

else

{

$allowedExts = array("xlsx","txt","csv");


$extension = explode(".", $_FILES["file"]["name"]);





if ($extension!=".xlsx" || $extension!=".txt"


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


move_uploaded_file($_FILES["file"]["tmp_name"],"upload1/".$newfilename);





//echo "Stored in: " . "upload/" . $_FILES["file"]["name"];


"upload1/".$newfilename;


echo "upload1/".$newfilename;


}


}


}


else


{


echo "Invalid file";


}





$inputFileName ="upload1/".$newfilename;


$extension1 = explode(".", $inputFileName);





if ($extension1==".xlsx" || $extension!=".csv" || $extension1==".txt")


{

set_include_path(get_include_path() . PATH_SEPARATOR . 'Classes/');


include 'PHPExcel/IOFactory.php';






// This is the file path to be uploaded.





try {

 $objPHPExcel = PHPExcel_IOFactory::load($inputFileName);


} catch(Exception $e) {


 die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());


}








$allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);


$arrayCount = count($allDataInSheet);  // Here get total count of row in that Excel sheet




include_once("filter_number.php");



for($i=1;$i<=$arrayCount;$i++){

$sms_number = clear_num(trim($allDataInSheet[$i]["A"]));
try
{
	echo "INSERT INTO tapp_sent_msg(service_type,sms_number,message,twilio_num,date_time) VALUES ('".$service_type."','".$sms_number."','".$msg."','".$twilio_number."','".$mediaUrl."',now())";
$msg= mysqli_real_escape_string($con, stripslashes($msg));
$sql1 = mysqli_query($con,"INSERT INTO tapp_sent_msg(service_type,sms_number,message,twilio_num,images,bulk_name,date_time,scheduled_time) VALUES ('".$service_type."','".$sms_number."','".$msg."','".$twilio_number."','".$mediaUrl."','".$file."',now(),'".$scheduled_time."')");

}
catch(Exception $e)
{

}



}


}






if(!$sql1)
		{
			$_SESSION['failure_message'] = 'Sorry! there was an error to import numbers.';
		}
		else{
			$_SESSION['flash_message'] = 'Congrats! numbers imported successfully.';
		}
}
header("Location:bulk_sms.php");
ob_flush();





?>