<style>
	
@import url(//fonts.googleapis.com/css?family=Lato:300);
@import url(//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css);
body{ 
background: black;
-webkit-background-size: cover;
-moz-background-size: cover;
-o-background-size: cover;
background-size: cover;
}
#content{padding:0!important;width: 84.578%!important;}
body
{
    margin: 0;
    padding: 0;
    font-family: 'Lato' , sans-serif;
    color: #333;
    background-size: 100%;
    -webkit-font-smoothing: antialiased;
    -webkit-text-size-adjust: none;
    background-color: black;
}
.container-fluid-full{overflow:auto!important;}
p
{
    margin: 0;
    padding: 0 0 10px 0;
    line-height: 20px;
}
.phone-panel{
  margin-bottom: 20px;
  border: 1px solid transparent;
  border-radius: 4px;
  -webkit-box-shadow: 0 1px 1px rgba(0,0,0,.05);
  box-shadow: 0 1px 1px rgba(0,0,0,.05);
  border-color: white;  
}
.span4
{
    width: 80px;
    float: left;
    margin: 0 8px 10px 8px;
}

.phone
{
    margin-top: 15px;
    background: rgba(150, 209, 150, 0.09);
}
.tel
{
  margin-bottom: 10px;
  margin-top: 10px;
  background-color: rgba(0, 0, 0, 0);
  color: black;
  font-weight: 600;
}
.num-pad
{
    padding-left: 15px;
}


.num
{
    /*border: 1px solid #9e9e9e;*/
    -webkit-border-radius: 999px;
    border-radius: 999px;
    -moz-border-radius: 999px;
    height: 80px;
    /*background-color: #fff;*/
    cursor: pointer;
}
.num:hover
{
    background-color: #5cb85c;
    color: #fff;
    transition-property: background-color .2s linear 0s;
    -moz-transition: background-color .2s linear 0s;
    -webkit-transition: background-color .2s linear 0s;
    -o-transition: background-color .2s linear 0s;
}
.txt
{
    font-size: 30px;
    text-align: center;
    /*margin-top: 15px;*/
    font-family: 'Lato' , sans-serif;
    line-height: 30px;
    color: black;
}
.small
{
    font-size: 15px;
}

.btn
{
    font-weight: bold;
    -webkit-transition: .1s ease-in background-color;
    -webkit-font-smoothing: antialiased;
    letter-spacing: 1px;
}
.btn:hover
{
    transition-property: background-color .2s linear 0s;
    -moz-transition: background-color .2s linear 0s;
    -webkit-transition: background-color .2s linear 0s;
    -o-transition: background-color .2s linear 0s;
}
.spanicons
{
    width: 72px;
    float: left;
    text-align: center;
    margin-top: 40px;
    font-size: 30px;
    cursor: pointer;
}
.spanicons:hover
{
    color: #3498db;
    transition-property: color .2s linear 0s;
    -moz-transition: color .2s linear 0s;
    -webkit-transition: color .2s linear 0s;
    -o-transition: color .2s linear 0s;
}
.active
{
    color: #3498db;
}
.metrics{
    margin-bottom: 10px;
    padding: 10px;
    /*z-index: 10000;*/
    /*display: inline-block;*/
    /*background: rgba(0,153,204,0.93);*/
    background: rgba(244, 67, 54, 0.75);
    /*border: 1px solid #006b8f;*/
    color: #fff;
    font-size: 13px;
    text-align: center;
    border-radius: 3px;
    padding-top: 8px;
    padding-bottom: 8px;
    outline: 0;
    /*position: fixed;*/
    top: 0;
    /*left: 0;*/
    right:0;
    font-family: monospace; 
}
.alertmsg{
    
    top: 10px;
    right: 10px;
    /*width: 20%;*/
    z-index: 100000;
}
#recPlayerLayout, .hangup,.inboundBeforeAnswer, .outboundBeforeAnswer, .AfterAnswer, .callinfo, #uiLogout, .lowQualityRadios, .feedback, .loader, .fadein-effect{
    display: none;
}

.customAlert{
    margin-bottom: 10px;
    padding: 10px;
    z-index: 10000;
    background: rgb(14, 14, 14);
    /*border: 1px solid #03A9F4;*/
    font-size: 13px;
    text-align: center;
    border-radius: 3px;
    padding-top: 8px;
    padding-bottom: 8px;
    outline: 0;
    top: 0;
    right: 0;
    font-family: monospace;
    color: red;    
}
.alertwarn{
  color: red;
}
.alertinfo{
  color: rgb(25, 255, 34);
}

.white{
  color: #b12323;;
  font-size: 20px;
  font-weight: 600;
}
.white-icon {
  color: #831414;
  font-size: 20px;
  font-weight: 600;
  margin-left: 20px;
  cursor: pointer;
}
.feedback{
    transform: rotate(90deg);
    position: absolute;
    top: 50%;
    left: -2%;    
}
.audioDevices{
    position: absolute;
    top: 20%;
    right: 0%;    
}
.monospace{
    font-family: monospace;
}
.keypad {
    background-color: deepskyblue;
    border-radius: 0%;
    color: #fff;
    display: inline-block;
    font-size: 12px;
    height: 20px;
    line-height: 20px;
    padding: 5px;
    margin: 1px;
    text-align: center;
    width: 20px;
    opacity: .8;
    cursor:pointer;
}
.dialpad {
      margin-left: 2%;
}
.googleLogin {
  background: url(signin_button.png) no-repeat 6px center;
  /*width: 100px;*/
  height: 100px;
  display: block;
}
.center-div
{
  position: absolute;
  margin: auto;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  width: 15%;
  height: 100px;
  border-radius: 3px;
}
.white-shadow{
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);    
}
.client-name{
  margin-left: 28%;
  position: absolute;
  /*font-size: 30px;*/
  /*font-weight: 600;*/
  color: gray;
}
.lead{
  font-weight: 600;
}
.loader {
  position: absolute;
  left: 50%;
  top: 50%;
  z-index: 1;
  width: 150px;
  height: 150px;
  margin: -75px 0 0 -75px;
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #00a848;
  width: 120px;
  height: 120px;
  -webkit-animation: spin 2s linear infinite;
  animation: spin 2s linear infinite;
}

