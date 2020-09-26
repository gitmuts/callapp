<?php

include_once('header.php')

?>
<head>
<link type="text/css" rel="stylesheet" href="demo.css">
<link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">


<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<style>
#leads_holder {border: 1px solid #ded9d9;    padding: 8px;    margin-top: 0;}
#clients_holder {border: 1px solid #ded9d9;    padding: 8px;    margin-top: 0;}
</style>

    <!-- Main content -->
<script>

function get_template_message(str) {

    if (str.length == 0) {
        document.getElementById("showtemplate").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("showtemplate").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "get_template.php?q=" + str, true);
        xmlhttp.send();
    }
}
function change_message_type(elem)
{

	if(elem == 'custom')
	{

		document.getElementById('custome_messgae').style.display='block';
		document.getElementById('template_message').style.display='none';
	}
	if(elem == 'template')
	{

		document.getElementById('custome_messgae').style.display='none';
		document.getElementById('template_message').style.display='block';
	}
}
</script>
<script>
function select_schedule(elem)
{
	if(elem == 'scheduled')
	{
		document.getElementById('scheduled-dv').style.display='block';
	}
	else{
		document.getElementById('scheduled-dv').style.display='none';
	}
}
</script>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
 <script type="text/javascript">
            $(document).ready(function () {
                $('#datetimepicker3').datetimepicker();
            });
        </script>
    <main class="main">



      <!-- Breadcrumb -->

      <ol class="breadcrumb">

        <li class="breadcrumb-item">Home</li>

        <!--li class="breadcrumb-item"><a href="#">Message Center</a></li-->

        <li class="breadcrumb-item active">Bulk SMS</li>

        <!-- Breadcrumb Menu-->

        <!-- <li class="breadcrumb-menu d-md-down-none">

          <div class="btn-group" role="group" aria-label="Button group with nested dropdown">

            <a class="btn" href="#"><i class="icon-speech"></i></a>

            <a class="btn" href="index-2.html"><i class="icon-graph"></i> &nbsp;Dashboard</a>

            <a class="btn" href="#"><i class="icon-settings"></i> &nbsp;Settings</a>

          </div>

        </li> -->

      </ol>



      <div class="container-fluid">



        <div class="animated fadeIn">





          <div class="row">

            <div class="col-lg-12">

              <div class="card">

                <div class="card-header">

                  <i class="fa fa-edit"></i>Compose Message

                  <!-- <div class="card-actions">

                    <a href="#" class="btn-setting"><i class="icon-settings"></i></a>

                    <a href="#" class="btn-minimize"><i class="icon-arrow-up"></i></a>

                    <a href="#" class="btn-close"><i class="icon-close"></i></a>

                  </div> -->

                </div>

                <div class="card-body col-lg-7">

                  <form class="form-horizontal" id="formValidate2" data-validate="parsley" method="post" action="get_bulk_sms.php" name="client_record" enctype="multipart/form-data" novalidate>

                    <div class="form-group">

                      <label class="col-form-label" for="prependedInput">upload Type</label>

                      <div class="controls">

                        <div class="input-prepend input-group">

                          <select name="msg_type" class="form-control" onChange="show(this.value);">

                            <option  value="">Select</option>

                            <option value="group">Group Number</option>

                            <option value="file">Upload File</option>
                            <option value="clients">Contacts</option>



                          </select>



                          <datalist id='listid'>

