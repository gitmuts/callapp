<?php 

include_once('header.php')

?>   
<?php
include 'twilio/Services/Twilio/Capability.php';
include_once('connection.php');
$query = mysqli_query($con,"select * from tapp_twilio_account where service_type='twilio'");
while($rowdata = mysqli_fetch_array($query))
{
// put your Twilio API credentials here
 $accountSid = $rowdata['twilio_sid'];
   $authToken  = $rowdata['twilio_token'];
}
// put your Twilio Application Sid here
$appSid     = '';

$capability = new Services_Twilio_Capability($accountSid, $authToken);
$capability->allowClientOutgoing($appSid);
$capability->allowClientIncoming('twilio_call');
$token = $capability->generateToken();
//echo $token;
?>
 <!-- Main content -->
 <script type="text/javascript"
      src="//static.twilio.com/libs/twiliojs/1.2/twilio.min.js"></script>
   
    <link href="http://static0.twilio.com/bundles/quickstart/client.css"
      type="text/css" rel="stylesheet" />
    <script type="text/javascript">
 //Twilio.Device.setup('<?php echo $token; ?>', {'debug':true});

      Twilio.Device.setup("<?php echo $token; ?>");

      Twilio.Device.ready(function (device) {
        $("#log").text("Ready");
      });

      Twilio.Device.error(function (error) {
        $("#log").text("Error: " + error.message);
      });
alert(error.message);
      Twilio.Device.connect(function (conn) {
        $("#log").text("Successfully established call");
      });

      Twilio.Device.disconnect(function (conn) {
        $("#log").text("Call ended");
      });

      Twilio.Device.incoming(function (conn) {
        $("#log").text("Incoming connection from " + conn.parameters.From);
        // accept the incoming connection and start two-way audio
        conn.accept();
      });

      function call(param) {
 var phone_number = $("#number"+param).val();
 
        var caller_id = $("#caller_id"+param).val();
		
        var myparam = phone_number + "#"+ caller_id;
        if(caller_id == '')
        {
        alert('Please Select Caller ID');    
        }
        else
        {
        params = {"PhoneNumber": myparam};
        Twilio.Device.connect(params);
        }
      }

      function hangup() {
        Twilio.Device.disconnectAll();
      }
    </script>
<!-- Main content -->
<head>
<style>
    #call_button { background-color: #0c8d43!important;
    border-color: #0c8d43!important;
    color: #fff!important;
    background: green!important;
    padding: 6px!important;
    margin-top: 0!important;
        font-size: 28px;
font-weight: 500;
    }

	.datatable{ border-collapse: collapse !important}
	 #hangup_button {   background-color: #0c8d43 !important;
    border-color: #e41010!important;
    color: #fff!important;
    background: #e41010!important;
    padding: 6px!important;
    margin-top: 0!important;
    font-size: 28px;
font-weight: 500;

}
button.call::before {
    background-position: 0 -48px;
    display: none;
}
button.hangup::before {
    background-position: 0 -131px;
    display: none;
}
body {
    text-align: left;
    background:none;
}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- <script>
		  $( document ).ready(function() {


var table = $('#dataTable').DataTable();

// Sort by columns 1 and 2 and redraw
table
    .order( [ 7, 'desc' ] )
    .draw();
 });
</script> -->
<script>
      $( document ).ready(function() {


var table = $('#dataTable').DataTable();

// Sort by columns 1 and 2 and redraw
table
    .order( [ 4, 'desc' ] )
    .draw();
 });
</script>
    <main class="main">



      <!-- Breadcrumb -->

      <ol class="breadcrumb">

        <li class="breadcrumb-item">Home</li>

        <!--li class="breadcrumb-item"><a href="#">Admin</a></li-->

        <li class="breadcrumb-item active"> Contact</li>

      </ol>



      <div class="container-fluid">



        <div class="animated fadeIn">

          <div class="card">

            <div class="card-header">

              <i class="icon-envelope-open"></i> Contact

              <div class="card-actions">

             

              </div>


              <div class="modal fade" id="add_form<?php echo $row['id']; ?>">



    <div class="modal-dialog">



                 <form class="no-margin" id="formValidate2" data-validate="parsley" method="post" action="add_new_client.php" name="client_record" enctype="multipart/form-data" > 

      
      <div class="modal-content">



        <div class="modal-header">



          



          <h4 class="modal-title text-center">Add Contact</h4>

          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>



        </div>







        <div class="modal-body">


