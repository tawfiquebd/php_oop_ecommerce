<?php include_once 'inc/header.php';?>
<?php include_once 'inc/sidebar.php';?>
<?php
    if (!isset($_GET['id']) || $_GET['id']==NULL) {
        // echo "<script>window.location = 'viewcategory.php' ;</script>";
        echo "<script>location.href='viewcategory.php'; </script>";
        // header("location:viewcategory.php");
    }
    else{
        $id = $_GET['id'] ; 
    }
?>


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Update Category
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dashboard</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <?php
            // Update category by id
            if(isset($_POST['update'])){
                $name = $_POST['name'];
                $name = $formatObj->validation($name);
                
                $name = $dbObj->link->real_escape_string($name); 

                if (empty($name)) {
                    echo "<span class='error'> Category field must not be empty! </span>";
                }
                else{
                    $query="UPDATE tbl_categories SET name = '$name' WHERE id = '$id' ";
                    $update = $dbObj->update($query);
                    if ($update) {
                        $category_success = "<span class='success'> Category updated successfully! </span>";
                    }
                    else{
                        $category_failed = "<span class='error'> Category not updated! </span>";
                    }
                }

              }

        ?>  
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <!-- form start -->
                <?php
                    // Get category from db by id  
                    $query="SELECT * FROM tbl_categories WHERE id = '$id'";
                    $category = $dbObj->select($query);

                    if ($category) {
                        while ($result = $category->fetch_assoc()) {
                        

                ?>  
                    <form action="" method="post">
                        <div class="box-body">
                            <div class="form-group">
                                <?php 
                                    if(isset($category_success)){
                                        echo $category_success ."<br>";
                                    }
                                    if(isset($category_failed)){
                                        echo $category_failed ."<br>";
                                    }
                                ?>
                                <label for="category">Category Name</label>
                                <input type="text" name="name" class="form-control" id="category" value="<?php echo $result['name']?>">
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button name="update" type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>

                <?php  

                    }
                }

                ?>
                </div>
                <!-- /.box -->
            </div>


        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


 <?php include_once 'inc/footer.php';?>