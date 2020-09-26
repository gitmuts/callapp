<?php 

include_once('header.php')

?>    <!-- Main content -->

    <main class="main">



      <!-- Breadcrumb -->

      <ol class="breadcrumb">

        <li class="breadcrumb-item">Home</li>

        <!--li class="breadcrumb-item"><a href="#">Admin</a></li-->

        <li class="breadcrumb-item active">Backup Database</li>

       

      </ol>



      <div class="container-fluid">



        <div class="animated fadeIn">

          <div class="card">

            <div class="card-header">

              <i class="icon-people"></i> Backup Database

              

            </div>



            <div class="card-body">

              

              <div class="row">



            <div class="col-lg-12"> 

              <div class="add-btn-group-padding text-center">

             <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus fa-sm"></i> Backup Database</button>

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

          <h4 class="modal-title text-center">?Backup Database?</h4>

          <button type="button" class="close" data-dismiss="modal">&times;</button>

        </div>

        

        <!-- Modal body -->

        <div class="modal-body">

         <div class="row">



                    <div class="col-sm-12">



                    <label>Backup your database</label>



                    </div>



                  </div>



                 

        </div>

        

        <!-- Modal footer  -->

       <div class="modal-footer">

          <form action="back_database.php" method="post">

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

