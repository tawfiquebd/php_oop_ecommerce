<?php include_once 'inc/header.php' ;?>
<?php include_once 'inc/sidebar.php' ;?>
<?php
    if (!isset($_GET['pageid']) || $_GET['pageid']==NULL) {
        // echo "<script>window.location = 'viewcategory.php' ;</script>";
        echo "<script>location.href='index.php'; </script>";
        // header("location:viewcategory.php");
    }
    else{
        $pageid = $_GET['pageid'] ; 
    }
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Update Page
        </h1>
        <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $name = $formatObj->validation($_POST['name']);
                $body = $formatObj->validation($_POST['body']);

                
                $name = $dbObj->link->real_escape_string($_POST['name']);
                $body = $dbObj->link->real_escape_string($_POST['body']); 

                if (empty($name) || empty($body) ) {
                    echo "<span class='error'> Field must not be empty! </span>";
                }
                else{
                    $query = "UPDATE tbl_pages SET 
                    name = '$name',
                    body = '$body'
                    WHERE id = '$pageid' " ;

                    $updated_rows = $dbObj->update($query);
                    if ($updated_rows) {
                     echo "<span class='success'>Page updated Successfully!
                     </span>";
                    }
                    else{
                        echo "<span class='error'>Page update failed!.
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

                    <?php
                        # get all data from tbl_pages by id  
                        $query="SELECT * FROM tbl_pages WHERE id = '$pageid'";
                        $page_data = $dbObj->select($query);

                        if ($page_data) {
                            $result = $page_data->fetch_assoc() ;
                            
                    ?>  
                    <form action="" method="post" >
                        <div class="box-body">
                            <div class="form-group">
                                <label for="title">Name</label>
                                <input type="text" name="name" class="form-control" id="title" value="<?php echo $result['name'];?>">
                            </div>
                            <div class="form-group">
                                <label for="">Content</label>
                                <div class="box box-info">
                                    <div class="box-body pad">
                                        <textarea id="editor1" name="body" rows="10" cols="80"><?php echo $result['body'];?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class=" btn btn-primary">Update</button>
                            <a onclick="return confirm('Are you sure to delete this page?');" class=" btn btn-danger" href="deletepage.php?deleteid=<?php echo $result['id'];?>">Delete</a>
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