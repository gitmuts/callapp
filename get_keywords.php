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

require_once('mailer/class.phpmailer.php');

$keyword1 = $_POST['keyword'] ;

$keyword =  strtoupper($keyword1);

$mes =  $_POST['message'] ;
 $client_name =  $_POST['client_name'] ;
 $client_email =  $_POST['client_email'] ;
$client_address =  $_POST['client_address'] ;
$expiry_date =  $_POST['expiry_date'] ;
$num_of_times =  $_POST['num_of_times'] ;
$twilio_num =  $_POST['twilio_number'] ;
$client_image='0';
$ab=mysqli_query($con,"select * from new_client where email='$client_email'");
while($data=mysqli_fetch_array($ab))
{
	$client_image= $data['filename'];
}

$message= mysqli_real_escape_string($con, stripslashes($mes));

echo $client_image."<br>";

$type =  @$_GET['f'] ;

if($type=='unsub')

	{

		$query11 = mysqli_query($con,"select * from  tapp_unsub_keywords where keyword='".$keyword."'");

			while($row=mysqli_fetch_array($query11))

				{

					$key=  $_POST['keyword'] ;

					echo $key;

				}

		if($key==$keyword)

				{

					echo "exist";

					header("Location:keywords.php?s=0");



				}

		else

				{

					echo "not exist";

					$query = mysqli_query($con,"insert into tapp_unsub_keywords(keyword,message,date_time) values('".$keyword."','".$message."',NOW())");


					if (!$query)
						{

							header("Location:keywords.php?s=0");

						}


					else
						{
							header("Location:keywords.php?s=1");

						}



				}



	}

else

	{

		$query11 = mysqli_query($con,"select * from  tapp_keywords where keyword='".$keyword."'  and twilio_num='".$twilio_num."'");

		$num_rows = mysqli_num_rows($query11);
			if($num_rows == '1')

				{
					echo "exist";

					//header("Location:keywords.php?s=0");

				}

			else

				{

					echo "not exist";


					/* start image creation */


					$ts = date('YmdHis');
		$ran=rand(100000000,999999999);
		$image=$ts.$ran.".png";
		//echo $date=  date("hisms");
		print "<img src=upload_images/".$image.date("U").">";

	$a='"';
	$text1=$a.$keyword.$a;



	$text2=' Send To ';
	$text3=$a.$twilio_num.$a;
echo $client_image1='images/'.$client_image;

 $ext = pathinfo($client_image1, PATHINFO_EXTENSION);
if($ext == 'jpg' )
{

        $im = @imagecreatefromjpeg($client_image1) or die("Cannot Initialize new GD image stream");
        $background_color = imagecolorallocate($im, 255, 0, 0);// yellow
		$text_color = imagecolorallocate($im, 255, 255, 255);
		$font = 'arial.ttf';
}
if($ext == 'png')
{
	$im = @imagecreatefrompng($client_image1) or die("Cannot Initialize new GD image stream");
        $background_color = imagecolorallocate($im, 255, 0, 0);// yellow
		$text_color = imagecolorallocate($im, 255, 255, 255);
		$font = 'AmpleSoft Medium.otf';
}




   $w = imagettfbbox(65,0, $font,$text1);
   $a=abs($w[4]/2);

   $i=abs(imagesx($im)/2);
   $x=($i-$a);





		//imagettftext($im, 25, 0, 150, 50, $text_color, $font, "SMS");
        //$_SESSION['a']=$a=imagestring($im, 20, 80,  10, $text_color, $font, "SMS");
        //$_SESSION['b']=$b=imagestring($im, 100,40,  30, $text1, $text_color);

		 //imagettftext($im, 65, 0, $x, 200, $text_color, $font, $text);
		 imagettftext($im, 65, 0, $x, 200, $text_color, $font, $text1);

		 //imagettftext($im, 25, 0, 160, 150, $text_color, $font, "TO");
		 //imagettftext($im, 35, 0, 60, 200, $text_color, $font, $text3);
		 //imagettftext($im, 15, 0, 290, 232, $text_color, $font, "o");
		 //imagettftext($im, 25, 0, 95, 250, $text_color, $font, "and get a 360");
		 //imagettftext($im, 25, 0, 95, 300, $text_color, $font, "preview today");
        //imagettftext($im, 20, 0, 110, 380, $text_color, $font, "Hockingstuart");
		imagepng($im,"upload_images/".$image);


		/* image creationn end */
			echo $client_image."<br>";



					$query = mysqli_query($con,"insert into tapp_keywords(keyword,client_name,client_email,client_address,num_of_times,expiry_dates,twilio_num,left_msg,message,filename,date_time) values('".$keyword."','".$client_name."','".$client_email."','".$client_address."','".$num_of_times."','".$expiry_date."','".$twilio_num."','".$num_of_times."','".$message."','".$image."',NOW())");

					if (!$query)
					{

					header("Location:keywords.php?s=0");

					  echo "df";

					  }



					  else
						{
							/*     send mail code start   */



							$name=$client_name;
//echo $name;
$email=$client_email;
$adminemail=$client_email;
$file="upload_images/$image";


		//require("class.phpmailer.php");
		$subject = "SMS Thumbnail - $client_address";
		$message = "
						Dear Open3Sixtier,
						<br/><br/>

						Please find attached the keyword and supporting ‘thumbnail' image for the listing:$client_address<br>
				<br>Keyword:$keyword<br><br>
				Mobile Number: 04 2929 3636<br><br>
				Included SMS:$num_of_times<br><br>
				Additional SMS: 100 @ $12.50ex. gst<br><br><br>
				Please let me know if you have any questions.<br><br>
				Best of luck with the sale,<br><br>
				The Open3Sixty Team<br>
				5/14 Wells Street<br>
				Frankston 3199<br><br>
				Please Note: This is a standard SMS service - Charges may apply to the end user if they do not have unlimited SMS as part of the their service plan.";


$mail = new PHPMailer();
$mail->IsSMTP();
$mail->MailerDebug = false;
$mail->CharSet="UTF-8";
$mail->Host = 'smtpout.secureserver.net';
$mail->Port = 80;
$mail->Username = 'info@virtuemantra.com';
$mail->Password = 'vm@123';
$mail->SMTPAuth = true;
$mail->SMTPDebug = 1;
$mail->FromName = "Open3Sixty";
$mail->AddAddress($adminemail);

$mail->AddAddress($adminemail);
$mail->AddReplyTo("noreply@open3sixty.com.au",'Information');

$mail->IsHTML(true);
//$mail->Subject ='Matching Property';
$mail->Subject    = $subject;
//$mail->MsgHTML($message);
$mail->MsgHTML($message);
$mail->Addattachment($file);

//$mail->Body ="<br/><br/>
//Hi ".$name.",<br/><br/>Your Property of interest credentials is.".$msg."</br/><br/><br/>Thanks & regard<br/>Admin";

if(!$mail->Send())
{
$mail->ErrorInfo;

//header("Location:home.php?s=mail_error");
echo "Mail error!";

}
else
{
echo "mail sent";
header("Location:keywords.php?s=1");
}


							/*     send mail code ends    */


						}



			}

	}

ob_flush();





?>