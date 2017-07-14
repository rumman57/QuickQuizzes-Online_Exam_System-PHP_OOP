<?php
  $filepath = realpath(dirname(__FILE__));
  include_once ($filepath."/../lib/Database.php");
  include_once ($filepath."/../helpers/format.php");
?>
<?php
   class Login 
  {
	  	private $db;
	  	private $fm;
	  	
	  	function __construct()
	  	{
	  		$this->db = new Database();
	  		$this->fm = new Format();
	  	}
        public function adminlogin($post){

        	$useremail = $this->fm->validation($post['useremail']);
        	$password = $this->fm->validation($post['password']);

        	$useremail = mysqli_real_escape_string($this->db->link,$useremail);
        	$password = mysqli_real_escape_string($this->db->link,$password);

        	if(empty($useremail) || empty($password)){
	  			$msg = "Filled  Must Not Be Empty...</span>";
	  		    return $msg;
	  		}else{
	  		 $chquery = "SELECT * from adminregistraion where userName=? OR email=? LIMIT 1";
			 $chresult = $this->db->select($chquery,array('ss'),array(&$useremail,&$useremail),array());
				 if($chresult){
				 	$value = $chresult->fetch_assoc();
                    $database_pass = $value['password'];
                    $passresult = password_verify($password,$database_pass);
	                    if($passresult){
					 	Session::set('admin',true);
		  				Session::set('aid',$value['id']);
		  				Session::set('adminusername',$value['userName']);
		  				Session::set('email',$value['email']);
		  				Session::set('adminId',$value['admin_un_id']);
		  				echo "<script>window.location = 'admindashboard.php'</script>";
		  			   }else{
		  			   	 $msg = "Password Incorrect";
	  			         return $msg;
		  			   }
				 }else{
	  				$msg = "Username or Email Not Matched";
	  			    return $msg;
	  			}
	  		 }
        }
	    public function userlogin($post){

        	$useremail = $this->fm->validation($post['useremail']);
        	$password = $this->fm->validation($post['password']);

        	$useremail = mysqli_real_escape_string($this->db->link,$useremail);
        	$password = mysqli_real_escape_string($this->db->link,$password);

        	if(empty($useremail) || empty($password)){
	  			$msg = "Filled  Must Not Be Empty...</span>";
	  		    return $msg;
	  		}else{
	  		 $chquery = "SELECT * from userregistration where userName=? OR email=? LIMIT 1";
			 $chresult = $this->db->select($chquery,array('ss'),array(&$useremail,&$useremail),array());
				 if($chresult){
				 	$value = $chresult->fetch_assoc();
                    $database_pass = $value['password'];
                    $passresult = password_verify($password,$database_pass);
	                    if($passresult){
					 	Session::set('user',true);
		  				Session::set('uid',$value['id']);
		  				Session::set('userusername',$value['userName']);
		  				Session::set('email',$value['email']);
		  				echo "<script>window.location = 'userdashboard.php'</script>";
		  			   }else{
		  			   	 $msg = "Password Incorrect";
	  			         return $msg;
		  			   }
				 }else{
	  				$msg = "Username or Email Not Matched";
	  			    return $msg;
	  			}
	  		 }
        }
        public function userresetpassword($post){

            $useremail = $this->fm->validation($post['useremail']);

            $useremail = mysqli_real_escape_string($this->db->link,$useremail);
            $query = "SELECT * from userregistration where userName=? OR email=? LIMIT 1";
			$result = $this->db->select($query,array('ss'),array(&$useremail,&$useremail),array());
			if($result){
				$value = $result->fetch_assoc();
				$uid = $value['id'];
				$to  = $value['email'];
				$message = "Your password reset link send to your e-mail address.";
	            $subject="Forget Password";
	            $from = 'rumman142228@gmail.com';
	            $body='Hi, <br/> <br/>Your Membership ID is '.$uid.' <br><br>Click here to reset your password :
	                http://bd-techzone.com/myexam/ureset.php?uid='.$uid.'&action=reset&email='.$to;
	            $headers = "From: " . strip_tags($from) . "\r\n";
	            $headers .= "Reply-To: ". strip_tags($from) . "\r\n";
	            $sm = mail($to,$subject,$body,$headers);
	            if($sm){
	            	$msg = "Your password reset link send to your e-mail address.Please,Check Your Email";
	            	return $msg;
	            }
			}else{
                    $msg = "Account not found please signup now!!";
	            	return $msg;
				}

         }
         public function adminresetpassword($post){

         	$useremail = $this->fm->validation($post['useremail']);

            $useremail = mysqli_real_escape_string($this->db->link,$useremail);
            $query = "SELECT * from adminregistraion where userName=? OR email=? LIMIT 1";
			$result = $this->db->select($query,array('ss'),array(&$useremail,&$useremail),array());
			if($result){
				$value = $result->fetch_assoc();
				$aid = $value['id'];
				$to  = $value['email'];
				$message = "Your password reset link send to your e-mail address.";
	            $subject="Forget Password";
	            $from = 'rumman142228@gmail.com';
	            $body='Hi, <br/> <br/>Your Membership ID is '.$aid.' <br><br>Click here to reset your password :
	                http://bd-techzone.com/myexam/adreset.php?aid='.$aid.'&action=reset&email='.$to;
	            $headers = "From: " . strip_tags($from) . "\r\n";
	            $headers .= "Reply-To: ". strip_tags($from) . "\r\n";
	            $sm = mail($to,$subject,$body,$headers);
	            if($sm){
	            	$msg = "Your password reset link send to your e-mail address.Please,Check Your Email";
	            	return $msg;
	            }
			}else{
                    $msg = "Account not found please signup now!!";
	            	return $msg;
				}
         }
         public function ureset($post,$uid,$email){

           $password = $this->fm->validation($post['password']);
           $cnpassword = $this->fm->validation($post['cnpassword']);

           $password = mysqli_real_escape_string($this->db->link,$password);
           $cnpassword = mysqli_real_escape_string($this->db->link,$cnpassword);
           if(empty($password) || empty($cnpassword)){
              $msg = "Filled Must Not Be Empty..";
	          return $msg;
           }elseif($password!=$cnpassword){
              $msg = "Password Not Matched..";
	          return $msg;
           }else{
	           $encpas = password_hash($password,PASSWORD_DEFAULT,['cost'=>12]);
	           $query = "UPDATE userregistration set
	                     password = ?
	                     where id = ? AND email = ?";
	           $result = $this->db->update($query,array('sis'),array(&$encpas,&$uid,&$email));
	           if($result){
	             $msg = "Password Saved Successfully.Log In Please";
	             return $msg;
	            }
	         }
         }
         public function adminreset($post,$uid,$email){

           $password = $this->fm->validation($post['password']);
           $cnpassword = $this->fm->validation($post['cnpassword']);

           $password = mysqli_real_escape_string($this->db->link,$password);
           $cnpassword = mysqli_real_escape_string($this->db->link,$cnpassword);
           if(empty($password) || empty($cnpassword)){
              $msg = "Filled Must Not Be Empty..";
	          return $msg;
           }elseif($password!=$cnpassword){
              $msg = "Password Not Matched..";
	          return $msg;
           }else{
	           $encpas = password_hash($password,PASSWORD_DEFAULT,['cost'=>12]);
	           $query = "UPDATE adminregistraion set
	                     password = ?
	                     where id = ? AND email = ?";
	           $result = $this->db->update($query,array('sis'),array(&$encpas,&$uid,&$email));
	           if($result){
	             $msg = "Password Saved Successfully.Log In Please";
	             return $msg;
	            }
	         }
         } 

  }


?>