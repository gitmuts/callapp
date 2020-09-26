<?php
echo header('content-type: text/xml');
echo '<?xml version="1.0" encoding="UTF-8"?>';
$to=$_REQUEST['To'];
/** Extracting user name **/
$pos1 = strpos($to,":");
$pos2 = strpos($to,"@");
$tosip=substr($to,$pos1+1,$pos2-$pos1-1);
?>
    <Response>
        <Dial callerId="+442033224018"><?php echo $tosip ?></Dial>
    </Response>
  