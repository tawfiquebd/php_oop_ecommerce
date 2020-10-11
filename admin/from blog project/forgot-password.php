<?php 
  include_once '../lib/Session.php';
  Session::checkLogin();
?>
<?php include_once '../config/config.php';?>
<?php include_once '../lib/Database.php';?>
<?php include_once '../helpers/Format.php';?>
<?php

  // object/instance crate 
  
  $dbObj = new Database();
  $formatObj = new Format();

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Blog | Password Recovery</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">

  <link rel="stylesheet" href="dist/css/AdminLTE.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href=""><b>Password Recovery</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">

    <?php
      if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $email = $formatObj->validation($_POST['email']);
        
        $email = $dbObj->link->real_escape_string($email); 

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          echo "<span class='error'> Invalid Email Address! </span>";
        }
        else{          
          // check data exist or not
          $checkQuery = "SELECT * FROM tbl_users WHERE email = '$email' LIMIT 1";
          $checkUserExist = $dbObj->select($checkQuery);
          if ($checkUserExist) { // if email found , fetch all data of him
            while ($data = $checkUserExist->fetch_array()) {
              $user_id  = $data['id'];
              $username = $data['username'];
            }
            // generating new password
            $text    = substr($email, 0, 3);
            $rand    = rand(1000, 99999);
            $newpass = "$text$rand";
            // password update to db
            $updateQuery = "UPDATE tbl_users SET password = '$newpass' WHERE id = '$user_id' ";
            $updated_row = $dbObj->update($updateQuery);
            
            if($updated_row){
              // send mail using php mail function
              $to      = "$email";
              $subject = "Blog Login Password Recovery";
              $from    = "md.tawfiquehossain@gmail.com";
              $headers  = "From: $from\n";

              // To send HTML mail, the Content-type header must be set
              $headers .= 'MIME-Version: 1.0' . "\r\n";
              $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
              $message  = "You Username is ".$username." and New Password is ".$newpass." Please visit to login.";
              $send_mail = mail($to, $subject, $message, $headers);

              if ($send_mail) {
                echo "<span class='success'> Please check your email for new password! </span>";
              }
              else{
                echo "<span class='error'> Email sending failed! </span>";
              }

            }
            else{
              echo "<span class='error'> There are some errors when updating password! </span>" .$dbObj->link->mysqli_error();
            }

          }
          else{
            echo "<span class='error'> Email not found in database! </span>";
          }

        }


      }


    ?>

    <form action="" method="post">
      <div class="form-group has-feedback">
        <input type="email" required="" name="email" class="form-control" placeholder="Enter Valid Email">
        <span class="glyphicon glyphicon-email form-control-feedback"></span>
      </div>
      
      <div class="row">
        <div class="col-xs-4">
          <button type="submit" name="" class="btn btn-primary btn-block btn-flat">Send Mail</button>
        </div>
      </div> <br>

      <div class="row">
        <div class="col-xs-4">
          <a href="login.php">Login</a><br>
        </div>
      </div>
      
    </form>

  </div>
</div>

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>
