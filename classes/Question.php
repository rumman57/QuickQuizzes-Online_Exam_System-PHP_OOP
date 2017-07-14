<?php
  $filepath = realpath(dirname(__FILE__));
  include_once ($filepath."/../lib/Database.php");
?>
<?php
   class Question 
  {
	  	private $db;
	  	private $fm;
	  	
	  	function __construct()
	  	{
	  		$this->db = new Database();
	  		$this->fm = new Format();
	  	}
	  	public function addmulquestion($post,$file,$gid,$gtoken){

	  		$mulqtitle   = $this->fm->validation($post['mulqtitle']);
	  		$mulfiop     = $this->fm->validation($post['mulfiop']);
	  		$mulsiop     = $this->fm->validation($post['mulsiop']);
	  		$multhop     = $this->fm->validation($post['multhop']);
	  		$mulfoop     = $this->fm->validation($post['mulfoop']);
	  		$mulcs       = $this->fm->validation($post['mulcs']);
	  		$gid         = $this->fm->validation($gid);

	  		$mulqtitle  = mysqli_real_escape_string($this->db->link, $mulqtitle);
	  		$mulfiop    = mysqli_real_escape_string($this->db->link, $mulfiop);
	  		$mulsiop    = mysqli_real_escape_string($this->db->link, $mulsiop);
	  		$multhop    = mysqli_real_escape_string($this->db->link, $multhop);
	  		$mulfoop    = mysqli_real_escape_string($this->db->link, $mulfoop);
	  		$mulcs      = mysqli_real_escape_string($this->db->link, $mulcs);
	  		$gid        = mysqli_real_escape_string($this->db->link, $gid);
	  		$gtoken     = mysqli_real_escape_string($this->db->link, $gtoken);

	  		 $fileformat = array('jpg','jpeg','png');
	         $file_name = $file['image']['name'];
	         $file_size = $file['image']['size'];
	         $file_temp = $file['image']['tmp_name'];

	        $div = explode('.', $file_name);
	        $file_extension = strtolower(end($div));
	        $unique_name_image = substr(md5(time()),0,10).'.'.$file_extension;
	        $uploaded_directory_Imagename = "img/".$unique_name_image;

	        if(empty($mulqtitle) || empty($mulfiop) || empty($mulsiop)|| empty($multhop) || empty($mulfoop)||  empty($mulcs)){
	  			 $msg = "Filled  Must Not Be Empty..";
	  			 return $msg;
	  		}
	  		if(!empty($file_name)) {

	  			if($file_size>1048576){
	             $msg = "File Size Not More Than 1MB";
	  			 return $msg;
		        }elseif(in_array($file_extension, $fileformat)===false){
		            $msg = "You Can Upload Only : ".implode(' , ', $fileformat);
		  			 return $msg;
		        }else{
		        move_uploaded_file($file_temp, $uploaded_directory_Imagename);
		    	$query = "INSERT into groupquestions(questionTitle,mulfiop,mulsiop,multhop,mulfoop,mulcs,image,group_id,group_token) VALUES (?,?,?,?,?,?,?,?,?)";
					 $type = array('sssssssis');
		             $result = $this->db->insert($query,$type,array(&$mulqtitle,&$mulfiop,&$mulsiop,&$multhop,&$mulfoop,&$mulcs,&$uploaded_directory_Imagename,&$gid,&$gtoken));
	                   if($result){
	             		  $msg = "Question Added Successfully...";
			            return $msg;
	             	}else
	             	 return false;
		        } 
	       } else{
	        	$query = "INSERT into groupquestions(questionTitle,mulfiop,mulsiop,multhop,mulfoop,mulcs,group_id,group_token) VALUES (?,?,?,?,?,?,?,?)";
				 $type = array('ssssssis');
	             $result = $this->db->insert($query,$type,array(&$mulqtitle,&$mulfiop,&$mulsiop,&$multhop,&$mulfoop,&$mulcs,&$gid,&$gtoken));
                   if($result){
             		  $msg = "Question Added Successfully...";
		            return $msg;
             	}else return false;
	        }
	  	}

	  	public function addtruefalsequestion($post,$file,$gid,$gtoken){

	  		$tfqtitle   = $this->fm->validation($post['tfqtitle']);
	  		$tffiop     = $this->fm->validation($post['tffiop']);
	  		$tfsiop     = $this->fm->validation($post['tfsiop']);
	  		$tfcs     = $this->fm->validation($post['tfcs']);
	  		$gid         = $this->fm->validation($gid);

	  		$tfqtitle  = mysqli_real_escape_string($this->db->link, $tfqtitle);
	  		$tffiop    = mysqli_real_escape_string($this->db->link, $tffiop);
	  		$tfsiop    = mysqli_real_escape_string($this->db->link, $tfsiop);
	  		$tfcs    = mysqli_real_escape_string($this->db->link, $tfcs);
	  		$gid    = mysqli_real_escape_string($this->db->link, $gid);
	  		$gtoken     = mysqli_real_escape_string($this->db->link, $gtoken);

	  		 $fileformat = array('jpg','jpeg','png');
	         $file_name = $file['image']['name'];
	         $file_size = $file['image']['size'];
	         $file_temp = $file['image']['tmp_name'];

	        $div = explode('.', $file_name);
	        $file_extension = strtolower(end($div));
	        $unique_name_image = substr(md5(time()),0,10).'.'.$file_extension;
	        $uploaded_directory_Imagename = "img/".$unique_name_image;

	        if(empty($tfqtitle) || empty($tffiop) || empty($tfsiop)|| empty($tfcs)){
	  			 $msg = "Filled  Must Not Be Empty..";
	  			 return $msg;
	  		}
	  		if(!empty($file_name)) {

	  			if($file_size>1048576){
	             $msg = "File Size Not More Than 1MB";
	  			 return $msg;
		        }elseif(in_array($file_extension, $fileformat)===false){
		            $msg = "You Can Upload Only : ".implode(' , ', $fileformat);
		  			 return $msg;
		        }else{
		        move_uploaded_file($file_temp, $uploaded_directory_Imagename);
		    	$query = "INSERT into groupquestions(questionTitle,tffiop,tfsiop,tfcs,image,group_id,group_token) VALUES (?,?,?,?,?,?,?)";
					 $type = array('sssssis');
		             $result = $this->db->insert($query,$type,array(&$tfqtitle,&$tffiop,&$tfsiop,&$tfcs,&$uploaded_directory_Imagename,&$gid,&$gtoken));
	                   if($result){
	             		  $msg = "Question Added Successfully...";
			            return $msg;
	             	}else
	             	 return false;
		        } 
	       } else{
	        	$query = "INSERT into groupquestions(questionTitle,tffiop,tfsiop,tfcs,group_id,group_token) VALUES (?,?,?,?,?,?)";
					 $type = array('ssssis');
		             $result = $this->db->insert($query,$type,array(&$tfqtitle,&$tffiop,&$tfsiop,&$tfcs,&$gid,&$gtoken));
	                   if($result){
	             		  $msg = "Question Added Successfully...";
			            return $msg;
	             	}else
	             	 return false;
	        }
	  	}

	  	public function showmultiplequestion($gid){
	  		$tff="";
	  		$query = "SELECT * from groupquestions where group_id=? AND 	tffiop=?";
	  		$result = $this->db->select($query,array('is'),array(&$gid,&$tff),array());
	  		if($result){
	  			return $result;
	  		}else{
	  			return false;
	  		}
	  	}
	  	public function delMultiplqQuesById($id){
	  		$query1 = "select * from groupquestions where id= ?";
		     $res = $this->db->select($query1,array('i'),array(&$id),array());
		     if($res){
		     	while ($value1 = $res->fetch_assoc()) {
		     		$getimage = $value1['image'];
		     		if(!empty($getimage))
		     		unlink($getimage);
		     	}
		     }
	  		$query= "DELETE from groupquestions where id=?";
	         $result = $this->db->delete($query,array('i'),array(&$id));
	         if($result){
	           $msg = "Question Deleted Successfully";
	           return $msg;
	         }else{
	          return false;
	         }
	  	}
	  	public function showtruefalsequestion($gid){
	  		$tff="";
	  		$query = "SELECT * from groupquestions where group_id=? AND 		mulfiop=?";
	  		$result = $this->db->select($query,array('is'),array(&$gid,&$tff),array());
	  		if($result){
	  			return $result;
	  		}else{
	  			return false;
	  		}
	  	}
	  	public function delTrueFalseById($id){
	  		$query1 = "select * from groupquestions where id= ?";
		     $res = $this->db->select($query1,array('i'),array(&$id),array());
		     if($res){
		     	while ($value1 = $res->fetch_assoc()) {
		     		$getimage = $value1['image'];
		     		if(!empty($getimage))
		     		unlink($getimage);
		     	}
		     }
	  		$query= "DELETE from groupquestions where id=?";
	         $result = $this->db->delete($query,array('i'),array(&$id));
	         if($result){
	           $msg = "Question Deleted Successfully";
	           return $msg;
	         }else{
	          return false;
	         }
	  	}
        public function getquestionbygroup($gid,$gtoken,$totalq){

        	$gid = $this->fm->validation($gid);

          $gid = mysqli_real_escape_string($this->db->link,$gid);
          $gtoken = mysqli_real_escape_string($this->db->link,$gtoken);

          $query = "SELECT * from groupquestions where group_id=? AND group_token=? ORDER BY RAND() LIMIT $totalq";
          $result = $this->db->select($query,array('is'),array(&$gid,&$gtoken),array());
          if($result)
            return $result;
          else
            return false;
        }
        public function checkminimumcondition($gid){
         $query = "SELECT * from groupquestions where group_id=?";
          $result = $this->db->select($query,array('i'),array(&$gid),array());
          if($result)
            return $result;
          else
            return false;
        }
        public function totalsetquestionbygroup($gid){
        	$query = "SELECT * from groupquestions where group_id=?";
           $result = $this->db->select($query,array('i'),array(&$gid),array());
           if($result){
              $row = mysqli_num_rows($result);
              return $row;
           }          
           else
            return false;
        }
  }


?>