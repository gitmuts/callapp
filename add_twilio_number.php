<?php 
include_once('header.php')
?>    <!-- Main content -->
    <main class="main">

      <!-- Breadcrumb -->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <!--li class="breadcrumb-item"><a href="#">Admin</a></li-->
        <li class="breadcrumb-item active">Add New Number</li>
        <!-- Breadcrumb Menu-->
        <!-- <li class="breadcrumb-menu d-md-down-none">
          <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
            <a class="btn" href="#"><i class="icon-speech"></i></a>
            <a class="btn" href="index-2.html"><i class="icon-graph"></i> &nbsp;Add New Number</a>
            <a class="btn" href="#"><i class="icon-settings"></i> &nbsp;Settings</a>
          </div>
        </li> -->
      </ol>

      <div class="container-fluid">

        <div class="animated fadeIn">
          <div class="card">
            <div class="card-header">
              <i class="icon-people"></i> Add New Number
              <div class="card-actions">
                <a href="https://datatables.net/">
                  <small class="text-muted">docs</small>
                </a>
              </div>
            </div>

            <div class="card-body">
              <div class="row">

            <div class="col-lg-12"> 
              <div class="add-btn-group-padding">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus fa-sm"></i> Add New Number</button>
              </div>
            </div>
            </div>
              <table class="table table-striped table-bordered datatable table-responsive-sm">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Account Type</th>
                  
                    <th>Number</th>
                    <th>Action</th>
                   
                  </tr>
                </thead>
                <tbody>
                  <?php
        $query = mysqli_query($con,"select * from tapp_twilio_number") ;

                $i = 1;

        while($row = mysqli_fetch_array($query) ) {?>
                  
                  <tr id="tr" class="tr<?php echo $row['id'];?>">
                    <td><?php echo $i; ?></td>
                    <td><?php echo $row['service_type']; ?></td>
                   
                    <td><?php echo $row['number']; ?></td>
                    <td>
                    
                      <a class="btn btn-info action-btn" data-toggle="modal" href="#edit_form<?php echo $row['id']; ?>">
                <i class="fa fa-edit "></i>
              </a>
                      <a class="btn btn-danger action-btn" data-toggle="modal" href="#delete<?php echo $row['id']; ?>">
                <i class="fa fa-trash-o "></i>
              </a>
                    </td>
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

                  <div class="modal fade" id="edit_form<?php echo $row['id']; ?>">

 <div class="modal-dialog">

                  <form class="no-margin"  method="post" onSubmit="return validation()" id="ex<?php echo $row['id']; ?>"  action="update_twilio_number.php" name="client_record"  >


      <div class="modal-content">

        <div class="modal-header">
          <h4 class="modal-title text-center">Edit Number?</h4>
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div>

        <div class="modal-body">
		
 <div class="form-group">   
 <?php $qet_twilio_account1 = mysqli_query($con,"select * from tapp_twilio_account"); ?>
 <label for="name">Twilio Account</label>       
 <select name="sid" class="form-control" >		
 <option value="">Select  Account</option>	
 <?php while($row_twil1 = mysqli_fetch_array($qet_twilio_account1))	
	 { ?>				
 <option value="<?php echo $row_twil1['twilio_sid'];?>"<?php if($row['twilio_sid'] == $row_twil1['twilio_sid']) echo "selected";?>>
 <?php echo $row_twil1['service_type'];?>
 </option>					
 <?php } ?>					
 </select>                
 </div>					  
          

            <div class="form-group">

             <label class="control-label">Number</label>

            <input type="number" id="twilio_num" placeholder="Enter Number e.g 61********" value="<?php echo $row['number']; ?>" onBlur="checkkeyword<?php echo $row['id']; ?>(this.value)" required class="form-control input-sm parsley-validated "  name="num">

           <input type="hidden" placeholder="Keyword name" value="<?php echo $row['id']; ?>"  required class="form-control input-sm parsley-validated "  name="id">

           <span style="color:#FF0000;" id="show<?php echo $row['id']; ?>"></span>
            </div>
<div class="form-group">

             <label class="control-label">Make This Number As Default:  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>

            <input type="radio" name="is_default" value="yes" <?php if($row['is_default'] == 'yes') echo "checked";?>> Yes&nbsp;&nbsp;&nbsp;
			 <input type="radio" name="is_default" value="no" <?php if($row['is_default'] == 'no') echo "checked";?>> No

           <input type="hidden" placeholder="Keyword name" value="<?php echo $row['id']; ?>"  required class="form-control input-sm parsley-validated "  name="id">

           <span style="color:#FF0000;" id="show<?php echo $row['id']; ?>"></span>
            </div>
           </div>

        <div class="modal-footer">

                  <button type="submit" class="btn btn-danger btn-sm check<?php echo $row['id']; ?>">Submit</button>

          <button class="btn btn-sm btn-success" data-dismiss="modal" aria-hidden="true">Close</button>
          </div>

      </div>
                </form>
   </div>
 </div>


 <div class="modal fade" id="delete<?php echo $row['id']; ?>">

   <div class="modal-dialog">

                      <form action="delete_twilio_number.php?id=<?php echo $row['id']; ?>" method="post">

      <div class="modal-content">

        
        <div class="modal-header">
          <h4 class="modal-title text-center">Remove this Number?</h4>
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div>

        <div class="modal-body">

           <div class="form-group" style="text-align: center;">

              <label for="folderName">Are you sure you want to remove this Number? This action can't be undone.</label>

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

                </tbody>

                <?php $i++; }?>

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
      <form  method="post" onSubmit="return validation1()"  action="get_twilio_number.php" name="client_record" id="example" enctype="multipart/form-data">
      <div class="modal-content">
      <?php $qet_twilio_account = mysqli_query($con,"select * from tapp_twilio_account"); ?>
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title text-center">New Number</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
         <div class="row">
 <div class="col-sm-12">              
 <div class="form-group">        
 <label for="name">Account</label>    
 <select name="sid" class="form-control" >			
 <option value="">Select  Account</option>	
 <?php while($row_twil = mysqli_fetch_array($qet_twilio_account))		
	 { ?>					
 <option value="<?php echo $row_twil['twilio_sid'];?>">
 <?php echo ucwords($row_twil['service_type']);?></option>	
 <?php } ?>					
 
 </select>                   
 </div>                   
 </div>										
                   

                  </div>

                  <div class="row">

                    <div class="col-sm-12">

                      <div class="form-group">
                        <label for="accnumber">Number</label>
                        <br>
                      <input type="text" class="form-control" id="twilio_num1" name="num" placeholder="15417543XXX" onKeyUp="checkkeyword(this.value)" required >
                       <span style="color:#FF0000;" id="show"></span>
                      </div>

                    </div>

                  </div>
				  
				  
				  
				  <div class="form-group">

             <label class="control-label">Make This Number As Default:  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>

            <input type="radio" name="is_default" value="yes" > Yes&nbsp;&nbsp;&nbsp;
			 <input type="radio" name="is_default" value="no"> No

           <input type="hidden" placeholder="Keyword name" value="<?php echo $row['id']; ?>"  required class="form-control input-sm parsley-validated "  name="id">

           <span style="color:#FF0000;" id="show<?php echo $row['id']; ?>"></span>
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
