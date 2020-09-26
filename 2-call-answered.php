<?php
// Create a route that will handle Twilio webhook requests, sent as an
// HTTP POST to /voice in our application
require_once 'twilio/Services/Twilio.php';
use Twilio\Twiml;
// Use the Twilio PHP SDK to build an XML response
$response = new Twiml();
// Use the <Gather> verb to collect user input
$gather = $response->gather(array('numDigits' => 1, 'action' => 'http://virtuemantra.com/twilapp/3-gather.php'));
// use the <Say> verb to request input from the user
$gather->say('Press 1 to take a survey. Press 2 to hear a joke.');
// If the user doesn't enter input, loop
$response->redirect('http://virtuemantra.com/twilapp/2-call-answered.php');
// Render the response as XML in reply to the webhook request
header('Content-Type: text/xml');
echo $response;
?>