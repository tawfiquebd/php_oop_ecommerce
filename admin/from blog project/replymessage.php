<?php include_once 'inc/header.php' ;?>
<?php include_once 'inc/sidebar.php' ;?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <?php

        if (!isset($_GET['msgid']) || $_GET['msgid'] == NULL) {
            echo "<script>window.location = 'inbox.php';</script>";
        }
        else{
            $msgid = $_GET['msgid'];
        }

    ?>

    <section class="content-header">
        <h1>
            Send Message
        </h1>

        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <!-- Send reply message -->
            <?php

                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $toemail = $formatObj->validation($_POST['toemail']);
                $fromemail = $formatObj->validation($_POST['fromemail']);
                $subject = $formatObj->validation($_POST['subject']);
                // $message = $formatObj->validation($_POST['message']);

                $toemail = $dbObj->link->real_escape_string($_POST['toemail']);
                $fromemail = $dbObj->link->real_escape_string($_POST['fromemail']);
                $subject = $dbObj->link->real_escape_string($_POST['subject']);
                $message = $dbObj->link->real_escape_string($_POST['message']);

                if (empty($fromemail) || empty($subject) || empty($message)) {
                    echo "<span class='error'> Field must not be empty! </span>";
                }
                else{
                    $send_message = mail($toemail, $subject, $message, $fromemail);
                    if ($send_message) {
                     echo "<span class='success'>Message Sent Successfully!
                     </span>";
                    }
                    else{
                        echo "<span class='error'>Message Sending Failed!.
                     </span>";
                    }
                }
            }

            ?>
                <!-- general form elements -->
                <div class="box box-primary">
                    <!-- form start -->
                    <?php
                        $query = "SELECT * FROM tbl_contacts WHERE id = '$msgid'" ;
                        $get_msg = $dbObj->select($query);
                        if ($get_msg) {
                            while ($result = $get_msg->fetch_assoc()) {
                                
                           
                    ?>

                    <form action="" method="post">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="email">To</label>
                                <input readonly="" name="toemail" type="text" class="form-control" id="email"  value="<?php echo $result['email']?>">
                            </div>
                            <div class="form-group">
                                <label for="email">From</label>
                                <input name="fromemail" type="text" class="form-control" id="email" placeholder="Enter your email">
                            </div>
                            <div class="form-group">
                                <label for="subject">Subject</label>
                                <input name="subject" type="text" class="form-control" id="subject" placeholder="Enter email subject">
                            </div>
                            <div class="form-group">
                                <label for="">Message</label>
                                <div class="box box-info">
                                    <div class="box-body pad">
                                        <textarea name="message" id="editor1" rows="10" cols="80"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="Send" class="pull-right btn btn-primary">Send</button>
                        </div>
                    </form>

                    <?php

                     }
                        }
                    ?>
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
          
<?php include_once 'inc/footer.php' ;?>