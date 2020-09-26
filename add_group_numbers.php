<?php 
include_once('header.php')
?>    <!-- Main content -->
    <main class="main">

      <!-- Breadcrumb -->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <!--li class="breadcrumb-item"><a href="#">Admin</a></li-->
        <li class="breadcrumb-item active">Groups</li>
      </ol>
      <div class="container-fluid">
        <div class="animated fadeIn">
          <div class="card">
            <div class="card-header">
              <i class="icon-people"></i> Groups
              <div class="card-actions">
                
              </div>
            </div>

            <div class="card-body">
              <div class="row">

            <div class="col-lg-12"> 
              <div class="add-btn-group-padding">
              <button type="button" class="btn btn-primary btn-md"  data-toggle="modal" data-target="#form"><i class="fa fa-plus fa-sm"></i> Add Group</button>
			  <a href="sample.xlsx" download class="btn btn-primary btn-md"  ><i class="fa fa-plus fa-sm"></i> Download Sample</a>
              </div>
            </div>
            </div>
              <table class="table table-striped table-bordered datatable table-responsive-add" id="dataTable">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Group Name</th>
                    <th>Action</th>
                   
                  </tr>
                </thead>
                <tbody>

                  <?php 
        $query = mysqli_query($con,"select * from tapp_groups group by group_name") ;
                $i = 1;
        while($row = mysqli_fetch_array($query) ) 
        {
        $query11 = mysqli_query($con,"select count(*) from tapp_groups where group_name='".$row['group_name']."'") ;              
        while($row11=mysqli_fetch_array($query11))
        {
        
        
        $count=$row11[0];
        
        
        }


        
        ?> 
                  
                  <tr id="tr" class="tr<?php echo $row['id'];?>">
                    <td><?php echo $i; ?></td>
                    <td><a href="view_group_numbers.php?group_name=<?php echo $row['group_name']; ?>"><strong><?php echo $row['group_name']; ?> (<?php echo $count; ?>)</strong></a></td>
                    <td>
                      <a class="btn btn-danger action-btn" data-toggle="modal" href="#delete<?php echo $i; ?>">
                <i class="fa fa-trash-o "></i>
              </a>
                    </td>
     
                  </tr><div class="modal fade" id="edit_form<?php echo $row['id']; ?>">

    <div class="modal-dialog">

                <form class="no-margin"  method="post" onSubmit="return validation()" id="ex<?php echo $row['id']; ?>"  action="update_twilio_number.php" name="client_record"  >

      <div class="modal-content">
<div class="modal-header">
          <h4 class="modal-title text-center">Edit Number</h4>
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div>
       <div class="modal-body">

            <div class="form-group">

            <label class="control-label">Group Name</label>
            <input type="text" id="" placeholder="Enter client name" value="<?php echo $row['client_name']; ?>" required class="form-control input-sm parsley-validated "  name="client_name">
            </div>
            <div class="form-group">

             <label class="control-label">Number</label>

            <input type="number" id="twilio_num" placeholder="Enter Number e.g 61********" value="<?php echo $row['number']; ?>" onBlur="checkkeyword<?php echo $row['id']; ?>(this.value)" required class="form-control input-sm parsley-validated "  name="num">

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
  
  <div class="modal fade" id="delete<?php echo $i; ?>">

    <div class="modal-dialog">


                      <form action="delete_group.php?group=<?php echo $row['group_name']; ?>" method="post">


      <div class="modal-content">
<div class="modal-header">
          <h4 class="modal-title text-center">Remove this Group?</h4>
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div>
      

        <div class="modal-body">

            <div class="form-group" style="text-align: center;">


              <label for="folderName">Are you sure you want to remove this group? This action can't be undone.</label>

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
      <!-- .container-fluid -->
    </main>

    

  </div>





  


  <div class="modal fade" id="form">
    <div class="modal-dialog">
<form  method="post" onSubmit="return validation1()"  action="get_group1.php" name="client_record" id="example" enctype="multipart/form-data">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title text-center">New Group</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
         <div class="row">

                    <div class="col-sm-12">

                      <div class="form-group">
                        <label for="name">Group Name</label>
                        <input type="text" class="form-control" id="name" name="group_name" placeholder="Enter Group Name">
                      </div>

                    </div>

                  </div>

                  <div class="row">

                    <div class="col-sm-12">

                      <div class="form-group">
                        <label for="ccnumber">Number</label>
                        <br>
                       <input type="file" id="upload-demo" name="file" >
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

  <script type="text/javascript">
    
    function validation1() {

    var a = document.getElementById("twilio_num1").value;

//alert(a);

    if (a.length > 11 || a.length < 11) {

        alert("Number length must be 11");

        return false;

    }

}

  </script>

  <?php 
include_once('footer.php')
?>
<!-- Plugins and scripts required by this views -->
  <script src="vendors/js/jquery.dataTables.min.js"></script>
  <script src="vendors/js/dataTables.bootstrap4.min.js"></script>

  <!-- Custom scripts required by this view -->
  <script src="js/views/tables.js"></script>
