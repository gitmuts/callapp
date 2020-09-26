<?php
ob_start();
session_start();
include('connection.php');
$user=$_SESSION['user'];
if(!isset($user))
{
header("location:index.php");
}
	$query = mysqli_query($con,"select * from tapp_twilio_account") ;
	while($row = mysqli_fetch_array($query) )
	{
	$sid=$row['twilio_sid'];
	$token=$row['twilio_token'];
	}
require "twilio/Services/Twilio/Capability.php";
// put your Twilio API credentials here
  $accountSid = $sid;
  $authToken  = $token;
// put your Twilio Application Sid here
 $appSid     = 'AP4d2fa13acf29d14cd274df06218fc587';
$capability = new Services_Twilio_Capability($accountSid, $authToken);
$capability->allowClientOutgoing($appSid);
$capability->allowClientIncoming('ange_goueti');
$token = $capability->generateToken();
//echo "ghk";
?>
<?php 
include_once('header.php')
?>
<!-- Main content -->
<main class="main">
  <!-- Breadcrumb -->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">Home</li>
    <li class="breadcrumb-item">
      <a href="#">Admin</a>
    </li>
    <li class="breadcrumb-item active">Outgoing Calls</li>
    <!-- Breadcrumb Menu-->
  
  </ol>
  <div class="container-fluid">
    <div class="animated fadeIn">
      <div class="card">
        <div class="card-header">
          <i class="icon-people"></i> Outgoing Calls
             
            
        </div>
        <div class="card-body">
          <br>
          <div class="row justify-content-center">
            <div class="col-sm-5">
              <button " class="call btn btn-lg col-sm-5 " onclick="call();">
                <i class="fa fa-phone"></i>
      Call
    
              </button>
              <button class="hangup btn btn-lg col-sm-6" onclick="hangup();">
                <i class="fa fa-headphones"></i>
      Hangup
    
              </button>
            </div>
          </div>
          <br>
          <div class="row justify-content-center">
            <div class=" col-sm-5">
              <input class="form-control enter_call" type="text" id="number" name="number" placeholder="Enter a phone number to call">
              </div>
            </div>
            <div class="row">
              <div id="log" class="col-sm-3 btn btn-primary text-center">Ready</div>
            </div>
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

<script type="text/javascript"
      src="https://static.twilio.com/libs/twiliojs/1.2/twilio.min.js"></script>
    
		   
	
<script type="text/javascript">
 //Twilio.Device.setup('<?php echo $token; ?>', {'debug':true});
      Twilio.Device.setup("<?php echo $token; ?>");
//alert('<?php echo $token; ?>');
      Twilio.Device.ready(function (device) {
        $("#log").text("Ready");
      });
      Twilio.Device.error(function (error) {
        $("#log").text("Error: " + error.message);
      });
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
      function call() {
        // get the phone number to connect the call to
        params = {"PhoneNumber": $("#number").val()};
        Twilio.Device.connect(params);
      }
      function hangup() {
        Twilio.Device.disconnectAll();
      }
    </script>
