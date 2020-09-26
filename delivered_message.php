

<?php 

include_once('header.php')

?>    <!-- Main content -->

    <main class="main">



      <!-- Breadcrumb -->

      <ol class="breadcrumb">

        <li class="breadcrumb-item">Home</li>

        <li class="breadcrumb-item"><a href="#">Admin</a></li>

        <li class="breadcrumb-item active">Delivered Message</li>

        

      </ol>



      <div class="container-fluid">



        <div class="animated fadeIn">

          <div class="card">



            <?php

            $query = mysqli_query($con,"select count(*) from tapp_sent_msg_log") ;

            $i = 1;

      while($row = mysqli_fetch_array($query) )

      {

      $count=$row[0];

      }

            ?>



            <div class="card-header">

              <i class="icon-people"></i> Delivered Message<span>(<?php echo $count; ?>)</span>

            </div>

            



            <div class="card-body">

              

              <table class="table table-striped table-bordered datatable table-responsive-sm">

                <thead>

                  <tr>

                    <th>ID</th>

                    <th>Service Type</th>
                    <th>Twilio Number</th>

                    <th>Message</th>

                    <th>User Number</th>

                    <th>Date Time</th>

                                

                  </tr>

                </thead>

                <tbody>

                  <?php

        $query = mysqli_query($con,"select * from tapp_sent_msg_log") ;

                $i = 1;

        while($row = mysqli_fetch_array($query) )

        {

        ?>

                  

                <tr id="tr" class="tr<?php echo $row['id'];?>">

                      <td><?php echo $i; ?></td>

                          <td><?php echo $row['service_type']; ?></td>
                          <td><?php echo $row['sms_number']; ?></td>

                          <td><?php echo $row['message']; ?></td>

                          <td><?php echo $row['twilio_num']; ?></td>

                          <td><?php echo $row['date_time']; ?></td>

                  

                  </tr>



                   <?php $i++; }?>

                </tbody>

              </table>

            </div>

          </div>

        </div>



      </div>

      <!-- /.conainer-fluid -->

    </main>



  

  </div>



  <?php 

include_once('footer.php')

?>

<!-- Plugins and scripts required by this views -->

  <script src="vendors/js/jquery.dataTables.min.js"></script>

  <script src="vendors/js/dataTables.bootstrap4.min.js"></script>



  <!-- Custom scripts required by this view -->

  <script src="js/views/tables.js"></script>

