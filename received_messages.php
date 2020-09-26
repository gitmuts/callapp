<style>
.noti_bubble11{display:none}

.table-font{font-size:0.875rem !important;}
</style>
<?php 
include_once('header.php')
?>    <!-- Main content -->
    <main class="main">

      <!-- Breadcrumb -->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item"><a href="#">Admin</a></li>
        <li class="breadcrumb-item active"> Received Messages</li>
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
              <i class="icon-envelope-open"></i> Received Messages
              <div class="card-actions">
                <a href="https://datatables.net/">
                  <small class="text-muted">docs</small>
                </a>
              </div>
            </div>

            <div class="card-body">
         <div class="container">
          <div class="row">
             <form action="" method="post" name=f1 enctype="multipart/form-data" class="form-horizontal col-md-6">
              <input type=hidden name=todo value=submit>
                 <div class="form-group row">
                  <label class="col-md-2 col-form-label " for="text-input"><strong>Month :</strong></label>
                    <div class="col-md-3">
                   <select style="" class="form-control input-sm inline-block month_label" name="month" value="">Select Month :

                    <option value="01">January</option>

                    <option value="02">February</option>

                    <option value="03">March</option>

                    <option value="04">April</option>

                    <option value="05">May</option>

                    <option value="06">June</option>

                    <option value="07">July</option>

                    <option value="08">August</option>

                    <option value="09">September</option>

                    <option value="10">October</option>

                    <option value="11">November</option>

                    <option value="12">December</option>

                  </select>
                       
                    </div>
                    <label class="col-md-2 col-form-label" for="text-input"><strong>Year : </strong></label>
                    <div class="col-md-3">
                    <input class="form-control input-sm inline-block month_label_year" type="number" name="year" size="4" value="<?php echo date('Y'); ?>">
                    </div>
                    <div class="col-md-2">
                   <input class="btn btn-primary" type="submit" value="Submit">
                    </div>
                  </div>
              </form>
              <form action="#" class="form-horizontal col-md-4">                 
                 <div class="form-group row">
                  
                    <div class="col-md-9">
                                  <input class="form-control input-sm inline-block" type="text"  name="msg_num" size="14" placeholder="Search by number/message">
                       
                    </div>
                   <div class="col-md-3">
                    <input class="btn btn-primary month_label" name="number_search" type="submit" value="Search">
                  </div>
                  </div>  
                </form>
                <div class="form-group">
                  
                   
                   <div class="col-md-3">
                    <a href="export_leads.php?year=<?php echo $year; ?>&month=<?php echo $month; ?>"><button type="button" value="Export Data" class="btn btn-primary btn-md"> Export Data</button>
                    </a>
                  </div>
                  </div>  
</div>

<div class="row">
  <?php

