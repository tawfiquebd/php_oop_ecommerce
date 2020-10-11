<?php include_once 'inc/header.php' ;?>
<?php include_once 'inc/sidebar.php' ;?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Add New Post
        </h1>
        <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $title = $formatObj->validation($_POST['title']);
                $cat_id = $formatObj->validation($_POST['cat_id']);
                $body = $_POST['body'];
                $tags = $formatObj->validation($_POST['tags']);
                $author = $formatObj->validation($_POST['author']);
                $user_id = $formatObj->validation($_POST['user_id']);

                // for image upload
                $permited  = array('jpg', 'jpeg', 'png', 'gif');
                $file_name = $_FILES['image']['name'];
                $file_size = $_FILES['image']['size'];
                $file_temp = $_FILES['image']['tmp_name'];

                $div = explode('.', $file_name);
                $file_ext = strtolower(end($div));
                $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
                $uploaded_image = "upload/".$unique_image;

                // mysqli_real_escape_string removes special character like --> 
                // \n, \r, \, '', "", And Characters encoded/returns are NUL (ASCII 0)
                // It returns empty/null value .  
                $title = $dbObj->link->real_escape_string($title);
                $cat_id = $dbObj->link->real_escape_string($cat_id);
                // $body = $dbObj->link->real_escape_string($body);
                $tags = $dbObj->link->real_escape_string($tags);
                $author = $dbObj->link->real_escape_string($author); 

                if (empty($title) || empty($cat_id) || empty($body) || empty($file_name) || empty($tags) || empty($author) ) {
                    echo "<span class='error'> Field must not be empty! </span>";
                }
                elseif ($file_size >1048567){
                    echo "<span class='error'>Image Size should be less then 1MB!</span>";
                } 
                elseif (in_array($file_ext, $permited) === false) {
                    echo "<span class='error'>You can upload only:-" .implode(', ', $permited)."</span>";
                } 
                else{
                    move_uploaded_file($file_temp, $uploaded_image);
                    $query = "INSERT INTO tbl_posts(cat_id, title, body, image, author, tags, user_id) VALUES('$cat_id', '$title', '$body','$uploaded_image','$author','$tags', '$user_id') " ;
                    $inserted_rows = $dbObj->create($query);
                    if ($inserted_rows) {
                     echo "<span class='success'>Post Inserted Successfully!
                     </span>";
                    }
                    else{
                        echo "<span class='error'>Post insert failed!.
                     </span>";
                    }
                }
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
                                <label for="title">Title</label>
                                <input type="text" name="title" class="form-control" id="title" placeholder="Enter Post Title">
                            </div>
                            <div class="form-group">
                                <label for="category">Category</label>
                                <select name="cat_id" id="category" class="form-control">
                                    <option value="">Select Category</option>
                                <?php
                                    $query = "SELECT * FROM tbl_categories" ;
                                    $categories = $dbObj->select($query);
                                    if ($categories) {
                                        while ($row = $categories->fetch_assoc()) {
                                            
                                       
                                ?>
                                    <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>

                                <?php
                                 }
                                    }
                                ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="image">Upload Image</label>
                                <input type="file" class="form-control" name="image" id="image">
                            </div>
                            <div class="form-group">
                                <label for="">Content</label>
                                <div class="box box-info">
                                    <div class="box-body pad">
                                        <textarea id="editor1" name="body" rows="10" cols="80"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="tags">Tags</label>
                                <input type="text" name="tags" class="form-control" id="title" placeholder="Enter Tags">
                            </div>
                            <div class="form-group">
                                <label for="tags">Author</label>
                                <input type="text" name="author" class="form-control" id="title" value="<?php echo Session::get("username") ;?>" placeholder="Enter Author Name">

                                <input type="hidden" name="user_id" value="<?php echo Session::get("userId") ;?>" >
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="pull-right btn btn-primary">Save</button>
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