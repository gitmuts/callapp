

<?php 

include_once('header.php')

?>    <!-- Main content -->

    <main class="main">



      <!-- Breadcrumb -->

      <ol class="breadcrumb">

        <li class="breadcrumb-item">Home</li>

        <li class="breadcrumb-item"><a href="#">Admin</a></li>

        <li class="breadcrumb-item active">Scheduled Messages</li>

      </ol>



      <div class="container-fluid">



        <div class="animated fadeIn">

          <div class="card">

           

            <div class="card-header">

              <i class="icon-people"></i> Scheduled Messages

              

            </div>



            <div class="card-body">



              <div class="row">



            <div class="col-lg-12"> 

              <div class="add-btn-group-padding">

              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#form">
                <i class="fa fa-plus fa-sm"></i> Schedule message</button>

              </div>

            </div>

            </div>

              

              <table class="table table-striped table-bordered datatable table-responsive-sm" id="dataTable">

                <thead>

                  <tr>

                    <th>ID</th>

                  <th>Numbers/Lists</th>

                  <th>Message</th>

                  <th>Scheduled For</th>

                  <th>Action</th>

                      

                   

                  </tr>

                </thead>

                <tbody>

                 <?php 

        $query = mysqli_query($con,"select * from tapp_sent_msg where type='scheduled'") ;

                $i = 1;

        while($row = mysqli_fetch_array($query) )

          { 

        $msg_date=$row['scheduled_for'];

        $ex=explode(' ',$msg_date);

        $date=$ex[0];

        $time=$ex[1];

        ?>    

                  <tr id="tr" class="tr<?php echo $row['id'];?>">

                      <td><?php echo $i; ?></td>

                          <td><?php echo $row['sms_number']; ?></td>

                          <td><?php echo $row['message']; ?></td>

                          <td><?php echo $row['scheduled_for']; ?></td>

                          

                    <!-- ss -->

                   <td>

                  

                      <a class="btn btn-info action-btn" href="#edit_form<?php echo $row['id']; ?>" data-toggle="modal">

              <i class="fa fa-edit "></i>

            </a>

                      <a class="btn btn-dangeraction-btn" href="#delete<?php echo $row['id']; ?>" data-toggle="modal">

              <i class="fa fa-trash-o "></i>



            </a>

                    </td> 

                  </tr>

                  <?php $i++; }?>

                </tbody>

              </table>

              <?php 

        $query22 = mysqli_query($con,"select * from tapp_sent_msg where type='scheduled'") ;

                $i = 1;

        while($row22 = mysqli_fetch_array($query22) )

          { 

        $msg_date=$row22['scheduled_for'];

        $ex=explode(' ',$msg_date);

        $date=$ex[0];

        $time=$ex[1];

        ?> 



          <div class="modal fade" id="edit_form<?php echo $row22['id']; ?>">

    <div class="modal-dialog">

                  <form class="no-margin"  method="post" onSubmit="return myFunction()"  action="update_shedule_message.php" name="client_record" enctype="multipart/form-data" >



      <div class="modal-content">

        <div class="modal-header">

          

          <h4 class="modal-title text-center">Edit Message</h4>

          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

        </div>



        <div class="modal-body">

                    <div class="form-group">



               <label class="control-label">Number</label><br/>

            <input name="number" class="form-control input-sm parsley-validated" value="<?php echo $row22['sms_number']; ?>" required placeholder="Write Number Here!" type='text' list='listid'>

            <datalist id='listid'>

<?php

      $query331 = mysqli_query($con,"select * from tapp_suscribers_list") ;

            while($row331 = mysqli_fetch_array($query331) ) 

            {

      if($row331['list_name']=='' || $row331['list_name']==null )

      {

      ?>

            <?php

      }

      else

      {

            ?>  

            <option  value='<?php echo $row331['list_name']; ?>'><?php echo $row331['list_name']; ?></option>

            <?php

            }

      }

        $query33 = mysqli_query($con,"select * from tapp_newsletter") ;

        while($row33 = mysqli_fetch_array($query33) ) 

        {

        if($row33['name']=='' || $row33['name']==null )

        {

      ?>

            <?php

      }

      else

      {

            ?>  

            <option  value='<?php echo $row33['name']; ?>'>

            <?php

            }

      }

            $query33 = mysqli_query($con,"select * from tapp_newsletter") ;

            $i = 1;

            while($row3 = mysqli_fetch_array($query33) ) 

            {

      if($row3['mobile_no']=='' || $row3['mobile_no']==null )

      {

      ?>

            <?php

      }

      else

      {

            ?>  

            <option  value='<?php echo $row3['mobile_no']; ?>'>

            <?php

      }

            }

           

            $query33 = mysqli_query($con,"select * from tapp_newsletter") ;

            $i = 1;

            while($row3 = mysqli_fetch_array($query33) ) 

            {

      if($row3['email']=='' || $row3['email']==null )

      {

      ?>

            <?php

      }

      else

      {

            ?>  

            <option  value='<?php echo $row3['email']; ?>'>

            <?php

      }

            }

            ?>



            

            </datalist> 

</div>  

<div class="form-group">

            <label class="control-label">Scheduled For</label>

            

            <div class="controls input-append date form_datetime" data-link-field="dtp_input1" style="margin-bottom: -50px;">

            <input size="16" name="schedule_for" type="text" value="<?php echo $row22['scheduled_for']; ?>" class="form-control input-sm parsley-validated" readonly><span style="visibility:hidden; margin-top:-5px" class="add-on"><i class="icon-th"></i></span>

            

            </div>

            <input type="hidden" id="dtp_input1" value="" /><br/>            

            </div>

            

   <div class="form-group">

            <label class="control-label">Message</label>

               <input type="hidden" id="dem<?php echo $row22['id']; ?>" name="message" required value="<?php echo $row22['message']; ?>" placeholder="Write your Message Here!">

               <input type="hidden"  name="id" value="<?php echo $row22['id']; ?>" placeholder="Write your Message Here!">

          



                    <div id="cont<?php echo $row22['id']; ?>"></div>

            </div>

               

        <div class="form-group one">

            

            <label class="control-label">Add a Image</label>



            <div class="upload-file">

                    <input style="cursor:pointer;" type="file" id="upload-demo" name="file" class="upload-demo">

                    <label data-title="Select Image" for="upload-demo">

                      <span data-title="No image selected..."></span>

                    </label>

                  </div>

                                    </div>

                                              

<div class="form-group">

            <label class="control-label">URL</label>

            

                   <input name="url" class="form-control input-sm parsley-validated" value="<?php echo $row22['url']; ?>" required placeholder="Write URL Here!" type='url' list='listid'>

        

            </div>

                                    

        </div>

        <div class="modal-footer">

        <!--<button style="margin-left: 0px; " id="send_btn" class="btn btn-success"   name="type" type="submit" value="send"><i class="fa fa-check fa-lg"></i> Send Now</button>

       

        <button style="margin-left: 0px;" id="draft_btn" class="btn btn-success" name="type" type="submit" value="draft"><i class="fa fa-check fa-lg"></i> Save Draft </button>-->

       

        <!--  <button style="margin-left: 0px;" id="scheduled_btn" class="btn btn-success" name="type" type="submit" value="scheduled"><i class="fa fa-check fa-lg"></i> Scheduled </button>-->

        <button style="margin-left: 0px;" id="scheduled_btn" class="btn btn-success" name="type" type="update" value="update"><i class="fa fa-check fa-lg"></i> Update </button>

        <button class="btn btn-sm btn-danger" data-dismiss="modal" aria-hidden="true">Close</button>

        </div>

        </div>

        <!-- /.modal-content --> 

        </form>



    </div>

    <!-- /.modal-dialog --> 

  </div>

  <!-- /.modal --> 

   <!--Modal-->

  <div class="modal fade" id="delete<?php echo $row22['id']; ?>">

    <div class="modal-dialog">

                      <form action="delete_shedule_msg.php?id=<?php echo $row22['id']; ?>&type='send'" method="post">



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

      <!-- /.modal-content --> 

                        </form>

    </div>

    <!-- /.modal-dialog --> 

  </div>

  <!-- /.modal --> 

  <?php

  }

  ?>





            </div>

          </div>

        </div>



      </div>

      <!-- /.conainer-fluid -->

    </main>

  </div>



  <div class="modal fade" id="form">

    <div class="modal-dialog">

                  <form class="no-margin"  method="post" onSubmit="return myFunction()"  action="get_message_newsletter.php" name="client_record" enctype="multipart/form-data" >



      <div class="modal-content">

        <div class="modal-header">

         

          <h4 class="modal-title text-center">Send Message</h4>

           <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

        </div>



        <div class="modal-body">

          <!--  <div class="form-group">

             <label class="control-label">URL</label>

             <input type="url"  name="url" class="form-control input-sm parsley-validated" placeholder="Write Url Here!">

                <span style="color:#FF0000;" id="show"></span> 

                </div>

            -->

            <div class="form-group">

            <label class="control-label">Message</label>

                        <input type="hidden" id="demo1" name="message" required placeholder="Write your Message Here!">

                         <textarea class="form-control" rows="3" name="message" data-control="exname-control" maxlength="160" placeholder="Write your Message Here!" required ><?php echo $row['message']; ?></textarea>



                    <div id="container"></div>



            </div>

           

             <div class="form-group">

            <label class="control-label">Date Time</label>

            

            <div class="controls input-append date form_datetime" data-link-field="dtp_input1" style="margin-bottom: -50px;">

            <input size="16" name="msg_date" type="text" value="<?php echo date('Y-m-d h:m'); ?>" class="form-control input-sm parsley-validated" readonly><span style="visibility:hidden; margin-top:-5px" class="add-on"><i class="icon-th"></i></span>

            

            </div>

            <input type="hidden" id="dtp_input1" value="" /><br/>            

            </div>

            

            </div>

       

        <div class="modal-footer">

        <button style="margin-left: 0px;" id="draft_btn" class="btn btn-success" name="type" type="submit" value="draft"><i class="fa fa-check fa-lg"></i> Save Draft </button>

        <button style="margin-left: 0px; " id="send_btn" class="btn btn-success"   name="type" type="submit" value="send"><i class="fa fa-check fa-lg"></i> Send Now</button>

     <!--   <button style="margin-left: 0px;" id="scheduled_btn" class="btn btn-success" name="type" type="submit" value="scheduled"><i class="fa fa-check fa-lg"></i> Scheduled </button>-->

        

        <button class="btn btn-sm btn-success" data-dismiss="modal" aria-hidden="true">Close</button>

          </div>

      </div>

      <!-- /.modal-content --> 

                </form>



    </div>

    <!-- /.modal-dialog --> 

  </div>



  <?php 

include_once('footer.php')

?>

<!-- Plugins and scripts required by this views -->

  <script src="vendors/js/jquery.dataTables.min.js"></script>

  <script src="vendors/js/dataTables.bootstrap4.min.js"></script>



  <!-- Custom scripts required by this view -->

  <script src="js/views/tables.js"></script>