@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
.btn-success{
  background-color: #00a848;
  border-color: rgba(0,0,0,.0001);  
}
.dropdown{
  margin-top: 6%;
}
.log-out{
  font-size: 25px;
  color: orange;
}
.log-in{
  font-size: 25px;
  color: green;
}
.log-missed{
  font-size: 25px;
  color: red;
}
.log-call{
  font-size: 25px;
  color: green;  
}
.log-call:hover{
  text-shadow: 7px 2px 10px;
  cursor: pointer; 
}


/* Rating Star Widgets Style */
.rating-stars ul {
  list-style-type:none;
  padding:0;
  
  -moz-user-select:none;
  -webkit-user-select:none;
}
.rating-stars ul > li.star {
  display:inline-block;
  
}

/* Idle State of the stars */
.rating-stars ul > li.star > i.fa {
  font-size:2.5em; /* Change the size of the stars */
  color:#ccc; /* Color on idle state */
}
/* Hover state of the stars */
.rating-stars ul > li.star.hover > i.fa {
  color:#FFCC36;
}
/* Selected state of the stars */
.rating-stars ul > li.star.selected > i.fa {
  color:#FF912C;
} 
.span4{width:28%!important}
</style>
<?php 
include_once('header.php')
?>  


<main class="main">

      <!-- Breadcrumb -->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item"><a href="#">Admin</a></li>
        <li class="breadcrumb-item active">Plivo Call</li>
        <!-- Breadcrumb Menu-->
        <!-- <li class="breadcrumb-menu d-md-down-none">
          <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
            <a class="btn" href="#"><i class="icon-speech"></i></a>
            <a class="btn" href="index-2.html"><i class="icon-graph"></i> &nbsp;Failed Numbers</a>
            <a class="btn" href="#"><i class="icon-settings"></i> &nbsp;Settings</a>
          </div>
        </li> -->
      </ol>

      <div class="container-fluid">

        <div class="page-header" style="display:none">
		
		<div class="dropdown">
			<span class="white-icon glyphicon glyphicon-cog dropdown-toggle" data-toggle="dropdown"></span>
			<ul class="dropdown-menu">
			  <li><a class="btn" data-toggle="modal" data-target="#mysettings">Setup options</a></li>
			  <li><a class="btn" data-toggle="modal" data-target="#popAudioDevices">Audio devices</a></li>		  			  
			</ul>
			<span class="white-icon glyphicon glyphicon-log-in" id=uiLogin data-toggle="modal" data-target="#login"></span>
			<span class="white-icon glyphicon glyphicon-off" id=uiLogout onclick='window.location.href=window.location.origin + window.location.pathname + "?logout"'></span>
			<span class="white-icon glyphicon glyphicon-transfer" data-toggle="modal" data-target="#callHistory"></span>
			<span class="lead white client-name">Plivo web client</span>
			<span class="lead pull-right white" id=sipUserName >Not ready...</span>
		</div>
	</div>
	
	
	<div class="">
		<div class="loader"></div>
		<!--div>
			<span class="lead text-success"> - phone status: </span>
			<span class="white" id=phonestatus>Not ready...</span>
		</div>
		<div>
			<span class="lead text-success"> - call status: </span>
			<span class="white" id=callstatus>idle</span>
		</div-->	
		<div class="panel-body">
			<div class="container">
			    <div class=""> 
			        <div class="col-md-6 phone" style="">
			            <div class="row1">
			                <div class="col-md-12 white-shadow">
			                <input type="text" name="name" onkeyup="trimSpace(this)" onblur="trimSpace(this)" id="toNumber" class="form-control tel" placeholder="216XXXXXXX" value="" maxlength="15" style="height: 35px;
