<?php
ob_start();
session_start();
include_once("connection.php");
$twilio_number = $_POST['twilio_number'];
$agent_number = $_POST['agent_number'];

if(isset($_FILES["file1"]["name"]))
{
   $temp = explode(".", $_FILES["file1"]["name"]);
   include_once('get_dir.php');
$target_dir = get_dir();
    if(end($temp) == 'mp3' || end($temp) == '.mp3')
   { 
$new_filename = round(microtime(true)) . '.' . end($temp);
move_uploaded_file($_FILES["file1"]["tmp_name"], "voice_upload/" . $new_filename);
 $mediaUrl = 'http://'.$_SERVER['SERVER_NAME'].$target_dir.'voice_upload/'.$new_filename;
  }
    else{
	   $_SESSION['failure_message'] = 'Invalid File Format For Audio File';
	   //header("location:voice_broadcast.php");
	   die();
   } 
}
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


$sm = trim($allDataInSheet[$i]["A"]);


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


$sm17=str_replace("&", "", $sm16);


$sm19=str_replace("<", "", $sm17);


$sm20=str_replace(">", "", $sm19);


$sm21=str_replace("<", "", $sm20);


$sm22=str_replace("?", "", $sm21);


$sm23=str_replace("_", "", $sm22);


$sms_number=str_replace("#", "", $sm23);


//$sms_number='+1'.$sms_number;


//echo $sms_number;

$sms_number=$sms_number;
try
{

$sql1 = mysqli_query($con,"INSERT INTO tapp_voice_broadcast(twilio_number,user_number,voice_file,agent_number,date_time) VALUES ('".$twilio_number."','".$sms_number."','".$mediaUrl."','0000000',now())");

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
		
		header("Location:voice_broadcast.php");
ob_flush();
?>