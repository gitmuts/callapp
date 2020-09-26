<?php
$sid='ACc7030a326c4c8e32e29cd8500e585212';
$token='93c464daee5042e7e7f92ec297f1422a';
$number='+18326391235';

$version='2010-04-01';
require_once'twilio/Services/Twilio.php';
$client= new Services_Twilio($sid, $token, $version);

try
{
$call=$client->account->calls->create(
$number,
'+917983644795',
'http://virtuemantra.com/twilapp/3.mp3');
echo "call started". $call->sid;
}
catch(Exception $e)
{
echo "Error:". $e->getMessage();
}

?>
