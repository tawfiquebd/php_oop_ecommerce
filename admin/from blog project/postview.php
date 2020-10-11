<?php include_once 'inc/header.php' ;?>
<?php include_once 'inc/sidebar.php' ;?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Post View
        </h1>
        <?php
            if (!isset($_GET['post_id']) || $_GET['post_id']==NULL) {
                // echo "<script>window.location = 'viewcategory.php' ;</script>";
                echo "<script>location.href='viewpost.php'; </script>";
                // header("location:viewcategory.php");
            }
            else{
                $post_id = $_GET['post_id'] ; 
            }
        ?>

        <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                
                echo "<script>location.href='viewpost.php'; </script>";
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
                    <!-- Get all posts details by id -->
                    <?php
                        $query = "SELECT * FROM tbl_posts WHERE id = '$post_id' ";
                        $get_post = $dbObj->select($query);
                        if($get_post){

                        $view_post = $get_post->fetch_assoc();

                    ?>
                    <!-- form start -->
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" readonly="" class="form-control" id="title" value="<?php echo $view_post['title'];?>">
                            </div>
                            <div class="form-group">
                                <label for="category">Category</label>
                                <select readonly="" id="category" class="form-control">
                                    <option value="">Select Category</option>
                                <?php
                                    $query = "SELECT * FROM tbl_categories" ;
                                    $categories = $dbObj->select($query);
                                    if ($categories) {
                                        while ($row = $categories->fetch_assoc()) {
                                            
                                       
                                ?>
                                    <option
                                     <?php
                                        if ($view_post['cat_id'] == $row['id']) { 
                                        ?>
                                        selected = "selected"

                                    <?php
                                        }
                                       ?>   

                                     value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>

                                <?php
                                 }
                                    }
                                ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Post Image</label> <br>
                                <img class="img-responsive img-thumbnail" src="<?php echo $view_post['image'];?>" name="image" width="250" height="250"/> <br>
                                <div class="clearfix"></div>
                            </div>
                            <div class="form-group">
                                <label for="">Content</label>
                                <div class="box box-info">
                                    <div class="box-body pad">
                                        <textarea  readonly="" id="editor1" rows="10" cols="80"><?php echo $view_post['body'];?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="tags">Tags</label>
                                <input type="text"  readonly="" class="form-control" id="title" value="<?php echo $view_post['tags'];?>">
                            </div>
                            <div class="form-group">
                                <label for="tags">Author</label>
                                <input type="text"  readonly="" class="form-control" id="title" value="<?php echo $view_post['author'];?>">
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="pull-right btn btn-primary">Ok</button>
                        </div>
                    </form>
                    <?php

                        }

                    ?>
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
          
<?php include_once 'inc/footer.php' ;?>