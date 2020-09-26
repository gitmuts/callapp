<?php
include_once('connection.php');

 $CallStatus=$_REQUEST['DialCallStatus'];
 $rowid = $_REQUEST['id'];
 $update2 = mysqli_query($con,"update tapp_voice_broadcast_logs set voice_file='".$CallStatus."' where id='".$rowid."'");
 $recording_url = $_REQUEST['RecordingUrl'];
$update1 = mysqli_query($con,"update tapp_voice_broadcast_logs set recording_url='".$recording_url."' where id='".$rowid."'");

?>

<Response>
    
	<Hangup/>

</Response>