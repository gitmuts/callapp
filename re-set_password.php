<?php session_start();
include_once("connection.php");
$key = '0';


$stop_date = date('Y-m-d h:m:s');

$date_time = date('Y-m-d H:i:s', strtotime($stop_date . ' +1 day'));



if(isset($_GET['key']))
{
	$key = $_GET['key'];
}
$query = mysqli_query($con,"select * from tapp_reset_pass where unique_key='".$key."' and date_time<'".$date_time."'");
if(mysqli_num_rows($query)<1)
{
	if($key != '0')
	{
		echo "<center><h1 style='color:red'>Invalid or expired link</h1></center>"	;
	}
	else
	{
echo "<center><h1 style='color:red'>Access Forbidden</h1></center>"	;
	}
}
else {
	while($row = mysqli_fetch_array($query))
	{
		$email = $row['email'];
	}
	$delete = mysqli_query($con,"delete from tapp_reset_pass where unique_key='".$key."'");
?>

<!DOCTYPE html>
<html lang="en">
<style type="text/css">
  .danger{
    display: none;
  }
</style>
<!-- Mirrored from genesisui.com/demo/clever/1.8.10/bootstrap4-static/pages-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Nov 2017 10:57:18 GMT -->
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Clever Bootstrap 4 Admin Template">
  <meta name="author" content="Lukasz Holeczek">
  <meta name="keyword" content="Clever Bootstrap 4 Admin Template">
  <!-- <link rel="shortcut icon" href="assets/ico/favicon.png"> -->

  <title>SMS Login</title>

  <!-- Icons -->
  <link href="vendors/css/font-awesome.min.css" rel="stylesheet">
  <link href="vendors/css/simple-line-icons.min.css" rel="stylesheet">

  <!-- Main styles for this application -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/custom-style.css" rel="stylesheet">
<style type="text/css">
  .danger {
  
    color: #ff0000;
}
</style>
  <!-- Styles required by this views -->
</head>

<body class="app flex-row align-items-center">
  <div class="container">
    <form action="get_reset_pass.php" method="post">
	<?php

				if(isset($_SESSION['failure_message'])) { ?>
				<div class="failure_message"><?php echo $_SESSION['failure_message'];?></div>
				<?php } ?>
				
				<?php

				if(isset($_SESSION['flash_message'])) { ?>
				<div class="flash_message" style="color:green"><?php  echo $_SESSION['flash_message'];?></div>
				<?php } ?>
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card-group mb-4">
          <div class="card p-4">
            <div class="card-body">
              <h1 class="login-heading">Reset Password</h1>
             
              <div class="col-12 text-center"><span class="danger">Invalid Username Or Password</span> </div>
              <div class="input-group mb-3">
                <span class="input-group-addon"><i class="icon-user"></i></span>
                <input type="password" id='npass' class="form-control" placeholder="Enter new password" name="password">
              </div>
			  <input type="hidden" name="email" value="<?php echo $email;?>">
             <div class="input-group mb-3">
                <span class="input-group-addon"><i class="icon-user"></i></span>
                <input type="password" id="rpass" class="form-control" placeholder="Re-Enter new password" name="password">
              </div>
              <div class="row">
                <div class="col-12">
                  <button type="submit" class="btn btn-primary px-4">Reset Password</button>
                </div>
                
                
              </div>
            </div>
          </div>
          <div class="card text-white bg-primary py-5 d-md-down-none" style="width:100%">
            <div class="card-body text-center">
              <div style="padding-right: 34px;">
                <h2>SMS APP</h2>
                <p><img src="img/login-logo.png" class="img-avatar" alt=""></p>
               
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </form>
  </div>

  <!-- Bootstrap and necessary plugins -->
  <script src="vendors/js/jquery.min.js"></script>
  <script src="vendors/js/popper.min.js"></script>
  <script src="vendors/js/bootstrap.min.js"></script>

</body>


<!-- Mirrored from genesisui.com/demo/clever/1.8.10/bootstrap4-static/pages-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Nov 2017 10:57:18 GMT -->
</html>




<?php } ?>