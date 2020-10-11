<?php
	include_once '../lib/Database.php';
	include_once '../helpers/Format.php';
?>

<?php 
	// Admin login class
	class Category{

		private $db;
		private $fmt;

		public function __construct(){
			$this->db = new Database();
			$this->fmt = new Format();
		}

		public function categoryInsert($categoryName){
			$categoryName = $this->fmt->validation($categoryName);
			$categoryName = $this->db->link->real_escape_string($categoryName);
			
			if(empty($categoryName)){
				$error = "<span class='error'>Category filed can't be empty!</span>" ;
				return $error;
			}
			else{
				// Check if category exist or not
				$query = "SELECT * FROM tbl_categories WHERE name = '$categoryName' ";
				$numRow = $this->db->select($query);

				if($numRow > 0){
					$error = "<span class='error'>Category already exist!</span>" ;
					return $error;
				}
				else{
					$query = "INSERT INTO tbl_categories(name) VALUES('$categoryName') ";
					$insert = $this->db->create($query);

					if($insert){
						$success = "<span class='success'>Category saved successfully!</span>" ;
						return $success;
					}
					else{
						$success = "<span class='error'>Category saved failed!</span>" ;
						return $error;
					}
				}
					
				
			}

		}



	}