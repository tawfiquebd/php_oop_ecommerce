<?php include_once 'inc/header.php';?>
<?php include_once 'inc/sidebar.php';?>
<?php include_once '../classes/Product.php';?>
<?php include_once '../classes/Category.php';?>
<?php include_once '../helpers/Format.php';?>
<?php
    $formatObj = new Format();
    $productObj = new Product();
?>


<?php
    // Delete product by id

    if (isset($_GET['del_productid'])) {
        $del_id = $_GET['del_productid'];
        $deleted_data = $productObj->deleteProductById($del_id);
    }
?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                View All Products
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
                                <h3 class="box-title">Products Lists</h3>
                                <?php if(isset($deleted_data)){echo $deleted_data;} ?>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Product Name</th>
                                            <th>Category</th>
                                            <th>Brand</th>
                                            <th>Description</th>
                                            <th>Price</th>
                                            <th>Image</th>
                                            <th>Type</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $getProduct = $productObj->getAllProduct();
                                        if($getProduct){
                                            $i = 1;
                                            while ($result = $getProduct->fetch_assoc()) { ?>
                                            
                                       
                                        <tr>
                                            <td><?php echo $i++;?></td>
                                            <td><?php echo $result['product_name'];?></td>
                                            <td><?php echo $result['category_name'];?></td>
                                            <td><?php echo $result['brand_name'];?></td>
                                            <td><?php echo $formatObj->postBodyShorten($result['body'],50);?></td>
                                            <td>$ <?php echo $result['price'];?></td>
                                            <td><img width="50" height="50" src="<?php echo $result['image'];?>" /></td>
                                            <td>
                                                <?php 
                                                    if($result['type'] == 1){
                                                        echo "Featured";
                                                    }
                                                    else if($result['type'] == 2){
                                                        echo "General";
                                                    }
                                                ?>
                                            </td>
                                            <td>
                                                <?php 
                                                    if($result['status'] == 1){
                                                        echo "Published";
                                                    }
                                                    else if($result['status'] == 2){
                                                        echo "Unpublished";
                                                    }
                                                ?>
                                            </td>

                                            <td><?php echo $formatObj->dateFormat($result['date']);?></td>

                                            <td>

                                             <a href="edit-product.php?edit_id=<?php echo $result['id']; ?>">Edit</a> | <a class="text-danger" onclick="return confirm('Are you sure to Delete this Post?');" href="?del_productid=<?php echo $result['id']; ?>">Delete</a>
                                            </td>
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