<?php 

include_once('header.php')

?>
<?php
include 'twilio/Services/Twilio/Capability.php';
include_once('connection.php');
$query = mysqli_query($con,"SELECT * from tapp_twilio_account where service_type='twilio'");
while($rowdata = mysqli_fetch_array($query))
{
// put your Twilio API credentials here
 $accountSid = $rowdata['twilio_sid'];
   $authToken  = $rowdata['twilio_token'];
}
// put your Twilio Application Sid here
$appSid     = 'APafe82d07dc2ca57ce7a8ab4abb4382c7';

$capability = new Services_Twilio_Capability($accountSid, $authToken);
$capability->allowClientOutgoing($appSid);
$capability->allowClientIncoming('thecodexsolutions');
$token = $capability->generateToken();
//echo $token;
?>
<script type="text/javascript"
      src="https://static.twilio.com/libs/twiliojs/1.2/twilio.min.js"></script>
   
    <link href="https://static0.twilio.com/bundles/quickstart/client.css"
      type="text/css" rel="stylesheet" />
   <script type="text/javascript">
 //Twilio.Device.setup('<?php echo $token; ?>', {'debug':true});

      Twilio.Device.setup("<?php echo $token; ?>");

      Twilio.Device.ready(function (device) {
        $("#log").text("Ready");
         console.log('Ready');
          $("#hangup_button").fadeOut();
         
      });

      Twilio.Device.error(function (error) {
        $("#log").text("Error: " + error.message);
      });

      Twilio.Device.connect(function (conn) {
        $("#log").text("Successfully established call");
         console.log('connected');
         $("#call_button").fadeOut();
          $("#hangup_button").fadeIn();
      });

      Twilio.Device.disconnect(function (conn) {
        $("#log").text("Call ended");
        console.log('ended');
      });

      Twilio.Device.incoming(function (conn) {
        $("#log").text("Incoming connection from " + conn.parameters.From);
        // accept the incoming connection and start two-way audio
        conn.accept();
      });

      function call() {
 var phone_number = $("#number").val();
 
        var caller_id = $("#caller_id").val();
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
           $("#log").text("Call ended");
        
        try {
  Twilio.Device.disconnectAll();
}
catch(err) {
    setTimeout(function(){
                  location.reload(true);
                  alert("The page will now refresh");
                }, 5000); 
    

}
        
          
      }
    </script>
<!-- Main content -->
<head>
<style>
    #call_button { background-color: #0c8d43!important;
    border-color: #0c8d43!important;
    color: #fff!important;
    background: green!important;
    padding: 10px!important;
    margin-top: 0!important;
        font-size: 28px;
font-weight: 500;
    }

	
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
</head>
<main class="main">

  <!-- Breadcrumb -->

  <ol class="breadcrumb">

    <li class="breadcrumb-item">Home</li>

    <!--li class="breadcrumb-item">

      <a href="#">Admin</a>

    </li-->

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

            <div class="col-sm-3">

              <button  class="call btn btn-lg col-sm-9 text-center" id="call_button" onclick="call();">

                <i class="fa fa-phone"></i>

      Call

    

              </button>

              <button style="display:none" class="hangup btn btn-lg col-sm-9 text-center" id="hangup_button" onclick="hangup();">

                <i class="fa fa-headphones"></i>

      Hangup

    

              </button>

            </div>

          </div>

          <?php 
		  function get_dir()
		  {
			  $dir = dirname(__FILE__);
		  $dirlength = strlen($dir);
 $variable = substr($dir, 0, strpos($dir, "public_html"));
 $length = strlen($variable);
 $length = $length + 11;
  $target_dir = substr($dir,$length,$dirlength);
  return $target_dir;  
		  }
		
 ?>
  <br>
 <div class="row justify-content-center">

            <div class=" col-sm-5">
<select name="caller_id" class="form-control" id="caller_id">
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

            </div>
			<br>
          <div class="row justify-content-center">

            <div class=" col-sm-5">

              <input class="form-control enter_call" type="text" id="number" onkeyup="check_blacklist(this.value)" name="number" placeholder="Enter a phone number to call">
<span>Enter phone number with country code</span>
              </div>

            </div>

            <div class="row">

              <div id="log" class="col-sm-3 btn btn-primary text-center" style="background: #20a8d8;">Ready</div>

            </div>

          </div>

        </div>

      </div>

    </div>

    <!-- /.conainer-fluid -->

  </main>

</div>
<script>
function check_blacklist(elem) {

  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("log").innerHTML =
      this.responseText;
	  	if(this.responseText == 'Ready')
		{
			$('#call_button').prop('disabled', false);
			$('#log').css('background-color','green');
			//document.getElementById('call_button').disabled='false';
		}
		else{
			$('#call_button').prop('disabled', true);
			$('#log').css('background-color','red');
			//document.getElementById('call_button').disabled='true';
		}
    }
  };
  xhttp.open("GET", "check_blacklist.php?number="+elem, true);
  xhttp.send();
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