font-size: 17px;"/>
			                    <div class="num-pad">			                    
			                    <div class="span4">
			                        <div class="num">
			                            <div class="txt">
			                                1
			                            </div>
			                        </div>
			                    </div>
			                    <div class="span4">
			                        <div class="num">
			                            <div class="txt">
			                                2 <span class="small">
			                                    <p>
			                                        ABC</p>
			                                </span>
			                            </div>
			                        </div>
			                    </div>
			                    <div class="span4">
			                        <div class="num">
			                            <div class="txt">
			                                3 <span class="small">
			                                    <p>
			                                        DEF</p>
			                                </span>
			                            </div>
			                        </div>
			                    </div>
			                    <div class="span4">
			                        <div class="num">
			                            <div class="txt">
			                                4 <span class="small">
			                                    <p>
			                                        GHI</p>
			                                </span>
			                            </div>
			                        </div>
			                    </div>
			                    <div class="span4">
			                        <div class="num">
			                            <div class="txt">
			                                5 <span class="small">
			                                    <p>
			                                        JKL</p>
			                                </span>
			                            </div>
			                        </div>
			                    </div>
			                    <div class="span4">
			                        <div class="num">
			                            <div class="txt">
			                                6 <span class="small">
			                                    <p>
			                                        MNO</p>
			                                </span>
			                            </div>
			                        </div>
			                    </div>
			                    <div class="span4">
			                        <div class="num">
			                            <div class="txt">
			                                7 <span class="small">
			                                    <p>
			                                        PQRS</p>
			                                </span>
			                            </div>
			                        </div>
			                    </div>
			                    <div class="span4">
			                        <div class="num">
			                            <div class="txt">
			                                8 <span class="small">
			                                    <p>
			                                        TUV</p>
			                                </span>
			                            </div>
			                        </div>
			                    </div>
			                    <div class="span4">
			                        <div class="num">
			                            <div class="txt">
			                                9 <span class="small">
			                                    <p>
			                                        WXYZ</p>
			                                </span>
			                            </div>
			                        </div>
			                    </div>
			                    <div class="span4">
			                        <div class="num">
			                            <div class="txt">
			                                *
			                            </div>
			                        </div>
			                    </div>
			                    <div class="span4">
			                        <div class="num">
			                            <div class="txt">
			                                0 <span class="small">
			                                    <p>
			                                        +</p>
			                                </span>
			                            </div>
			                        </div>
			                    </div>
			                    <div class="span4">
			                        <div class="num">
			                            <div class="txt">
			                                #
			                            </div>
			                        </div>
			                    </div>
			                    </div>
			                    <div class="clearfix">
			                    </div>
			                        <button id=makecall class="btn btn-success btn-block flatbtn">CALL</button>
			                        <button class="hangup btn btn-danger btn-block flatbtn">HANGUP</button>
			                </div>
			            </div>				            
			            <div class="clearfix">
			            </div>
			        </div>
			        <!--div class="col-md col-md-offset-6 white">
			        	<div class="callinfo">
			        		<h4 id="boundType">Fetching...</h4>
			        		<h4 id="callNum">Fetching...</h4>
			        		<h2 id="callDuration">00:00</h2>
			        	</div>
			            <div class="row">
			                <div class="col-md-12">
			                    <div>
			                        <div id=inboundAccept class="spanicons inboundBeforeAnswer" style="display:none">
			                            <span class="glyphicon glyphicon-earphone"></span><span class="small">
			                                <p>
			                                    Answer</p>
			                            </span>
			                        </div>
			                        <div id=inboundReject class="spanicons inboundBeforeAnswer" style="display:none">
			                            <span class="glyphicon glyphicon-phone-alt"></span><span class="small">
			                                <p>
			                                    Reject</p>
			                            </span>
			                        </div>			                        
			                        <div class="hangup spanicons AfterAnswer" style="display:none">
			                            <span class="glyphicon glyphicon-phone-alt "></span><span class="small">
			                                <p>
			                                    Hangup</p>
			                            </span>
			                        </div>
			                        <div id=outboundHangup class="spanicons outboundBeforeAnswer" style="display:none">
			                            <span class="glyphicon glyphicon-phone-alt "></span><span class="small">
			                                <p>
			                                    Hangup</p>
			                            </span>
			                        </div>			                        
			                        <div id=tmute data-toggle="mute" class="spanicons AfterAnswer" style="display:none">
			                            <i class="fa tmute fa-microphone"></i><span class="small">
			                                <p>
			                                    Microphone</p>
			                            </span>
			                        </div>
			                    </div>
			                </div>
				        	<div class="col-md-6">
				        		<canvas id="audio-local"></canvas>
				        		<div id=recPlayerLayout>
				        			<audio id=recPlayer></audio>
				        			<a class="btn btn-info btn-sm" id=audioDownload>Download</a>
				        			<a class="btn btn-default btn-sm" id="clearRecPlayer"> Ignore</a>
				        		</div>
				        	</div>			                
			            </div>	            			        	
			        </div-->
			    </div>
			</div>
		</div>
	</div>
	
	
	
	<div class="modal fade" id="mysettings" role="dialog">
		<div class="modal-dialog modal-lg">
		  <div class="modal-content">
		    <div class="modal-header">
		      <button type="button" class="close" data-dismiss="modal">&times;</button>
		      <h4 class="modal-title">Options for initializing the plivoWebSdk object.</h4> <a href="https://jsonformatter.curiousconcept.com/" target="_blank">Please follow RFC 4627 JSON standard</a>
		    </div>
		    <div class="modal-body">
			    <div class="form-group">
			      <textarea class="form-control monospace" rows="5" id="appSettings"></textarea>
			    </div>			    
		    </div>
		    <div class="modal-footer">
				<button type="button" id="resetSettings" class="btn btn-info" data-dismiss="modal" data-toggle="tooltip" title="Please reload the page to reflect changes">reset</button>		    
		      	<button type="button" id="updateSettings" class="btn btn-success" data-dismiss="modal" data-toggle="tooltip" title="Please reload the page to reflect changes">update</button>
		    </div>
		  </div>
		</div>
	</div>
	
	
	
	
	
	<!-- login div -->
	<div class="modal fade" id="login" role="dialog">
		<div class="modal-dialog modal-lg">
		  <div class="modal-content">
		    <div class="modal-header">
		      <button type="button" class="close" data-dismiss="modal">&times;</button>
		      <h4 class="modal-title">Please enter your plivo credentials</h4>
		    </div>
		    <div class="modal-body">
				<div class="container">
				  <form>
				    <div class="form-group col-xs-4">
				      <label for="loginUser">Username</label>
				      <input type="text" onkeyup="trimSpace(this)" onblur="trimSpace(this)" class="form-control " id="loginUser" name="loginUser" value="TestCallEnpoint170421083455" placeholder="plivo userId">
				    </div>
				    <div class="form-group col-xs-4">
				      <label for="loginPwd">Password</label>
				      <input type="password" class="form-control" id="loginPwd" placeholder="password" name="loginPwd" value="PlivoCall">
					<div class="checkbox" id=showPass>
					  <label><input type="checkbox">Show password</label>
					</div>
				    </div class="form-group">
				  </form>
				</div>
		    </div>
		    <div class="modal-footer">
		   		<button type="submit" class="btn btn-success" id=clickLogin data-dismiss="modal">Login</button>
		    </div>
		  </div>
		</div>
	</div>

      </div>
	  
	  
	  
	  
      <!-- /.conainer-fluid -->
	  
	  
	  
	  
	  
	  <!-- audiodevices div -->
	<div class="modal fade" id="popAudioDevices" role="dialog">
		<div class="modal-dialog modal-lg">
		  <div class="modal-content">
		    <div class="modal-header">
		      <button type="button" class="close" data-dismiss="modal">&times;</button>
		      <h4 class="modal-title">Audio device collection</h4>
		    </div>
		    <div class="modal-body">
				  <form>
				    <div class="form-group">
				      <label for="micDev">Select Microphone device => Voice input device</label>
					  <select class="form-control" id="micDev">
					  </select>
				    </div>
				    <div class="form-group">
				      <label for="ringtoneDev">Select Ringtone device => Speaker for incoming ringtone</label>
					  <select class="form-control" id="ringtoneDev">
					  </select>
					  <button type=button class="btn btn-info btn-sm" id=ringtoneDevTest>Test</button>
				    </div>
				    <div class="form-group">
				      <label for="speakerDev">Select Output Speaker device => Remote audio and DTMF sound</label>
						  <select class="form-control" id="speakerDev">
						  </select>
						  <button type=button class="btn btn-info btn-sm" id=speakerDevTest>Test</button>
				    </div>
				    <div>
				    	<h2>Reload audio devices</h2>
				    	<button type=button class="btn btn-success btn-sm" id=allowAudioDevices>refresh</button>
			    		<h3 class="text-center text-success">USB headsets works better in reducing background noise and echo.</h3>					    	
				    </div>
				  </form>
		    </div>
		  </div>
		</div>
		
		
		
		<!-- media not allowed div -->
	<div class="modal fade" id="mediaAccessBlock" role="dialog">
		<div class="modal-dialog modal-lg">
		  <div class="modal-content">
		    <div class="modal-header">
		      <button type="button" class="close" data-dismiss="modal">&times;</button>
		      <h4 class="modal-title">Audio device access is blocked Please allow!</h4>
		    </div>
		    <div class="modal-body">
				<div class="container">
				</div>
		    </div>
		    <div class="modal-footer">
		   		<h4 class="text-center lead">Have a look at your right hand side of your address bar</h4>
		    </div>		    
		  </div>
		</div>
	</div>
	
	
	
	<!-- Mic blocked after perm -->
	<div class="modal fade" id="micAccessBlock" role="dialog">
		<div class="modal-dialog modal-lg">
		  <div class="modal-content">
		    <div class="modal-header">
		      <button type="button" class="close" data-dismiss="modal">&times;</button>
		      <h4 class="modal-title">Mic input access is blocked</h4>
		    </div>
		    <div class="modal-body">
				<h4>
					Your browser has some issues in accessing your microphone in the hardware. Please restart or close and open back your browser to fix it.
				</h4>
		    </div>	    
		  </div>
		</div>
	</div>
	<!-- call history -->
	<div class="modal fade" id="callHistory" role="dialog">
		<div class="modal-dialog modal-lg">
		  <div class="modal-content">
		    <div class="modal-header">
		      <button type="button" class="close" data-dismiss="modal">&times;</button>
		      <span>Last 50 calls</span>
		      <button id=clearLogs class="btn btn-default btn-sm pull-right" style="margin-right:20px;">Clear logs</button>
		    </div>
		    <div class="modal-body">
		    	<div class="pre-scrollable">
					<table class="table table-bordered">
					    <tbody id="callHistoryTable">   						      						      						      
					    </tbody>
					  </table>			    		
		    	</div>
		    </div>	    
		  </div>
		</div>
	</div>
	</div>
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




