<?php

include_once('header.php')

?>


<!-- Main content -->

<main class="main">


    <!-- Breadcrumb -->

    <ol class="breadcrumb">

        <li class="breadcrumb-item">Home</li>

        <!--li class="breadcrumb-item"><a href="#">Voice Center</a></li-->

        <li class="breadcrumb-item active">Voice Broadcast</li>

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

                            <i class="fa fa-phone"></i>Voice Broadcasting

                            <!-- <div class="card-actions">

                              <a href="#" class="btn-setting"><i class="icon-settings"></i></a>

                              <a href="#" class="btn-minimize"><i class="icon-arrow-up"></i></a>

                              <a href="#" class="btn-close"><i class="icon-close"></i></a>

                            </div> -->

                        </div>

                        <div class="card-body col-lg-7">

                            <form class="form-horizontal" id="formValidate2" data-validate="parsley" method="post"
                                  action="get_voice_broadcast.php" name="client_record" enctype="multipart/form-data"
                                  novalidate>


                                <div class="form-group">

                                    <label class="col-form-label" for="appendedInput">Twilio Number</label>

                                    <div class="controls">

                                        <div class="input-group">

                                            <select id="sl"
                                                    class="form-control select2-single select2-hidden-accessible"
                                                    tabindex="-1" aria-hidden="true" name="twilio_number" required>


                                                <?php

                                                $query33 = mysqli_query($con, "select * from tapp_twilio_number where service_type='twilio'");

                                                $i = 1;

                                                while ($row3 = mysqli_fetch_array($query33)) {


                                                    $number = $row3['number'];

                                                    ?>

                                                    <option value="<?php echo $number; ?>"><?php echo $number; ?> </option>

                                                    <?php

                                                }

                                                ?>

                                            </select>


                                        </div>


                                    </div>

                                </div>


                                <div class="row" id="second_box">

                                    <div class="col-md-12">

                                        <div class="form-group">

                                            <label class="control-label">Upload Audio File</label>

                                            <div class="upload-file">

                                                <input style="cursor:pointer;" type="file" id="upload-demo" name="file1"
                                                       class="upload-demo" required>

                                                <a href="voice_upload/sample_voice.mp3" download><input type="button"
                                                                                                        class="btn btn-success"
                                                                                                        value="Download Sample"/></a>
                                                <label data-title="Select file" for="upload-demo">

                                                    <span data-title="No file selected..."></span>

                                                </label>

                                            </div>

                                            <input type="hidden" id="dtp_input1" value=""/><br/>

                                        </div>

                                    </div>

                                </div>


                                <div class="row" id="second_box">

                                    <div class="col-md-12">

                                        <div class="form-group">

                                            <label class="control-label">Upload Numbers File</label>

                                            <div class="upload-file">

                                                <input style="cursor:pointer;" type="file" id="upload-demo" name="file"
                                                       class="upload-demo" required>
                                                <a href="upload/sample_bulk.xlsx"><input type="button"
                                                                                         class="btn btn-success"
                                                                                         value="Download Sample"/></a>
                                                <label data-title="Select file" for="upload-demo">

                                                    <span data-title="No file selected..."></span>

                                                </label>

                                            </div>

                                            <input type="hidden" id="dtp_input1" value=""/><br/>

                                        </div>

                                    </div>

                                </div>


                                <div class="form-group emoji-contant-align">

                                    <label class="col-form-label" for="appendedPrependedInput"></label>

                                    <div class="controls">

                                        <div class="input-prepend input-group">

                                            <input type="hidden" value="9000000000" name="agent_number"
                                                   class="form-control" placeholder="Agent Number" required>

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

    function show(str) {


        if (str == 'file') {

            $("#second_box").show();

            $("#scheduled_btn").hide();

            $("#send_btn").show();

            $("#first_box").hide();

        } else {

            $("#second_box").hide();

            $("#scheduled_btn").hide();

            $("#send_btn").show();

            $("#first_box").show();

        }

    }


</script>
<script type="text/javascript">

    $(document).ready(function () {

        $("#demo1").emojioneArea({

            container: "#container",

            hideSource: false,

            useSprite: false

        });

    });

</script>

<script>


    $(function () {

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

if (isset($_GET['f'])) {

    if ($_GET['f'] == '2') {

        ?>

        <script>

            swal({

                title: "Message Sent successfully.",

                //text: "Message Sucessfully Added.",

                timer: 3000,

                showConfirmButton: false

            });

        </script>


        <?php


    } else if ($_GET['f'] == 'draft') {

        ?>

        <script>

            swal({

                title: "Message successfully Saved to draft.",

                //text: "Message Sucessfully Added.",

                timer: 3000,

                showConfirmButton: false

            });

        </script>


        <?php


    } else if ($_GET['f'] == 4) {

        echo "<script language='javascript'>

alert('file Not Valid !!!');

</script>";


    } else if ($_GET['f'] == 5) {

        echo "<script language='javascript'>

alert('The Username & password has been sent to your emailid !!!');

</script>";


    } else {

        ?>

        <script>

            swal({

                title: "Message successfully Saved to Schedule.",

                //text: "Message Sucessfully Added.",

                timer: 3000,

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
            xmlhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("sl").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "getn.php?q=" + str, true);
            xmlhttp.send();
        }
    }
</script>