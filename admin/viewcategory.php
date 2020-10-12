<?php include_once 'inc/header.php';?>
<?php include_once '../classes/Category.php';?>
<?php include_once 'inc/sidebar.php';?>

<?php
    $categoryObj = new Category();

    // Delete category data
    if (!isset($_GET['delete_id']) || $_GET['delete_id'] == NULL) {
        echo "<script>window.location('viewcategory.php');</script>";
    }
    else{
        $delete_id = $_GET['delete_id'];
        $result = $categoryObj->categoryDelete($delete_id);
    }

?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                View Product Categories
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
                            <h3 class="box-title">Category Lists</h3>
                        </div>
                        <?php if(isset($result)){ echo $result;} ?>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Serial No.</th>
                                        <th>Product Categories</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                            <?php
                                // Get all data from database 
                                $categories = $categoryObj->categoryView();
                                
                                if($categories && $categories->num_rows > 0){
                                    $i = 1;
                                // Fetch all data from database 
                                while ($value = $categories->fetch_assoc() ) { ?>
                                    <tr>
                                        <td><?php echo $i++; ?></td>
                                        <td><?php echo $value['name'] ; ?></td>
                                        <td><a href="edit-category.php?edit_id=<?php echo $value['id']?>">Edit</a> | <a onclick="return confirm('Are you sure you want to Delete this Category?');" href="?delete_id=<?php echo $value['id']?>">Delete</a></td>
                                    </tr>

                                </tbody>
                                
                                <?php } }

                                    else{
                                        $error = "<span class='error'>No category founds</span>";
                                        echo $error;
                                    }

                                ?>
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