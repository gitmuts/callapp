<?php
header('Content-type: text/xml');
echo '<?xml version="1.0" encoding="UTF-8"?>'; 
$text=$_REQUEST['Body'];
$string=$text[0];
if($string==" ")
{
$string=$text[1];
}
if($string==" ")
{
$string=$text[2];
}
if($string=="+")
{
$text=explode(",",$text);
$number=$text[0];
$remove=array_shift($text);
$string=implode(" ",$text);
$message=$string;
echo "<Response><Message to="+$number+">"+$message+" </Message></Response>"; 
}
else
{
$message=$text;
echo "<Response><Message to=+19198229424>"+$message+" </Message></Response>"; 
}






?>