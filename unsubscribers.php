
<?php 
include_once('header.php')
?>    <!-- Main content -->
    <main class="main">

      <!-- Breadcrumb -->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item"><a href="#">Admin</a></li>
        <li class="breadcrumb-item active">Unsubscribers</li>
        <!-- Breadcrumb Menu-->
       <!--  <li class="breadcrumb-menu d-md-down-none">
          <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
            <a class="btn" href="#"><i class="icon-speech"></i></a>
            <a class="btn" href="index-2.html"><i class="icon-graph"></i> &nbsp;Unsubscribers</a>
            <a class="btn" href="#"><i class="icon-settings"></i> &nbsp;Settings</a>
          </div>
        </li> -->
      </ol>

      <div class="container-fluid">

        <div class="animated fadeIn">
          <div class="card">
            <div class="card-header">
              <i class="icon-people"></i> Unsubscribers
              
            </div>

            <div class="card-body">
              <form method=post name=f1 action=''>
                <input type=hidden name=num_msg value=submit>
              <div class="row">

            <div class="col-lg-12"> 
              <div class="add-btn-group-padding"><a href="export_unsubscribers_number.php">
              <button type="button" class="btn btn-primary btn-md" value="Export Data"><i class="fa fa-plus fa-sm"></i>&nbsp;Export CSV</button></a>
              </div>
            </div>
            </div>
          </form>
              <table class="table table-striped table-bordered datatable">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Group Name</th>
                    <th>First name</th>
                    <th>Last name</th>
                    <th>Number</th>
                   
                  </tr>
                </thead>
                <tbody>
                  <?php
        $query = mysqli_query($con,"select * from tapp_groups_log") ;
                $i = 1;
        while($row = mysqli_fetch_array($query) )
        {
        ?>
                  <tr id="tr" class="tr<?php echo $row['id'];?>">
                    <td><?php echo $i; ?></td>
                                    <td><?php echo $row['group_name']; ?></td>
                                    <td><?php echo $row['first_name']; ?></td>
                                    <td><?php echo $row['last_name']; ?></td>
                                    <td><?php echo $row['number']; ?></td>
                   
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
