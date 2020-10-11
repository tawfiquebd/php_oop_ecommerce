<?php include_once 'inc/header.php' ;?>
<?php include_once 'inc/sidebar.php' ;?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Add New Page
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
                    $query = "INSERT INTO tbl_pages(name, body) VALUES('$name', '$body') " ;
                    $inserted_rows = $dbObj->create($query);
                    if ($inserted_rows) {
                     echo "<span class='success'>Page created Successfully!
                     </span>";
                    }
                    else{
                        echo "<span class='error'>Page create failed!.
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
                    <form action="addpage.php" method="post" >
                        <div class="box-body">
                            <div class="form-group">
                                <label for="title">Name</label>
                                <input type="text" name="name" class="form-control" id="title" placeholder="Enter Post Title">
                            </div>
                            <div class="form-group">
                                <label for="">Content</label>
                                <div class="box box-info">
                                    <div class="box-body pad">
                                        <textarea id="editor1" name="body" rows="10" cols="80"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="pull-right btn btn-primary">Create</button>
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