<?php

      $query331 = mysqli_query($con,"select * from tapp_suscribers_list") ;

            while($row331 = mysqli_fetch_array($query331) )

            {

      if($row331['list_name']=='' || $row331['list_name']==null )

      {

      ?>

          <?php

     }

      else

      {

           ?>

           <option  value='<?php echo $row331['list_name']; ?>'><?php echo $row331['list_name']; ?></option>

           <?php

            }

      }

            $query33 = mysqli_query($con,"select * from tapp_newsletter") ;

            while($row33 = mysqli_fetch_array($query33) )

            {

      if($row33['name']=='' || $row33['name']==null )

      {

      ?>

            <?php

      }

      else

      {

            ?>

            <option  value='<?php echo $row33['name']; ?>'></option>

            <?php

           }

      }

            $query33 = mysqli_query($con,"select * from tapp_newsletter") ;

            $i = 1;

            while($row3 = mysqli_fetch_array($query33) )

            {

      if($row3['mobile_no']=='' || $row3['mobile_no']==null )

      {

      ?>

           <?php

      }

      else

      {

            ?>

            <option  value='<?php echo $row3['mobile_no']; ?>'></option>

            <?php

      }

            }

            $query33 = mysqli_query($con,"select * from tapp_newsletter") ;

            $i = 1;

            while($row3 = mysqli_fetch_array($query33) )

            {

      if($row3['email']=='' || $row3['email']==null )

      {

      ?>

           <?php

      }

      else

      {

            ?>

            <option  value='<?php echo $row3['email']; ?>'></option>

           <?php

      }

           }

            ?>

            </datalist>

                      </div>



                      </div>

                    </div>

					<!--div class="form-group">

                      <label class="col-form-label" for="appendedInput">Select Country</label>

                      <div class="controls">

                        <div class="input-group">
<?php $get_countries = mysqli_query($con,"select * from tapp_countries order by name desc");?>
          <select id="select2-1" class="form-control select2-single select2-hidden-accessible" tabindex="-1" aria-hidden="true" name="country_code" onchange="" required>



          <option value="">Select</option>

<?php while($row_country = mysqli_fetch_array($get_countries))
{ ?>

    <option value="<?php echo $row_country['phonecode'];?>" <?php if($row_country['name'] == 'United States') echo "selected";?>><?php echo $row_country['name'];?></option>
<?php } ?>

         </select>



                     </div>



                      </div>

                    </div-->



					<div class="form-group">

                      <label class="col-form-label" for="appendedInput">Select Schedule</label>

                      <div class="controls">

                        <div class="input-group">

          <select id="select2-1" class="form-control select2-single select2-hidden-accessible" tabindex="-1" aria-hidden="true" name="sending_type" onchange="select_schedule(this.value)" required>



          <option value="">Select</option>



    <option value="send_now">Send Now</option>
    <option value="scheduled">Make A Schedule</option>

         </select>



                     </div>



                      </div>

                    </div>

					<div class="form-group" id="scheduled-dv" style="display:none">
					<div style="width:50%;float:left;padding-right:5px">

                      <label class="col-form-label" for="appendedInput">Date </label>

                      <div class="controls" >


                   <input type='date' class="form-control" id='datetimepicker3' name="scheduled"/>




                      </div>
</div>
<div style="width:50%;float:right;padding-left:5px">

                      <label class="col-form-label" for="appendedInput">Time </label>

                      <div class="controls" >




<input type='time' class="form-control" id='datetimepicker3' name="time"/>


                      </div>
</div>
                    </div>

<input type="hidden" name="service_type" value="twilio">
                    <div class="form-group">

                      <label class="col-form-label" for="appendedInput">From Number</label>

                      <div class="controls">

                        <div class="input-group">

                          <select id="sl" class="form-control select2-single select2-hidden-accessible" tabindex="-1" aria-hidden="true"  name="twilio_number" required>



          <option value="">Select</option>



    <?php

        $query33 = mysqli_query($con,"select * from tapp_twilio_number") ;

        $i = 1;

        while($row3 = mysqli_fetch_array($query33) )

        {

        $client_name=$row3['client_name'];

        $number=$row3['number'];

        ?>

        <option value="<?php echo $number; ?>"<?php if($row3['is_default'] == 'yes') echo "selected";?>><?php echo $number; ?> </option>

       <?php

     }

    ?>

         </select>



                     </div>



                      </div>

                    </div>

	<div id="leads_wrap" style="display:none">
					<label class="col-form-label" for="prependedInput">Select Leads</label><div class="form-control" style=" padding: 7px 7px 7px 17px;" onclick="showCheckboxes()">Select<img src="dropdown.png" style="float:right;float: right;    height: 15px;    width: 6px;    margin-top: 4px;    "></div>
					<div class="form-group" style="display:none;max-height:250px;overflow:auto" id="leads_holder">
					<input type="checkbox" name="leads_name[]" value="select_all" id="select_all" onclick="selector123()">&nbsp;Select All<br>
