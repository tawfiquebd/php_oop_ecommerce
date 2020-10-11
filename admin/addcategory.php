<?php include_once 'inc/header.php';?>
<?php include_once 'inc/sidebar.php';?>
<?php include_once '../classes/Category.php';?>

<?php
    $catObj = new Category();

    // if($_SERVER['REQUEST_METHOD'] == 'POST'){
    //     $cat_name = $_POST['name'];
    //     $insert_cat = $catObj->categoryInsert($cat_name);
    // }

    if(isset($_POST['save'])){
        $cat_name = $_POST['name'];
        $insert_cat = $catObj->categoryInsert($cat_name);
    }

?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Add Product Category
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
                        
                        <form action="" method="post">
                            <div class="box-body">
                                <div class="form-group">
                                    <?php if(isset($insert_cat)){ echo $insert_cat;} ?>
                                    <label for="category">Category Name</label>
                                    <input type="text" name="name" class="form-control" id="category" placeholder="Enter Category Name">
                                </div>
                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button name="save" type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.box -->
                </div>
            </div>

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


 <?php include_once 'inc/footer.php';?>