if(isset($_POST['todo']) and $_POST['todo']=="submit"){

$month=$_POST['month'];

$year=$_POST['year'];

?>
           
                <!-- <div class="col-sm-1 sent-message-form-column">
                    <a href="export_received_msg.php?year=<?php echo $year; ?>&month=<?php echo $month; ?>"><button type="button" value="Export Data" class="btn btn-primary"> Export Data</button></a>
                  </div>
                  <br><br> -->
              
           </div>

</div>
            
              <table class="table table-striped table-bordered datatable table-responsive-sm" id="dataTable">
                <span  class="mark_read"> <input  style="opacity:1;"  type="checkbox"  class="case1" onClick="count(this.value)" value="" ><span style="margin-left: 2%;"> Mark all as read</span></span>
                <thead>
                  <tr id>
                    <th>ID</th>
                    <th>Service Type</th>                    <th>Mobile Number</th>
                    <th>Twilio Number</th>
                    <th >Message</th>
                    <th >Date</th>
                  </tr>
                </thead>
                <tbody>
                 <?php 
     $space = '&nbsp;&nbsp;';

$query=mysqli_query($con,"SELECT sender as send,max(date_time) FROM tapp_msg_receive WHERE MONTH( date_time ) =$month AND YEAR( date_time ) =$year GROUP BY sender ORDER BY max(date_time) DESC");
      $i = 1;
    while($data=mysqli_fetch_array($query))

{       

            $sender=$data['send'];
         

            $qry=mysqli_query($con,"select * from tapp_msg_receive where sender='".$sender."'  order by date_time desc limit 1");

            while($data1=mysqli_fetch_array($qry))

        {

            $d=$data1['sender'];        

            $notification=mysqli_query($con,"select count(*) as count from tapp_msg_receive  where sender='$d' and read_status='N' and MONTH( date_time ) =$month AND YEAR( date_time ) =$year GROUP BY sender");

            $count=mysqli_fetch_assoc($notification);

            $count=$count['count'];

?>
                  <tr id="tr" class="tr<?php echo $row['id'];?>" style="font-size:14px">
                    <td><?php echo $i; ?></td>                    <td><?php echo $data1['service_type']; ?></td>
                    <td><input style="opacity:1; visibility:hidden;" checked="checked" type="checkbox" name="delete_num[]" class="case1"  value="<?php echo $data1['sender'];?>" ><a href="chat.php?number=<?php echo $data1['sender'];?>"> <?php echo $data1['sender'].$space."</a><div class='noti_bubble11' style='margin-top:-25px; position:absolute;' >".$count."</div>"; ?></td>
                    <td><?php echo $data1['twilio_num']; ?></td>
                    <td><?php echo $data1['body']; ?></td>
                    <td><?php echo $data1['date_time']; ?></td>
                  </tr>
                  <?php

    }

     $i++; }?>
                </tbody>
              </table>
              <?php

}
elseif(isset($_REQUEST['msg_num']) && $_REQUEST['number_search']=="Search"){


 $msg_num=$_REQUEST['msg_num'];

?>

          <!-- <div class="col-sm-1 sent-message-form-column">
                    <a href="export_received_msg.php?year=<?php echo $year; ?>&month=<?php echo $month; ?>"><button type="button" value="Export Data" class="btn btn-primary"> Export Data</button></a>
                  </div>
                  <br><br> -->

                  <table class="table table-striped table-bordered datatable table-responsive-sm" id="dataTable">
                <span class="mark_read"> <input  style="opacity:1;"  type="checkbox"  class="case1" onClick="count(this.value)" value="" ><span style="margin-left: 2%;"> Mark all as read</span></span>
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Mobile Number</th>
                    <th>Twilio Number</th>
                    <th>Message</th>
                    <th>Date</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 

     $space = '&nbsp;&nbsp;';

                        $qry=mysqli_query($con,"select * from tapp_msg_receive where sender='".$msg_num."' OR body like '%".$msg_num."%'  order by date_time desc");
$i = 1;
            while($data1=mysqli_fetch_array($qry))
        {

?>
                  <tr id="tr" class="tr<?php echo $row['id'];?>"style="font-size:14px">
                    <td><?php echo $i; ?></td>
                    <td><input style="opacity:1; visibility:hidden;" checked="checked" type="checkbox" name="delete_num[]" class="case1"  value="<?php echo $data1['sender'];?>" ><a href="chat.php?number=<?php echo $data1['sender'];?>"> <?php echo $data1['sender'].$space."</a><div class='noti_bubble11' style='margin-top:-25px; position:absolute;' >".$count."</div>"; ?></td>
                    <td><?php echo $data1['twilio_num']; ?></td>
                    <td><?php echo $data1['body']; ?></td>
                    <td><?php echo $data1['date_time']; ?></td>
                  </tr>
                  <?php


     $i++; }?>
                </tbody>
              </table>

              <?php

}
else

