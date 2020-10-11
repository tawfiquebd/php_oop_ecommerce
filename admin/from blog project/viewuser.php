<?php include_once 'inc/header.php' ;?>
<?php include_once 'inc/sidebar.php' ;?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

        <?php

            if (!isset($_GET['user_id']) || $_GET['user_id'] == NULL) {
                echo "<script>location.href='viewusers.php'; </script>";
            }
            else{
                $id = $_GET['user_id'];
            }
            
                
        ?>

        <h1>User Details</h1>

        <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
               echo "<script>location.href='viewusers.php'; </script>";
            }

        ?>

        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                
                <div class="box box-primary">

                    <?php

                        $query = "SELECT * FROM tbl_users WHERE id = '$id'";
                        $get_data = $dbObj->select($query);
                        if($get_data){

                        $result = $get_data->fetch_assoc();

                    ?>
                    <!-- form start -->
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" readonly="" class="form-control" id="name" value="<?php echo $result['name']?>">
                            </div>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" readonly="" class="form-control" id="username" value="<?php echo $result['username']?>">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" readonly="" class="form-control" id="email" value="<?php echo $result['email']?>">
                            </div>
                            <div class="form-group">
                                <label for="details">Details</label>
                                <div class="box box-info">
                                    <div class="box-body pad">
                                        <textarea id="editor1" readonly="" rows="10" cols="80"><?php echo $result['details']?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <?php if($result['image']) { ?>
                                    <img class="img-responsive img-thumbnail" src="<?php echo $result['image'];?>" name="image" width="150" height="150"/> 
                                <?php } else { ?>
                                    <img class="img-responsive img-thumbnail" src="upload/users/noimage.png" name="image" width="150" height="150"/> 
                                <?php }  ?>

                                <br>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="pull-left btn btn-primary">Ok</button>
                        </div>
                    </form>
                </div>

                <?php

                    }

                ?>
                <!-- /.box -->
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
          
<?php include_once 'inc/footer.php' ;?>