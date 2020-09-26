<?php
ob_start();
session_start();
include('connection.php');

$user=$_SESSION['user'];
if(!isset($user))
{
header("location:index.php");
}
?>
<!DOCTYPE html>

<html lang="en">



<!-- Mirrored from minetheme.com/Endless1.5.1/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 14 Oct 2015 08:16:52 GMT -->

<head>

<meta charset="utf-8">

<title>CRM</title>

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<meta name="description" content="">

<meta name="author" content="">



<!-- MY css -->

<link href="css/child.css" rel="stylesheet">



<!-- Bootstrap core CSS -->

<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">



<!-- Font Awesome -->

<link href="css/font-awesome.min.css" rel="stylesheet">



<!-- Pace -->

<link href="css/pace.css" rel="stylesheet">



<!-- Datepicker -->

<link href="css/datepicker.css" rel="stylesheet"/>



<!-- Timepicker -->

<link href="css/bootstrap-timepicker.css" rel="stylesheet"/>



<!-- Slider -->

<link href="css/slider.css" rel="stylesheet"/>



<!-- Tag input -->

<link href="css/jquery.tagsinput.css" rel="stylesheet"/>



<!-- WYSIHTML5 -->

<link href="css/bootstrap-wysihtml5.css" rel="stylesheet"/>



<!-- Dropzone -->

<link href='css/dropzone/dropzone.css' rel="stylesheet"/>

	

<!-- Chosen -->

<link href="css/chosen/chosen.min.css" rel="stylesheet"/>



<!-- Slider -->

<link href="css/slider.css" rel="stylesheet"/>



<!-- Endless -->

<link href="css/endless.min.css" rel="stylesheet">

<link href="css/endless-skin.css" rel="stylesheet">

<style>

#dataTable_paginate {
    float: right;
}
#dataTable_length {
    float: right;
}
.DataTables_sort_icon {
    float: right;
    margin-right: 10px;
    margin-left: 23px;
}
	.panel-heading

	{

	color: rgb(255, 255, 255) !important;

font-size: 18px;

font-weight: 700;

text-align: center;

background: rgb(26, 51, 71) none repeat scroll 0% 0% !important;

margin-left: -1px;

margin-right: -1px;

height: 47px;

border-radius: 0px;

	}

	.panel-heading a {

    float: right;

    color: rgb(255, 255, 255) !important;

    font-size: 15px;

}

.panel-heading a:hover {

    float: right;

    color: rgb(74, 160, 207) !important;

    font-size: 15px;

}

#button {

    /*padding-right: 23px;

    border-radius: 0px;

    padding-top: 8px;

    padding-bottom: 9px;

    padding-left: 16px;*/

    background: #38a2c9;

    /*border: #38a2c9 solid;*/

	font-weight: 700;

}

.round-button {
    width:73px;
    height: 65px;
    line-height: 50px;
    border: 2px solid #f5f5f5;
    border-radius: 50%;
    color: #f5f5f5;
    text-align: center;
    text-decoration: none;
    background: #35aa47 !important;
    box-shadow: 0 0 3px gray;
    font-size: 18px;
    font-weight: bold;
}
.round-button:hover {
background: #35AA8D !important;
 
    
}
.round-button1 {
    width:73px;
    height: 65px;
    line-height: 50px;
    border: 2px solid #f5f5f5;
    border-radius: 50%;
    color: #f5f5f5;
    text-align: center;
    text-decoration: none;
    background: rgb(212, 48, 48) !important;
    box-shadow: 0 0 3px gray;
    font-size: 18px;
    font-weight: bold;
}
.round-button1:hover {
  background: rgb(212, 109, 48) !important;
}

    </style>

</head>

<script>

function myFunction() {



    var inputVal = document.getElementById("client_id");

    var button = document.getElementById("button");

		if (inputVal.value == "") {

		button.style.backgroundColor = "#38a2c9";

		button.style.border = "solid #38a2c9"; 

		}

		else{

		button.style.backgroundColor = "#3ec291";

		button.style.border = "solid #3ec291"; 

		}



   /* alert("You pressed a key inside the input field");

    var x = document.forms["client_record"]["client_id"].value;

    if (x == null || x == "") {

       // alert("Name must be filled out");

		   document.getElementById("button").style.background = "#38a2c9";



        return false;

    }

   document.getElementById("button").style.background = "#3ec291";

   document.getElementById("button").style.border = "1px solid #3ec291"; */

}

