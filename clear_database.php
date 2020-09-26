<?php 

include_once('header.php')

?>    <!-- Main content -->

    <main class="main">



      <!-- Breadcrumb -->

      <ol class="breadcrumb">

        <li class="breadcrumb-item">Home</li>

        <!--li class="breadcrumb-item"><a href="#">Admin</a></li-->

        <li class="breadcrumb-item active">Clear Database</li>

        <!-- Breadcrumb Menu-->

       <!--  <li class="breadcrumb-menu d-md-down-none">

          <div class="btn-group" role="group" aria-label="Button group with nested dropdown">

            <a class="btn" href="#"><i class="icon-speech"></i></a>

            <a class="btn" href="index-2.html"><i class="icon-graph"></i> &nbsp;Clear Database</a>

            <a class="btn" href="#"><i class="icon-settings"></i> &nbsp;Settings</a>

          </div>

        </li> -->

      </ol>



      <div class="container-fluid">



        <div class="animated fadeIn">

          <div class="card">

            <div class="card-header">

              <i class="icon-people"></i> Clear Database

              <div class="card-actions">

              </div>

            </div>



            <div class="card-body">

              

              <div class="row">



            <div class="col-lg-12"> 

              <div class="add-btn-group-padding text-center">

              <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#myModal"><i class="fa fa-minus fa-sm"></i> Clear Database</button>

              </div>

            </div>

            </div>

            </div>

          </div>

        </div>



      </div>

      <!-- /.conainer-fluid -->

    </main>

</div>



  <div class="modal fade" id="myModal">

    <div class="modal-dialog">

      <div class="modal-content">

      

        <!-- Modal Header -->

        <div class="modal-header">

          <h4 class="modal-title text-center">Clear Database?</h4>

          <button type="button" class="close" data-dismiss="modal">&times;</button>

        </div>

        

        <!-- Modal body -->

        <div class="modal-body">

         <div class="row">



                    <div class="col-sm-12">



                    <label>Are you sure you want to clear database? This action can't be undone.</label><br>
                    <label>All your data include sent sms,received sms,pending sms,failed sms,contacts,sent emails,pending emails,templates,twilio & plivo numbers, blacklisted numbers and groups will be deleted permanantly and you can't get it back<br>Click submit to confirm</label>



                    </div>



                  </div>



                 

        </div>

        

        <!-- Modal footer -->

        <div class="modal-footer">

          <form action="delete_database.php" method="post">

          <button type="submit" class="btn btn-primary"><i class="fa fa-dot-circle-o"></i> Submit</button>

          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

          </form>

        </div>

        

      </div>

    </div>

  </div>



  <?php 

include_once('footer.php')

?>

<!-- Plugins and scripts required by this views -->

  <script src="vendors/js/jquery.dataTables.min.js"></script>

  <script src="vendors/js/dataTables.bootstrap4.min.js"></script>



  <!-- Custom scripts required by this view -->

  <script src="js/views/tables.js"></script>

