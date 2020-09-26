
<?php 
include_once('header.php')
?>    <!-- Main content -->
    <main class="main">

      <!-- Breadcrumb -->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item"><a href="#">Admin</a></li>
        <li class="breadcrumb-item active">Call Logs</li>
        <!-- Breadcrumb Menu-->
        <!-- <li class="breadcrumb-menu d-md-down-none">
          <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
            <a class="btn" href="#"><i class="icon-speech"></i></a>
            <a class="btn" href="index-2.html"><i class="icon-graph"></i> &nbsp;Pending Numbers</a>
            <a class="btn" href="#"><i class="icon-settings"></i> &nbsp;Settings</a>
          </div>
        </li> -->
      </ol>

      <div class="container-fluid">

        <div class="animated fadeIn">
          <div class="card">
            <?php
            $query = mysqli_query($con,"select count(*) from tapp_voice_broadcast_logs") ;
            $i = 1;
      while($row = mysqli_fetch_array($query) )
      {
      $count=$row[0];
      }
            ?>
            <div class="card-header">
              <i class="icon-call-out"></i> Call Logs<span>(<?php echo $count; ?>)</span>
              <div class="card-actions">
                <a href="https://datatables.net/">
                  <small class="text-muted">docs</small>
                </a>
              </div>
            </div>

            <div class="card-body">
              
              <table class="table table-striped table-bordered datatable table-responsive-sm" id="dataTable">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>User Number</th>
                    
                   
                    <th>Agent Number</th>
                    <th>Twilio Number</th>
                     <th>Date time</th>
                      
                   
                  </tr>
                </thead>
                <tbody>
                  <?php
        $query = mysqli_query($con,"select * from tapp_voice_broadcast_logs") ;
                $i = 1;
        while($row = mysqli_fetch_array($query) )
        {
        ?>
                  <tr id="tr" class="tr<?php echo $row['id'];?>">
                      <td><?php echo $i; ?></td>
                          <td><?php echo $row['user_number']; ?></td>                          <td><?php echo $row['agent_number']; ?></td>
                          
						 
                          <td><?php echo $row['twilio_number']; ?></td>
                          <td><?php echo $row['date_time']; ?></td>
                    <!-- ss -->
                    <!-- <td>
                      <a class="btn btn-success" href="#">
              <i class="fa fa-search-plus "></i>
            </a>
                      <a class="btn btn-info" href="#">
              <i class="fa fa-edit "></i>
            </a>
                      <a class="btn btn-danger" href="#">
              <i class="fa fa-trash-o "></i>

            </a>
                    </td> -->
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
