<?php include_once 'inc/header.php';?>

<?php include_once 'inc/sidebar.php';?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <section class="content-header">
            <h1>
                Update Site Title & Slogan
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dashboard</li>
            </ol>
        </section>
        <!-- Main content -->
        
        <section class="content">
            <div class="row">
                <div class="col-md-8">
                    <!-- Update procedure starts here -->
                <?php
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        $title = $formatObj->validation($_POST['title']);
                        $slogan = $formatObj->validation($_POST['slogan']);

                        // for image upload
                        $permited  = array('png');
                        $file_name = $_FILES['logo']['name'];
                        $file_size = $_FILES['logo']['size'];
                        $file_temp = $_FILES['logo']['tmp_name'];

                        $div = explode('.', $file_name);
                        $file_ext = strtolower(end($div));
                        $same_image = "logo".'.'.$file_ext;
                        $uploaded_image = "upload/".$same_image;

                        // for protect to sql injection 
                        $title = $dbObj->link->real_escape_string($_POST['title']);
                        $slogan = $dbObj->link->real_escape_string($_POST['slogan']);

                        if(!empty($file_name)){
                            if ($file_size >1048567) {
                                echo "<span class='error'>Image Size should be less then 1MB!</span>";
                            }

                            else if (in_array($file_ext, $permited) === false) {
                                echo "<span class='error'>You can upload only:-" .implode(', ', $permited)."</span>";
                            } 
                            else{
                                move_uploaded_file($file_temp, $uploaded_image);
                                $query = "UPDATE tbl_site_titles SET title = '$title' , 
                                slogan = '$slogan' , logo = '$uploaded_image' WHERE id = 1 " ;
                                $updated_rows = $dbObj->update($query);
                                if ($updated_rows) {
                                 echo "<span class='success'>Data Updated Successfully!
                                 </span>";
                                }
                                else{
                                    echo "<span class='error'>Data Update failed!.
                                 </span>";
                                }
                            }

                        }
                        else{
                            $query = "UPDATE tbl_site_titles SET title = '$title' , slogan = '$slogan'  WHERE id = 1 " ;
                            $updated_rows = $dbObj->update($query);
                            if ($updated_rows) {
                             echo "<span class='success'>Data Updated Successfully!
                             </span>";
                            }
                            else{
                                echo "<span class='error'>Data Update failed!.
                             </span>";
                            }
                        }
                    }

                ?>
                    <!-- general form elements -->
                    <div class="box box-primary">
                        
                        <!-- Get all data from database -->
                        <?php

                        $query = "SELECT * FROM tbl_site_titles WHERE id = '1' ";
                        $get_data = $dbObj->select($query);
                        if ($get_data) {
                            $result = $get_data->fetch_assoc();

                        ?>
                        <!-- form start -->
                        <form method="POST" enctype="multipart/form-data" role="form">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="title">Website Title</label>
                                    <input name="title" type="text" class="form-control" id="title" value="<?php echo $result['title']?>">
                                </div>
                                <div class="form-group">
                                    <label for="sologan">Website Sologan</label>
                                    <input name="slogan" type="text" class="form-control" id="sologan" value="<?php echo $result['slogan']?>">
                                </div>
                                <div class="form-group">
                                    <label for="logo">Logo</label>
                                    <input name="logo" type="file" class="form-control" id="logo">
                                </div>
                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.box -->
                </div>

                <div class="col-md-4">
                    <h3 class="text-center">Logo</h3>
                    <div class="logo text-center">
                        <img class="img-thumbnail img-responsive" alt="Logo Here" width="200" height="200" src="<?php echo $result['logo']?>">
                    </div>
                </div>
            </div>
            
            <?php
   
            }

            ?>


        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


<?php include_once 'inc/footer.php';?>