<?php $sen=$_REQUEST['CLID'];
$number=$_REQUEST['To'];
?>
<Response>
    <Dial callerId="<?php echo $_REQUEST['CLID']; ?>">
        <Number><?php echo $number; ?></Number>
    </Dial>
</Response>