<?php $qry = mysqli_query($con,"select * from tapp_tbl_leads ");
while($row = mysqli_fetch_array($qry))
{
	?>
	<input type="checkbox" name="leads_name[]" class="checkboxes"  onclick="single_select(this)" value="<?php echo $row['sender'];?>">&nbsp;<?php echo $row['first_name']." ". $row['last_name'];?><br>
	<?php
}
?>
</div></div>





<div id="clients_wrap" style="display:none">
					<label class="col-form-label" for="prependedInput">Select Contacts</label><div class="form-control" style=" padding: 7px 7px 7px 17px;" onclick="showCheckboxes_clients()">Select<img src="dropdown.png" style="float:right;float: right;    height: 15px;    width: 6px;    margin-top: 4px;    "></div>
					<div class="form-group" style="display:none;max-height:250px;overflow:auto" id="clients_holder">
					<input type="checkbox" name="clients_name[]" value="select_all_clients" id="select_all_clients" onclick="selector1234()">&nbsp;Select All<br>
<?php $qry = mysqli_query($con,"select * from tapp_tbl_clients ");
while($row = mysqli_fetch_array($qry))
{
	?>
	<input type="checkbox" name="clients_name[]" class="checkboxes"  onclick="single_select_clients(this)" value="<?php echo $row['sender'];?>">&nbsp;<?php echo $row['first_name']." ". $row['last_name'];?><br>
	<?php
}
?>
</div></div>

                     <div class="row" id="first_box" style=" display:none;">

            <div class="col-md-12">

<div class="form-group">

<label class="control-label">Select a Group</label>

 <select name="group_name"  class="form-control ">

<option value="">Select</option>

<?php

 $query33 = mysqli_query($con,"select distinct(group_name) from tapp_groups") ;

 $i = 1;

 while($row3 = mysqli_fetch_array($query33) )

{

$group_name=$row3['group_name'];

//$number=$row3['number'];

 ?>



 <option value="<?php echo $group_name; ?>"><?php echo $group_name; ?></option>

        <?php



    }



    ?>

 </select>

</div>

</div>



</div>





<div class="row" id="second_box" style=" display:none;">

           <div class="col-md-12">

<div class="form-group">

            <label class="control-label">Upload File</label>

            <div class="upload-file">

                    <input style="cursor:pointer;" type="file" id="upload-demo" name="file" class="upload-demo">
<a href="upload/sample_bulk.xlsx"><input type="button" class="btn btn-success" value="Download Sample"/></a>
                    <label data-title="Select file" for="upload-demo">

                     <span data-title="No file selected..."></span>

                    </label>

                  </div>

            <input type="hidden" id="dtp_input1" value="" /><br/>

           </div>

</div>

</div>
<div class="form-group">

<label class="col-form-label">Select an image

		 <span class="required">  </span>

	  </label>

<div class="controls">

<input type="file" class="form-control" name="file1"  />

