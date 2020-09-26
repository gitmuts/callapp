<?php 
include_once('header.php')
?>   
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
		  $( document ).ready(function() {


var table = $('#dataTable').DataTable();

// Sort by columns 1 and 2 and redraw
table
    .order( [ 5, 'desc' ] )
    .draw();
 });
</script>

 <!-- Main content -->
    <main class="main">

      <!-- Breadcrumb -->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <!--li class="breadcrumb-item"><a href="#">Admin</a></li-->
        <li class="breadcrumb-item active">Failed Message</li>
        <!-- Breadcrumb Menu-->
        <!-- <li class="breadcrumb-menu d-md-down-none">
          <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
            <a class="btn" href="#"><i class="icon-speech"></i></a>
            <a class="btn" href="index-2.html"><i class="icon-graph"></i> &nbsp;Failed Numbers</a>
            <a class="btn" href="#"><i class="icon-settings"></i> &nbsp;Settings</a>
          </div>
        </li> -->
      </ol>

      <div class="container-fluid">

        <div class="animated fadeIn">
          <div class="card">
            <div class="card-header">
              <i class="icon-people"></i> Failed Message
              <div class="card-actions">
                <a href="https://datatables.net/">
                  <small class="text-muted">docs</small>
                </a>
              </div>
            </div>

            <div class="card-body">
                <form method=post name=f1 action=''>
                   <input type=hidden name=num_msg value=submit>
   

              <div class="row">

            <div class="col-lg-12"> 
              <div class="add-btn-group-padding">
              <!--a href="export_failed.php" ><button type="button" value="Export Data" class="btn btn-primary"> Export CSV</button></a-->
              </div>
            </div>
            </div>
          </form>
              
              <table class="table table-striped table-bordered datatable table-responsive-sm"  id="dataTable">
                <thead>
                  <tr>
                    <th>ID</th>
                                     <th>User Number</th>
                    <th>Message</th>
                    <th>Media</th>
                    <th>Twilio Number</th>
                     <th>Date time</th>
<th>Delete</th>
                      
                   
                  </tr>
                </thead>
                <tbody>
                  <?php
        $query = mysqli_query($con,"select * from tapp_sent_msg_failed") ;
                $i = 1;
        while($row = mysqli_fetch_array($query) )
        {
        ?>
                  <tr id="tr" class="tr<?php echo $row['id'];?>">
                             <td><?php echo $i; ?></td>
                                                                      <td><?php echo $row['sms_number']; ?></td>
                                    <td><?php echo $row['message']; ?></td>
									<td><?php if($row['images'] != '') {  ?><a href="<?php echo $row['images']; ?>" target="_blank"><?php echo "View MMS"; ?> </a> <?php }  else { echo "No MMS"; }?></td>
                                    <td><?php echo $row['twilio_num']; ?></td>
                                    <td><?php echo $row['date_time']; ?></td>
 <td nowrap="nowrap">  <a href="delete_failed_msg.php?id=<?php echo $row['id'];?>" onclick="return confirm('Are you sure you want to delete?')" class="btn-danger btn-sm" >Delete
               </a></td>
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