<script src="https://s3.amazonaws.com/plivosdk-backup/sdk/browser/v2/plivo.min.js"></script>
<script type="text/javascript">
	$( document ).ready(function() {
	    console.log( "HTML ready!" );
	    $('[data-toggle="tooltip"]').tooltip();
	    resetSettings();
	    initPhone();
	});	
</script>
<script type="text/javascript">
var callStorage = {}, timer = "00:00:00";
/* UI tweaks*/
$('#makecall').attr('class', 'btn btn-success btn-block flatbtn disabled');

function date(){
	return (new Date()).toISOString().substring(0, 10)+" "+Date().split(" ")[4];
}
function kickStartNow(){
		$('.callScreen').hide();
		$('.loader').show();
		$('.fadein-effect').fadeIn(5000);	
}
function login(username, password) {
		if(username && password){
			/*start UI load spinner*/
			kickStartNow();
			plivoWebSdk.client.login(username, password);
			$('#sipUserName').html(username);
			document.querySelector('title').innerHTML=username;
		}else{
			console.error('username/password missing!')
		}
}
function audioDeviceChange(e){
	console.log('audioDeviceChange',e);
	if(e.change){
		if(e.change == "added"){
			customAlert(e.change,e.device.kind +" - "+e.device.label,'info');		
		}else{
			customAlert(e.change,e.device.kind +" - "+e.device.label,'warn');
		}
	}else{
		customAlert('info','There is an audioDeviceChange but mediaPermission is not allowed yet');
	}
}
function onWebrtcNotSupported() {
	console.warn('no webRTC support');
	alert('Webrtc is not supported in this broswer, Please use latest version of chrome/firefox/opera/IE Edge');
}
function mediaMetrics(obj){
	/**
	* Set a trigger for Quality FB popup when there is an warning druing call using sessionStorage
	* During `onCallTerminated` event check for `triggerFB` flag
	*/
	sessionStorage.setItem('triggerFB',true);
	console.table([obj]);
	var classExist = document.querySelector('.-'+obj.type);
	var message = obj.type;
	/**
	* If there is a same audio level for 3 samples then we will get a trigger
	* If audio level is greater than 30 then it could be some continuous echo or user is not speaking
	* Set message "same level" for audio greater than 30. Less than 30 could be a possible mute  	
	*/
	if(obj.type.match('audio') && obj.value > 30){
		message = "same level";
	}
	if(obj.active){
		classExist? classExist.remove() : null; 
	$(".alertmsg").prepend(
	  '<div class="metrics -'+obj.type+'">' +
	  '<span style="margin-left:20px;">'+obj.level+' | </span>' +
	  '<span style="margin-left:20px;">'+obj.group+' | </span>' +
	  '<span style="margin-left:20px;">'+message+' - '+obj.value+' : </span><span >'+obj.desc+'</span>'+
	  '<span aria-hidden="true" onclick="closeMetrics(this)" style="margin-left:25px;cursor:pointer;">X</span>' +
	  '</div>'
	);
	}
	if(!obj.active && classExist){
		document.querySelector('.-'+obj.type).remove();
	}
	/* Handle no mic input even after mic access*/
	if(obj.desc == "no access to your microphone"){
		$('#micAccessBlock').modal({ show: true })
	}
}

