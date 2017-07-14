<?php
  $filepath = realpath(dirname(__FILE__));
  include_once ($filepath."/../lib/Session.php");
  Session::checkLogin();
  include_once ($filepath."/../lib/Database.php");
  include_once ($filepath."/../helpers/format.php");
?>
<?php
   class Register 
  {
	  	private $db;
	  	private $fm;
	  	
	  	function __construct()
	  	{
	  		$this->db = new Database();
	  		$this->fm = new Format();
	  	}
        public function administrativeregister($post){

        	$firstName = $this->fm->validation($post['firstName']);
        	$lastName = $this->fm->validation($post['lastName']);
        	$userName = $this->fm->validation($post['userName']);
        	$email = $this->fm->validation($post['email']);
        	$password = $this->fm->validation($post['password']);
        	$password = password_hash($password,PASSWORD_DEFAULT,['cost'=>12]);


        	$firstName  = mysqli_real_escape_string($this->db->link, $firstName);
        	$lastName  = mysqli_real_escape_string($this->db->link, $lastName);
        	$userName  = mysqli_real_escape_string($this->db->link, $userName);
        	$email  = mysqli_real_escape_string($this->db->link, $email);
        	$password  = mysqli_real_escape_string($this->db->link, $password);

            $characters ='01234@#$%()56789abcd@#$%()efghijklmnopqrstuvwxyzA@#$%()BCDEFGHI@#$%()JKLMNOPQR@#$%()STUVWXYZ';
            $length =20;
			$charactersLength = strlen($characters);
			$randomString ='';
			for ($i = 0; $i < $length; $i++) {
			    $randomString .= $characters[rand(0, $charactersLength - 1)];
			}
            if(empty($firstName) || empty($lastName) || empty($userName)|| empty($email) || empty($password)){
	  			$msg = "Filled  Must Not Be Empty...";
	  		    return $msg;
	  		}
	  		elseif (!preg_match("/^[a-zA-Z ]*$/",$firstName)) {
			    $msg = "Name Only letters and white space allowed"; 
			    return $msg;
			}
			elseif (!preg_match("/^[a-zA-Z ]*$/",$lastName)) {
			    $msg = "Name Only letters and white space allowed";
			    return $msg; 
			}
			elseif (!preg_match("/^[a-zA-Z ]*$/",$userName)) {
			    $msg = "Username Only letters and white space allowed";
			    return $msg; 
			}
			elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			    $msg = "Invalid email format";
			    return $msg; 
			}
			else{
				$chquery = "SELECT * from adminregistraion where userName=? OR email=?";
				$chresult = $this->db->select($chquery,array('ss'),array(&$userName,&$email),array());
				if($chresult){
                   $msg = "Username Or Email Already Registered";
				   return $msg;
				}else{
					 $query = "INSERT into adminregistraion (firstName,lastName,userName,email,password,admin_un_id) VALUES (?,?,?,?,?,?)";
					 $type = array('ssssss');
	                 $result = $this->db->insert($query,$type,array(&$firstName,&$lastName,&$userName,&$email,&$password,&$randomString));
	                 if($result){
	                 		$msg = "Registered Successfully. <span style='font-weight:bold;color:#286090;'>Log In Please.</span>";
				            return $msg;
	                 	}
				  }
			  }
        }
        public function userregister($post){
            $firstName = $this->fm->validation($post['firstName']);
        	$lastName = $this->fm->validation($post['lastName']);
        	$userName = $this->fm->validation($post['userName']);
        	$email = $this->fm->validation($post['email']);
        	$password = $this->fm->validation($post['password']);
        	$password = password_hash($password,PASSWORD_DEFAULT,['cost'=>12]);


        	$firstName  = mysqli_real_escape_string($this->db->link, $firstName);
        	$lastName  = mysqli_real_escape_string($this->db->link, $lastName);
        	$userName  = mysqli_real_escape_string($this->db->link, $userName);
        	$email  = mysqli_real_escape_string($this->db->link, $email);
        	$password  = mysqli_real_escape_string($this->db->link, $password);

            if(empty($firstName) || empty($lastName) || empty($userName)|| empty($email) || empty($password)){
	  			$msg = "Filled  Must Not Be Empty...</span>";
	  		    return $msg;
	  		}
	  		elseif (!preg_match("/^[a-zA-Z ]*$/",$firstName)) {
			    $msg = "Name Only letters and white space allowed"; 
			    return $msg;
			}
			elseif (!preg_match("/^[a-zA-Z ]*$/",$lastName)) {
			    $msg = "Name Only letters and white space allowed";
			    return $msg; 
			}
			elseif (!preg_match("/^[a-zA-Z ]*$/",$userName)) {
			    $msg = "Username Only letters and white space allowed";
			    return $msg; 
			}
			elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			    $msg = "Invalid email format";
			    return $msg; 
			}
			else{
				$chquery = "SELECT * from userregistration where userName=? OR email=?";
				$chresult = $this->db->select($chquery,array('ss'),array(&$userName,&$email),array());
				if($chresult){
                   $msg = "Username Or Email Already Registered";
				   return $msg;
				}else{
					 $query = "INSERT into userregistration (firstName,lastName,userName,email,password) VALUES (?,?,?,?,?)";
					 $type = array('sssss');
	                 $result = $this->db->insert($query,$type,array(&$firstName,&$lastName,&$userName,&$email,&$password));
	                 if($result){
	                 		$msg = "Registered Successfully. <span style='font-weight:bold;color:#286090;'>Log In Please.</span>";
				            return $msg;
	                 	}
				  }
			  }
        }
	  	public function administrativeregiste($adminUser,$adminPass,$autologin){
	  		$adUser = $this->fm->validation($adminUser);
	  		$chemd5 = '$adminPass';
	  		$adPass = md5($chemd5);
	  		$adPass = $this->fm->validation($adminPass);

	  		$adUser = mysqli_real_escape_string($this->db->link,$adminUser);
	  		$adPass = mysqli_real_escape_string($this->db->link,$adminPass);
	  		if(empty($adUser) || empty($adPass)){
	  			$loginmsg = "Username & Password Must Not Be Empty...";
	  			return $loginmsg;
	  		}else{
	  			$query = "SELECT * FROM foradmin WHERE AdminUser ='$adUser' AND AdminPass ='$adPass'";
	  			$result = $this->db->select($query);
	  			if($result){
	  				$value = $result->fetch_assoc();
	  				Session::set('login',true);
	  				Session::set('adminName',$value['AdminName']);
	  				Session::set('adminUser',$value['AdminUser']);
	  				Session::set('adminPass',$value['AdminPass']);
	  				Session::set('adminEmail',$value['AdminEmail']);
	  				Session::set('adminDate',$value['AdminDate']);
	  				if($autologin==1){
	  					self::setCookie();
	  				}
	  				echo "<script>window.location = 'index.php'</script>";
	  				//header("Location: index.php");
	  			}else{
	  				$loginmsg = "Username & Password Not Matched";
	  			    return $loginmsg;
	  			}
	  		}
	  	}
	  	

  }
?>