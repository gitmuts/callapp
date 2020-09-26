
<?php 
include_once('header.php')
?>    <!-- Main content -->
    <main class="main">

      <!-- Breadcrumb -->
     <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item"><a href="#">Admin</a></li>
        <li class="breadcrumb-item active">Add New Client</li>
        <!-- Breadcrumb Menu-->
        
      </ol>

      <div class="container-fluid">

        <div class="animated fadeIn">
          <div class="card">
            <div class="card-header">
              <i class="icon-people"></i>Add New Client
              
            </div>

            <div class="card-body">
              <div class="row">

            <div class="col-lg-12"> 
              <div class="add-btn-group-padding">
              <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus fa-sm"></i>Add New Client</button>
              </div>
            </div>
            </div>
              <table class="table table-striped table-bordered datatable table-responsive-sm">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Client Name</th>
                    <th>Email</th>
                    <th>Profile Image</th>
                    <th>Action</th>
                   
                  </tr>
                </thead>
                <tbody>
                 <?php 

//        $query = mysqli_query($con,"select * from tapp_list_numbers") ;
        $query = mysqli_query($con,"select * from new_client") ;

        while($row = mysqli_fetch_array($query) ) {
          
         $filename = $row['filename'];
          ?>

                            <tr id="tr" class="tr<?php echo $row['id'];?>">

                                    <td><?php echo $row['id'];?></td>

                                    <td><?php echo $row['name']; ?></td>

                                    <td><?php echo $row['email']; ?></td>
                                    <td><?php print "<img style='height:30px; width:30px;' src=img/avatars/$filename>"; ?>
                                   </td>

                  <td style="text-align:right;"> <a class="btn btn-info action-btn" href="#edit_form<?php echo $row['id']; ?>"  data-toggle="modal" >
                <i class="fa fa-edit "></i>
              </a>
                      <a class="btn btn-danger action-btn" href="#delete<?php echo $row['id']; ?>"  data-toggle="modal" >
                <i class="fa fa-trash-o "></i>
              </a>



                                   </td>

                                   </tr> 
               <!--Modal-->

  <div class="modal fade" id="edit_form<?php echo $row['id']; ?>">

    <div class="modal-dialog">

                 <form class="no-margin" id="formValidate2" data-validate="parsley" method="post" action="update_client.php" name="client_record" enctype="multipart/form-data" >



      <div class="modal-content">

        <div class="modal-header">

          

          <h4 class="modal-title text-center">Edit Client</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

        </div>



        <div class="modal-body">

            <div class="form-group">

             <label class="control-label">Client Name</label>

            <input type="text" name="name" placeholder=" Enter Your Name..." value ="<?php echo $row['name'];?>" class="form-control input-sm parsley-validated" required>

            </div>

            <div class="form-group">

            <label class="control-label">Client Email</label>
            
          <input type="email" placeholder="Email" value="<?php echo $row['email']; ?>" required class="form-control  "  name="email">

            </div>

            <div class="form-group">
                         <label for="ccnumber">Profile Image</label>
                        <br>
                       <input style="cursor:pointer;" type="file" id="upload-demo" name="fileToUpload" value ="<?php echo $row['filename']; ?>" class="upload-demo" >

                      </div>


           </div>

        <div class="modal-footer">

                  <button type="submit" class="btn btn-danger btn-sm check<?php echo $row['id']; ?>">Submit</button>



          <button class="btn btn-sm btn-success" data-dismiss="modal" aria-hidden="true">Close</button>

          </div>
      </div>

      <!-- /.modal-content -->

                </form>



    </div>

    <!-- /.modal-dialog -->

  </div>

  <!-- /.modal -->

   <!--Modal-->
 <!--Modal-->

  <div class="modal fade" id="delete<?php echo $row['id']; ?>">

    <div class="modal-dialog">

                      <form action="delete_client.php?f&id=<?php echo $row['id']; ?>" method="post">



      <div class="modal-content">

        <div class="modal-header">

          

          <h4 class="modal-title text-center">Remove this User?</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

        </div>



        <div class="modal-body">

            <div class="form-group" style="text-align: center;">

              <label for="folderName">Are you sure you want to remove this User? This action can't be undone.</label>

            </div>

        </div>



        <div style="text-align:center;" class="modal-footer">

                  <button type="submit" class="btn btn-danger btn-sm">Confirm</button>



          <button class="btn btn-sm btn-success" data-dismiss="modal" aria-hidden="true">Close</button>

          </div>

      </div>

      <!-- /.modal-content -->

                        </form>

    </div>

    <!-- /.modal-dialog -->

  </div>

  <!-- /.modal -->

       <?php  }?>



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
      <form class="no-margin" id="formValidate2" data-validate="parsley" method="post" action="add_new_client1.php" name="client_record" enctype="multipart/form-data" >

      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title text-center">New Client</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">


         <div class="row">

                    <div class="col-sm-12">

                      <div class="form-group">
                        <label for="name">Client Name</label>
                        <input type="text" name="name" placeholder=" Enter Your Name..." class="form-control" required>
                      </div>

                    </div>

                  </div>

                  <div class="row">

                    <div class="col-sm-12">

                      <div class="form-group">
                        <label for="email">Client Email</label>
                        <br>
                       <input type="email" name="email" placeholder="Enter Your Email..." class="form-control" required>
                      </div>

                    </div>

                  </div>
                  
                  <div class="row">

                    <div class="col-sm-12">

                      <div class="form-group">
                         <label for="ccnumber">Upload An Image</label>
                        <br>
                       <input type="file" id="upload-demo" name="fileToUpload" class="form-control" required>
                      </div>

                    </div>

                  </div>

        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" id="draft_btn"  name="type" class="btn btn-primary"><i class="fa fa-dot-circle-o"></i> Submit</button>
          <button type="button" id="draft_btn" name="type" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
if(isset($_GET['f']))
{
if($_GET['f']==1)
{
?>
<script>
alert("List Created Successfully");
</script>
<?php
}
if($_GET['f']==2)
{
?>
<script>
alert("Numbers send successfully");
</script>
<?php
}
else 
{
?>
<script>
alert("User name already exists!");
</script>
<?php
}
}
?>

