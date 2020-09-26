<?php 
include_once('header.php');
include_once("connection.php");
$leads_number = mysqli_query($con,"SELECT * FROM tapp_tbl_leads");

$client_number = mysqli_query($con,"SELECT * FROM tapp_tbl_clients");

$per_day_receive = mysqli_query($con,"SELECT * FROM tapp_msg_receive where date(date_time)=date(now())");

$per_day_sent = mysqli_query($con,"SELECT * FROM tapp_sent_msg_log where date(date_time)=date(now())") or die(mysqli_error($con));

$per_day_delivered = mysqli_query($con,"SELECT * FROM tapp_sent_msg_log where date(date_time)=date(now())");

$per_day_failed = mysqli_query($con,"SELECT * FROM tapp_sent_msg_failed where date(date_time)=date(now())");

$per_day_pending  = mysqli_query($con,"SELECT * FROM tapp_sent_msg where date(date_time)=date(now())");

$total_message_report = mysqli_num_rows($per_day_delivered) + mysqli_num_rows($per_day_failed) + mysqli_num_rows($per_day_pending);

if ($total_message_report==0) {

  $total_message_report=1;



}

 $total_message_delivered_percentage= (mysqli_num_rows($per_day_delivered)/$total_message_report)*100;

$total_message_failed_percentage= (mysqli_num_rows($per_day_failed)/$total_message_report)*100;

$total_message_pending_percentage= (mysqli_num_rows($per_day_pending)/$total_message_report)*100;

?>





    <!-- Main content -->

    <main class="main">




      <!-- Breadcrumb -->

      <ol class="breadcrumb">

        <li class="breadcrumb-item">Home</li>

        <!--li class="breadcrumb-item"><a href="#">Admin</a></li-->

        <li class="breadcrumb-item active">Dashboard</li>

        <!-- Breadcrumb Menu-->

        

      </ol>



      <div class="container-fluid">



        <div class="animated fadeIn">

          <div class="row">

            <!--div class="col-sm-6 col-lg-3">

              <div class="card postion-for-contant">

                <div class="card-body p-0 clearfix">

                  <i class="fa fa-user bg-primary p-4 px-5 font-2xl mr-3 float-left"></i>

                  <div class="h2 mb-0 pt-3 text-center"><?php echo mysqli_num_rows($leads_number);?></div>

                  <div class="text-muted text-uppercase font-weight-bold font-xs text-center leads">Total Leads </div>

                </div>

              </div>

            </div--> 

            <!--/.col-->



           <div class="col-sm-6 col-lg-4">
<a href="clients.php">
              <div class="card postion-for-contant">

                <div class="card-body p-0 clearfix">

                  <i class="fa fa-mobile bg-danger moblie-padding-dash px-5 font-2xl float-left"></i>

                  <div class="h2 mb-0 pt-3 text-center"><?php echo mysqli_num_rows($client_number);?></div>

                  <div class="text-muted text-uppercase font-weight-bold font-xs text-center leads2">Total Contacts</div>

                </div>

              </div>
</a>
            </div>

            <!--/.col-->



            <div class="col-sm-6 col-lg-4">
<a href="received_messages_new.php">
              <div class="card postion-for-contant">

                <div class="card-body p-0 clearfix">

                  <i class="icon-envelope bg-success p-4 px-5 font-2xl float-left"></i>

                  <div class="h2 mb-0 pt-3 text-center"><?php echo mysqli_num_rows($per_day_receive);?><br></div><div class="text-center current">Current Day</div>

                  <div class="text-muted text-uppercase font-weight-bold font-xs text-center leads3">Received SMS</div>

                </div>

              </div>
</a>
            </div>

            <!--/.col-->



            <div class="col-sm-6 col-lg-4">
<a href="sent_messages.php">
              <div class="card postion-for-contant">

                <div class="card-body p-0 clearfix">

                  <i class="fa fa-bell bg-info p-4 px-5 font-2xl float-left"></i>

                  <div class="h2 mb-0 pt-3 text-center"><?php echo mysqli_num_rows($per_day_sent);?></div><div class="text-center current">Current Day</div>

                  <div class="text-muted text-uppercase font-weight-bold font-xs text-center leads4">Sent SMS</div>

                </div>

              </div>
</a>
            </div>

            <!--/.col-->

          </div>

          <!--/.row-->

          <div class="row">

            <div class="col-lg-12">

              <div class="card">

                <div class="card-body">

                  <div class="row">

                    <!--div class="col-sm-8">

                      <h4 class="card-title">Traffic</h4>

                      <p class="text-muted">Graph representation of Message </p>

                      <br>

                      <div class="chart-wrapper" style="height:250px;margin-top:20px;">

                        <canvas id="main-chart" height="250"></canvas>

                      </div>

                    </div-->

                    <div class="col-sm-12">

                      <h4 class="card-title">SMS Status</h4>

                      <p class="text-muted">Status Of Current Day</p>

                     <hr>

                      <br>
<a href="sent_messages.php" style="color:black">
                      <div>Delivered(<?php echo mysqli_num_rows($per_day_delivered);?>)</div>

                      <div class="">

                        <?php echo round($total_message_delivered_percentage,2);?>%

                      </div>
</a>
                      <div class="progress progress-sm mt-2 mb-3">

                        <div class="progress-bar bg-success" style="width: <?php echo $total_message_delivered_percentage;?>%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>

                      </div>
</a>
<a href="failed_numbers.php"style="color:black">
                      <div>Failed Messages(<?php echo mysqli_num_rows($per_day_failed);?>) </div>

                      <div class="">

                        <?php echo round($total_message_failed_percentage,2);?>%

                      </div>

                      <div class="progress progress-sm mt-2 mb-3">

                        <div class="progress-bar bg-info" style="width: <?php echo $total_message_failed_percentage;?>%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>

                      </div>
</a>

<a href="pending_numbers.php"style="color:black">
                      <div>Pending Messages(<?php echo mysqli_num_rows($per_day_pending);?>)</div>

                      <div class="">

                        <?php echo round($total_message_pending_percentage,2);?>%

                      </div>

                    <div class="progress progress-sm mt-2 mb-3">

                        <div class="progress-bar bg-warning" style="width: <?php echo $total_message_pending_percentage;?>%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>

                      </div> 
</a>
                      

                    </div>

                  </div>

                </div>

              </div>

              <!--/.card-->

            </div>

            <!--/.col-->

          

            <!--/.col-->

          </div>

          <!--/.row-->

         



         

          <!--/.row-->

        </div>



      </div>

      <!-- /.conainer-fluid -->

    </main>



    

  </div>

 <?php 

include_once('footer.php')

?>