<?php include_once 'inc/header.php';?>

<?php include_once 'inc/sidebar.php';?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                View Posts
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
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">Post Lists</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Post Title</th>
                                            <th>Description</th>
                                            <th>Category</th>
                                            <th>Image</th>
                                            <th>Author</th>
                                            <th>Tags</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $query = "SELECT tbl_posts.*, tbl_categories.name
                                            FROM tbl_posts
                                            INNER JOIN tbl_categories
                                            ON tbl_posts.cat_id = tbl_categories.id
                                            ORDER BY id DESC" ; 
                                        $posts_details = $dbObj->select($query);
                                        if ($posts_details) {
                                            $i = 0;
                                            while ($result = $posts_details->fetch_assoc()) {
                                                $i++;
                                            
                                    ?>
                                        <tr>
                                            <td><?php echo $i;?></td>
                                            <td><?php echo $result['title'];?></td>
                                            <td><?php echo $formatObj->postBodyShorten($result['body'],100);?></td>
                                            <td><?php echo $result['name'];?></td>
                                            <td><img width="50" height="50" src="<?php echo $result['image'];?>" /></td>
                                            <td><?php echo $result['author'];?></td>
                                            <td><?php echo $result['tags'];?></td>
                                            <td><?php echo $formatObj->dateFormat($result['date']);?></td>

                                            <td>
                                                <a href="postview.php?post_id=<?php echo $result['id']?>">View</a>  
                                            <!-- If role base post edit and delete -->
                                            <?php if(Session::get('userId') == $result['user_id'] || Session::get('userRole') == '1'){ ?>
                                            | <a href="editpost.php?edit_id=<?php echo $result['id']?>">Edit</a> | <a onclick="return confirm('Are you sure to Delete this Post?');" href="deletepost.php?delete_id=<?php echo $result['id']?>">Delete</a></td>
                                            <?php }?>
                                        </tr>

                                        <?php
                                            }
                                        }

                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.box-body -->
                        </div>
                    </div>
                    <!-- /.box -->
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

<?php include_once 'inc/footer.php';?>