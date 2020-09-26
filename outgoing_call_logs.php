<?php 
include_once('header.php')
?>    <!-- Main content -->
    <main class="main">

      <!-- Breadcrumb -->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <!--li class="breadcrumb-item"><a href="#">Admin</a></li-->
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
              
              </div>
            </div>

            <div class="card-body">
			<div class="row"  align="right">
            <div class="col-sm-12">
			<a href="export_outgoing_call_logs.php" style="color: #fff !important;margin-right: 30px;margin-bottom: 17px;" class="btn btn-primary"  >
                  <small class="">Export data</small>
                </a>
				</div>
						</div>
              <table class="table table-striped table-bordered datatable table-responsive-sm icon-dwn-table" id="dataTable">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>To</th>
                    
                   
                    <th>From</th>
					
					<th>Status</th>
					<th>Recording</th>
					
                     <th>Date time</th>
                     
                     <th>Delete</th>
                      
                   
                  </tr>
                </thead>
                <tbody>
                  <?php
        $query = mysqli_query($con,"select * from tapp_voice_broadcast_logs order by id desc") ;
                $i = 1;
        while($row = mysqli_fetch_array($query) )
        {
        ?>
                  <tr id="tr" class="tr<?php echo $row['id'];?>">
                      <td><?php echo $i; ?></td>
					  <td><?php echo $row['user_number']; ?></td>
                          <td><?php echo $row['twilio_number']; ?></td>      
                          
						 
                          
                        
                          <td><?php echo $row['voice_file']; ?></td>
                          <td>
						  
			
						  <?php if($row['recording_url'] != '') {?><a href="<?php echo $row['recording_url']; ?>" target="_blank">			  <audio controls>  
   <source src="<?php echo $row['recording_url']; ?>.wav" type="audio/wav">
 
</audio></a><a href="<?php echo $row['recording_url']; ?>" download> <i class="fa fa-download icon-dwn"></a><?php } else { echo  "-"; } ?></td>
                          <td><?php echo $row['date_time']; ?></td>
                    <!-- ss -->
                  <td>
                      
                    
                      <a class="btn btn-danger" href="#delete<?php echo $row['id']; ?>" data-toggle="modal">
              <i class="fa fa-trash-o "></i>

            </a>
                    </td> 
                  </tr>
				  <div class="modal fade" id="delete<?php echo $row['id']; ?>">

    <div class="modal-dialog">

                      <form action="delete_data.php" method="post">
      <div class="modal-content">
<input type="hidden" name="page_name" value="outgoing_call_logs.php">
<input type="hidden" name="table_name" value="tapp_voice_broadcast_logs">
<input type="hidden" name="id" value="<?php echo $row['id'];?>">
<input type="hidden" name="flash_message" value="Congrats! data deleted successfully">
<input type="hidden" name="failure_message" value="Sorry! there was an error to delete">
        <div class="modal-header">
          <h4 class="modal-title text-center">Remove This Call Log</h4>
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div>

        <div class="modal-body">

            <div class="form-group" style="text-align: center;">

              <label for="folderName">Are you sure you want to remove this Log? This action can't be undone.</label>

            </div>

        </div>

        <div style="text-align:center;" class="modal-footer">

                  <button type="submit" class="btn btn-danger btn-sm">Confirm</button>

          <button class="btn btn-sm btn-success" data-dismiss="modal" aria-hidden="true">Close</button>

          </div>

      </div>



                        </form>
    </div>
  </div>
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
