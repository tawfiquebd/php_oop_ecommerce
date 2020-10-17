<?php
	include_once '../lib/Database.php';
	include_once '../helpers/Format.php';
?>

<?php

class Product{

	private $db;
	private $fmt;

	public function __construct(){
		$this->db = new Database();
		$this->fmt = new Format();
	}

	// Create Product
	public function productInsert($data, $file){

		$name = $this->fmt->validation($data['name']);
		$category = $this->fmt->validation($data['category']);
		$brand = $this->fmt->validation($data['brand']);
		$body = $this->fmt->validation($data['body']);
		// $body = $data['body'];
		$price = $this->fmt->validation($data['price']);
		$type = $this->fmt->validation($data['type']);
		$status = $this->fmt->validation($data['status']);

		$name = $this->db->link->real_escape_string($data['name']);
		$category = $this->db->link->real_escape_string($data['category']);
		$brand = $this->db->link->real_escape_string($data['brand']);
		$body = $this->db->link->real_escape_string($data['body']);
		$price = $this->db->link->real_escape_string($data['price']);
		$type = $this->db->link->real_escape_string($data['type']);
		$status = $this->db->link->real_escape_string($data['status']);

        // for image upload
		$file_name = $_FILES['image']['name'];
		$file_size = $_FILES['image']['size'];
		$file_temp = $_FILES['image']['tmp_name'];
		$permitted = array('jpg','jpeg','png','gif');

		$strToArray = explode('.', $file_name);
		$file_ext = strtolower(end($strToArray));
		$unique_name = substr(md5(time()),0,10) . "." .$file_ext;
		$upload_path = "upload/".$unique_name;
		// Image upload process finished here


		if(empty($name) || empty($category) || empty($brand) || empty($file_name) || empty($body) || empty($price) || empty($type) || empty($status) ){
			$error = "<span class='error'>Fields can't be empty!</span>";
			return $error;
		}
		else if($file_size > 1000000){
			$error = "<span class='error'>Image size should be less than 1MB !</span>";
			return $error;
		}
		else if(in_array($file_ext, $permitted) === false){
            $error = "<span class='error'>You can only upload - " .implode(', ', $permitted) . " type file</span> ";
            return $error;

		}
		else{
			move_uploaded_file($file_temp, $upload_path);
	        $query = "INSERT INTO tbl_products(name, cat_id, brand_id, body, price, image, type, status) VALUES('$name', '$category', '$brand','$body','$price','$upload_path', '$type', '$status') " ;
	        $inserted_rows = $this->db->create($query);
	        if ($inserted_rows) {
	         echo "<span class='success'>Product Created Successfully!</span>";
	        }
	        else{
	            echo "<span class='error'>Product Create Failed!</span>";
	        }
		}

	}


	// Get All products

	// public function getAllProduct(){
	// 	$query = "SELECT * FROM tbl_products ORDER BY id DESC";
	// 	$result = $this->db->select($query);
	// 	return $result;
	// }


	// Get All products from 3 tables using join query

	public function getAllProduct(){
		$query = "SELECT tbl_products.*, tbl_categories.category_name, tbl_brands.brand_name
				  FROM tbl_products
				  INNER JOIN tbl_categories
				  ON tbl_products.cat_id = tbl_categories.id
				  INNER JOIN tbl_brands
				  ON tbl_products.brand_id = tbl_brands.id  
		 		  ORDER BY tbl_products.id DESC";

		$result = $this->db->select($query);
		return $result;
	}


	// Get single product by id

	public function getProductId($productId){
		$query = "SELECT * FROM tbl_products WHERE id = '$productId' ";
		$result = $this->db->select($query);
		if($result){
			return $result;
		}
		else{
			return false;
		}
	}


	// Update single product by Id

	public function productUpdateById($data, $file, $id){

		$name = $this->fmt->validation($data['name']);
		$category = $this->fmt->validation($data['category']);
		$brand = $this->fmt->validation($data['brand']);
		$body = $this->fmt->validation($data['body']);
		// $body = $data['body'];
		$price = $this->fmt->validation($data['price']);
		$type = $this->fmt->validation($data['type']);
		$status = $this->fmt->validation($data['status']);

		$name = $this->db->link->real_escape_string($data['name']);
		$category = $this->db->link->real_escape_string($data['category']);
		$brand = $this->db->link->real_escape_string($data['brand']);
		$body = $this->db->link->real_escape_string($data['body']);
		$price = $this->db->link->real_escape_string($data['price']);
		$type = $this->db->link->real_escape_string($data['type']);
		$status = $this->db->link->real_escape_string($data['status']);

        // for image upload
		$file_name = $_FILES['image']['name'];
		$file_size = $_FILES['image']['size'];
		$file_temp = $_FILES['image']['tmp_name'];
		$permitted = array('jpg','jpeg','png','gif');

		$strToArray = explode('.', $file_name);
		$file_ext = strtolower(end($strToArray));
		$unique_name = substr(md5(time()),0,10) . "." .$file_ext;
		$upload_path = "upload/".$unique_name;
		// Image upload process finished here

		// If all input fields are empty (except image fields) then show error
		if(empty($name) || empty($category) || empty($brand) || empty($body) || empty($price) || empty($type) || empty($status) ){
			$error = "<span class='error'>Fields can't be empty!</span>";
			return $error;
		}
		else{
			// If all input and also image fields are not empty  then process here
			if(!empty($file_name)){

				if($file_size > 1000000){
					$error = "<span class='error'>Image size should be less than 1MB !</span>";
					return $error;
				}
				else if(in_array($file_ext, $permitted) === false){
		            $error = "<span class='error'>You can only upload - " .implode(', ', $permitted) . " type file</span> ";
		            return $error;
				}
				else{
					move_uploaded_file($file_temp, $upload_path);
			        $query = "UPDATE tbl_products SET product_name = '$name' , cat_id = '$category' , brand_id = '$brand' , body = '$body' , price = '$price' , image ='$upload_path', type = '$type', status = '$status' WHERE id = '$id' " ;
			        $update_rows = $this->db->update($query);
			        if ($update_rows) {
			         $success = "<span class='success'>Product Updated Successfully!</span>";
			         return $success;
			        }
			        else{
			            $error = "<span class='error'>Product Update Failed!</span>";
			            return $error;
			        }
				}
			}
			else{
				// If image fields are empty then only update other input fields
				$query = "UPDATE tbl_products SET product_name = '$name' , cat_id = '$category' , brand_id = '$brand' , body = '$body' , price = '$price', type = '$type', status = '$status' WHERE id = '$id' " ;
		        $update_rows = $this->db->update($query);
		        if ($update_rows) {
		         $success = "<span class='success'>Product Updated Successfully!</span>";
		         return $success;
		        }
		        else{
		            $error = "<span class='error'>Product Update Failed!</span>";
		            return $success;
		        }
			}
		

		}

	}


	// Delete product by Id

	public function deleteProductById($id){
		$getQuery = "SELECT * FROM tbl_products WHERE id = '$id' ";
		$getRow = $this->db->select($getQuery);
		if($getRow){
			while ($result = $getRow->fetch_assoc()) { 
				$current_image = $result['image'];
				unlink($current_image);
			}
		}
		else{
			$error = "<span class='error'>No data available</span>";
			return $error;
		}

		$deleteQuery = "DELETE FROM tbl_products WHERE id = '$id' ";
		$getData = $this->db->delete($deleteQuery);
		if($getData){
			$success = "<span class='success'>Product Deleted Successfully!</span>";
			return $success;
		}
		else{
			$error = "<span class='error'>Product Delete Failed!</span>";
			return $error;
		}
	}


}

?>