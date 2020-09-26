<?php include_once('header.php');
?>   
 <!-- Main content --> 
 <main class="main">   
 <!-- Breadcrumb -->   
 <ol class="breadcrumb">  
 <li class="breadcrumb-item">Home</li> 
 <!--li class="breadcrumb-item"><a href="#">Admin</a></li-->    
 <li class="breadcrumb-item active">Chat</li>  
 <!-- Breadcrumb Menu-->    
 <!--  <li class="breadcrumb-menu d-md-down-none"> 
 <div class="btn-group" role="group" aria-label="Button group with nested dropdown">   
 <a class="btn" href="#"><i class="icon-speech"></i></a>      
 <a class="btn" href="index-2.html"><i class="icon-graph"></i> &nbsp;Clear Database</a> 
 <a class="btn" href="#"><i class="icon-settings"></i> &nbsp;Settings</a> 
 </div>        </li> -->    
 </ol>     
 <div class="container-fluid">   
 <?php $number=$_GET['number'];

 $res4=mysqli_query($con,"SELECT sender,twilio_num from tapp_msg_receive where sender='$number' order by date_time desc limit 1  ");
 while($data4=mysqli_fetch_array($res4))
 {
	 $twilio_num=$data4['twilio_num'];?>
	 <input type="hidden" name="number1" value="<?php echo $data4['sender'];  ?>">
	 <?php } ?>        
	 <div class="animated fadeIn">
	 <div class="card">           
	 <div class="card-header">    
	 <i class="icon-people"></i>You're Chatting With: <?php echo $number; ?>              <div class="card-actions">       
	 <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#myModal"><i class="fa fa-minus fa-sm"></i> Delete Conversation</button>    
	 </div>          
	 </div>
	 <?php
mysqli_query($con,"update tapp_msg_receive set read_status='Y' where sender='$number' ");
$res2=mysqli_query($con,"SELECT body,sending_status,sender FROM table_data where sender='$number'  ORDER BY date_time ASC  ");

$res1=mysqli_query($con,"SELECT body,sending_status,sender,date_time FROM table_data where sender='$number'  ORDER BY date_time DESC");
?>          
  <div class="card-body">   
  <div class="row">           
  <div class="col-lg-12">    
  <div class="add-btn-group-padding text-center">  
  <div class="page-content-inner align-items-center"> 
  <div class="row"> 
  <div class="col-md-8 center-block">
  <div class="panel panel-info twillo-chat-panel">
  <form action='send.php' method='post'>
  <div class="input-group">
                   <input type="hidden" name="number1" value="<?php echo $number;  ?>">
				   <input type="hidden" name="twilio_num" value="<?php echo $twilio_num;  ?>">
                                    <input type="text" name="msg" required="true" class="form-control" placeholder="Enter Message" oninvalid="this.setCustomValidity('Please Write Your Message First')" oninput="setCustomValidity('')"/>
                                    <span class="input-group-btn">
                                        <button class="btn btn-primary chat-right-btn" type="submit">SEND</button>
                                    </span>
                                </div>
								</form>
  <div class="panel-body scrollbar" id="style-3">   
  
  <div class="force-overflow">
  <ul class="media-list"><?php
while($data1=mysqli_fetch_array($res1))
{
	// echo $data1['sending_status'];
	
	if($data1['sending_status']=='S') {	?>
                                   <li class="media">  
								   <div class="offset-md-2 col-md-12">
								   <div class="media">
								   <div class="media-body panel-chat-message" >
								   <?php echo $data1['body'];?>
								   <br />               
								   <small class="text-muted"> <?php echo $data1['date_time'];?></small>        
								   </div>           
								   </div>        
								   </div>       
								   </li>
								   <?php } 
								   else { ?>
								   
     <li class="media">

                                        <div class="col-md-12">

                                            <div class="media">
                                               
                                                <div class="media-body panel-chat-message2" >
                                                    <?php echo $data1['body'];?>                                                    <br />                                                   <small class="text-muted"> <?php echo $data1['date_time'];?></small>
                                                   
                                                </div>
                                            </div>

                                        </div>
                                    </li><?php } }?>
            
     
                                </ul>
                </div>
            </div>
            <div class="panel-footer twillo-chat-footer">
                
            </div>
        </div>
    </div></div>
                                    </div>
              </div>
            </div>
            </div>
            </div>
          </div>
        </div>

      </div>
      <!-- /.conainer-fluid -->
    </main>
</div>

  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title text-center">Delete Conversation?</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
         <div class="row">

                    <div class="col-sm-12">

                    <label>Are you sure you want to Delete Conversation? This action can't be undone.</label>

                    </div>

                  </div>

                 
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <form action="delete_chat.php?number=" method="post">
            <?php

$number=$_GET['number'];

$res3=mysqli_query($con,"SELECT sender from tapp_msg_receive where sender='$number'  ");

while($data3=mysqli_fetch_array($res3))

{



?>



<input type="hidden" name="number1"

 value="<?php echo $data3['sender'];  ?>">

<?php

}

?>

          <button type="submit" class="btn btn-primary"><i class="fa fa-dot-circle-o"></i> Submit</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </form>
        </div>
        
      </div>
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
