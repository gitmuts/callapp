<?php 

include_once('header.php')

?>    <!-- Main content -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
		  $( document ).ready(function() {


var table = $('#dataTable').DataTable();

// Sort by columns 1 and 2 and redraw
table
    .order( [ 3, 'desc' ] )
    .draw();
 });
</script>

    <main class="main">



      <!-- Breadcrumb -->

      <ol class="breadcrumb">

        <li class="breadcrumb-item">Home</li>

        <li class="breadcrumb-item"><a href="#">Admin</a></li>

        <li class="breadcrumb-item active"> Sent Emails</li>

        <!-- Breadcrumb Menu-->

     <!--    <li class="breadcrumb-menu d-md-down-none">

          <div class="btn-group" role="group" aria-label="Button group with nested dropdown">

            <a class="btn" href="#"><i class="icon-speech"></i></a>

            <a class="btn" href="index-2.html"><i class="icon-graph"></i> &nbsp;Groups</a>

            <a class="btn" href="#"><i class="icon-settings"></i> &nbsp;Settings</a>

          </div>

        </li> -->

      </ol>



      <div class="container-fluid">



        <div class="animated fadeIn">

          <div class="card">

            <div class="card-header">

              <i class="icon-paper-plane"></i>  Sent Mails

              <div class="card-actions">

               
              </div>

            </div>



            <div class="card-body">

              <?php

              $msg_num  = '';

if(isset($_POST['num_msg']) and $_POST['num_msg']=="submit"){





$msg_num=$_POST['msg_num'];

}

?>

          <!--form class="row sent-message-form" method=post name=f1 action="">

          <div class="col-sm-5"></div>

          <div class="col-sm-4">

            <input type=hidden name=num_msg value=submit>

           <input class="form-control input-sm inline-block " value="<?php echo $msg_num; ?>" type="text" name="msg_num" size="4" placeholder="Search by number/message"></div>  

          <div class="col-sm-1">

            <input class="btn btn-primary" type="submit" value="Search">

          </div> 

          <div class="col-sm-1 sent-message-form-column">

          <a href="export_sent_msg.php?num_msg=<?php echo $msg_num; ?>" class="float-right"><button type="button" value="Export Data" class="btn btn-primary"> Export Data</button></a>

          </div>

          </form-->

    <?php

if(isset($_POST['num_msg']) and $_POST['num_msg']=="submit"){





$msg_num=$_POST['msg_num'];



?>

              <table class="table table-striped table-bordered datatable table-responsive-sm" id="dataTable">

                <thead>

                  <tr>

                    <th>ID</th>

                    <th>Email</th>


                    <th>Message</th>

                    <th>Date</th>

                  </tr>

                </thead>

                <tbody>

                  <?php 



  
if($_SESSION['user_type'] == "user")
{
$query = mysqli_query($con,"select * from tapp_sent_email_log where email='".$_SESSION['user']."' or message  like '%".$_SESSION['user']."%'  ") ;	 
}
else
{

        $query = mysqli_query($con,"select * from tapp_sent_email_log where email='".$msg_num."' or message  like '%".$msg_num."%'  ") ;

} 

                $i = 1;



        while($row = mysqli_fetch_array($query) )



          { 

        ?>  

                  <tr id="tr" class="tr<?php echo $row['id'];?>">

                    <td> <?php echo $i; ?></td>

                    <td><?php echo $row['email']; ?></td>


                    <td><?php echo $row['message']; ?></td>

                    <td><?php echo $row['date_time']; ?></td>

                  </tr>



                  <?php $i++; }?>

                </tbody>

              </table>





 <?php

}

else

{

?>

             <table class="table table-striped table-bordered datatable table-responsive-sm" id="dataTable" style="width: 100%">

                <thead>

                  <tr>

                    <th>ID</th>

                    <th>Email</th>


                    <th>Message</th>

                    <th>Date</th>
                    <th>Delete</th>
                  </tr>

                </thead>

                <tbody>

                  



        <?php 

    /* $query = mysqli_query($con,"truncate table  tapp_sent_msg_log") ; */

    //$query = mysqli_query($con,"select * from tapp_sent_email_log") ;

if($_SESSION['user_type'] == "user")
{
$query = mysqli_query($con,"select * from tapp_sent_email_log where email='".$_SESSION['user']."' or message  like '%".$_SESSION['user']."%'  ");	 
}
else
{

        $query = mysqli_query($con,"select * from tapp_sent_email_log order by date_time desc");

} 

                $i = 1;

        while($row = mysqli_fetch_array($query) )

          { 
            $sql = mysqli_query($con,"select * from email_log where id='".$row['message']."'");
              while ($data = mysqli_fetch_assoc($sql)) {
                $email_message = $data['email'];
              }


        ?>  

                  <tr id="tr" class="tr<?php echo $row['id'];?>">

                    <td> <?php echo $i; ?></td>

                    <td style="white-space: nowrap;"><?php echo $row['email']; ?></td>


                    <td><a href="javascript:void(0)" onclick="get_email('<?php echo $row['message']; ?>')">View Email</a><!-- The Modal --></td>

                    <td><?php echo $row['date_time']; ?></td>
                    <td nowrap="nowrap">
                      <a href="delete_sent_email.php?id=<?php echo $row['id'];?>" onclick="return confirm('Are you sure you want to delete?')" class="btn-danger btn-sm" >Delete</a>
                    </td>
                  </tr>



                  <?php $i++; } ?>

                </tbody>

              </table>

                

<?php

}

?>

            </div>

          </div>

        </div>



      </div>
<div class="modal" id="viewemail">
                    <div class="modal-dialog" style="max-width: 1500px;">
                      <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                          <h4 class="modal-title">Email</h4>
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body" id="setemail">
    
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
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
  <script type="text/javascript">
    function get_email(param) {
      var id = param;
      $.ajax({
        type:'post',
        url: 'get_email.php',
        data: { id:id},
        success:function(status) {
          $("#setemail").html(status);
          $("#viewemail").modal('show');
        }


      });
    }
  </script>

