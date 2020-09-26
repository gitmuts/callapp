<?php

/**

 * @Author: Sanjay bhatt

 * @Date:   2016-02-15 14:05:55

 * @Last Modified by:   sanjay

 * @Last Modified time: 2016-02-12 18:18:40

 */

ob_start();

session_start();

include("connection.php");



$id =  $_POST['id'] ;



$keyword1 =  $_POST['keyword'] ;

$keyword =  strtoupper($keyword1);
$client_name =  $_POST['client_name'] ;
$client_email =  $_POST['client_email'] ;

$expiry_date =  $_POST['expiry_date'] ;
$num_of_times =  $_POST['num_of_times'] ;
$twilio_num =  $_POST['twilio_number'] ;
$keyword_old =  $_POST['keyword_old'] ;

$twilio_num_old=  $_POST['twilio_num_old'] ;

$mes =  $_POST['message'] ;

$message= mysqli_real_escape_string($con, stripslashes($mes));



$type =  $_GET['f'] ;

if($type=='unsub')

	{
	
		$sql=mysqli_query($con,"update tapp_unsub_keywords set keyword='".$keyword."',message='".$message."',date_time=now() where id='".$id."'");
		
			if (!$sql)
				{
				
					header("Location:keywords.php?s=0");
								
				} 
				
				
			
			else
				{
					header("Location:keywords.php?s=3");
				
				}
		
		
	
	}

else

	{
	
	if($keyword==$keyword_old && $twilio_num==$twilio_num_old)
		{
		$sql=mysqli_query($con,"update tapp_keywords set keyword='".$keyword."',client_name='".$client_name."',client_email='".$client_email."',num_of_times='".$num_of_times."',expiry_dates='".$expiry_date."',twilio_num='".$twilio_num."',left_msg='".$num_of_times."',message='".$message."',date_time=now() where id='".$id."'");
		}
	else
		{
			$query11 = mysqli_query($con,"select * from  tapp_keywords where keyword='".$keyword."'  and twilio_num='".$twilio_num."'");
			
			$num_rows = mysqli_num_rows($query11);
				if($num_rows == '1')
					
					{
						echo "exist";
						
						header("Location:keywords.php?s=0");
						
					}
					
				else
				
				{
			$sql=mysqli_query($con,"update tapp_keywords set keyword='".$keyword."',client_name='".$client_name."',client_email='".$client_email."',num_of_times='".$num_of_times."',expiry_dates='".$expiry_date."',twilio_num='".$twilio_num."',left_msg='".$num_of_times."',message='".$message."',date_time=now() where id='".$id."'");
		        }
		}
	
	
		if (!$sql) 
			{
			
				header("Location:keywords.php?s=0");
			
			} 
		
		  
		
		else
			{
				header("Location:keywords.php?s=3");
			
			}
		
	}

ob_flush();

?>