function onReady(){
	$('#phonestatus').html('trying to login...');
	console.info('Ready');
}
function onLogin(){
	$('#phonestatus').html('online');
	console.info('Logged in');
	$('#makecall').attr('class', 'btn btn-success btn-block flatbtn');
	$('#uiLogin').hide();
	$('#uiLogout').show();
	$('.feedback').show();
	$('.loader').remove();
}
function onLoginFailed(reason){
	$('#phonestatus').html('login failed');
	console.info('onLoginFailed ',reason);
	customAlert('Login failure :',reason);
	$('.loader').remove()	
}
function onLogout(){
	$('#phonestatus').html('Offline');
	console.info('onLogout');
}
function onCalling(){
	$('#callstatus').html('Progress...');	
	console.info('onCalling');
}
function onCallRemoteRinging(){
	$('#callstatus').html('Ringing...');
	console.info('onCallRemoteRinging');
}
function onCallAnswered(){
	console.info('onCallAnswered');
	$('#callstatus').html('Answered');
	$('.hangup').show();
	/* plivoWebSdk.client.logout();*/
	timer = 0;
	window.calltimer = setInterval(function(){
		timer = timer +1;
		$('#callDuration').html(timer.toString().calltimer());
	},1000);
	
}
function onCallTerminated(evt){
	$('#callstatus').html('Call Ended');
	console.info('onCallTerminated');
	if(sessionStorage.getItem('triggerFB')){
		clearStars();
		$('#clickFeedback').trigger('click');
		/* clear at end of every call*/
		sessionStorage.removeItem('triggerFB');
	}
	callOff(evt);
}
function onCallFailed(reason){
	$('#callstatus').html('call failed');
	console.info('onCallFailed',reason);
	if(reason && /Denied Media/i.test(reason)){
		$('#mediaAccessBlock').modal('show');
		alert(reson);
	};
	callOff(reason);
}
function onMediaPermission(evt){
	console.info('onMediaPermission',evt);
	if(evt.error){
		customAlert('Media permission error',evt.error);
		$('#mediaAccessBlock').modal('show');
	}
}
function onIncomingCall(callerName, extraHeaders){

	console.info('onIncomingCall : ', callerName, extraHeaders);
	callStorage.startTime = date();
	callStorage.mode = 'in';
	callStorage.num = callerName;
	$('#boundType').html('Incomming :');
	$('#callNum').html(callerName);
	$('#callDuration').html('00:00:00');
	$('.callinfo').show();
	$('.callScreen').show();
	$('.inboundBeforeAnswer').show();
	$('#makecall').hide();
}
function onIncomingCallCanceled(){
	console.info('onIncomingCallCanceled');
	callOff();
}

