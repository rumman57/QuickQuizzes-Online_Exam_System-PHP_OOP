<?php
  $filepath = realpath(dirname(__FILE__));
  include_once ($filepath."/../lib/Database.php");
?>
<?php
   class User 
 {
	  	private $db;
	  	private $fm;
	  	
	  	function __construct()
	  	{
	  		$this->db = new Database();
	  		$this->fm = new Format();
	  	}
	  	public function checkuserhasgroup($userid){

            $userid = $this->fm->validation($userid);
        	$userid = mysqli_real_escape_string($this->db->link,$userid);
           $query = "SELECT * from usersforexamgroups where student_id=? order by id DESC";
        $result = $this->db->select($query,array('i'),array(&$userid),array());
        	if($result)
        		return $result;
        	else
        		return false;
	  	}
	  	public function insertusertoconnegrp($post,$uid){

            $gtoken   =$post['gtoken'];
            $insid    = $post['insid'];
            $name     = $this->fm->validation($post['name']);
            $roll     = $this->fm->validation($post['roll']);
            $email    = $this->fm->validation($post['email']);
            $dept     = $this->fm->validation($post['dept']);
            $uid     = $this->fm->validation($uid);

            $gtoken = mysqli_real_escape_string($this->db->link,$gtoken);
            $insid  = mysqli_real_escape_string($this->db->link,$insid);
            $name   = mysqli_real_escape_string($this->db->link,$name);
            $roll   = mysqli_real_escape_string($this->db->link,$roll);
            $email  = mysqli_real_escape_string($this->db->link,$email);
            $dept   = mysqli_real_escape_string($this->db->link,$dept);
            $groupid="";
            $cquery = "SELECT * from usersforexamgroups where group_token=? AND student_id=?";
            $cresult = $this->db->select($cquery,array('si'),array(&$gtoken,&$uid),array());
            $acquery = "SELECT * from examgroups where  admin_code=? AND groupToken=?";
            $acresult = $this->db->select($acquery,array('ss'),array(&$insid,&$gtoken),array());

           /* $acquery = "SELECT * from examgroups where  groupToken='$gtoken'";
            $acresult = $this->db->select1($acquery);*/
           //return $insid." ".$gtoken;

            if($acresult){
            	$keep = $acresult->fetch_assoc();
            	$groupid = $keep['id'];
            }
            if(!$acresult){
                $msg = "Group Or Instructor Id is Invalid";
            	return $msg;
            }
            elseif($cresult){
            	$msg = "You Already Connected Through This Group";
            	return $msg;
            }else{

            	if(empty($gtoken) || empty($insid)||empty($name)||empty($roll)){
	  			  $msg = "Filled  Must Not Be Empty...</span>";
	  		      return $msg;
	  		    }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			      $msg = "Invalid email format";
			      return $msg; 
			    }else{
			    	$query = "INSERT into usersforexamgroups (instructor_id,name,roll,email,department,group_token,group_id,student_id) VALUES (?,?,?,?,?,?,?,?)";
					 $type = array('ssssssii');
	                 $result = $this->db->insert($query,$type,array(&$insid,&$name,&$roll,&$email,&$dept,&$gtoken,&$groupid,&$uid));
	                 if($result){
	             		$msg = "Group Connected Successfully";
			            return $msg;
	                }
			    }
            }
	  	}
        public function detailsuserexamgroup($id,$gtoken){

              $id = $this->fm->validation($id);

              $id = mysqli_real_escape_string($this->db->link,$id);
              $gtoken = mysqli_real_escape_string($this->db->link,$gtoken);

              $query = "SELECT * from examgroups where id=? AND groupToken=?";
              $result = $this->db->select($query,array('is'),array(&$id,&$gtoken),array());
              if($result)
                return $result;
              else
                return false;
        }
        public function maintain($gid,$id){
           $query = "INSERT into urlcheck (gid,maintain) VALUES (?,?)";
           $type = array('ii');
           $result = $this->db->insert($query,$type,array(&$gid,&$id)); 
        }

        public function datemaintain($sid,$gid,$time){
          
            $dt = new DateTime('now', new DateTimeZone('Asia/Dhaka'));
            $timestart = $dt->format('Y-m-d H:i:s');
            $query = "SELECT * from maintaindate where gid=? AND sid=?";
          $result = $this->db->select($query,array('ii'),array(&$gid,&$sid),array());
            if($result){
               $value = $result->fetch_assoc();
               $startdate = $value['startdate'];
               $enddate =   $value['enddate'];
            }else{
              $dt1 = new DateTime('now', new DateTimeZone('Asia/Dhaka'));
              $end = $dt1->add(new DateInterval('P0M0DT0H0M'.$time.'S'));
              $timeend = $end->format('Y-m-d H:i:s');
              $query1 = "INSERT into maintaindate (startdate,enddate,sid,gid)  
              values (?,?,?,?)";
              $result1 = $this->db->insert($query1,array('ssii'),array(&$timestart,&$timeend,&$sid,&$gid));
            }
        }
        public function examconditionmaintain($gid,$sid){
           $value = '1';
           $query = "INSERT into examcondition (gid,sid,econdition) VALUES (?,?,?)";
           $type = array('iii');
           $result = $this->db->insert($query,$type,array(&$gid,&$sid,&$value));
        }
        public function finexamconditionmaintain($gid,$sid){
           $value = '2';
           $query = "UPDATE  examcondition  SET 
                     econdition =?
                   where gid = ? AND sid = ?";
           $type = array('iii');
           $result = $this->db->update($query,$type,array(&$value,&$gid,&$sid));
        }
        public function checkexamcondition($gid,$sid){
           $query = "SELECT * from examcondition where gid=? AND sid=?";
          $result = $this->db->select($query,array('ii'),array(&$gid,&$sid),array());
          if($result)
            return $result;
          else
            return false;
        }
        public function agcheckexamcondition($gid,$sid){
          $value = '2';
          $query = "SELECT * from examcondition where gid=? AND sid=? AND econdition=?";
          $result = $this->db->select($query,array('iii'),array(&$gid,&$sid,&$value),array());
          if($result)
            return $result;
          else
            return false;
        }
        public function checkurlmaintain($gid,$matai){
          $query = "SELECT * from urlcheck where gid=? AND maintain=?";
          $result = $this->db->select($query,array('ii'),array(&$gid,&$matai),array());
          if($result)
            return $result;
          else
            return false;
        }
        public function getalluserforagroupbyid($gid){
           $query = "SELECT * from usersforexamgroups where group_id=?";
          $result = $this->db->select($query,array('i'),array(&$gid),array());
          if($result)
            return $result;
          else
            return false;
        }
        public function deluserfmconnectedgp($sid){
           $query= "DELETE from usersforexamgroups where student_id=?";
           $result = $this->db->delete($query,array('i'),array(&$sid));
           if($result){
             $msg = "User Deleted Successfully";
             return $msg;
           }else{
            return false;
           }
        }
        public function contactus($post){

            $name     = $this->fm->validation($post['name']);
            $email    = $this->fm->validation($post['email']);
            $subject  = $this->fm->validation($post['subject']);
            $body     = $this->fm->validation($post['body']);

            $name  = mysqli_real_escape_string($this->db->link,$name);
            $email = mysqli_real_escape_string($this->db->link,$email);
            $subject  = mysqli_real_escape_string($this->db->link,$subject);
            $body  = mysqli_real_escape_string($this->db->link,$body);

            if(empty($name) || empty($email) || empty($subject)|| empty($body)){
               $msg = "Filled  Must Not Be Empty...";
               return $msg;
            }
            elseif (!preg_match("/^[a-zA-Z ]*$/",$name)) {
              $msg = "Name Only letters and white space allowed"; 
              return $msg;
            }
            elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
              $msg = "Invalid email format";
              return $msg; 
            }else{
                $to = "rumman142228@gmail.com";
                $headers = "From: ".$email."";                
                $result = mail($to,$subject,$body,$headers);
                if($result){
                  return "Email Sent Successfully..";
                }else{
                   return "Email Not Sent";
                }
            }
        }
       

 }