<span class="help-block"> You can send an image also.</span>

			 </div>

	   </div>

                   <div class="form-group emoji-contant-align">
                      <label class="col-form-label" for="appendedPrependedInput">Message</label>
                      <div class="controls">
                        <div class="input-prepend input-group">
                         <select class="form-control" name="message_type" onchange="change_message_type(this.value)" >
						 <option value="custom">Custom message</option>
						 <option value="template">Template message</option>
						 </select>
                        </div>
                      </div>
                    </div>

                    <div class="form-group emoji-contant-align" id="custome_messgae">
                      <label class="col-form-label" for="appendedPrependedInput">Message</label>
                      <div class="controls">
                        <div class="input-prepend input-group">
                         <textarea id="examplename" name="mymessage" data-control="exname-control" rows="9" class="form-control" placeholder="Write your Message Here!"></textarea>
                        </div>
                      </div>
                    </div>
					<div id="template_message" style="display:none">

					<div class="form-group emoji-contant-align" id="">
                      <label class="col-form-label" for="appendedPrependedInput">Select Template</label>
                      <div class="controls">
                       <select class="form-control" name="" onchange="get_template_message(this.value)" >
						 <option value="custom">Select</option>
						 <?php $query_tempalte = mysqli_query($con,"select * from tapp_template_msg");
						 while($row = mysqli_fetch_array($query_tempalte))
						 { ?>
						 <option value="<?php echo $row['id'];?>"><?php echo $row['title'];?></option>
						 <?php } ?>
						 </select>
                      </div>
                    </div>

					 <div class="form-group emoji-contant-align" id="showtemplate">
                      <label class="col-form-label" for="appendedPrependedInput">Message</label>
                      <div class="controls">
                        <div class="input-prepend input-group">
                         <textarea id="examplename" name="message" data-control="exname-control" rows="9" class="form-control" placeholder="Write your Message Here!"  ></textarea>
                        </div>
                      </div>
                    </div>
                    </div>

                    <div class="form-actions">

                      <button type="submit" id="send_btn" class="btn btn-primary">Send Now</button>

                      <button type="reset" class="btn btn-secondary">Cancel</button>

                    </div>

                  </form>

                </div>

              </div>

            </div>

            <!--/.col-->

          </div>



          <!--/.row-->







        </div>



      </div>

      <!-- /.conainer-fluid -->

    </main>





  </div>

  <?php

include_once('footer.php')

?>
  <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script type="text/javascript" src="emoji/js2.js"></script>

<script type="text/javascript" src="emoji/js1.js"></script>

<script type="text/javascript" src="emoji/emojionearea.js"></script>





  <!-- Begin emoji-picker JavaScript -->

  <script src="lib/js/nanoscroller.min.js"></script>

 <script src="lib/js/tether.min.js"></script>

  <script src="lib/js/config.js"></script>

  <script src="lib/js/util.js"></script>

  <script src="lib/js/jquery.emojiarea.js"></script>

  <script src="lib/js/emoji-picker.js"></script>

  <!-- End emoji-picker JavaScript -->
<script>

  function show(str)

    {



    if(str=='file')

    {

    $("#second_box").show();

    $("#scheduled_btn").hide();

    $("#send_btn").show();

    $("#first_box").hide();
    $("#clients_wrap").hide();
    $("#leads_wrap").hide();

    }
	else if(str=='leads')
	{
		$("#second_box").hide();

    $("#scheduled_btn").hide();

    $("#send_btn").show();

    $("#first_box").hide();
    $("#clients_wrap").hide();
    $("#leads_wrap").show();
	}
 	else if(str=='clients')
	{
		$("#second_box").hide();

    $("#scheduled_btn").hide();

    $("#send_btn").show();

    $("#first_box").hide();
    $("#clients_wrap").show();
    $("#leads_wrap").hide();
	}
    else

    {

    $("#second_box").hide();

    $("#scheduled_btn").hide();

    $("#send_btn").show();

    $("#first_box").show();
$("#clients_wrap").hide();
    $("#leads_wrap").hide();
    }

  }


