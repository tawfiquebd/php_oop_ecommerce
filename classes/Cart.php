<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath . '/../lib/Database.php');
	include_once ($filepath . '/../helpers/Format.php');
?>

<?php

class Cart{
	
	private $db;
	private $fmt;

	public function __construct(){

		$this->db = new Database();
		$this->fmt = new Format();

	}


	// Add to cart product

	public function addToCart($quantity, $id){
		$quantity = $this->fmt->validation($quantity);
		$quantity = $this->db->link->real_escape_string($quantity);
		$productId = $this->db->link->real_escape_string($id);
		$sessionId = session_id();

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
		$sessionId = session_id();
		$selectQuery = "SELECT * FROM tbl_carts WHERE sessionId = '$sessionId' ";
		$getProducts = $this->db->select($selectQuery);
		return $getProducts;
	}



}

?>