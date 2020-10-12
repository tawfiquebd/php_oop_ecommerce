<?php include_once 'inc/header.php';?>
<?php include_once 'inc/sidebar.php';?>
<?php include_once '../classes/Brand.php';?>

<?php
    $brandObj = new Brand();

    // if($_SERVER['REQUEST_METHOD'] == 'POST'){
    //     $brand_name = $_POST['brandname'];
    //     $brandInsert = $brandObj->brandInsert($cat_name);
    // }

    if(isset($_POST['save'])){
        $brand_name = $_POST['brandname'];
        $brandInsert = $brandObj->brandInsert($brand_name);
    }

?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Add Brand
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
                                    <?php if(isset($brandInsert)){ echo $brandInsert;} ?>
                                    <label for="brand">Brand Name</label>
                                    <input type="text" name="brandname" class="form-control" id="brand" placeholder="Enter Brand Name">
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