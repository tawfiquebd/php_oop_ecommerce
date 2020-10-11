<?php

include_once '../config/config.php';

class Database{
	// property
	public $host 	 = DB_HOST;
	public $user 	 = DB_USER;
	public $password = DB_PASS;
	public $dbname 	 = DB_NAME;

	public $link;
	public $error;

	public function __construct(){
		$this->connectDB();
	}

	private function connectDB(){
		// mysqli connection
		$this->link = new mysqli($this->host, $this->user, $this->password, $this->dbname);

		if($this->link == true){
			// echo "<h2 class='success' align='text-center'>DB Connected Successfully!</h2>";
		}	
		else{
			$this->error = "Db connection failed".$this->link->mysqli_error();
			return false;
		}

	}

	// Select or Read Database
	public function select($query){
		$result = $this->link->query($query) or die($this->link->error.__LINE__);
		if($result->num_rows > 0){
			return $result;
		}
		else{
			return false;
		}

	}

	// Insert/Create data
	public function create($query){
		$insert_row = $this->link->query($query) or die($this->link->error.__LINE__);
		if($insert_row){
			return $insert_row;
		}
		else{
			return false;
		}
	}

	// Update data
	public function update($query){
		$update_row = $this->link->query($query) or die($this->link->error.__LINE__);
		if($update_row){
			return $update_row;
		}
		else{
			return false;
		}
	}

	// Delete data
	public function delete($query){
		$delete_row = $this->link->query($query) or die($this->link->error.__LINE__);
		if($delete_row){
			return $delete_row;
		}
		else{
			return false;
		}
	}


}


?>