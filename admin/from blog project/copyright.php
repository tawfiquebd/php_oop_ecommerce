<?php include_once 'inc/header.php' ;?>
<?php include_once 'inc/sidebar.php' ;?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Update Copyright Text
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
                <!-- Update copyright data process here -->
                <?php
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        $copyright = $formatObj->validation($_POST['copyright']);

                        // for protect to sql injection 
                        $copyright = $dbObj->link->real_escape_string($_POST['copyright']);

                        if (empty($copyright)) {
                            echo "<span class='error'> Field must not be empty! </span>";
                        
                        }
                        else{
                            $query = "UPDATE tbl_copyrights SET text = '$copyright' WHERE id = 1 " ;
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
                    
                    <!-- Get copyright data from database process here -->
                      <?php
                          $query = "SELECT * FROM tbl_copyrights WHERE id = '1' ";
                          $get_data = $dbObj->select($query);
                          if ($get_data) {
                              $result = $get_data->fetch_assoc();

                      ?>
                    <form action="" method="POST" role="form">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="copyright">Copyright Text</label>
                                <input name="copyright" type="text" class="form-control" id="copyright" value="<?php echo $result['text']?>">
                            </div>
                        </div>

                        <?php

                         }

                        ?>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include_once 'inc/footer.php' ;?>