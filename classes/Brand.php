<?php
	include_once '../lib/Database.php';
	include_once '../helpers/Format.php';
?>

<?php

class Brand {
	
	private $db;
	private $fmt;

	public function __construct()
	{
		$this->db = new Database();
		$this->fmt = new Format();

	}

	public function brandInsert($brand_name){

		$brand_name = $this->fmt->validation($brand_name);
		$brand_name = $this->db->link->real_escape_string($brand_name);

		if(empty($brand_name)){
			$error = "<span class='error'>Brand name can't be empty!</span>";
			return $error;
		}
		else{
			$checkIfExist = "SELECT * FROM tbl_brands WHERE brand_name = '$brand_name' ";
			$getRow = $this->db->select($checkIfExist);

			if($getRow){
				$error = "<span class='error'>This Brand already exists!</span>";
				return $error;
			}
			else{
				$query = "INSERT INTO tbl_brands(brand_name) VALUES('$brand_name') ";
				$insert = $this->db->create($query);

				if($insert){
					$success = "<span class='success'>Brand saved successfully!</span>" ;
					return $success;
				}
				else{
					$error = "<span class='error'>Brand saved failed!</span>" ;
					return $error;
				}
			}
		}
	}	


	public function brandView(){
		$query = "SELECT * FROM tbl_brands ORDER BY id DESC";
		$result = $this->db->select($query);

		if($result){
			return $result;
		}
		else{
			return false;
		}
	}


	public function brandDelete($brandId){
		$query = "DELETE FROM tbl_brands WHERE id = '$brandId' ";
		$result = $this->db->delete($query);

		if($result){
			$affectedRow = $this->db->link->affected_rows;

			if($affectedRow){
				$success = "<span class='success'>Brand deleted successfully!</span>" ;
				return $success;
			}
			else{
				$error = "<span class='error'>Bad Request!</span>" ;
				return $error;
			}
		}
		else{
			$error = "<span class='error'>Brand delete failed!</span>" ;
			return $error;
		}
		
	}

	public function viewBrandById($cat_id){
		$query = "SELECT * FROM tbl_brands WHERE id = '$cat_id'";
		$result = $this->db->select($query);
		if($result){
			return $result;
		}
		else{

			return false;
		}


	}


	public function editBrandById($brandId, $brandName){

			if(empty($brandName)){
				$error = "<span class='error'>Brand name can't be empty!</span>";
				return $error;
			}
			else{
				$brandName = $this->fmt->validation($brandName);
				$brandName = $this->db->link->real_escape_string($brandName);
				$current_date = date('d-m-Y H:i:s');
				$query = "UPDATE tbl_brands SET brand_name = '$brandName', update_date = '$current_date' WHERE id = '$brandId' ";
				$result = $this->db->update($query);

				if($result){
					$success = "<span class='success'>Brand name updated successfully!</span>";
					return $success;
				}
				else{
					$error = "<span class='error'>Brand name update failed!</span>";
					return $error;
				}

			}

		}


}

?>