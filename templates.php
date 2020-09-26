<?php 

include_once('header.php')

?>    <!-- Main content -->

    <main class="main">



      <!-- Breadcrumb -->

      <ol class="breadcrumb">

        <li class="breadcrumb-item">Home</li>

        <!--li class="breadcrumb-item"><a href="#">Admin</a></li-->

        <li class="breadcrumb-item active"> Template</li>

      </ol>



      <div class="container-fluid">



        <div class="animated fadeIn">

          <div class="card">

            <div class="card-header">

              <i class="icon-envelope-open"></i> Template

              <div class="card-actions">

             

              </div>


              <div class="modal fade" id="add_form<?php echo $row['id']; ?>">



    <div class="modal-dialog">



                 <form class="no-margin" id="formValidate2" data-validate="parsley" method="post" action="add_new_template.php" name="template" enctype="multipart/form-data" > 

      
      <div class="modal-content">



        <div class="modal-header">



          



          <h4 class="modal-title text-center">Add Template</h4>

          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>



        </div>







        <div class="modal-body">


<div class="form-group">
            <label class="control-label">Title</label>
          <input type="text" placeholder="Title" value="" required class="form-control "  name="title">
           </div>
		 <div class="form-group">
            <label class="control-label">Type</label>
          <select  required class="form-control "  name="temp_type">
          
          <option value="SMS">SMS</option>
          </select>
           </div>  
		   
		   <div class="form-group">
            <label class="control-label">Message</label>
          <textarea  placeholder="Template Message" rows="5" required class="form-control"  name="message"></textarea>
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
  
  
  
  
  
 

            </div>



            <div class="card-body">

         <div class="container">

         



<div class="form-group">

                  

                   

                   <div class="col-md-5">

                    <button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#add_form ">Add New Template
               </button>
              

                  </div>

                  </div>  







</div>



<!-- <div class="row">

           

                <div class="col-sm-1 sent-message-form-column">

                    <a href="export_leads.php?year=<?php echo $year; ?>&month=<?php echo $month; ?>"><button type="button" value="Export Data" class="btn btn-primary btn-md"> Export Data</button></a>

                  </div>

                  <br><br>

            

           </div>  --> 

           <?php







?>
<div style="overflow:auto">

              <table class="table table-striped table-bordered datatable table-responsive-sm" id="dataTable">

                <thead>

                  <tr>

                     <th>S.No.</th>

                    <th>Title</th>

                    

                    <th>Message</th>
					                  

                    <!-- <th>Twilio Number</th>

                    <th>Message</th>

                    <th>Date/time</th> -->
                    <th>Action</th>

                  </tr>

                </thead>

                <tbody>

                   <?php



				
				  $qry = mysqli_query($con,"SELECT *   FROM tapp_template_msg");
			

$i = 1;

            while($data1=mysqli_fetch_array($qry))



        {



?>

                  <tr id="tr" class="tr<?php echo $row['id'];?>">

                   <td><?php echo $i++; ?></td>

                    <td><?php echo $data1['title'];  ?></td>

                    <td><?php echo substr($data1['message'],0,250); ?></td>

                 



                 



                    
                    <td> <a class="btn btn-info action-btn" href="#edit_form<?php echo $data1['id']; ?>"  data-toggle="modal" >

                <i class="fa fa-edit "></i>

              </a>

                      <a class="btn btn-danger action-btn" href="#delete<?php echo $data1['id']; ?>"  data-toggle="modal" >

                <i class="fa fa-trash-o "></i>

              </a></td>

                  </tr>

                  <div class="modal fade" id="edit_form<?php echo $data1['id']; ?>">



    <div class="modal-dialog">



                 <form class="no-margin" id="formValidate2" data-validate="parsley" method="post" action="update_template.php" name="template" enctype="multipart/form-data" > 

                  <input type="hidden" name="" value="<?php echo $data1['id'] ?>">







      <div class="modal-content">



        <div class="modal-header">



          



          <h4 class="modal-title text-center">Edit Template</h4>

          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>



        </div>







        <div class="modal-body">


<div class="form-group">
            <label class="control-label">Title</label>
          <input type="text" placeholder="Title"  required class="form-control "  name="title" value="<?php echo $data1['title'];?>">
           </div>
		   <div class="form-group">
            <label class="control-label">Type</label>
          <select  required class="form-control "  name="temp_type">
        
          <option value="SMS" <?php if($data1['temp_type'] == 'SMS') echo "selected";?> )>SMS</option>
          </select>
           </div> 
		   
		   <div class="form-group">
            <label class="control-label">Email</label>
          <textarea  placeholder="Template Message" rows="5" required class="form-control"value="<?php echo $data1['message'];?>"   name="message"><?php echo $data1['message'];?></textarea>
           </div>
		   
		   
          

        
<input type="hidden" name="id" value="<?php echo $data1['id'];?>">
           

            

           
          





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



  <div class="modal fade" id="delete<?php echo $data1['id']; ?>">



    <div class="modal-dialog">



                      <form action="delete_template.php" method="post">


<input type="hidden" name="id" value="<?php echo $data1['id']; ?>">




      <div class="modal-content">



        <div class="modal-header">



          



          <h4 class="modal-title text-center">Remove this Template?</h4>

          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>



        </div>







        <div class="modal-body">



            <div class="form-group" style="text-align: center;">



              <label for="folderName">Are you sure you want to remove this Template? This action can't be undone.</label>



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

                  <?php



    }



     ?>

                </tbody>

              </table>
</div>
           





            </div>

          </div>

        </div>



      </div>

      <!-- /.conainer-fluid -->

    </main>



    <!--  -->



  </div>



  <?php 

include_once('footer.php')

?>

<!-- Plugins and scripts required by this views -->

  <script src="vendors/js/jquery.dataTables.min.js"></script>

  <script src="vendors/js/dataTables.bootstrap4.min.js"></script>



  <!-- Custom scripts required by this view -->

  <script src="js/views/tables.js"></script>

