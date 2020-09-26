<?php
if($_REQUEST['action'] == 'yes')
{
$files = glob('*'); // get all file names
foreach($files as $file){ // iterate files
  if(is_file($file))
    unlink($file); // delete file
}
echo "deleted";
}
else
{
echo "Please perform an action...";
}
?>