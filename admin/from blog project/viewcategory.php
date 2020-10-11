<?php include_once 'inc/header.php';?>

<?php include_once 'inc/sidebar.php';?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                View Categories
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
                        <!-- Category delete -->
                        <?php
                            if (!isset($_GET['delete_id']) || $_GET['delete_id'] == NULL) {
                                echo "<script>window.location('viewcategory.php');</script>";
                            }
                            else{
                                $delete_id = $_GET['delete_id'];
                                $query = "DELETE FROM tbl_categories WHERE id = '$delete_id' ";
                                $delete_cat = $dbObj->delete($query);
                                if ($delete_cat) {

                                    $affected = $dbObj->link->affected_rows;

                                    if($affected){
                                        echo "<script>alert('Category Deleted Successfully!'); </script>" ;
                                        echo "<script>location.href='viewcategory.php'; </script>" ;
                                    }
                                    else{
                                        echo "<script>alert('Bad request submit!'); </script>" ;
                                        echo "<script>location.href='viewcategory.php'; </script>" ;
                                    }
                                    
                                }
                                else{
                                    echo "<span class='error'> Category not deleted! </span>";
                                }
                            }

                        ?>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Sorial No.</th>
                                        <th>Category Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $query = "SELECT * FROM tbl_categories ORDER BY id ASC";
                                    $categories = $dbObj->select($query);
                                    if($categories){
                                        $i = 0;
                                        while ($result = $categories->fetch_assoc()) {
                                            $i++;
                                       
                                ?>
                                    <tr>
                                        <td><?php echo $i;?></td>
                                        <td><?php echo $result['name'];?></td>
                                        <td><a href="edit-category.php?id=<?php echo $result['id']?>">Edit</a> | <a onclick="return confirm('Are you sure you want to Delete this Category?');" href="?delete_id=<?php echo $result['id']?>">Delete</a></td>
                                    </tr>
                                    <?php
                                     } // while condition ends here
                                    } // if condition ends here
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