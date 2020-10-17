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
            Edit Product
        </h1>

        <?php
            // Get All existing product

            $productObj = new Product();

            
            if(isset($_POST['update'])){
                $updateData = $productObj->productUpdateById($_POST, $_FILES, $_GET['edit_id']);
            }

            if(!isset($_GET['edit_id']) || $_GET['edit_id'] == NULL ){
                echo "<script>location.href = 'viewproducts.php' </script>";
            }
            else{
                $product_id = $_GET['edit_id'];
                $getData = $productObj->getProductId($product_id); 
                if($getData){
                    while ($value = $getData->fetch_assoc()) {

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
                            
                                <?php if(isset($updateData)){echo $updateData;} ?>

                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" id="name" value="<?php echo $value['product_name']; ?>" >
                                
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

                                    <option 
                                    <?php
                                        if($value['cat_id'] == $result['id']){ ?>
                                            selected = "selected" <?php } ?> value="<?php  echo $result['id'];?>"><?php echo $result['category_name'];?></option>

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
                                            while($data = $getAll->fetch_assoc()){ ?>

                                    <option <?php if($value['brand_id'] == $data['id']) { ?>  selected = "selected" <?php } ?>value="<?php echo $data['id'];?>"><?php echo $data['brand_name'];?></option>
                                    <?php } }  ?> 
                                 </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="image">Upload Image</label>
                                <input type="file" class="form-control" name="image" id="image">
                            </div>

                            <div class="form-group">
                                <label for="image">Previous Image</label><br>
                                <img width="150" height="150" class="img-responsive img-thumbnail" src="<?php echo $value['image'] ;?>">
                            </div>

                            <div class="form-group">
                                <label for="">Product Description</label>
                                <div class="box box-info">
                                    <div class="box-body pad">
                                        <textarea id="editor1" name="body" rows="10" cols="80">
                                            <?php echo $value['body'] ; ?>
                                        </textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="text" name="price" class="form-control" id="price" value="<?php echo $value['price'];?>">
                            </div>
                            
                            <div class="form-group">
                                <label for="type">Product Type</label>
                                <select required="" name="type" id="type" class="form-control">
                                    <option value="">-- Select Type --</option>
                                    <?php if($value['type'] == 1){ ?>
                                    <option selected="selected" value="1">Featured</option>
                                    <option value="2">Non-Featured</option>
                                    <?php } ?> 

                                    <?php if($value['type'] == 2){ ?>
                                    <option selected="selected" value="2">Non-Featured</option>
                                    <option value="1">Featured</option>
                                    <?php } ?> 

                                 </select>
                            </div>

                            <div class="form-group">
                                <label for="status">Product Status</label>
                                <select required="" name="status" id="status" class="form-control">
                                    <option value="">-- Select Status --</option>
                                    <?php if($value['status'] == 1){ ?>
                                    <option selected="selected" value="1">Publish</option>
                                    <option value="2">Unpublish</option>
                                    <?php } ?>
                                    <?php if($value['status'] == 2){ ?>
                                    <option selected="selected" value="2">Unpublish</option>
                                    <option value="1">Publish</option>
                                    <?php } ?>

                                 </select>
                            </div>

                        </div>

                        <!-- /.box-body -->

                        <div class="box-footer">
                            <a href="viewproducts.php" class="btn-lg btn btn-info">Back</a>
                            <button type="submit" name="update" class="btn-lg btn btn-primary">Update</button>
                        </div>
                    </form>

                    <?php } } } ?>
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
          
<?php include_once 'inc/footer.php' ;?>