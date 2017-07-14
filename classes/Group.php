<?php
  $filepath = realpath(dirname(__FILE__));
  include_once ($filepath."/../lib/Database.php");
  include_once ($filepath."/../helpers/format.php");
?>
<?php
   class Group 
  {
	  	private $db;
	  	private $fm;
	  	
	  	function __construct()
	  	{
	  		$this->db = new Database();
	  		$this->fm = new Format();
	  	}
	  	public function checkadminhasgroup($adminid,$regid){
	  		  $adminid = $this->fm->validation($adminid);
        	$regid = $this->fm->validation($regid);

        	$adminid = mysqli_real_escape_string($this->db->link,$adminid);
        	$regid = mysqli_real_escape_string($this->db->link,$regid);
        	$query = "SELECT * from examgroups where admin_id=? AND admin_code=? order by id DESC";
        	$result = $this->db->select($query,array('ii'),array(&$adminid,&$regid),array());
        	if($result)
        		return $result;
        	else
        		return false;
	  	}
	  	public function insertgroup($post,$aid,$atoken){

	  		  $groupName   = $this->fm->validation($post['groupName']);
        	$examName    = $this->fm->validation($post['examName']);
        	$tQues       = $this->fm->validation($post['totalQuestion']);
          $tESQues     = $this->fm->validation($post['totalExamShowQues']);
        	$eRgT        = $this->fm->validation($post['examRunningTime']);
        	$eQT         = $this->fm->validation($post['eachQuestionTime']);
        	$sTime       = $this->fm->validation($post['startingTime']);
        	$aid         = $this->fm->validation($aid);
        	$atoken      = $this->fm->validation($atoken);

        	$groupName  = mysqli_real_escape_string($this->db->link, $groupName);
        	$examName   = mysqli_real_escape_string($this->db->link, $examName);
        	$tQues      = mysqli_real_escape_string($this->db->link, $tQues);
        	$tESQues    = mysqli_real_escape_string($this->db->link, $tESQues);
        	$eRgT       = mysqli_real_escape_string($this->db->link, $eRgT);
        	$eQT        = mysqli_real_escape_string($this->db->link, $eQT);
        	$sTime      = mysqli_real_escape_string($this->db->link, $sTime);

        	$characters ='01234~56}789abcd~~efghijklmn}opqr^stuvwxyz~ABCDEFGHI{JKLMNOPQRSTUVWXYZ';
            $length =30;
			$charactersLength = strlen($characters);
			$randomString ='';
			for ($i = 0; $i < $length; $i++) {
			    $randomString .= $characters[rand(0, $charactersLength - 1)];
			}

			preg_match('/(\d{4})-(\d{2})-(\d{2}) (\d{2}):(\d{2}):(\d{2})/',$sTime,$matches);
			$len = strlen($sTime);
			
            if(empty($groupName) || empty($examName)){
	  			$msg = "Filled  Must Not Be Empty...</span>";
	  		    return $msg;
	  		}
	  		elseif(empty($matches) || $len>19){
	  			$msg = "Invalid Start Time Format</span>";
	  		    return $msg;
	  		}else{
  			$query = "INSERT into examgroups (groupName,examName,totalQuestion,totalExamShowQues,examRunningTime,eachQuestionTime,startingTime,admin_id,admin_code,groupToken) VALUES (?,?,?,?,?,?,?,?,?,?)";
				 $type = array('ssiiiisiss');
                 $result = $this->db->insert($query,$type,array(&$groupName,&$examName,&$tQues,&$tESQues,&$eRgT,&$eQT,&$sTime,&$aid,&$atoken,&$randomString));
                 if($result){
             		$msg = "Group Added Successfully";
		            return $msg;
                }
	  		}

	  	}
      public function editgroupbyid($id){
         $query = "SELECT * from examgroups where id=?";
         $res = $this->db->select($query,array('i'),array(&$id),array());
         if($res){
           return $res;
         }else{
           return false;
         }
      }
      public function updategroup($post,$gid){

          $groupName   = $this->fm->validation($post['groupName']);
          $examName    = $this->fm->validation($post['examName']);
          $tQues       = $this->fm->validation($post['totalQuestion']);
          $tESQues     = $this->fm->validation($post['totalExamShowQues']);
          $eRgT        = $this->fm->validation($post['examRunningTime']);
          $eQT         = $this->fm->validation($post['eachQuestionTime']);
          $sTime       = $this->fm->validation($post['startingTime']);
          $gid         = $this->fm->validation($gid);

          $groupName  = mysqli_real_escape_string($this->db->link, $groupName);
          $examName   = mysqli_real_escape_string($this->db->link, $examName);
          $tQues      = mysqli_real_escape_string($this->db->link, $tQues);
          $tESQues    = mysqli_real_escape_string($this->db->link, $tESQues);
          $eRgT       = mysqli_real_escape_string($this->db->link, $eRgT);
          $eQT        = mysqli_real_escape_string($this->db->link, $eQT);
          $sTime      = mysqli_real_escape_string($this->db->link, $sTime);

          

          preg_match('/(\d{4})-(\d{2})-(\d{2}) (\d{2}):(\d{2}):(\d{2})/',$sTime,$matches);
          $len = strlen($sTime);
      
        if(empty($groupName) || empty($examName)){
          $msg = "Filled  Must Not Be Empty...</span>";
          return $msg;
        }
        elseif(empty($matches) || $len>19){
          $msg = "Invalid Start Time Format</span>";
            return $msg;
        }else{
          $query = "UPDATE examgroups set
            groupName = ?,
            examName = ?,
            totalQuestion = ?,
            totalExamShowQues = ?,
            examRunningTime = ?,
            eachQuestionTime = ?,
            startingTime = ?
            where id=?";
          $result = $this->db->update($query,array('ssiiiisi'),array(&$groupName,&$examName,&$tQues,&$tESQues,&$eRgT,&$eQT,&$sTime,&$gid));
             if($result){
             $msg = "Group Updated Successfully";
             return $msg;
           }
        }
      }
      public function delGroupById($dgid){
         $query= "DELETE from examgroups where id=?";
         $result = $this->db->delete($query,array('i'),array(&$dgid));
         if($result){
           $msg = "Group Deleted Successfully";
           return $msg;
         }else{
          return false;
         }
      }
      public function getGroupDetailsById($vgid,$aid){

          $vgid = $this->fm->validation($vgid);
          $aid = $this->fm->validation($aid);

          $vgid = mysqli_real_escape_string($this->db->link,$vgid);
          $aid = mysqli_real_escape_string($this->db->link,$aid);

          $query = "SELECT * from examgroups where id=? AND admin_id=?";
          $result = $this->db->select($query,array('ii'),array(&$vgid,&$aid),array());
          if($result)
            return $result;
          else
            return false;
      }
      public function findGroupTokenForAddQues($id){
         $query = "SELECT * from examgroups where id=?";
         $result = $this->db->select($query,array('i'),array(&$id),array());
         if($result){
          return $result;
         }else{
          return false;
         }
      }

  }