function callOff(reason){
	if(typeof reason == "object"){
		customAlert('Hangup',JSON.stringify(reason) );
	}else if(typeof reason == "string"){
		customAlert('Hangup',reason);
		
	}
	$('.callScreen').hide();
	$('.inboundBeforeAnswer').hide();
	$('.AfterAnswer').hide();
	$('.outboundBeforeAnswer').hide();
	$('.hangup').hide();
	$('#makecall').show();
	window.calltimer? clearInterval(window.calltimer) : false;
	callStorage.dur = timer.toString().calltimer();
	if(timer == "00:00:00" && callStorage.mode == "in"){
		callStorage.mode = "missed";
	}
	saveCallLog(callStorage);
	$('#callstatus').html('Idle');
	$('.callinfo').hide();
	callStorage={}; /* reset callStorage*/
	timer = "00:00:00"; /*reset the timer*/
}

String.prototype.calltimer = function () {
    var sec_num = parseInt(this, 10);
    var hours   = Math.floor(sec_num / 3600);
    var minutes = Math.floor((sec_num - (hours * 3600)) / 60);
    var seconds = sec_num - (hours * 3600) - (minutes * 60);
    if (hours   < 10) {hours   = "0"+hours;}
    if (minutes < 10) {minutes = "0"+minutes;}
    if (seconds < 10) {seconds = "0"+seconds;}
    return hours+':'+minutes+':'+seconds;
}
function closeMetrics(e){
	e.parentElement.remove();
}

function resetSettings(source){
	/* You can use all your default settings to go in as options during sdk init*/
	var defaultSettings = {"debug":"ALL","permOnClick":true,"codecs":["OPUS","PCMU"],"enableIPV6":false,"audioConstraints":{"optional":[{"googAutoGainControl":false}]},"dscp":true,"enableTracking":true}
	var uiSettings = document.querySelector('#appSettings');
	uiSettings.value = JSON.stringify(defaultSettings);
	if(source == 'clickTrigger')
		localStorage.removeItem('plivosettings');
}

function refreshSettings(){
	var getSettings = localStorage.getItem('plivosettings');
	var uiSettings = document.querySelector('#appSettings');
	if(getSettings){
		uiSettings.value = getSettings;
		return JSON.parse(getSettings);
	}else{
		return JSON.parse(uiSettings.value);
	}
}
function updateSettings(val){
	localStorage.setItem('plivosettings',val);
	console.log('plivosettings updated!')
}
function customAlert(header,alertMessage,type){
	var typeClass="";
	if(type == "info"){
		typeClass = "alertinfo";
	}else if(type == "warn"){
		typeClass = "alertwarn";
	}
	$(".alertmsg").prepend(
	  '<div class="customAlert'+' '+typeClass+'">' +
	  '<span style="margin-left:20px;">'+header+' | </span>' +
	  '<span style="margin-left:20px;">'+alertMessage+' </span>'+
	  '<span aria-hidden="true" onclick="closeMetrics(this)" style="margin-left:25px;cursor:pointer;">X</span>' +
	  '</div>'
	);
}

function updateAudioDevices(){
	/* Remove existing options if any*/
	document.querySelectorAll('#micDev option').forEach(e=>e.remove())
	document.querySelectorAll('#ringtoneDev option').forEach(e=>e.remove())

	plivoWebSdk.client.audio.availableDevices()
	.then(function(e){
		e.forEach(function(dev){
			if(dev.label && dev.kind == "audioinput")
				$('#micDev').append('<option value='+dev.deviceId+'>'+dev.label+'</option>')
			if(dev.label && dev.kind == "audiooutput"){
				$('#ringtoneDev').append('<option value='+dev.deviceId+'>'+dev.label+'</option>');
				$('#speakerDev').append('<option value='+dev.deviceId+'>'+dev.label+'</option>')		
			}
		});
	})
	.catch(function(error){
		console.error(error);
	})
}

function clearStars(){
	var stars = document.querySelectorAll('.star');
    for (i = 0; i < stars.length; i++) {
      $(stars[i]).removeClass('selected');
    }
    document.querySelectorAll('[name="callqualitycheck"]').forEach(e=>{
    	e.checked? (e.checked=false): null;
    });
    sendFeedbackComment.value="";
}

function checkBrowserComplaince(client){
	if(client.browserDetails.browser != "chrome"){
		document.querySelector('[data-target="#popAudioDevices"]').remove();
	}
}

function trimSpace(e){
	 e.value = e.value.replace(/[- ()]/g,'');
}

function callLogDiv(e){
	var mapper = {
		"in" : "arrow-down log-in",
		"out"	: "share-alt log-out",
		"missed": "arrow-down log-missed"
	}
	$('#callHistoryTable').prepend(
		'<tr>'+
			'<td><span class="glyphicon glyphicon-'+mapper[e.mode]+'"></span></td>'+
			'<td>'+e.num+'</td>'+
			'<td>'+e.dur+'</td>'+
			'<td>'+e.startTime+'</td>'+
			'<td><span class="glyphicon glyphicon-earphone log-call" data-dismiss="modal" onclick="makecallCallLog(this)"></span></button></td>'+
		'</tr>'
	);
	return;
}

