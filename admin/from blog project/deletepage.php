<?php 
  include_once '../lib/Session.php';
  include_once '../config/config.php';
  include_once '../lib/Database.php';

  // object/instance crate 
  $dbObj = new Database();

  // Session checking 
  Session::checkSession();

  // Delete process starts here
  if (!isset($_GET['deleteid']) || $_GET['deleteid'] == NULL) {
    echo "<script>location.href='index.php'; </script>" ;
  }
  else{
    $del_id = $_GET['deleteid'];

    // Delete from database, process starts here
    $query = "DELETE FROM tbl_pages WHERE id = '$del_id' " ;
    $deleted_data = $dbObj->delete($query);

    if ($deleted_data) {
      $affected_rows = $dbObj->link->affected_rows;

      if($affected_rows){
        echo "<script>alert('Page Deleted Successfully!'); </script>" ;
        echo "<script>location.href='index.php'; </script>" ;
      }
      else{
        echo "<script>alert('Bad request submit!'); </script>" ;
        echo "<script>location.href='index.php'; </script>" ;
      }
      
    }
    else{
      echo "<script>alert('Page Not Deleted!'); </script>" ;
      echo "<script>location.href='index.php'; </script>" ;
    }

  }

?>