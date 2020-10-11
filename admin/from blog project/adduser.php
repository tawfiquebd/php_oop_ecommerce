<?php include_once 'inc/header.php' ;?>
<?php include_once 'inc/sidebar.php' ;?>

<?php
    // Only admin can access add new user page 
    if (Session::get('userRole') != 1 ) {
        echo "<script>location.href= 'index.php' ; </script>";
    }
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Add New User
        </h1>
        <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST') { 

                $username = strtolower($formatObj->validation($_POST['username']));
                $password = $formatObj->validation($_POST['password']);
                $email    = $formatObj->validation($_POST['email']);
                $role     = $formatObj->validation($_POST['role']);

            // mysqli_real_escape_string removes special character like --> 
            // \n, \r, \, '', "", And Characters encoded/returns are NUL (ASCII 0)
            // It returns empty/null value .  
                $username = $dbObj->link->real_escape_string($username);
                $password = $dbObj->link->real_escape_string($password);
                $email    = $dbObj->link->real_escape_string($email);
                $role     = $dbObj->link->real_escape_string($role);


                if (empty($username) || empty($password) || empty($email) || empty($role) ) {
                    echo "<span class='error'> Field must not be empty! </span>";
                }
                else{
                    $checkQuery = "SELECT * FROM tbl_users WHERE username = '$username' OR email = '$email' ";
                    $checkUserExist = $dbObj->select($checkQuery);
                    if ($checkUserExist) {
                        if ($checkUserExist->num_rows > 0) {
                            echo "<span class='error'> Username or Email already exist, Try another one! </span>";
                        }
                        
                    }
                    else{
                        $query = "INSERT INTO tbl_users(username, password, email, role) VALUES('$username', '$password', '$email', '$role') ";
                        $inserted_rows = $dbObj->create($query);
                        if ($inserted_rows) {
                         echo "<span class='success'>User Created Successfully!
                         </span>";
                        }
                        else{
                            echo "<span class='error'>User Create failed!.
                         </span>";
                        }
                    }
                    
                }
            }

        ?>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">User Option</li>
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
                                <label for="username">Username</label>
                                <input type="text" name="username" class="form-control" id="username" placeholder="Enter username">
                            </div>
                            <div class="form-group">
                                <label for="password">Passwrod</label>
                                <input type="password" name="password" class="form-control" id="password" placeholder="Enter password">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" id="email" placeholder="Enter valid email">
                            </div>
                            <div class="form-group">
                                <label for="select">Category</label>
                                <select required="" name="role" id="select" class="form-control">
                                    <option value="">-- Select User Role --</option>
                                    <option value="1">Admin</option>
                                    <option value="2">Editor</option>
                                    <option value="3">Author</option>
                                </select>
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