function saveCallLog(e){
	var callLog = localStorage.getItem('pli_callHis');
	var formatCallLog = JSON.parse(callLog);
	var callLogStr;
	callLogDiv(e);
	if(formatCallLog.length > 50){
		formatCallLog.shift();/* Pops first element*/
		console.info('Call log exceeded 50 rows, removing oldest log')
	}	
	formatCallLog.push({"mode":e.mode,"num":e.num,"dur":e.dur,"startTime":e.startTime});
	callLogStr = JSON.stringify(formatCallLog);
	localStorage.setItem('pli_callHis',callLogStr);
}

function displayCallHistory(){
	var callLog = localStorage.getItem('pli_callHis');
	if(callLog){
		var formatCallLog = JSON.parse(callLog);
		var mapper = {
			"in" : "right log-in",
			"out"	: "left log-out",
			"missed": "down log-missed"
		}		
		for(var i=0; i < formatCallLog.length; i++){
			callLogDiv(formatCallLog[i]);
		}
	}else{
		localStorage.setItem('pli_callHis','[]');
	}
}
function makecallCallLog(e){
	var to = e.parentNode.parentNode.childNodes[1].innerHTML;
	toNumber.value = to; /* update the dial input */
	makecall.click(); /* trigger call*/	
}
/** 
* Hangup calls on page reload / close
* This is will prevent the other end still listening for dead call
*/
window.onbeforeunload = function () {
    plivoWebSdk.client && plivoWebSdk.client.logout();
};

/*
	Capture UI onclick triggers 
*/
$('#inboundAccept').click(function(){
	console.info('Call accept clicked');
	plivoWebSdk.client.answer();
	$('.inboundBeforeAnswer').hide();
	$('.AfterAnswer').show();
});
$('#inboundReject').click(function(){
	console.info('callReject');
	plivoWebSdk.client.reject();
});
$('#outboundHangup').click(function(){
	console.info('outboundHangup');
	plivoWebSdk.client.hangup();
});
$('.hangup').click(function(){
	console.info('Hangup');
	if(plivoWebSdk.client.callSession){
		plivoWebSdk.client.hangup();
	}else{
		callOff();
	}
});

$('#tmute').click(function(e){
	var event = e.currentTarget.getAttribute('data-toggle');
	if(event == "mute"){
		plivoWebSdk.client.mute();
		e.currentTarget.setAttribute('data-toggle','unmute');
		$('.tmute').attr('class', 'fa tmute fa-microphone-slash')
	}else{
		plivoWebSdk.client.unmute();
		e.currentTarget.setAttribute('data-toggle','mute');
		$('.tmute').attr('class', 'fa tmute fa-microphone')
	}
});
$('#makecall').click(function(e){
	var to = $('#toNumber').val().replace(" ",""), 
		extraHeaders, 
		customCallerId= localStorage.getItem('setCallerId'),
		customCallerIdEnabled = localStorage.getItem('setCallerIdCheck');
	if(customCallerIdEnabled && customCallerId){
		customCallerId = customCallerId.replace("+","");
		extraHeaders = {'X-PH-callerId': customCallerId};		
	}
	var to =  to;
	var callEnabled = $('#makecall').attr('class').match('disabled');
	if(!to || !plivoWebSdk || !!callEnabled){return};
	if(!plivoWebSdk.client.isLoggedIn){alert('You\'re not Logged in!')}
	plivoWebSdk.client.call(to,extraHeaders);
	console.info('Click make call : ',to);
	callStorage.mode = "out";
	callStorage.startTime = date();
	callStorage.num = to;
	$('.callScreen').show();
	$('.AfterAnswer').show();
	$('#boundType').html('Outgoing :');
	$('#callNum').html(to);
	$('#callDuration').html('00:00:00');
	$('.callinfo').show();
	$('.hangup').show();
	$('#makecall').hide();
});

$('#updateSettings').click(function(e){
	var appSettings = document.querySelector('#appSettings'); 
	appSettings = appSettings.value;
	updateSettings(appSettings);
});

$('#resetSettings').click(function(e){
	resetSettings('clickTrigger');
});

$('#sendFeedback').click(function(){
	var score = $('#stars li.selected').last().data('value');
	score = Number(score);
	var lastCallid = plivoWebSdk.client.getLastCallUUID();
	/ var comment = $("input[type=radio][name=callqualitycheck]:checked").val() || "good";*/
	var comment = "";
	if(score == 5){
		comment = "good";
	}
	document.querySelectorAll('[name="callqualitycheck"]').forEach(e=>{
		if(e.checked){
			comment = comment + "," + e.value;
		}
	});
	if(sendFeedbackComment.value){
		comment = comment + "," + sendFeedbackComment.value;
	}
	comment = comment.slice(1);
	if(!comment){
		customAlert('feedback','Please select any comment');
		return;
	}
	if(!score){
		customAlert('feedback','Please select star');
		return;		
	}
	plivoWebSdk.client.sendQualityFeedback(lastCallid,score,comment);
	customAlert('Quality feedback ',lastCallid);
});
$(function() {
    $('#clickLogin').click();
});
$('#clickLogin').click(function(e){
	/*var userName = $('#loginUser').val();*/
	var password = $('#loginPwd').val();
	var userName = 'plivocall387904882113009203624953';
	login(userName, password);

});

