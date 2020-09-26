<?php
ob_start();
session_start();
include("connection.php");
if(!isset($_SESSION['user']))
{
	header("location:login.php");
}
else
{

	$name=$_POST['name'];
	$email=$_POST['email'];
	//$filename=$_POST['filename'];if($_FILES['fileToUpload']['name']){
$image1= $_FILES['fileToUpload']['name'];
		$ts = date('YmdHis');
		$ran=rand(100000000,999999999);
		$image=$ts.$ran.$image1;

$target_dir = "img/avatars/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image

    

// Check if file already exists
// Check file size
if ($_FILES["fileToUpload"]["size"] > 5000000) {
    //echo "Sorry, your file is too large.";
    $uploadOk = 0;
	$file_error ='3';
		//header("location:add_new_client.php?file_error=$file_error");
		//exit;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
   // echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
$temp = explode(".",$_FILES["fileToUpload"]["name"]);
$newfilename = rand(1,89768) . '.' .end($temp);
//move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],"upload_doc/".$newfilename);
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],"img/avatars/".$newfilename))
		{
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    }
	else
	{
        //echo "Sorry, there was an error uploading your file.";
    }}
if($_FILES['fileToUpload']['name']){	$upload=mysqli_query($con,"update new_client set name='$name', email='$email', filename='$filename' where filename='$filename'");}else{	$upload=mysqli_query($con,"update new_client set name='$name', email='$email', filename='$filename' where filename='$filename'");}if($upload){	$_SESSION['flash_message']= 'Client details updated successfully.';	}else{$_SESSION['failure_message'] = 'Sorry! Something went wrong.' ;	}
header("location:add_new_client.php");
ob_flush();
exit();


?>