<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath . '/../lib/Database.php');
	include_once ($filepath . '/../helpers/Format.php');
?>

<?php

class Customer{
	
	private $db;
	private $fmt;

	public function __construct(){

		$this->db = new Database();
		$this->fmt = new Format();

	}


	// Customer registration

	public function customerRegistration($customer_data){
		$name = $this->fmt->validation($customer_data['name']);
		$gender = $this->fmt->validation($customer_data['gender']);
		$email = $this->fmt->validation($customer_data['email']);
		// $password = $this->fmt->validation($customer_data['password']);
		$contact = $this->fmt->validation($customer_data['contact']);
		$address = $this->fmt->validation($customer_data['address']);
		$city = $this->fmt->validation($customer_data['city']);
		$zip = $this->fmt->validation($customer_data['zip']);
		$country = $this->fmt->validation($customer_data['country']);

		$name = $this->db->link->real_escape_string($customer_data['name']);
		$gender = $this->db->link->real_escape_string($customer_data['gender']);
		$email = $this->db->link->real_escape_string($customer_data['email']);
		$password = $this->db->link->real_escape_string($customer_data['password']);
		$contact = $this->db->link->real_escape_string($customer_data['contact']);
		$address = $this->db->link->real_escape_string($customer_data['address']);
		$city = $this->db->link->real_escape_string($customer_data['city']);
		$zip = $this->db->link->real_escape_string($customer_data['zip']);
		$country = $this->db->link->real_escape_string($customer_data['country']);

		if(empty($name) || empty($gender) || empty($email) || empty($password) || empty($contact) || empty($address) || empty($city) || empty($zip) || empty($country)){
			$error = "<span class='error'> Fields must not be empty</span>";
			return $error;
		}
		else{
			$checkUserExist = "SELECT * FROM tbl_customers WHERE email = '$email' ";
			$getResult = $this->db->select($checkUserExist);
			if($getResult){
				$error = "<span class='error'> This email already Exist in our Database! Try another one.</span>";
				return $error;
			}
			else{
				$insertQuery = "INSERT INTO tbl_customers(name, gender, email, password, contact, address, city, zip, country) VALUES('$name', '$gender', '$email', '$password', '$contact', '$address', '$city', '$zip', '$country')";
				$insertResult = $this->db->create($insertQuery);
				if($insertResult){
					$success = "<span class='success'> Registration Success! You can now Login.</span>";
					return $success;
				}
				else{
					$error = "<span class='error'> Registration Failed! Please try again.</span>";
					return $error;
				}
			}
		}
	}






}


?>