<?php include_once 'inc/header.php';?>
<?php include_once '../classes/Brand.php';?>
<?php include_once 'inc/sidebar.php';?>

<?php

    $brandObj = new Brand();

     // Delete brand data
    if (!isset($_GET['delete_id']) || $_GET['delete_id'] == NULL) {
        echo "<script>window.location('viewbrands.php');</script>";
    }
    else{
        $delete_id = $_GET['delete_id'];
        $result = $brandObj->brandDelete($delete_id);
    }
?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                View Brands
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
                            <h3 class="box-title">Brand Lists</h3>
                        </div>
                        <?php if(isset($result)){ echo $result;} ?>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Serial No.</th>
                                        <th>Brand Names</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                            <?php
                                // Get all data from database 
                                $brands = $brandObj->brandView();
                                
                                if($brands && $brands->num_rows > 0){
                                    $i = 1;
                                // Fetch all data from database 
                                while ($value = $brands->fetch_assoc() ) { ?>
                                    <tr>
                                        <td><?php echo $i++; ?></td>
                                        <td><?php echo $value['brand_name'] ; ?></td>
                                        <td><a href="edit-brand.php?edit_id=<?php echo $value['id']?>">Edit</a> | <a class="text-danger" onclick="return confirm('Are you sure you want to Delete this Brand?');" href="?delete_id=<?php echo $value['id']?>">Delete</a></td>
                                    </tr>

                                <?php } }

                                    else{
                                        $error = "<span class='error'>No brand founds</span>";
                                        echo $error;
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