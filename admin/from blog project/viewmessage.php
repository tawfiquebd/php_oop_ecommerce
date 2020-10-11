<?php include_once 'inc/header.php' ;?>
<?php include_once 'inc/sidebar.php' ;?>
<?php

    if (!isset($_GET['msgid']) || $_GET['msgid']==NULL) {
        echo "<script>window.location = 'inbox.php';</script>";
    }
    else{
        $msgid = $_GET['msgid'];
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        echo "<script>window.location.href = 'inbox.php';</script>";
    }

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            View Message
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
                <!-- general form elements -->
                <div class="box box-primary">
                    <!-- form start -->
                    <?php
                        $query = "SELECT * FROM tbl_contacts WHERE id = '$msgid'" ;
                        $get_msg = $dbObj->select($query);
                        if ($get_msg) {
                            while ($result = $get_msg->fetch_assoc()) {
                                
                    ?>

                    <form action="" method="POST">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input readonly="" type="text" class="form-control" id="name" value="<?php echo $result['name']?>">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input readonly="" type="text" class="form-control" id="email" value="<?php echo $result['email']?>">
                            </div>
                            <div class="form-group">
                                <label for="name">Subject</label>
                                <input readonly="" type="text" class="form-control" id="name" value="<?php echo $result['subject']?>">
                            </div>
                            <div class="form-group">
                                <label for="">Message</label>
                                <div class="box box-info">
                                    <div class="box-body pad">
                                        <textarea readonly="" id="editor1" rows="10" cols="80"><?php echo $result['message']?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="pull-right btn btn-primary">Back</button>
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