<div class="form-group">
            <label class="control-label">Name</label>
          <input type="text" placeholder="Name" value="" required class="form-control "  name="first_name">
           </div>
		   
		   
		   <div class="form-group">
            <label class="control-label">Email</label>
          <input type="email" placeholder="Email" value=""  class="form-control  "  name="email">
           </div>
		   
		   
            <div class="form-group">



             <label class="control-label">Mobile Number</label>
           <input type="number" name="mobile" placeholder="Enter Mobile Number" value ="" class="form-control input-sm parsley-validated" required>
            </div>



            



        

           

            

            <div class="form-group">
            <label class="control-label">Address</label>
          <input type="text" placeholder="Address" value=""  class="form-control  "  name="address">
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
  
  
  
  
  
  <div class="modal fade" id="add_bulk">



    <div class="modal-dialog">



                 <form class="no-margin" id="formValidate2" data-validate="parsley" method="post" action="import_clients.php" name="client_record" enctype="multipart/form-data" > 

      
      <div class="modal-content">



        <div class="modal-header">



          



          <h4 class="modal-title text-center">Imports Contact</h4>

          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>



        </div>







        <div class="modal-body">



            <div class="form-group">



             <label class="control-label">Select File</label>



            <input type="file" name="file" class="form-control " required>



            </div>



          



           

         

          

             

           





           </div>



        <div class="modal-footer">



                  <button type="submit" class="btn btn-danger btn-sm ">Submit</button>







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

         



<div class="row">

                  

                   

                   <div class="col-md-9">

                    <button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#add_form ">Add New Contact
               </button>
              <button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#add_bulk ">Import excel
               </button>
			    <a href="upload/sample_contact.xlsx" download type="button" class="btn btn-primary"  data-toggle="" data-target="">Sample file
               </a>

                  </div>
 <div class="col-md-3" >

                    <a href="export_clients.php?year=<?php echo $year; ?>&month=<?php echo $month; ?>"><button type="button" value="Export Data" class="btn btn-primary btn-md" style="float:right"> Export Data</button>

                    </a>

                  </div>
                  </div>  <br>
 






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

                     <th>Mobile Number</th>

                    <th>Name</th>

                    

                    <th>Email</th>
					<th>Address</th> 



