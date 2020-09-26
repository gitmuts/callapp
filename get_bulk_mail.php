<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
ob_start();
session_start();
include("connection.php");


$msg_type = $_POST['msg_type'] ;
$message = $_POST['message'] ;
$subject = $_POST['subject'];
					
		
		
		$service_type = 'twilio';
		
		
		if($_POST['message_type'] == 'custom')
{

$message = $_POST['mymessage'];
}

else{
	$message = $_POST['message1'];
}
$message_new = mysqli_real_escape_string($con, $message);

$sql12 = mysqli_query($con,"INSERT INTO email_sent (email,sent_email_id,created_at) VALUES ('".$message_new."','".$sent_email_id."',now())");
$sql = mysqli_query($con,"SELECT max(id) from email_sent");
        while ($data = mysqli_fetch_assoc($sql)) {
            $sent_email_id = $data['max(id)'];
        }		
	$msg= mysqli_real_escape_string($con, stripslashes($message));
		
		$msg1=$msg;	
		
		
	if($msg_type=='group')
{

	$query11 = mysqli_query($con,"select * from  tapp_groups where group_name='".$group_name."'");
	try
	{
		while($row=mysqli_fetch_array($query11))

		{

			$number=  $row['number'] ;
			$first_name=  $row['first_name'] ;
			$last_name=  $row['last_name'] ;
			$email=  $row['email'] ;

			$msg=str_replace("{{COL1}}", $first_name, $message);
			$msg=str_replace("{{COL2}}", $last_name, $msg);
			$msg= mysqli_real_escape_string($con, stripslashes($msg));
			$sql1 = mysqli_query($con,"INSERT INTO tapp_sent_email(service_type,email,message,date_time,subject) VALUES ('".$service_type."','".$email."','".$sent_email_id."',now(),'".$subject."')");
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


}
elseif($msg_type == 'clients')
{
	$counter = 0;
	$count = sizeof($_POST['clients_name']);
	$explode = $_POST['clients_name'];
	for($i = 0; $i<$count;$i++)
	{
		if($explode[$i] != 'select_all_clients')
		{
			$check_dup = mysqli_query($con,"select * from tapp_sent_email where email='".$explode[$i]."'");
			if(mysqli_num_rows($check_dup)<1)
			{
				$counter = $counter + 1;
			$msg= mysqli_real_escape_string($con, $msg);
			$sql1 = mysqli_query($con,"INSERT INTO tapp_sent_email(service_type,email,message,date_time,subject) VALUES ('".$service_type."','".$explode[$i]."','".$sent_email_id."',now(),'".$subject."')");
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

	elseif($msg_type == 'leads')
{
	$counter = 0;
	 $count = sizeof($_POST['leads_name']);
	 $explode = $_POST['leads_name'];
	for($i = 0; $i<$count;$i++)
	{
		if($explode[$i] != 'select_all')
		{
			$check_dup = mysqli_query($con,"select * from tapp_sent_email where email='".$explode[$i]."'");
			if(mysqli_num_rows($check_dup)<1)
			{
				echo "INSERT INTO tapp_sent_email(service_type,email,message,date_time) VALUES ('".$service_type."','".$explode[$i]."','".$msg."',now())";
				$counter = $counter + 1;
			$msg= mysqli_real_escape_string($con, $msg);
				$sql1 = mysqli_query($con,"INSERT INTO tapp_sent_email(service_type,email,message,date_time,subject) VALUES ('".$service_type."','".$explode[$i]."','".$sent_email_id."',now(),'".$subject."')");
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
else{
		
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








for($i=1;$i<=$arrayCount;$i++){


$email = trim($allDataInSheet[$i]["A"]);




//$sms_number='+1'.$sms_number;


//echo $sms_number;

			

echo "INSERT INTO tapp_sent_email(service_type,email,twilio_num,message,date_time) VALUES ('".$service_type."','".$email."','".$twilio_number."','".$msg."',now())";
if($email != ''){
$sql1 = mysqli_query($con,"INSERT INTO tapp_sent_email(service_type,email,twilio_num,message,date_time,subject) VALUES ('".$service_type."','".$email."','".$twilio_number."','".$sent_email_id."',now(),'".$subject."')");
}


}


}

}

if (!$sql1) {
$_SESSION['failure_message'] ="Sorry! Something went wrong";
//header("Location:bulk_mail.php?s=0");

  }

  else{

$_SESSION['flash_message'] ="Mail has been queued for sending";
//header("Location:bulk_mail.php?s=1");

}



header("Location: bulk_mail.php");

ob_flush();





?>