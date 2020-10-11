<?php include_once 'inc/header.php' ;?>
<?php include_once 'inc/sidebar.php' ;?>
<?php
    $userId   = Session::get('userId');
    $userRole = Session::get('userRole');
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Update profile
        </h1>
        <?php
        // Profile update process done

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $name = $formatObj->validation($_POST['name']);
                $email = $formatObj->validation($_POST['email']);
                $details = $_POST['details'];

                // for image upload
                $permited  = array('jpg', 'jpeg', 'png', 'gif');
                $file_name = $_FILES['image']['name'];
                $file_size = $_FILES['image']['size'];
                $file_temp = $_FILES['image']['tmp_name'];

                $div = explode('.', $file_name);
                $file_ext = strtolower(end($div));

                $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
                $uploaded_image = "upload/users/".$unique_image;

                // mysqli_real_escape_string removes special character like --> 
                // \n, \r, \, '', "", And Characters encoded/returns are NUL (ASCII 0)
                // It returns empty/null value .  
                $name = $dbObj->link->real_escape_string($name);
                $email = $dbObj->link->real_escape_string($email);
                // $details = $dbObj->link->real_escape_string($details);

                if (empty($name) || empty($email) || empty($details) ) {
                    echo "<span class='error'> Field must not be empty! </span>";
                }
                else{
                    // if file image field is not empty
                    if (!empty($file_name)) {

                        if ($file_size >1048567){
                        echo "<span class='error'>Image Size should be less then 1MB!</span>";
                        } 
                        // check if file extension is in array ($permitted) and === it will check the value and data type is false
                        else if(in_array($file_ext, $permited) === false){
                            echo "<span class='error'>You can upload only:-" .implode(', ', $permited)."</span>";
                        }
                        else{
                            move_uploaded_file($file_temp, $uploaded_image);
                            $query = "UPDATE tbl_users SET name = '$name' , email = '$email' , details = '$details' , image = '$uploaded_image' WHERE id = '$userId' " ;
                            $updated_row = $dbObj->update($query);
                            if ($updated_row) {
                             echo "<span class='success'>Profile Updated Successfully!
                             </span>";
                            }
                            else{
                                echo "<span class='error'>Profile Update failed!.
                             </span>";
                            }
                        }
                    }
                    // if file image field is empty
                    else{
                        $query = "UPDATE tbl_users SET name = '$name' , email = '$email' , details = '$details' WHERE id = '$userId' " ;
                        $updated_row = $dbObj->update($query);
                        if ($updated_row) {
                         echo "<span class='success'>Profile Updated Successfully!
                         </span>";
                        }
                        else{
                            echo "<span class='error'>Profile Update failed!.
                         </span>";
                        }
                    }
                }
            }

        ?>

        <?php
            $query = "SELECT * FROM tbl_users WHERE id = '$userId' AND role = '$userRole'";
            $get_data = $dbObj->select($query);
            if($get_data){

            $result = $get_data->fetch_assoc();

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
                
                <div class="box box-primary">
                    <!-- form start -->
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" id="name" value="<?php echo $result['name']?>">
                            </div>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" readonly="" class="form-control" id="username" value="<?php echo $result['username']?>">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" name="email" class="form-control" id="email" value="<?php echo $result['email']?>">
                            </div>
                            <div class="form-group">
                                <label for="details">Details</label>
                                <div class="box box-info">
                                    <div class="box-body pad">
                                        <textarea id="editor1" name="details" rows="10" cols="80"><?php echo $result['details']?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <img class="img-responsive img-thumbnail" src="<?php echo $result['image'];?>" name="image" width="150" height="150"/> <br>
                                <div class="clearfix"></div>
                                <label for="image">Upload Image</label>
                                <input type="file" class="form-control" name="image" id="image">
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="pull-right btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>

                <?php

                    }

                ?>
                <!-- /.box -->
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
          
<?php include_once 'inc/footer.php' ;?>