<?php include_once 'inc/header.php';?>

<?php include_once 'inc/sidebar.php';?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        
        <h1>
            Update Social Links
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
                <!-- Update social link process here -->

                 <?php
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        $facebook = $formatObj->validation($_POST['facebook']);
                        $twitter = $formatObj->validation($_POST['twitter']);
                        $linkedin = $formatObj->validation($_POST['linkedin']);
                        $instagram = $formatObj->validation($_POST['instagram']);

                        // for protect to sql injection 
                        $facebook = $dbObj->link->real_escape_string($_POST['facebook']);
                        $twitter = $dbObj->link->real_escape_string($_POST['twitter']);
                        $linkedin = $dbObj->link->real_escape_string($_POST['linkedin']);
                        $instagram = $dbObj->link->real_escape_string($_POST['instagram']);

                        if (empty($facebook) || empty($twitter) || empty($linkedin) || empty($instagram) ) {
                            echo "<span class='error'> Field must not be empty! </span>";
                        
                        }
                        else{
                            $query = "UPDATE tbl_socials SET facebook = '$facebook' , twitter = '$twitter' , linkedin = '$linkedin' , instagram = '$instagram' WHERE id = 1 " ;
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

                
                <div class="box box-primary">
                    <!-- Get all data from database process here -->
                    <?php

                    $query = "SELECT * FROM tbl_socials WHERE id = '1' ";
                    $get_data = $dbObj->select($query);
                    if ($get_data) {
                        $result = $get_data->fetch_assoc();

                    ?>
                    <!-- form start -->
                    <form action="" method="POST" role="form">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="facebook">Facebook</label>
                                <input name="facebook" type="text" class="form-control" id="facebook" value="<?php echo $result['facebook']?>">
                            </div>
                            <div class="form-group">
                                <label for="twitter">Twitter</label>
                                <input name="twitter" type="text" class="form-control" id="twitter" value="<?php echo $result['twitter']?>">
                            </div>
                            <div class="form-group">
                                <label for="linkedin">LinkedIn</label>
                                <input name="linkedin" type="text" class="form-control" id="linkedin" value="<?php echo $result['linkedin']?>">
                            </div>
                            <div class="form-group">
                                <label for="instagram">Instagram</label>
                                <input name="instagram" type="text" class="form-control" id="Instagram" value="<?php echo $result['instagram']?>">
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
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
<!-- /.content-wrapper -->
 
<?php include_once 'inc/footer.php';?>