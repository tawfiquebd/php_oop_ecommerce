<?php include_once 'inc/header.php' ;?>
<?php include_once 'inc/sidebar.php' ;?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Add New Slider
        </h1>
        <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $title = $formatObj->validation($_POST['title']);

                // for image upload
                $permited  = array('jpg', 'jpeg', 'png', 'gif');
                $file_name = $_FILES['image']['name'];
                $file_size = $_FILES['image']['size'];
                $file_temp = $_FILES['image']['tmp_name'];

                $div = explode('.', $file_name);    // explode makes string to array
                $file_ext = strtolower(end($div));  // end() to find last array. extension is now in array 
                $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
                $uploaded_image = "upload/slider/".$unique_image;

                // mysqli_real_escape_string removes special character like --> 
                // \n, \r, \, '', "", And Characters encoded/returns are NUL (ASCII 0)
                // It returns empty/null value .  
                $title = $dbObj->link->real_escape_string($title);

                if (empty($title) || empty($file_name) ) {
                    echo "<span class='error'> Field must not be empty! </span>";
                }
                elseif ($file_size >1048567){
                    echo "<span class='error'>Image Size should be less then 1MB!</span>";
                }
                // === means identical operator. That means both value are same & both variable types are also same.
                // This operator allows for a much stricter comparison between the given variables or values. This operator returns true if both variable contains same information and same data types otherwise return false. 
                elseif (in_array($file_ext, $permited) === false) {
                    echo "<span class='error'>You can upload only:-" .implode(', ', $permited)."</span>";
                }
                else{
                    move_uploaded_file($file_temp, $uploaded_image);
                    $query = "INSERT INTO tbl_sliders(title, image) VALUES('$title', '$uploaded_image') " ;
                    $inserted_rows = $dbObj->create($query);
                    if ($inserted_rows) {
                     echo "<span class='success'>Slider Inserted Successfully!</span>";
                    }
                    else{
                        echo "<span class='error'>Slider Insert Failed!</span>";
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
                                <label for="title">Slider Title</label>
                                <input required="" type="text" name="title" class="form-control" id="title" placeholder="Enter Slider Title">
                            </div>
                            <div class="form-group">
                                <label for="image">Upload Image</label>
                                <input required="" type="file" class="form-control" name="image" id="image">
                            </div>
                        </div>

                        <div class="box-footer">
                            <button type="submit" class="pull-left btn btn-primary">Upload Slider</button>
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