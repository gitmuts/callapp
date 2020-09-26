<?php 
include_once('header.php')
?>    <!-- Main content -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
		  $( document ).ready(function() {


var table = $('#dataTable').DataTable();

// Sort by columns 1 and 2 and redraw
table
    .order( [ 5, 'desc' ] )
    .draw();
 });
</script>
    <main class="main">

      <!-- Breadcrumb -->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <!--li class="breadcrumb-item"><a href="#">Admin</a></li-->
        <li class="breadcrumb-item active"> Sent Messages</li>
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
              <i class="icon-paper-plane"></i>  Sent Messages
              <div class="card-actions">
                <a href="https://datatables.net/">
                  <!--small class="text-muted">docs</small-->
                </a>
              </div>
            </div>

            <div class="card-body">
              <?php
              $msg_num  = '';
if(isset($_POST['num_msg']) and $_POST['num_msg']=="submit"){


$msg_num=$_POST['msg_num'];
}
?>
          <form class="row sent-message-form" method=post name=f1 action="">
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
          </form>
    <?php
if(isset($_POST['num_msg']) and $_POST['num_msg']=="submit"){


$msg_num=$_POST['msg_num'];

?>
              <table class="table table-striped table-bordered datatable table-responsive-sm" id="dataTable">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Number</th>
                    <th>Twilio Number</th>
                    <th>Message</th>
                    <th>Media</th>
                    <th>Date</th>
<th>Delete</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 

        $query = mysqli_query($con,"select * from tapp_sent_msg_log where sms_number='".$msg_num."' or message  like '%".$msg_num."%'   order by date_time asc ") ;

                $i = 1;

        while($row = mysqli_fetch_array($query) )

          { 
        ?>  
                  <tr id="tr" class="tr<?php echo $row['id'];?>">
                    <td> <?php echo $i; ?></td>
                    <td><?php 
                   /* $cut  = substr($row['bulk_name'],0,9);
                    if($cut == 'unique_id') { echo */ echo $row['sms_number'];/*  } else { echo $row['bulk_name']; } */
                    
                     ?></td>
                    <td> <?php echo $row['twilio_num']; ?></td>
                    <td><?php 
                    
                    echo $row['message']; ?></td>
					<td><?php if($row['images'] != '') {  ?><a href="<?php echo $row['images']; ?>" target="_blank"><?php echo "View MMS"; ?> </a> <?php }  else { echo "No MMS"; }?></td>
                    <td><?php echo $row['date_time']; ?></td>
<td nowrap="nowrap">  <a href="delete_sent_msg.php?id=<?php echo $row['id'];?>" onclick="return confirm('Are you sure you want to delete?')" class="btn-danger btn-sm" >Delete
               </a></td>
                  </tr>

                  <?php $i++; }?>
                </tbody>
              </table>


 <?php
}
else
{
?>
             <table class="table table-striped table-bordered datatable table-responsive-sm" id="dataTable">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Number</th>
                    <th>Twilio Number</th>
                    <th>Message</th>
                    <th>Media</th>
                    <th>Date</th>
<th>Delete</th>
                  </tr>
                </thead>
                <tbody>
                  

        <?php 
    $query = mysqli_query($con,"select * from tapp_sent_msg_log  order by date_time desc") ;

                $i = 1;
        while($row = mysqli_fetch_assoc($query) )
          { 
          
$number = $row['sms_number'];

        ?>  
                  <tr id="tr" class="tr<?php echo $row['id'];?>">
                    <td> <?php echo $i; ?></td>
                    <td><?php 
                   /* $cut  = substr($row['bulk_name'],0,9);
                    if($cut == 'unique_id') { echo */ echo $row['sms_number'];/*  } else { echo $row['bulk_name']; } */
                    
                     ?></td>
                    <td> <?php echo $row['twilio_num']; ?></td>
                    <td><?php echo $row['message']; ?></td>
                    <td><?php if($row['images'] != '') {  ?><a href="<?php echo $row['images']; ?>" target="_blank"><?php echo "View MMS"; ?> </a> <?php }  else { echo "No MMS"; }?></td>
                    <td><?php echo $row['date_time']; ?></a></td>
<td nowrap="nowrap">  <a href="delete_sent_msg.php?id=<?php echo $row['id'];?>" onclick="return confirm('Are you sure you want to delete?')" class="btn-danger btn-sm" >Delete
               </a></td>
                  </tr>

                  <?php $i++;  } ?>
                </tbody>
              </table>
                
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

  <?php 
include_once('footer.php')
?>
<!-- Plugins and scripts required by this views -->
  <script src="vendors/js/jquery.dataTables.min.js"></script>
  <script src="vendors/js/dataTables.bootstrap4.min.js"></script>

  <!-- Custom scripts required by this view -->
  <script src="js/views/tables.js"></script>
