<?php include_once 'inc/header.php';?>
<?php include_once '../classes/Category.php';?>
<?php include_once 'inc/sidebar.php';?>
<?php
    $categoryObj = new Category();

    
    if (!isset($_GET['edit_id']) || $_GET['edit_id'] == NULL) {
        echo "<script>location.href ='viewcategory.php';</script>";
    }
    else{
        $cat_id = $_GET['edit_id'];        
    }      

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $cat_name = $_POST['name'];
        $result = $categoryObj->editCategoryById($cat_id, $cat_name);
    }

?>


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Edit Category
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
                        <?php
                            // Get category from db by id  
                            $result = $categoryObj->viewCategoryById($cat_id); 
                            if (isset($result) && $result == TRUE) {
                            while ($value = $result->fetch_assoc()) { ?>

                        <div class="box-body">
                            <div class="form-group">
                                <label for="category">Category Name</label>
                                <input type="text" name="name" class="form-control" id="category" value="<?php echo $value['name']; ?>">
                            </div>
                        </div>

                        <?php  }} ?>
                        <!-- /.box-body -->
                        <div class="box-footer">
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