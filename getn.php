<?php
include("connection.php");
        $query33 = mysqli_query($con,"select * from tapp_twilio_number where service_type='".$_GET['q']."'") ;
		while($row3 = mysqli_fetch_array($query33) )

        {

        //$client_name=$row3['client_name'];

        $number=$row3['number'];

        ?>

        <option value="<?php echo $number; ?>"><?php echo $number; ?> </option>

       <?php

     }

    ?>

?>