</script>
<script type="text/javascript">
 function checkkeyword(str)
    {
	
//alert(str);

    if (str == "") {

        document.getElementById("show").innerHTML = "";

        return;

    } else {

        if (window.XMLHttpRequest) {

            // code for IE7+, Firefox, Chrome, Opera, Safari

            xmlhttp = new XMLHttpRequest();

        } else {

            // code for IE6, IE5

            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");

        }

        xmlhttp.onreadystatechange = function() {

            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

                document.getElementById("show").innerHTML = xmlhttp.responseText;

            }

        }

        xmlhttp.open("GET","check_unsub_keywords.php?f=1&&q="+str,true);

        xmlhttp.send();

    }

	}
	
	  function myFunction() {
  //alert("hlo");
    var pass1 = document.getElementById("pass1").value;
    var pass2 = document.getElementById("pass2").value;
    var ok = true;
    if (pass1 != pass2) {
        alert("Passwords Do not match");
        document.getElementById("pass1").style.borderColor = "rgb(52, 208, 227)";
        document.getElementById("pass2").style.borderColor = "#E34234";
        ok = false;
    }
    else {
       // alert("Passwords Match!!!");
    }
    return ok;
}
  
  </script>
<?php 
				$query11 = mysqli_query($con,"select * from amrit_keywords") ;
                $i = 1;
				while($row11 = mysqli_fetch_array($query11) ) {?> 
<script type="text/javascript">
 function keyword<?php echo $row11['id']; ?>(str)
    {
	
//alert('<?php echo $row11['id']; ?>');

    if (str == "") {

        document.getElementById("show<?php echo $row11['id']; ?>").innerHTML = "";

        return;

    } else {

        if (window.XMLHttpRequest) {

            // code for IE7+, Firefox, Chrome, Opera, Safari

            xmlhttp = new XMLHttpRequest();

        } else {

            // code for IE6, IE5

            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");

        }

        xmlhttp.onreadystatechange = function() {

            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

                document.getElementById("show<?php echo $row11['id']; ?>").innerHTML = xmlhttp.responseText;

            }

        }

        xmlhttp.open("GET","chk_unsub_keywords.php?f=1&id=<?php echo $row11['id']; ?>&&q="+str,true);

        xmlhttp.send();

    }

	}
	
  </script>
  <?php
  }
  
  ?>
<body class="overflow-hidden">

<!-- Overlay Div --> 

<!--___________________________overlay_________________________-->

<?php //include("overlay.php"); ?>

<!--___________________________.overlay________________________--> 



<!-- /theme-setting -->



<div id="wrapper" class="preload"> 

  <!--___________________________topbar_________________________-->

  <?php include("topbar.php"); ?>

  <!--___________________________.topbar________________________--> 

  

  <!-- /top-nav--> 

  

  <!--___________________________left sidebar_________________________-->

  <?php include("leftsidebar.php"); ?>

  <!--___________________________.left sidebar________________________-->

  

  <div id="main-container" >

   <script type="text/javascript" src="http://code.jquery.com/jquery-1.6.2.js"></script>

  
<script type="text/javascript">
<?php 
    $query11 = mysqli_query($con,"select * from amrit_newsletter") ;
    $i = 1;
    while($row11 = mysqli_fetch_array($query11) ) {?>
function copyTextValue<?php echo $row11['id'];?>(bf) {
if(bf.checked)
{
//alert("hlo");
document.getElementById("Name<?php echo $row11['id'];?>").checked = true;

}
else
{
first='';

document.getElementById("Name<?php echo $row11['id'];?>").checked = false;


}

}
<?php
}
?>
</script>
  
 
<script type='text/javascript'>//<![CDATA[
$(function(){
var checkboxes = $("input[type='checkbox']"),
    submitButt = $("button[type='submit']");

checkboxes.click(function() {
    submitButt.attr("disabled", !checkboxes.is(":checked"));
});
});//]]> 

