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
	$email=$_POST['email'];
	$name=$_POST['name'];

$image1= $_FILES['fileToUpload']['name'];
$check_client=mysqli_query($con,"select * from new_client where email='$email'");
if(mysqli_num_rows($check_client)>0)
{$_SESSION['failure_message'] = 'Sorry! '.$email." is already exists";
}
else
{
$ts = date('YmdHis');
		$ran=rand(100000000,999999999);
		$image=$ts.$ran.$image1;

$target_dir = "img/avatars/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image

    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false)
	{
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    }
	else
	{
        echo "File is not an image.";
        $uploadOk = 0;
		$file_error ='3';
		header("location:add_new_client.php?file_error=$file_error");
		exit;
    }

if ($_FILES["fileToUpload"]["size"] > 5000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
	$file_error ='3';
		header("location:add_new_client.php?file_error=$file_error");
		exit;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
}
else
{
$temp = explode(".",$_FILES["fileToUpload"]["name"]);
$newfilename = rand(1,89768) . '.' .end($temp);
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],"img/avatars/".$newfilename))
		{
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    }
	else
	{
        echo "Sorry, there was an error uploading your file.";
    }

	$a='"';
	$text1=$a."123456789".$a;
$text2=' Send To ';
$text3=$a."hellloooo sofjds fdsjfkdjfk".$a;
$font= 'arial';
	echo "insert into new_client values('','$name','$email','$newfilename')";if($_FILES['fileToUpload']['name']){	}else{	$newfilename = 'user-default.png';}
	$upload=mysqli_query($con,"insert into new_client values('','$name','$email','$newfilename')");

	if($upload)	{		$_SESSION['flash_message'] = 'User added successfully.';	}	else{		$_SESSION['failure_message'] = 'Sorry. Something went wrong.';	}
header("location:add_new_client.php");
ob_flush();
exit();
}
}
}
?>