<th>Date</th>


                    <!-- <th>Twilio Number</th>

                    <th>Message</th>

                    <th>Date/time</th> -->
                    <th>Action</th>

                  </tr>

                </thead>

                <tbody>

                   <?php



				
				  $qry = mysqli_query($con,"SELECT * FROM tapp_tbl_clients ORDER BY id DESC");
			



            while($data1=mysqli_fetch_array($qry))



        {

$blacklist = mysqli_query($con,"select * from tapp_blacklist where number ='".$data1['sender']."'") ;
if(mysqli_num_rows($blacklist)<1)
{
	$blacklist_status = '0';
}
else{
	$blacklist_status = '1';
}

?>

                  <tr id="tr" class="tr<?php echo $row['id'];?>">

                   <td><?php echo $data1['sender']; ?></td>

                    <td><?php echo $data1['first_name']." ".$row['last_name'];  ?></td>

                    <td><?php echo $data1['email']; ?></td>

                    <td><?php echo $data1['address']; ?></td>

                    
                  
                    <td><?php echo $data1['date_time']; ?></td>
                   



                   <!--  <td><?php echo $data1['twilio_num']; ?></td>

                    <td><?php echo $data1['body']; ?></td>



                    <td><?php echo $data1['date_time']; ?></td> -->
                    <td> 
					
					 <!--a class="btn btn-info action-btn" <?php if($blacklist_status == '0') { ?> href="#call_form<?php echo $data1['id']; ?>" <?php } else { ?> onclick="alert('Sorry! this number is blacklisted to make an outbound call to this number please remove the number from blacklist');"<?php } ?>  data-toggle="modal" >

                <i class="icon-phone "></i>

              </a>
					<a class="btn btn-info action-btn" <?php if($blacklist_status == '0') { ?> href="#message_form<?php echo $data1['id']; ?>" <?php } else { ?> onclick="alert('Sorry! this number is blacklisted to send sms to this number please remove the number from blacklist');"<?php } ?>  data-toggle="modal" >

                <i class="fa fa-envelope-open "></i>

              </a-->
					
			  <a class="btn btn-info action-btn" href="#edit_form<?php echo $data1['id']; ?>"  data-toggle="modal" >

                <i class="fa fa-edit "></i>

              </a>

                      <a class="btn btn-danger action-btn" href="#delete<?php echo $data1['id']; ?>"  data-toggle="modal" >

                <i class="fa fa-trash-o "></i>

              </a></td>

                  </tr>

                  <div class="modal fade" id="edit_form<?php echo $data1['id']; ?>">
    <div class="modal-dialog">
                 <form class="no-margin" id="formValidate2" data-validate="parsley" method="post" action="update_client.php" name="client_record" enctype="multipart/form-data" > 
                  <input type="hidden" name="" value="<?php echo $data1['id'] ?>">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title text-center">Edit Contact</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
       <div class="modal-body">
            <div class="form-group">
             <label class="control-label">Mobile Number</label>
            <input type="text" name="mobile" placeholder="Enter Mobile Number" value ="<?php echo $data1['sender'];?>" class="form-control input-sm parsley-validated" required>
            </div>

            <div class="form-group">
            <label class="control-label"> Name</label>
          <input type="text" placeholder="Name" value="<?php echo $data1['first_name']; ?>" required class="form-control "  name="first_name">
           </div>
           

           <div class="form-group">
            <label class="control-label">Email</label>
          <input type="email" placeholder="Email" value="<?php echo $data1['email']; ?>"  class="form-control  "  name="email">
           </div>

        
            <div class="form-group">
            <label class="control-label">Address</label>
          <input type="text" placeholder="Address"   class="form-control  " value="<?php echo $data1['address']; ?>" name="address">
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
   
   <div class="modal fade" id="message_form<?php echo $data1['id']; ?>">
    <div class="modal-dialog">
                 <form class="no-margin" id="formValidate2" data-validate="parsley" method="post" action="send_message.php" name="client_record" enctype="multipart/form-data" > 
                  <input type="hidden" name="" value="<?php echo $data1['id'] ?>">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title text-center">Message to <?php echo $data1['first_name'];?></h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
       <div class="modal-body">
	   <div class="form-group">
            <label class="control-label">From Number</label>
            <select id="sl" class="form-control select2-single select2-hidden-accessible" tabindex="-1" aria-hidden="true" name="twilio_number" required>
                         
          <option value="">Select</option>

    <?php
        $query33 = mysqli_query($con,"select * from tapp_twilio_number") ;
        $i = 1;
        while($row3 = mysqli_fetch_array($query33) )
        {
        $client_name=$row3['client_name'];
        $number=$row3['number'];
        ?>
        <option value="<?php echo $number; ?>" <?php if($row3['is_default'] == 'yes') echo "selected";?>><?php echo $number; ?></option>
       <?php
     }
    ?>
         </select>
           </div> 
            <div class="form-group">
             <label class="control-label">Message</label>
            <textarea rows="3" name="message" Placeholder="Type your message here..." class="form-control"></textarea>
            </div>
<input type="hidden" name="number" value="<?php echo $data1['sender'];?>">

        <div class="form-group">

<label class="col-form-label">Select an image

		 <span class="required">  </span>

	  </label>

<div class="controls">

<input type="file" class="form-control" name="file"  />

<span class="help-block"> You can send an image also.</span>

			 </div>

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
  
  
  
  <div class="modal fade" id="call_form<?php echo $data1['id']; ?>">
    <div class="modal-dialog">
                 
                  <input type="hidden" name="" value="<?php echo $data1['id'] ?>">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title text-center">Call to <?php echo $data1['first_name'];?></h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
       <div class="modal-body">
	  
          

            <div class="form-group">

              <button class="call btn btn-lg col-sm-5 " id="call_button" onclick="call(<?php echo $data1['id'];?>);">

                <i class="fa fa-phone"></i>

      Call

    

              </button>

              <button class="hangup btn btn-lg col-sm-6" id="hangup_button" onclick="hangup();">

                <i class="fa fa-headphones"></i>

      Hangup

    

              </button>

            </div>
			

            <div class="form-group">
<select name="caller_id" class="form-control" id="caller_id<?php echo $data1['id'];?>">
<option value="">Select Caller ID</option>
<?php
$query = mysqli_query($con,"select * from tapp_twilio_number where service_type='twilio'");
while($row = mysqli_fetch_array($query))
{
	?>
	<option value="<?php echo $row['number'];?>"><?php echo $row['number'];?></option>
	
	
	<?php
} ?>
</select>
              
              </div>

            

		    <div class="form-group">

              <input class="form-control enter_call" type="text" id="number<?php echo $data1['id'];?>" name="number" value="<?php echo $data1['sender'];?>" readonly placeholder="Enter a phone number to call">
<span>Enter phone number with country code</span>
              </div>
            
<input type="hidden" name="number" value="<?php echo $data1['sender'];?>">

        
            


<input type="hidden" name="id" value="<?php echo $data1['id'];?>">


           </div>
        <div class="modal-footer">
                  
          <button class="btn btn-sm btn-success" data-dismiss="modal" aria-hidden="true">Close</button>
          </div>
      </div>
      <!-- /.modal-content -->
               
    </div>
    <!-- /.modal-dialog -->
  </div>
  
 <!--Modal-->
  <div class="modal fade" id="delete<?php echo $data1['id']; ?>">
    <div class="modal-dialog">

                      <form action="delete_client.php" method="post">


<input type="hidden" name="id" value="<?php echo $data1['id']; ?>">




      <div class="modal-content">



        <div class="modal-header">



          



          <h4 class="modal-title text-center">Remove this Contact?</h4>

          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>



        </div>







        <div class="modal-body">



            <div class="form-group" style="text-align: center;">



              <label for="folderName">Are you sure you want to remove this Contact? This action can't be undone.</label>



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