</script>


    <div class="">

     <div class="panel panel-default">


       <div class="panel-heading"> <span>Received Response</span></div>
  <!--<div class="padding-md clearfix"><button  type="submit" disabled class="btn btn-success" href="#form" style="" id="" data-toggle="modal" ><i class="fa fa-plus fa-lg"></i>&nbsp;Make a List</button></div>-->


       <br/>

    <div class="panel-body">
    
    

    
    <table class="table table-striped" id="dataTable" border="1" bordercolor="#333">
    <thead>
    <tr>
    <th>ID</th>
    <th>Mobile Number</th>
    <th>Response</th>
    <th>Poll Name</th>
    <th>Date</th>
    
    
    </tr>
    </thead>
    <tbody>
    <?php 
    $query = mysqli_query($con,"select * from amrit_received_responses") ;
    $i = 1;
    while($row = mysqli_fetch_array($query) ) {?> 		
    <tr id="tr" class="tr<?php echo $row['id'];?>">
    <td><?php echo $i; ?></td>
    <td><?php echo $row['mobile_no']; ?></td>
    <td><?php echo $row['keyword']; ?></td>
    <td><?php echo $row['Poll_Name']; ?></td>
    <td><?php echo $row['date_time']; ?></td>
    
    </tr>
    
    <?php $i++; }?>
    
    
    </tbody>
    </table>
    
    </div>

    <!-- /panel --> 

           <form class="no-margin"  method="post" onSubmit="return myFunction()"  action="get_lists.php" name="client_record" enctype="multipart/form-data" >
           <div style="display:none;">  <?php 
        $query111 = mysqli_query($con,"select * from amrit_received_responses") ;
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
      <!-- /.modal-content --> 

    </div>
    <!-- /.modal-dialog --> 
  </div>
  <!-- /.modal --> 
                </form>
  </div>

  <!-- /.padding-md --> 

</div>

 
<!-- /main-container --> 

<!-- Footer

        ================================================== --> 

<!--____________________footer___________________________-->

<?php include("footer.php"); ?>

<!--____________________footer___________________________--> 



</div>

<!-- /wrapper --> 


<a href="#" id="scroll-to-top" class="hidden-print"><i class="fa fa-chevron-up"></i></a> 

<!-- Logout confirmation -->



<!-- Placed at the end of the document so the pages load faster --> 
<!-- Jquery -->
		<!-- Jquery -->
	<script src="js/jquery-1.10.2.min.js"></script>
	
	<!-- Bootstrap -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    
	<!-- Chosen -->
	<script src='js/chosen.jquery.min.js'></script>	

	<!-- Mask-input -->
	<script src='js/jquery.maskedinput.min.js'></script>	

	<!-- Datepicker -->
	<script src='js/bootstrap-datepicker.min.js'></script>	

	<!-- Timepicker -->
	<script src='js/bootstrap-timepicker.min.js'></script>	
	
	<!-- Slider -->
	<script src='js/bootstrap-slider.min.js'></script>	
	
	<!-- Tag input -->
	<script src='js/jquery.tagsinput.min.js'></script>	

	<!-- WYSIHTML5 -->
	<script src='js/wysihtml5-0.3.0.min.js'></script>	
	<script src='js/uncompressed/bootstrap-wysihtml5.js'></script>	

	<!-- Dropzone -->
	<script src='js/dropzone.min.js'></script>	
	
	<!-- Modernizr -->
	<script src='js/modernizr.min.js'></script>
	
	<!-- Pace -->
	<script src='js/pace.min.js'></script>
	
	<!-- Popup Overlay -->
	<script src='js/jquery.popupoverlay.min.js'></script>
	
	<!-- Slimscroll -->
	<script src='js/jquery.slimscroll.min.js'></script>
	
	<!-- Cookie -->
	<script src='js/jquery.cookie.min.js'></script>

	<!-- Endless -->
	<script src="js/endless/endless_form.js"></script>
	<script src="js/endless/endless.js"></script>
		<!-- Datatable -->
	<script src='js/jquery.dataTables.min.js'></script>	
	
	<script>
		$(function	()	{
			$('#dataTable').dataTable( {
				"bJQueryUI": true,
				"sPaginationType": "full_numbers"
			});
			$('#dataTable1').dataTable( {
				"bJQueryUI": true,
				"sPaginationType": "full_numbers"
			});
			
			$('#chk-all').click(function()	{
				if($(this).is(':checked'))	{
					$('#responsiveTable').find('.chk-row').each(function()	{
						$(this).prop('checked', true);
						$(this).parent().parent().parent().addClass('selected');
					});
				}
				else	{
					$('#responsiveTable').find('.chk-row').each(function()	{
						$(this).prop('checked' , false);
						$(this).parent().parent().parent().removeClass('selected');
					});
				}
			});
		});
	</script>
    <script type="text/javascript">
 $("#dash").addClass("active");
	</script>


</body>



<!-- Mirrored from minetheme.com/Endless1.5.1/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 14 Oct 2015 08:17:34 GMT -->



</html>

<?php
if(isset($_GET['s']))
{
if($_GET['s']==1)
{
?>
<script>
alert("List Sucessfully Added");
</script>
<?php
}
else if($_GET['s']==2)
{
?>
<script>
alert("Keyword Sucessfully Deleted");
</script>
<?php
}
else if($_GET['s']==3)
{
?>
<script>
alert("Keyword Sucessfully Updated");
</script>
<?php
}
else
{
?>
<script>
alert("Keyword Already Exist");
</script>
<?php
}
}
?>




