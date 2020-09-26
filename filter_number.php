<?php
function clear_num($number)
{
$sm = $number;


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
if(strlen($sms_number) == 10)
{
	$sms_number = '1'.$sms_number;
}
return $sms_number;
}
?>