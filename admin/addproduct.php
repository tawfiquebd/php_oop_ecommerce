<?php include_once 'inc/header.php' ;?>
<?php include_once 'inc/sidebar.php' ;?>
<?php include_once '../classes/Category.php' ;?>
<?php include_once '../classes/Brand.php' ;?>
<?php include_once '../classes/Product.php' ;?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Add New Product
        </h1>

       <?php

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $productObj = new Product();
            $insert_product = $productObj->productInsert($_POST, $_FILES);
        }

       ?>
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
                    <!-- form start -->
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="form-group">
                                <?php if(isset($insert_product)){echo $insert_product;} ?>

                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" id="name" placeholder="Enter Product Name">
                            </div>
                            <div class="form-group">
                                <label for="category">Category</label>
                                <select required="" name="category" id="category" class="form-control">
                                    <option value="">-- Select Category --</option>
                                    <!-- Get all category dropdown list -->                                    
                                    <?php 
                                        $catObj = new Category();
                                        $getAll = $catObj->categoryView();
                                        if($getAll){
                                            while($result = $getAll->fetch_assoc()){ ?>

                                    <option value="<?php echo $result['id'];?>"><?php echo $result['category_name'];?></option>
                                    <?php } }  ?> 
                                 </select>
                            </div>
                            <div class="form-group">
                                <label for="brand">Brand</label>
                                <select required="" name="brand" id="brand" class="form-control">
                                    <option value="">-- Select Brand --</option>
                                    <!-- Get all brand dropdown list -->
                                    <?php 
                                        $brandObj = new Brand();
                                        $getAll = $brandObj->brandView();
                                        if($getAll){
                                            while($value = $getAll->fetch_assoc()){ ?>

                                    <option value="<?php echo $value['id'];?>"><?php echo $value['brand_name'];?></option>
                                    <?php } }  ?> 
                                 </select>
                            </div>
                            <div class="form-group">
                                <label for="image">Upload Image</label>
                                <input type="file" class="form-control" name="image" id="image">
                            </div>
                            <div class="form-group">
                                <label for="">Product Description</label>
                                <div class="box box-info">
                                    <div class="box-body pad">
                                        <textarea id="editor1" name="body" rows="10" cols="80"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="text" name="price" class="form-control" id="price" placeholder="Enter Product Price">
                            </div>
                            <div class="form-group">
                                <label for="type">Product Type</label>
                                <select required="" name="type" id="type" class="form-control">
                                    <option value="">-- Select Type --</option>
                                    <option value="1">Featured</option>
                                    <option value="2">General</option>

                                 </select>
                            </div>
                            <div class="form-group">
                                <label for="status">Product Status</label>
                                <select required="" name="status" id="status" class="form-control">
                                    <option value="">-- Select Status --</option>
                                    <option value="1">Publish</option>
                                    <option value="2">Unpublish</option>

                                 </select>
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn-lg btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
          
<?php include_once 'inc/footer.php' ;?>