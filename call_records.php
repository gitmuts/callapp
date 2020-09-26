

<?php 

include_once('header.php')

?>    <!-- Main content -->

    <main class="main">



      <!-- Breadcrumb -->

      <ol class="breadcrumb">

        <li class="breadcrumb-item">Home</li>

        <li class="breadcrumb-item"><a href="#">Admin</a></li>

        <li class="breadcrumb-item active">Call Records</li>

      </ol>



      <div class="container-fluid">



        <div class="animated fadeIn">

          <div class="card">

            <div class="card-header">

              <i class="icon-phone"></i>Call Records

            </div>



            <div class="card-body">

              

              <table class="table table-striped table-bordered datatable table-responsive-sm">

                <thead>

                  <tr>

                    <th>ID</th>

                    <th>User Number</th>

                    <th>Twilio Number</th>

                     <th>Date time</th>

                      

                   

                  </tr>

                </thead>

                <tbody>

                  

                  <tr>

                    <td>11</td>

                    <td>12344567</td>

                    <td>13434134134</td>

                    <td>2017-09-28 05:01:40</td>

      

                  </tr>

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

