<?php include_once 'inc/header.php';?>

<?php include_once 'inc/sidebar.php';?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Slider Lists
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
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">Slider Lists</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Title</th>
                                            <th>Image</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $query = "SELECT * FROM tbl_sliders ORDER BY id DESC" ; 
                                        $posts_details = $dbObj->select($query);
                                        if ($posts_details) {
                                            $i = 0;
                                            while ($result = $posts_details->fetch_assoc()) {
                                                $i++;
                                            
                                    ?>
                                        <tr>
                                            <td><?php echo $i;?></td>
                                            <td><?php echo $result['title'];?></td>
                                            <td><img width="80" height="50" src="<?php echo $result['image'];?>" /></td>
                                            <td><?php echo $formatObj->dateFormat($result['date']);?></td>

                                            <td>
                                                
                                            <!-- If role base post edit and delete Only admin can delete -->
                                            <?php if(Session::get('userRole') == '1'){ ?>
                                            <a href="edit-slider.php?edit_id=<?php echo $result['id']?>">Edit</a> | <a class="text-danger" onclick="return confirm('Are you sure to Delete this Slider?');" href="delete-slider.php?delete_id=<?php echo $result['id']?>">Delete</a></td>
                                            <?php }?>
                                        </tr>

                                        <?php
                                            }
                                        }

                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.box-body -->
                        </div>
                    </div>
                    <!-- /.box -->
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

<?php include_once 'inc/footer.php';?>