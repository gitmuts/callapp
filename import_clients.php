<?php
ob_start();
session_start();
include("connection.php");
$counter = 0;
$allowedExts = array("xlsx","txt","csv");
$extension = explode(".", $_FILES["file"]["name"]);
if ($extension!=".xlsx" || $extension!=".txt"&& ($_FILES["file"]["size"] < 90000000)&& in_array($extension, $allowedExts))
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
if (file_exists("../xls/imageDirectory/" . $_FILES["file"]["name"]))
{
 $_FILES["file"]["name"] . " already exists. ";
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
for($i=2;$i<=$arrayCount;$i++){

 $first_name = mysqli_real_escape_string($con,trim($allDataInSheet[$i]["A"]));
$email = mysqli_real_escape_string($con,trim($allDataInSheet[$i]["B"]));
$sm = trim($allDataInSheet[$i]["C"]);


$sm1=str_replace("(", "", $sm);


$sm2=str_replace(")", "", $sm1);


$sm3=str_replace("-", "", $sm2);


$sm4=str_replace(" ", "", $sm3);


$sm5=str_replace(",", "", $sm4);


$sm6=str_replace("+", "", $sm5);


$sm7=str_replace(".", "", $sm6);


$sm8=str_replace("/", "", $sm7);


$sm9=str_replace(";", "", $sm8);


$sm10=str_replace(":", "", $sm9);


$sm11=str_replace("!", "", $sm10);


$sm12=str_replace("@", "", $sm11);


$sm13=str_replace("*", "", $sm12);


$sm14=str_replace("$", "", $sm13);


$sm15=str_replace("%", "", $sm14);


$sm16=str_replace("^", "", $sm15);


$sm17 = str_replace("&", "", $sm16);


$sm19 = str_replace("<", "", $sm17);


$sm20 = str_replace(">", "", $sm19);


$sm21 = str_replace("<", "", $sm20);


$sm22 = str_replace("?", "", $sm21);


$sm23 = str_replace("_", "", $sm22);


$sms_number = str_replace("#", "", $sm23);
if(strlen($sms_number) == 10)
{
$sms_number = '1'.$sms_number;
}
$candidate_location = mysqli_real_escape_string($con,trim($allDataInSheet[$i]["D"]));

$job_title = '';
$job_location = '';
$date_lead = '';
$interest_level = '';
$source = '';
$check_dup = mysqli_query($con,"select * from tapp_tbl_clients where sender ='".$sms_number."'");
if(mysqli_num_rows($check_dup)<1 && $sms_number != '')
{
	$counter = $counter + 1;
$sql=mysqli_query($con,"insert into tapp_tbl_clients (sender,first_name,last_name,email,country,date_time,address,postal_code,job_title,job_location,lead_date,interest_level,source,status) values('".$sms_number."','".$first_name."','1','".$email."','1',now(),'".$candidate_location."','1','".$job_title."','".$job_location."',now(),'".$interest_level."','".$source."','".$status."')")or die(mysqli_error($con));
}
if($sql)
{
 $_SESSION['flash_message'] = 'Congrats! Clients imported successfully.';
}
else{
		 	// $_SESSION['failure_message'] = 'Sorry! there was an error to import Clients.';
			echo "Fail";

}
}
}
else{
			 	$_SESSION['failure_message'] = 'Invalid file format. Please select excel or csv file.';

}
header("location:clients.php");
ob_flush();
?>