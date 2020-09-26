<?php 
include_once('header.php')
?>    <!-- Main content -->
    <main class="main">

      <!-- Breadcrumb -->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <!--li class="breadcrumb-item"><a href="#">Admin</a></li-->
        <li class="breadcrumb-item active">Update Account Details</li>
        <!-- Breadcrumb Menu-->
        <!-- <li class="breadcrumb-menu d-md-down-none">
          <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
            <a class="btn" href="#"><i class="icon-speech"></i></a>
            <a class="btn" href="index-2.html"><i class="icon-graph"></i> &nbsp;Update Twilio Details</a>
            <a class="btn" href="#"><i class="icon-settings"></i> &nbsp;Settings</a>
          </div>
        </li> -->
      </ol>

      <div class="container-fluid">

        <div class="animated fadeIn">
          <div class="card">
            <div class="card-header">
              <i class="icon-people"></i> Update Account Details
              <div class="card-actions">
                <a href="https://datatables.net/">
                  <small class="text-muted">docs</small>
                </a>
              </div>
            </div>

            <div class="card-body">
              <div class="row">

            <!--div class="col-lg-12"> 
              <div class="add-btn-group-padding">
              <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus fa-sm"></i> Add Account</button>  <!-- <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus fa-sm"></i> Update Twilio Details</button> >
              </div-->			  			  
            </div>
            </div>
              <table class="table table-striped table-bordered datatable table-responsive-sm">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Account Type</th>
                    <th>Account ID</th>
                    <th>Account Token</th>
                    <th>Action</th>
                    
                   
                  </tr>
                </thead>
                <tbody>

                    <?php 
                    $query = mysqli_query($con,"select * from tapp_twilio_account") ;
                    $i = 1;
                    while($row = mysqli_fetch_array($query) ) {?>   
                  <tr id="tr" class="tr<?php echo $row['id'];?>">
                   <td><?php echo $i; ?></td>
                    <td><?php echo $row['service_type']; ?></td>
                    <td><?php echo $row['twilio_sid']; ?></td>
                    <td><?php echo $row['twilio_token']; ?></td>
                     <!-- ss -->
                   <td>

                   <a class="btn btn-info action-btn"  data-toggle="modal" href="#edit_form<?php echo $row['id']; ?>">
              <i class="fa fa-edit "></i>
            </a>
                      <a class="btn btn-danger action-btn"  data-toggle="modal" href="#delete<?php echo $row['id']; ?>">
              <i class="fa fa-trash-o "></i>

            </a>
                    </td>
                  </tr>

                  <div class="modal fade" id="edit_form<?php echo $row['id']; ?>">
    <div class="modal-dialog">
      <form class="no-margin"  method="post"   action="update_twilio_account.php" name="client_record" id="example" enctype="multipart/form-data" >
      <div class="modal-content">
      <input type="hidden" value="<?php echo $row['id'];?>" name="id">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title text-center">Update Twilio Details</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
		 <div class="row">
		<div class="col-sm-12">

                      <div class="form-group">

                        <label  class="control-label">Account Type</label>
                        <select class="form-control" name="service_type">
						
						<option value="twilio" <?php if($row['service_type'] == 'twilio') echo "selected";?>>Twilio</option>
						
						</select>
                      </div>

                    </div>
                    </div>
				  
				  
         <div class="row">

                    <div class="col-sm-12">

                      <div class="form-group">

                        <label  class="control-label">Account Sid</label>
                        <input type="text" id="" placeholder="Enter Sid" required class="form-control"  name="sid" value="<?php echo $row['twilio_sid'];?>">
                      </div>

                    </div>

                  </div>

                  <div class="row">

                    <div class="col-sm-12">

                      <div class="form-group">
                        <label for="accntoken">Account Token</label>
                        <br>
                          <input type="text" id="twilio_num1" value="<?php echo $row['twilio_token'];?>" placeholder="Enter Token" onKeyUp="checkkeyword(this.value)" required class="form-control input-sm parsley-validated "  name="token" value="">
                         </div>

                    </div>

                  </div>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary"><i class="fa fa-dot-circle-o"></i> Submit</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        
      </div>
</form>
    </div>
  </div>



<div class="modal fade" id="delete<?php echo $row['id']; ?>">
    <div class="modal-dialog">
      <form class="no-margin"  method="post"   action="delete_twilio_account.php" name="client_record" id="example" enctype="multipart/form-data" >
      <div class="modal-content">
      
        <!-- Modal Header -->
		<input type="hidden" name="id" value="<?php echo $row['id'];?>">
        <div class="modal-header">
          <h4 class="modal-title text-center">Delete Twilio Details</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
         <div class="row">

                    
                    <div class="col-sm-12">



                    <label>Are you sure you want to clear database? This action can't be undone.</label>



                    </div>
                  </div>

                  
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary"><i class="fa fa-dot-circle-o"></i> Submit</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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

  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <form class="no-margin"  method="post"   action="add_twilio_account1.php" name="client_record" id="example" enctype="multipart/form-data" >
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header"> 
          <h4 class="modal-title text-center">Add Twilio Details</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
		
		    <div class="row">

                    <div class="col-sm-12">

                      <div class="form-group">

                        <label  class="control-label">Account Type</label>
                        <select class="form-control" name="service_type">
						<option value="">Select Account Type</option>
						<option value="twilio">Twilio</option>
				
						</select>
                      </div>

                    </div>

                  </div>
				  
		
         <div class="row">

                    <div class="col-sm-12">

                      <div class="form-group">

                        <label  class="control-label">Account Sid</label>
                        <input type="text" id="" placeholder="Enter Sid" required class="form-control"  name="sid">
                      </div>

                    </div>

                  </div>

                  <div class="row">

                    <div class="col-sm-12">

                      <div class="form-group">
                        <label for="accntoken">Account Token</label>
                        <br>
                          <input type="text" id="twilio_num1" value="" placeholder="Enter Token" onKeyUp="checkkeyword(this.value)" required class="form-control input-sm parsley-validated "  name="token">
                         </div>

                    </div>

                  </div>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary"><i class="fa fa-dot-circle-o"></i> Submit</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        
      </div>
</form>
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



<?php
if(isset($_GET['s']))
{
if($_GET['s']==1)
{
?>
<script>
swal({
    title: "Number Sucessfully Added.",
    //text: "Message Sucessfully Added.",
    timer:3000,
    showConfirmButton: false
  });
</script>
<?php
}
else if($_GET['s']==2)
{
?>
<script>
swal({
    title: "Number Sucessfully Deleted.",
    //text: "Message Sucessfully Added.",
    timer:3000,
    showConfirmButton: false
  });
</script>
<?php
}
else if($_GET['s']==3)
{
?>
<script>
swal({
    title: "Twilio Details Sucessfully Updated.",
  //text: "Message Sucessfully Added.",
  timer:3000,
    showConfirmButton: false
  });
</script>

<?php
}
else
{
?>
<script>
swal({
    title: "Number Already Exist.",
    //text: "Message Sucessfully Added.",
    timer:3000,
    showConfirmButton: false
  });

</script>
<?php
}
}
?>


