<?php 

include_once('header.php')

?>    <!-- Main content -->

    <main class="main">



      <!-- Breadcrumb -->

      <ol class="breadcrumb">

        <li class="breadcrumb-item">Home</li>


        <li class="breadcrumb-item active">Profile</li>

       

      </ol>



      <div class="container-fluid">



        <div class="animated fadeIn">

          <div class="card">

            <div class="card-header">

              <i class="icon-people"></i> Profile

            

            </div>



            <div class="card-body">

              <div class="row">



            <div class="col-lg-12"> 

              <div class="add-btn-group-padding">

              <!--button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus fa-sm"></i> Add New User</button-->

              </div>

            </div>

            </div>

              <table class="table table-striped table-bordered datatable table-responsive-sm">

                <thead>

                  <tr>

                    <th>ID</th>

                    <th>User Name</th>

                    <th>Email</th>

                    <th>Profile Image</th>

                    <th>Action</th>

                   

                  </tr>

                </thead>

                <tbody>

                 <?php



        $query = mysqli_query($con,"select * from tapp_user_login WHERE type NOT IN ( 'admin' );") ;



                $i = 1;



        while($row = mysqli_fetch_array($query) ) {?>



                            <tr id="tr" class="tr<?php echo $row['id'];?>">



                                    <td><?php echo $i; ?></td>



                                    <td><?php echo $row['user_name']; ?></td>



                                    <td><?php echo $row['email']; ?></td>

                                    <td><a class="tabel-data-profile-img" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">

                                      <img src="img/avatars/<?php echo $row['profile_image']; ?>" class="img-avatar" alt="admin@bootstrapmaster.com">

                                  </a>

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



                  <form class="no-margin"  method="post"   action="update_user.php?f=unsub" name="client_record" enctype="multipart/form-data" >







      <div class="modal-content">



        <div class="modal-header">



          



          <h4 class="modal-title text-center">Edit User</h4>

          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>



        </div>







        <div class="modal-body">



            <div class="form-group">



             <label class="control-label">User Name</label>



            <input type="text" placeholder="User name" value="<?php echo $row['user_name']; ?>" onBlur="keyword<?php echo $row['id']; ?>(this.value)" required class="form-control input-sm parsley-validated "  name="user_name">



            <input type="hidden" placeholder="Keyword name" value="<?php echo $row['id']; ?>" required class="form-control input-sm parsley-validated "  name="id">

 <input type="hidden" placeholder="Keyword name" value="<?php echo $row['email']; ?>" required class="form-control input-sm parsley-validated "  name="email_old">

            <span style="color:#FF0000;" id="show<?php echo $row['id']; ?>"></span>



            </div>



            <div class="form-group">



            <label class="control-label">email</label>

            

          <input type="email" placeholder="Email" value="<?php echo $row['email']; ?>" onBlur="checkkeyword(this.value)" required class="form-control input-sm parsley-validated "  name="email">



            </div>

     <div class="form-group">



            <label class="control-label">Password</label>

            

          <input type="password" placeholder="password" value="<?php echo $row['password']; ?>" onBlur="checkkeyword(this.value)" required class="form-control input-sm parsley-validated "  name="password">



            </div>



            <div class="form-group">

                         <label for="ccnumber">Profile Image</label>

                        <br>

                       <input type="file" class="form-control" id="profile_image" name="profileimage" value="<?php echo $row['profile_image']; ?>" placeholder="Profile Image">

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



                      <form action="delete_user.php?f=unsub&id=<?php echo $row['id']; ?>" method="post">







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

      <form class="no-margin"  method="post" onSubmit="return Validate()" id="example"  action="get_user1.php" name="client_record" enctype="multipart/form-data" >



      <div class="modal-content">

      

        <!-- Modal Header -->

        <div class="modal-header">

          <h4 class="modal-title text-center">New User</h4>

          <button type="button" class="close" data-dismiss="modal">&times;</button>

        </div>

        

        <!-- Modal body -->

        <div class="modal-body">

         <div class="row">



                    <div class="col-sm-12">



                      <div class="form-group">

                        <label for="name">User Name</label>

                        <input type="text" class="form-control" placeholder="User Name" name="user_name">

                      </div>



                    </div>



                  </div>



                  <div class="row">



                    <div class="col-sm-12">



                      <div class="form-group">

                        <label for="ccnumber">Email</label>

                        <br>

                       <input type="email" class="form-control" name="email" placeholder="example@email.com">

                      </div>



                    </div>



                  </div>

                  <div class="row">



                    <div class="col-sm-12">



                      <div class="form-group">

                        <label for="ccnumber">Password</label>

                        <br>

                       <input type="password" class="form-control"   name="password" id="pass1" placeholder="password">

                      </div>



                    </div>



                  </div>

                  <div class="row">



                    <div class="col-sm-12">



                      <div class="form-group">

                       <label for="ccnumber">Confirm Password</label>

                        <br>

                       <input type="password" class="form-control"   name="password" id="pass2"  placeholder="confirm password">

                      </div>



                    </div>



                  </div>

                  <div class="row">



                    <div class="col-sm-12">



                      <div class="form-group">

                         <label for="ccnumber">Profile Image</label>

                        <br>

                       <input type="file" class="form-control" id="profile_image" name="profileimage" placeholder="Profile Image">

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

<script type="text/javascript">
    function Validate() {
        var password = document.getElementById("pass1").value;
        var confirmPassword = document.getElementById("pass2").value;
        if (password != confirmPassword) {
            alert("Passwords do not match.");
            return false;
        }
        return true;
    }
</script>

<?php



if(isset($_GET['s']))



{



if($_GET['s']==1)



{



?>



<script>

swal({

    title: "user Sucessfully Added.",

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

    title: "User Sucessfully Deleted.",

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

    title: "User Sucessfully Updated.",

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

    title: "Email Already Exist.",

    //text: "Message Sucessfully Added.",

    timer:3000,

    showConfirmButton: false

  });



</script>





<?php



}



}



?>



