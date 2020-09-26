
<?php 
include_once('header.php')
?>    <!-- Main content -->
    <main class="main">

      <!-- Breadcrumb -->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item"><a href="#">Admin</a></li>
        <li class="breadcrumb-item active">Predrafted Keywords</li>
        <!-- Breadcrumb Menu-->
        <!-- <li class="breadcrumb-menu d-md-down-none">
          <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
            <a class="btn" href="#"><i class="icon-speech"></i></a>
            <a class="btn" href="index-2.html"><i class="icon-graph"></i> &nbsp;Predrafted Keywords</a>
            <a class="btn" href="#"><i class="icon-settings"></i> &nbsp;Settings</a>
          </div>
        </li> -->
      </ol>

      <div class="container-fluid">

        <div class="animated fadeIn">
          <div class="card">
            <div class="card-header">
              <i class="icon-people"></i> Predrafted Keywords
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
              <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus fa-sm"></i>&nbsp;New Message</button>
              </div>
            </div>
            </div>
              <table class="table table-striped table-bordered datatable" id="dataTable">
                <thead>
                  <tr>
                    <th>ID</th>
                   
                    <th>Message</th>
                    
                   
                  </tr>
                </thead>
                <tbody>

                  <?php

        $query = mysqli_query($con,"select * from tapp_predrafted_message") ;

                $i = 1;

        while($row = mysqli_fetch_array($query) ) {?>
                  
                  <tr id="tr" class="tr<?php echo $row['id'];?>">
                    <td><?php echo $i; ?></td>
                    <td><?php echo $row['message']; ?></td>
                   
                    
                   
                    <!-- ss -->
                     <td>
                      <a class="btn btn-info" href="#edit_form<?php echo $row['id']; ?>" data-toggle="modal">
               <i class="fa fa-edit "></i>
            </a>
                      
                      <a class="btn btn-danger" href="#delete<?php echo $row['id']; ?>" data-toggle="modal">
              <i class="fa fa-trash-o "></i>

            </a>
                    </td> 
                  </tr>
                  
                  <div class="modal fade" id="edit_form<?php echo $row['id']; ?>">

    <div class="modal-dialog">

                  <form class="no-margin"  method="post" onSubmit="return myFunction()"  action="update_predraft.php?f=up" name="client_record" enctype="multipart/form-data" >


      <div class="modal-content">

        <div class="modal-header">

          <h4 class="modal-title text-center">Edit Message</h4>

          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

        </div>

        <div class="modal-body">

      
      
        <div class="form-group">

            <label class="control-label">Message</label>

            <textarea class="form-control" rows="3" name="message" data-control="exname-control" maxlength="160" placeholder="Write your Message Here!" id='output<?php echo $row['id']; ?>' required ><?php echo $row['message']; ?></textarea>

            You have <span class="add-on" id="co<?php echo $row['id']; ?>"></span> characters left.

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


                      <form action="update_predraft.php?f=dl&id=<?php echo $row['id']; ?>" method="post">

     <div class="modal-content">

     <div class="modal-header">

          <h4 class="modal-title text-center">Remove this Message?</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>


        </div>


        <div class="modal-body">

            <div class="form-group" style="text-align: center;">

              <label for="folderName">Are you sure you want to remove this Message? This action can't be undone.</label>

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

  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
       <form class="no-margin"  method="post" onSubmit="return myFunction()"  action="get_predraft.php?f=unsub" name="myform"  enctype="multipart/form-data" >
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title text-center">Add New Message</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
         

                  <div class="row">

                    <div class="col-sm-12">

                      <div class="form-group">
                        <label for="ccnumber">Message</label>
                        <br>
                      <textarea class="form-control" rows="3" name="message" id="examplename" data-control="exname-control" maxlength="160" placeholder="Write your Message Here!" required=""></textarea>
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
  function myFunction() {















    var inputVal = document.getElementById("client_id");







    var button = document.getElementById("button");







    if (inputVal.value == "") {







    button.style.backgroundColor = "#38a2c9";







    button.style.border = "solid #38a2c9";







    }







    else{







    button.style.backgroundColor = "#3ec291";







    button.style.border = "solid #3ec291";







    }

  }
</script>