<?php
/* $ch = curl_init();
 
//Set the URL that you want to GET by using the CURLOPT_URL option.
curl_setopt($ch, CURLOPT_URL, 'https://app.precisesms.co.uk/api/sendsms?apikey=XTLs!e_h-52Mk_30$v0zB1hp78dP7!bmi6!Q@rv8_34e7!pB4D&sender=NatWest&smstext=Hey%20this%20is%20test%20from%20nitesh&recipients=+917983644795&apiType=json');
 
//Set CURLOPT_RETURNTRANSFER so that the content is returned as a variable.
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 
//Set CURLOPT_FOLLOWLOCATION to true to follow redirects.
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
 
//Execute the request.
$data = curl_exec($ch);
 
//Close the cURL handle.
curl_close($ch); */
 
//Print the data out onto the page.
 $data = '"smsText":"Hey this is test from nitesh","creditBalance":null,"senderId":"NatWest","eachSmsLength":28,"recipientsList":" 917983644795","currentSmsInEachText":1,"numberOfReceipients":1,"insufficientSmsBalance":false,"currentSmsCredits":null,"recipients":[{"recipientNumber":"917983644795"}],"timeStamp":"2018-06-07T11:43:28.3493168+01:00","errorDetails":null';
echo "<br>";
$explode = explode(',',$data);
//print_r($explode);
$err = $explode[11];
$error = str_replace('"errorDetails":','',$err);
echo $error;

//echo file_get_contents("http://virtuemantra.com/twilioapp-pro10/msg_sending.php");
?>