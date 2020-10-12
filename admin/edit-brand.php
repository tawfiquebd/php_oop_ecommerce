<?php include_once 'inc/header.php';?>
<?php include_once '../classes/Brand.php';?>
<?php include_once 'inc/sidebar.php';?>
<?php
    $brandObj = new Brand();

    
    if (!isset($_GET['edit_id']) || $_GET['edit_id'] == NULL) {
        echo "<script>location.href ='viewbrands.php';</script>";
    }
    else{
        $brand_id = $_GET['edit_id'];        
    }      

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $brand_name = $_POST['name'];
        $result = $brandObj->editBrandById($brand_id, $brand_name);

    }

?>


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Edit Brand
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
                    <?php if(isset($result)){echo $result;}?>
                    <form action="" method="post">
                    
                    <!-- // Get brands from db by id   -->
                     <?php $result = $brandObj->viewBrandById($brand_id); 

                        if ($result) {
                            while ($value = $result->fetch_assoc()) { ?>

                        <div class="box-body">
                            <div class="form-group">
                                <label for="brand">Brand Name</label>
                                <input type="text" name="name" class="form-control" id="brand" value="<?php echo $value['name']; ?>">
                            </div>
                        </div>

                        <?php  }} ?>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <a href="viewbrands.php" type="submit" class="btn btn-info">Back</a>
                            <button name="update" type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>

                
                </div>
                <!-- /.box -->
            </div>


        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


 <?php include_once 'inc/footer.php';?>