/* Audio device selection*/
$('#micDev').change(function(){
	var selectDev = $('#micDev').val();
	plivoWebSdk.client.audio.microphoneDevices.set(selectDev);
	console.debug('Microphone device set to : ',selectDev);
});
$('#speakerDev').change(function(){
	var selectDev = $('#speakerDev').val();
	plivoWebSdk.client.audio.speakerDevices.set(selectDev);
	console.debug('Speaker device set to : ',selectDev);
});
$('#ringtoneDev').change(function(){
	var selectDev = $('#ringtoneDev').val();
	plivoWebSdk.client.audio.ringtoneDevices.set(selectDev);
	console.debug('Ringtone dev set to : ',selectDev);
});

/* Ringtone device test*/
$('#ringtoneDevTest').click(function(){
	var ringAudio = plivoWebSdk.client.audio.ringtoneDevices.media();
	/*Toggle play*/
	if(ringAudio.paused){
		ringAudio.play();
		$('#ringtoneDevTest').html('Pause');
	}else{
		ringAudio.pause();
		$('#ringtoneDevTest').html('Play');
	}
});
/* Speaker device test*/
$('#speakerDevTest').click(function(){
	var speakerAudio = plivoWebSdk.client.audio.speakerDevices.media();
	/* Toggle play*/
	if(speakerAudio.paused){
		speakerAudio.play();
		$('#speakerDevTest').html('Pause');
	}else{
		speakerAudio.pause();
		$('#speakerDevTest').html('Play');
	}
});
/*revealAudioDevices*/	
$('#allowAudioDevices').click(function(){
	document.querySelectorAll('#popAudioDevices option').forEach(e=>e.remove());
	plivoWebSdk.client.audio.revealAudioDevices()
	.then(function(e){
		updateAudioDevices();
		console.log('Media permission ',e)
	})
	.catch(function(error){
		console.error('media permission error :',error);
		$('#mediaAccessBlock').modal('show');
	})
});

$('.num').click(function () {
    var num = $(this);
    var text = $.trim(num.find('.txt').clone().children().remove().end().text());
    var telNumber = $('#toNumber');
    $(telNumber).val(telNumber.val() + text);
    if(plivoWebSdk && plivoWebSdk.client.callSession){
    	plivoWebSdk.client.sendDtmf(text);
    }
});

clearLogs.onclick = function(){
	localStorage.setItem('pli_callHis','[]');
	callHistoryTable.innerHTML=""
}

showPass.onclick = function(){
	if($('#showPass input').prop("checked")){
		loginPwd.type="text";
	}else{
		loginPwd.type="password";
	}
}

function starFeedback(){
  $('#stars li').on('mouseover', function(){
    var onStar = parseInt($(this).data('value'), 10);
    $(this).parent().children('li.star').each(function(e){
      if (e < onStar) {
        $(this).addClass('hover');
      }
      else {
        $(this).removeClass('hover');
      }
    });
  }).on('mouseout', function(){
    $(this).parent().children('li.star').each(function(e){
      $(this).removeClass('hover');
    });
  });
  
  $('#stars li').on('click', function(){
    var onStar = parseInt($(this).data('value'), 10);
    var stars = $(this).parent().children('li.star');
    
    for (i = 0; i < stars.length; i++) {
      $(stars[i]).removeClass('selected');
    }
    
    for (i = 0; i < onStar; i++) {
      $(stars[i]).addClass('selected');
    }
    
    var value = parseInt($('#stars li.selected').last().data('value'), 10);
	if(value < 5){
		$('.lowQualityRadios').show();
	}else{
		$('.lowQualityRadios').hide();
	}
    
  });	
}
/* variables to declare*/ 

var plivoWebSdk; /* this will be retrived from settings in UI*/

function initPhone(username, password){
	var options = refreshSettings();
	plivoWebSdk = new window.Plivo(options);
	plivoWebSdk.client.on('onWebrtcNotSupported', onWebrtcNotSupported);
	plivoWebSdk.client.on('onLogin', onLogin);
	plivoWebSdk.client.on('onLogout', onLogout);
	plivoWebSdk.client.on('onLoginFailed', onLoginFailed);
	plivoWebSdk.client.on('onCallRemoteRinging', onCallRemoteRinging);
	plivoWebSdk.client.on('onIncomingCallCanceled', onIncomingCallCanceled);
	plivoWebSdk.client.on('onCallFailed', onCallFailed);
	plivoWebSdk.client.on('onCallAnswered', onCallAnswered);
	plivoWebSdk.client.on('onCallTerminated', onCallTerminated);
	plivoWebSdk.client.on('onCalling', onCalling);
	plivoWebSdk.client.on('onIncomingCall', onIncomingCall);
	plivoWebSdk.client.on('onMediaPermission', onMediaPermission);
	plivoWebSdk.client.on('mediaMetrics',mediaMetrics);
	plivoWebSdk.client.on('audioDeviceChange',audioDeviceChange);
	plivoWebSdk.client.setRingTone(true);
	plivoWebSdk.client.setRingToneBack(true);
	/* plivoWebSdk.client.setConnectTone(false);*/
	/** Handle browser issues
	* Sound devices won't work in firefox
	*/
	checkBrowserComplaince(plivoWebSdk.client);	
	updateAudioDevices();
	displayCallHistory();
	starFeedback();
	console.log('initPhone ready!')
}
</script>