<?php 
include_once('header.php')
?>    <!-- Main content -->
    <main class="main">

      <!-- Breadcrumb -->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <!--li class="breadcrumb-item"><a href="#">Admin</a></li-->
        <li class="breadcrumb-item active">Blacklist</li>
      </ol>
      <div class="container-fluid">
        <div class="animated fadeIn">
          <div class="card">
            <div class="card-header">
              <i class="icon-people"></i> Blacklist
              <div class="card-actions">
                <a href="https://datatables.net/">
                  <!--small class="text-muted">docs</small-->
                </a>
              </div>
            </div>

            <div class="card-body">
              <div class="row">

            <div class="col-lg-12"> 
              <div class="add-btn-group-padding">
              <button type="button" class="btn btn-primary btn-md"  data-toggle="modal" data-target="#form"><i class="fa fa-plus fa-sm"></i> Add Number</button>
			 
              </div>
            </div>
            </div>
              <table class="table table-striped table-bordered datatable table-responsive-add" id="dataTable">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Number</th>
                    <th>Action</th>
                   
                  </tr>
                </thead>
                <tbody>

                  <?php 
        $query = mysqli_query($con,"select * from tapp_blacklist") ;
                $i = 1;
        while($row = mysqli_fetch_array($query) ) 
        {
       


        
        ?> 
                  
                  <tr id="tr" class="tr<?php echo $row['id'];?>">
                    <td><?php echo $i; ?></td>
                    <td><strong><?php echo $row['number']; ?> </strong></a></td>
                    <td><a href="delete_blacklist.php?id=<?php echo $row['id'];?>" onclick="return confirm('Are you sure to remove the number from blacklist?')" class="btn btn-danger">Delete </a></td>
                   
     
                  </tr>
  
  <!--div class="modal fade" id="delete<?php echo $i; ?>">

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


  </div-->

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
<form  method="post" onSubmit="return validation1()"  action="add_blacklist.php" name="" id="" enctype="multipart/form-data">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title text-center">Add Number</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
         <div class="row">

                    <div class="col-sm-12">

                      <div class="form-group">
                        <label for="name">Number</label>
                        <input type="text" class="form-control" id="name" name="number" placeholder="Enter Number">
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