{

?>

 <!-- <div class="col-sm-1 sent-message-form-column">
                    <a href="export_received_msg.php?year=<?php echo $year; ?>&month=<?php echo $month; ?>"><button type="button" value="Export Data" class="btn btn-primary"> Export Data</button></a>
                  </div>
                  <br><br> -->

                   <table class="table table-striped table-bordered datatable table-responsive-sm" id="dataTable">
                <span class="mark_read"> <input  style="opacity:1;"  type="checkbox"  class="case1" onClick="count(this.value)" value="" ><span style="margin-left: 2%;"> Mark all as read</span></span>
                <thead>
                  <tr>
                    <th class="table-font">ID</th>
                    <th class="table-font">Mobile Number</th>
                    <th class="table-font">Twilio Number</th>
                    <th class="table-font">Message</th>
                    <th class="table-font">Date</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 

    $space = '&nbsp;&nbsp;';

    $all=mysqli_query($con,"SELECT sender as send,max(date_time) FROM tapp_msg_receive GROUP BY sender ORDER BY max(date_time) DESC");
$i = 1;
    while($data=mysqli_fetch_array($all))

        {

            $sender=$data['send'];

                       $qry=mysqli_query($con,"select * from tapp_msg_receive where sender='".$sender."'  order by date_time desc limit 1;");



            while($data1=mysqli_fetch_array($qry))

        {

            $d=$data1['sender'];        



            $notification=mysqli_query($con,"select count(*) as count from tapp_msg_receive  where sender='$d' and read_status='N' GROUP BY sender");

            $count=mysqli_fetch_assoc($notification);

            $count=$count['count'];



            

            ?>
                  <tr id="tr" class="tr<?php echo $row['id'];?>"style="font-size:14px">
                    <td><?php echo $i; ?></td>
                    <td><input style="opacity:1; visibility:hidden;" checked="checked" type="checkbox" name="delete_num[]" class="case1"  value="<?php echo $data1['sender'];?>" ><a href="chat.php?number=<?php echo $data1['sender'];?>"> <?php echo $data1['sender'].$space."</a><div class='noti_bubble11' style='margin-top:-25px; position:absolute;' >".$count."</div>"; ?></td>
                    <td><?php echo $data1['twilio_num']; ?></td>
                    <td><?php echo $data1['body']; ?></td>
                    <td><?php echo $data1['date_time']; ?></td>
                  </tr>
                  <?php 

            //echo $_SESSION['sender'] = $data1['sender'];

            }

        }

            ?>

    



    <?php $i="";  $i++; }?>
                </tbody>
              </table>

               <?php

    

    ?>


            </div>
            <form class="no-margin"  method="post" onSubmit="return myFunction()"  action="get_lists.php" name="client_record" enctype="multipart/form-data" >



           <div style="display:none;">  <?php 



        $query111 = mysqli_query($con,"select * from tapp_newsletter") ;



        $i = 1;



        while($row111 = mysqli_fetch_array($query111) ) {?>



        



        



        <input style="visibility:hidden;" type="checkbox" id="Name<?php echo $row111['id'];?>" name="numbers[]" value="<?php echo $row111['mobile_no']; ?>">    <span class="custom-checkbox"></span>



        <?php



        }



        ?>



        </div>







    <!--Modal-->



  <div class="modal fade" id="form">



    <div class="modal-dialog">



        



      <div class="modal-content">



        <div class="modal-header">



          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>



          <h4 align="center">Make a List</h4>



        </div>







        <div class="modal-body">



            <div class="form-group">



             <label class="control-label">List Name</label>



                <input type="text" placeholder="List name" onBlur="checkkeyword(this.value)" required class="form-control input-sm parsley-validated "  name="list">



                <span style="color:#FF0000;" id="show"></span> 



            </div>



             <div class="form-group">



             <label class="control-label">Description</label>



                <input type="text" placeholder="Description"  required class="form-control input-sm parsley-validated "  name="description">



                <span style="color:#FF0000;" id="show"></span> 



            </div>

        <div class="modal-footer">

                  <button type="submit" class="btn btn-danger btn-sm check">Submit</button> 

          <button class="btn btn-sm btn-success" data-dismiss="modal" aria-hidden="true">Close</button>
         </div>

      </div>

    </div>

  </div> </div>
               </form>
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
  <script type='text/javascript'>//<![CDATA[



$(function(){



var checkboxes = $("input[type='checkbox']"),



    submitButt = $("button[type='submit']");







checkboxes.click(function() {



    submitButt.attr("disabled", !checkboxes.is(":checked"));



});



});//]]> 



function count()
{

var checkboxes = document.getElementsByName('delete_num[]');

var vals = "";
for (var i=0, n=checkboxes.length;i<n;i++) 
{
//alert("df");

    if (checkboxes[i].checked) 
    {

        vals += ","+checkboxes[i].value;
    }
}

if (vals) vals = vals.substring(1);
//alert(vals);
//document.getElementById("checkboxvalue").value = vals;
window.location.href="update_read_msg.php?number="+vals;

}



</script>
