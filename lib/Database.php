<?php 
 $filepath = realpath(dirname(__FILE__));
 include_once ($filepath."/../config/config.php");?>
<?php

Class Database{
	public $host   = DB_HOST;
	public $user   = DB_USER;
	public $pass   = DB_PASS;
	public $dbname = DB_NAME;
	
	
	public $link;
	public $error;
	
	public function __construct(){
		$this->connectDB();
	}
	
	private function connectDB(){
	$this->link = new mysqli($this->host, $this->user, $this->pass, $this->dbname);
	if(!$this->link){
		$this->error ="Connection fail".$this->link->connect_error;
		return false;
	  }
   }

     //Select Query

   public function select($query,$type,$arr,$column)
	{
		$stmt = $this->link->prepare($query) or die($this->link->error.__LINE__);
        if(empty($column)){
        	if(empty($type) || empty($arr)){
        		$stmt->execute();
        		$stmt = $stmt->get_result();     
        	}else{
        	 call_user_func_array(array($stmt, 'bind_param'), array_merge($type, $arr));
        	 $stmt->execute();
        	 $stmt = $stmt->get_result();
        	}
        }else{
        	if(empty($type) || empty($arr)){
        		call_user_func_array(array($stmt, 'bind_result'),$column);
        		$stmt->execute();
        		$stmt->store_result();
        	}else{
        		call_user_func_array(array($stmt, 'bind_param'), array_merge($type, $arr));
        		call_user_func_array(array($stmt, 'bind_result'),$column);
        		$stmt->execute();
        		$stmt->store_result();
        	}
        }
		if($stmt->num_rows>0){
			return $stmt;
		}
		else{
			return false;
		}
	 }
	
	// Insert data
	
	public function insert($query,$type,$arr){
		$stmt = $this->link->prepare($query) or die($this->link->error.__LINE__);
        if($stmt){
        call_user_func_array(array($stmt, 'bind_param'), array_merge($type, $arr));
        	$stmt->execute();
        	$stmt->store_result();
        }

		if($stmt){
			return $stmt;
		} else {
			return false;
		}
	 }
      
      // Update data

	 public function update($query,$type,$arr){
		$stmt = $this->link->prepare($query) or die($this->link->error.__LINE__);
        if($stmt){
        call_user_func_array(array($stmt, 'bind_param'), array_merge($type, $arr));
        	$stmt->execute();
        	$stmt->store_result();
        }

		if($stmt){
			return $stmt;
		} else {
			return false;
		}
	 }
	
  
  // Delete data
   public function delete($query,$type,$arr){
		$stmt = $this->link->prepare($query) or die($this->link->error.__LINE__);
        if($stmt){
        call_user_func_array(array($stmt, 'bind_param'), array_merge($type, $arr));
        	$stmt->execute();
        	$stmt->store_result();
        }

		if($stmt){
			return $stmt;
		} else {
			return false;
		}
	 }
                 //Another Way

	 // Select or Read data
	
	public function select1($query){
		$result = $this->link->query($query) or die($this->link->error.__LINE__);
		if($result->num_rows > 0){
			return $result;
		} else {
			return false;
		}
	}
	
	// Insert data
	public function insert1($query){
	$insert_row = $this->link->query($query) or die($this->link->error.__LINE__);
	if($insert_row){
		/*header("Location: index.php?msg=".urlencode('Data Inserted successfully.'));
		exit();*/
		return $insert_row;
	} else {
		//die("Error :(".$this->link->errno.")".$this->link->error);
		return false;
		}
	  }
  
	    // Update data
	  	public function update1($query){
		$update_row = $this->link->query($query) or die($this->link->error.__LINE__);
		if($update_row){
			return $update_row;
		} else {
			return false;
		}
	  }
	  
	  // Delete data
	   public function delete1($query){
		$delete_row = $this->link->query($query) or die($this->link->error.__LINE__);
		if($delete_row){
			return $delete_row;
		} else {
			return false;
		}
	  }


 }

?>