function showCheckboxes_clients()
		   {

		   var expanded = false;
		   var checkboxes = document.getElementById("clients_holder");
		   if (!expanded) {
		   checkboxes.style.display = "block";
		   expanded = true;
		   }
		   else
			   {
		   checkboxes.style.display = "none";
		   expanded = false;
		   }
		   /* if(checkboxes.style.display === 'none' )  {	  checkboxes.style.display = "block";  }  else{	   checkboxes.style.display = "none";  } */
		   }





		    function showCheckboxes()
		   {
		   var expanded1 = false;
		   var checkboxes = document.getElementById("leads_holder");
		   if (!expanded1) {
		   checkboxes.style.display = "block";
		   expanded1 = true;
		   }
		   else
			   {
		   checkboxes.style.display = "none";
		   expanded1 = false;
		   }
		   /* if(checkboxes.style.display === 'none' )  {	  checkboxes.style.display = "block";  }  else{	   checkboxes.style.display = "none";  } */
		   }





		     function single_select(elem)
   {
   if(elem.checked == true)	{
	   }
	   else	{
		   document.getElementById("select_all").checked = false;
		   }
		   }


		     function single_select_clients(elem)
   {
   if(elem.checked == true)	{
	   }
	   else	{
		   document.getElementById("select_all_clients").checked = false;
		   }
		   }




		   function selector1234()
{
	var total_freelancer = $('input:checkbox.checkboxes').length;
var total_freelancer1 = $('input:checkbox.checkboxes');
var i = 0;for(i=0; i<=total_freelancer;i++)
{	if(document.getElementById("select_all_clients").checked == true)
{
total_freelancer1[i].checked = true;
}
else
{
total_freelancer1[i].checked = false;
}
   }
   }



   function selector123()
{
	var total_freelancer = $('input:checkbox.checkboxes').length;
var total_freelancer1 = $('input:checkbox.checkboxes');
var i = 0;for(i=0; i<=total_freelancer;i++)
{	if(document.getElementById("select_all").checked == true)
{
total_freelancer1[i].checked = true;
}
else
{
total_freelancer1[i].checked = false;
}
   }
   }
</script>
<script type="text/javascript">

   $(document).ready(function() {

              /*  $('#datetimepicker1').datetimepicker();*/

      $("#demo1").emojioneArea({

       container: "#container",

       hideSource: false,

       useSprite: false

      });

    });


</script>

 <script>



    $(function() {

      // Initializes and creates emoji set from sprite sheet

      window.emojiPicker = new EmojiPicker({

        emojiable_selector: '[data-emojiable=true]',

        assetsPath: 'lib/img/',

        popupButtonClasses: 'fa fa-smile-o'

      });















      // Finds all elements with `emojiable_selector` and converts them to rich emoji input fields















      // You may want to delay this step if you have dynamically created input fields that appear later in the loading process















      // It can be called as many times as necessary; previously converted input fields will not be converted again















      window.emojiPicker.discover();















    });















  </script>







<?php

if(isset($_GET['f']))

{

if($_GET['f']=='2')

{

?>

<script>

swal({

    title: "Message Sent successfully.",

    //text: "Message Sucessfully Added.",

    timer:3000,

    showConfirmButton: false

  });

</script>



<?php



}



else if($_GET['f']=='draft')

{

?>

<script>

swal({

    title: "Message successfully Saved to draft.",

    //text: "Message Sucessfully Added.",

    timer:3000,

    showConfirmButton: false

  });

</script>









<?php



}



else if($_GET['f']==4)

{

echo "<script language='javascript'>

alert('file Not Valid !!!');

</script>";



}

else if($_GET['f']==5)

{

echo "<script language='javascript'>

alert('The Username & password has been sent to your emailid !!!');

</script>";



}

else

{

?>

<script>

swal({

    title: "Message successfully Saved to Schedule.",

    //text: "Message Sucessfully Added.",

    timer:3000,

    showConfirmButton: false

  });

</script>

<?php

}

}

?>
<script>
function select_n(str) {

    if (str.length == 0) {
        document.getElementById("sl").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("sl").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "getn.php?q=" + str, true);
        xmlhttp.send();
    }
}
</script>