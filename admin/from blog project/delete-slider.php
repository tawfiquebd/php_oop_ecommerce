<?php 
  include_once '../lib/Session.php';
  include_once '../config/config.php';
  include_once '../lib/Database.php';

  // object/instance crate 
  $dbObj = new Database();

  // Session checking 
  Session::checkSession();

  // Delete process starts here
  if (!isset($_GET['delete_id']) || $_GET['delete_id'] == NULL) {
    echo "<script>location.href='sliderlist.php'; </script>" ;
  }
  else{
    $del_id = $_GET['delete_id'];

    // Delete from local directory, process starts here
    $query = "SELECT * FROM tbl_sliders WHERE id = '$del_id' " ;
    $getdata = $dbObj->select($query);

    if($getdata){

      $result = $getdata->fetch_assoc();
      $selected_image = $result['image'] ;

      unlink($selected_image);
    }

    // Delete from database, process starts here
    $query = "DELETE FROM tbl_sliders WHERE id = '$del_id' " ;

    $delete_data = $dbObj->delete($query);

    if ($delete_data) {
      
      //The affected_rows / mysqli_affected_rows() function returns the number of affected rows in the previous SELECT, INSERT, UPDATE, REPLACE, or DELETE query.
      // $affected = mysqli_affected_rows($dbObj->link);
      // var_dump($affected);
      $affected = $dbObj->link->affected_rows;

      if($affected){
        echo "<script>alert('Slider Deleted Successfully!'); </script>" ;
        echo "<script>location.href='sliderlist.php'; </script>" ;
      }
      else{
        echo "<script>alert('Bad request submit!'); </script>" ;
        echo "<script>location.href='sliderlist.php'; </script>" ;
      }
      
    }
    else{
      echo "<script>alert('Slider Not Deleted!'); </script>" ;
      echo "<script>location.href='sliderlist.php'; </script>" ;
    }
    

  }

?>