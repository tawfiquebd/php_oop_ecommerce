<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath . '/../lib/Database.php');
	include_once ($filepath . '/../helpers/Format.php');
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
				$query = "SELECT * FROM tbl_categories WHERE category_name = '$categoryName' ";
				$result = $this->db->select($query);

				if($result){
					$error = "<span class='error'>Category already exist!</span>" ;
					return $error;
				}
				else{
					$query = "INSERT INTO tbl_categories(category_name) VALUES('$categoryName') ";
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


		public function categoryView(){
			
			$query = "SELECT * FROM tbl_categories ORDER BY id DESC ";
			$result = $this->db->select($query);
			if($result && $result->num_rows > 0){
				return $result;
			}
			else{
				return $result;

			}

		}


		public function categoryDelete($categoryId){
			
			$query = "DELETE FROM tbl_categories WHERE id = '$categoryId'";
			$result = $this->db->delete($query);
			if($result){
				
				$affectedRow = $this->db->link->affected_rows;

				if($affectedRow > 0){
					$success = "<span class='success'>Category deleted successfully!</span>";
					return $success;
				}
				else{
					$error = "<span class='error'>Bad Request</span>";
					return $error;
				}
			}
			else{
				$error = "<span class='error'>Category deleted failed!</span>";
				return $error;

			}

		}


		public function viewCategoryById($cat_id){
			$query = "SELECT * FROM tbl_categories WHERE id = '$cat_id'";
			$result = $this->db->select($query);
			if($result){
				return $result;
			}
			else{

				return false;
			}


		}


		public function editCategoryById($cat_id, $cat_name){

			if(empty($cat_name)){
				$error = "<span class='error'>Category name can't be empty!</span>";
				return $error;
			}
			else{
				$cat_name = $this->fmt->validation($cat_name);
				$cat_name = $this->db->link->real_escape_string($cat_name);

				$query = "UPDATE tbl_categories SET category_name = '$cat_name' WHERE id = '$cat_id' ";
				$result = $this->db->update($query);

				if($result){
					$success = "<span class='success'>Category name updated successfully!</span>";
					return $success;
				}
				else{
					$error = "<span class='error'>Category name update failed!</span>";
					return $error;
				}

			}

		}


}