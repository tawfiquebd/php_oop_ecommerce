<?php include_once 'inc/header.php' ;?>
<?php include_once 'inc/sidebar.php' ;?>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Change Password
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">

                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="box box-primary">
                            <!-- form start -->
                            <form role="form">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="oldpass">Old Password</label>
                                        <input type="password" name="oldpass" class="form-control" id="oldpass" placeholder="Enter Old Password">
                                    </div>
                                    <div class="form-group">
                                        <label for="newpass">New Password</label>
                                        <input type="password" name="newpass" class="form-control" id="newpass" placeholder="Enter New Password">
                                    </div>

                                </div>
                                <!-- /.box-body -->

                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.box -->
                    </div>


                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
 
<?php include_once 'inc/footer.php' ;?>