<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath . '/../lib/Session.php');
	Session::checkLogin();
	include_once ($filepath . '/../lib/Database.php');
	include_once ($filepath . '/../helpers/Format.php');
?>

<?php 
	// Admin login class
	class Adminlogin{

		private $db;
		private $format;

		public function __construct(){
			$this->db = new Database();
			$this->fm = new Format();
		}

		public function adminLogin($adminUser, $adminPassword){
			$adminUser = $this->fm->validation($adminUser);
			$adminUser = $this->db->link->real_escape_string($adminUser);
			if(empty($adminUser) || empty($adminPassword)){
				$error = "<span class='text-center error'>Username and Password can't be empty!</span>";
				return $error;
			}
			else{
				$query = "SELECT * FROM tbl_admins WHERE username = '$adminUser' AND password = '$adminPassword' ";
				$result = $this->db->select($query);
				if($result == true){
					$value = $result->fetch_assoc();
					Session::set("adminLogin",True);
					Session::set("adminId",$value['id']);
					Session::set("adminUser",$value['username']);
					Session::set("adminName",$value['name']);

					header("location: index.php");
				}
				else{
					$error = "<span class='text-center error'>Username and Password didn't match!</span>";
					return $error;
				}
			}

			
		}

	}

?>