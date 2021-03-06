<?php
$username = "plivocall387904882113009203624953";
$password = "PlivoCall";
?>

<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <title>Plivo Webphone Demo</title>
        <meta name="description" content="">
        <script language="javascript" content-type="text/javascript" src="static/jquery.js"></script>
        <script type="text/javascript" src="http://s3.amazonaws.com/plivosdk/web/plivo.min.js"></script>
        <link href="static/bootstrap-combined.min.css" rel="stylesheet">
        <style type="text/css">
            body {
                padding-top: 20px;
                padding-bottom: 40px;
            }
            .container-narrow {
                margin: 0 auto;
                max-width: 700px;
            }
            .container-narrow > hr {
                margin: 30px 0;
            }
            #btn-container a{
                margin-top:7px;
                min-width:7px;
            }
        </style>
        <script type="text/javascript">
            // Make outgoing calls
            function call() {
                if ($('#make_call').text() == "Call") {
                    // The destination phone number to connect the call to
                    var dest = $("#to").val();
                    if (isNotEmpty(dest)) {
                        $('#status_txt').text('Calling..');
                        // Connect the call
                        Plivo.conn.call(dest);
                        $('#make_call').text('End');
                    }
                    else{
                        $('#status_txt').text('Invalid Destination');
                    }
                }
                else if($('#make_call').text() == "End") {
                    $('#status_txt').text('Ending..');
                    // Hang up the call
                    Plivo.conn.hangup();
                    $('#make_call').text('Call');
                    $('#status_txt').text('Ready');
                }
            }
            // Login with SIP Endpoint
            function login() {
                // SIP Endpoint username and password
                var username = "<?php echo $username; ?>";
                var password = "<?php echo $password; ?>";
                
                // Login
                Plivo.conn.login(username, password);
            }
            function logout() {
                $('#status_txt').text('Logged out');
                Plivo.conn.logout();
            }
            function isNotEmpty(n) {
                return n.length > 0;
            }
            function onCalling() {
                console.log("onCalling");
                $('#status_txt').text('Connecting....');
            }
            function  onMediaPermission (result) {
                if (result) {
                    console.log("get media permission");
                } else {
                    alert("you don't allow media permission, you will can't make a call until you allow it");
                }
            }
            function webrtcNotSupportedAlert() {
                $('#txtStatus').text("");
                alert("Your browser doesn't support WebRTC. You need Chrome 25 to use this demo");
            }
            function onLogin() {
                $('#status_txt').text('Logged in');
                $('#logout_box').show();
            }
            function onLoginFailed() {
                $('#status_txt').text("Login Failed");
            }
            function onCallRemoteRinging() {
                $('#status_txt').text('Ringing..');
            }
            function onCallAnswered() {
                console.log('onCallAnswered');
                $('#status_txt').text('Call Answered');
            }
            function onReady() {
                console.log("onReady...");
            }
            // Initialization 
            $(document).ready(function() {
                Plivo.onWebrtcNotSupported = webrtcNotSupportedAlert;
                Plivo.onReady = onReady;
                Plivo.onLogin = onLogin;
                Plivo.onLoginFailed = onLoginFailed;
                Plivo.onCalling = onCalling;
                Plivo.onCallRemoteRinging = onCallRemoteRinging;
                Plivo.onCallAnswered = onCallAnswered;
                Plivo.onMediaPermission = onMediaPermission;
                Plivo.init();
            });
        </script>
    </head>
    <body>
        <div class="container-narrow">
            <div class="masthead">
                <img class="muted" src="static/logo.png">
            </div>
            <div class="row-fluid marketing">
                <div class="span12">
                    <h4>Plivo WebSDK Webphone Demo</h4>
                    <div id="logout_box" style="display: none">
                        <input class="btn" type="button" id="btn_logout" onclick="logout()" value="Logout">
                    </div>
                    <br>
                    <span class="label" id="status_txt">Login</span><br/><br/>
                    <form id="callcontainer" style="">
                        <input type="text" name="to" value="" id="to" placeholder="Phone number or a SIP URI">
                        <br/>
                        <a href="#" onclick="login();">Login</a>
                        <a href="#" id="make_call" class="btn main-btn btn-success" onclick="call();">Call</a>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>