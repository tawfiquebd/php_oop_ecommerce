<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath . '/../lib/Database.php');
	include_once ($filepath . '/../helpers/Format.php');
?>

<?php

class Cart{
	
	private $db;
	private $fmt;
	private $user;

	public function __construct(){

		$this->db = new Database();
		$this->fmt = new Format();

	}


	// Get logged user info
	public function getLoggedUserInfo(){
		$loggedCustomer = Session::get("customerId");
	}


	// Add to cart product

	public function addToCart($quantity, $id){
		$quantity = $this->fmt->validation($quantity);
		$quantity = $this->db->link->real_escape_string($quantity);
		$productId = $this->db->link->real_escape_string($id);
		$sessionId = session_id().Session::get("customerId");

		// Get product by id
		$selectQuery = "SELECT * FROM tbl_products WHERE id = '$productId' ";
		$getProduct = $this->db->select($selectQuery);

		// Check if product is already in the cart
		$checkQuery = "SELECT * FROM tbl_carts WHERE productId = '$productId' AND sessionId = '$sessionId' ";
		$checkResult = $this->db->select($checkQuery);
		if($checkResult){
			$error = "<span class='error'>Product is already added in the cart</span>";
			return $error;
		}
		else{
			if($getProduct){			
				$value = $getProduct->fetch_assoc();
				$productName = $value['product_name'];
				$price 		 = $value['price'];
				$image		 = $value['image'];
			}

			// Insert product to cart
			$query = "INSERT INTO tbl_carts(sessionId, productId, productName, price, quantity, image) VALUES('$sessionId', '$productId', '$productName', '$price','$quantity','$image') " ;
	        	$inserted_rows = $this->db->create($query);
		        if ($inserted_rows) {
		            echo "<script>window.location = 'cart.php'</script>";         
		        }
		        else{
		            echo "<script>window.location = '404.php'</script>";
		        }
		}

	}


	// Get all cart data 
	public function getCartData(){
		$sessionId = session_id().Session::get("customerId");
		$selectQuery = "SELECT * FROM tbl_carts WHERE sessionId = '$sessionId' ";
		$getProducts = $this->db->select($selectQuery);
		return $getProducts;
	}


	// Cart quantity update 
	public function updateCartData($cartId, $quantity){
		$cartId   = $this->fmt->validation($cartId);
		$quantity = $this->fmt->validation($quantity);

		$cartId   = $this->db->link->real_escape_string($cartId);
		$quantity = $this->db->link->real_escape_string($quantity);

		$query = "UPDATE tbl_carts SET quantity = '$quantity' WHERE cartId = '$cartId' ";
		$update_row = $this->db->update($query);
		if($update_row){
			$success = "<span class='success'>Product quantity updated successful</span>";
			return $success;
		}
		else{
			$error = "<span class='error'>Product quantity update failed</span>";
			return $error;
		}

	}


	// Delete product from Cart
	public function deleteProductFromCart($del_id){
		$del_id = $this->fmt->validation($del_id);
		$del_id = $this->db->link->real_escape_string($del_id);
		$query = "DELETE FROM tbl_carts WHERE cartId = '$del_id' ";
		$delete_result = $this->db->delete($query);
		if($delete_result){
			$affected_row = $this->db->link->affected_rows;
			if($affected_row){
				$success = "<span class='success'>Product Deleted From Cart Successfully!</span>";
				return $success;
			}
			else{
				$error = "<span class='error'>Bad Request!</span>";
				return $error;
			}
			
		}
		else{
			$error = "<span class='error'>Product Delete From Cart Failed!</span>";
			return $error;
		}
	}


	// Get cart info for header
	public function getCartInfo(){
		$sessionId = session_id().Session::get("customerId");
		$selectQuery = "SELECT * FROM tbl_carts WHERE sessionId = '$sessionId' ";
		$getCartInfo = $this->db->select($selectQuery);
		return $getCartInfo;
	}




}

?>