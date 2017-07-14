<?php
  $filepath = realpath(dirname(__FILE__));
  include_once ($filepath."/../lib/Database.php");
  include_once ($filepath."/../helpers/format.php");
?>
<?php
   class Answer 
  {
	  	private $db;
	  	private $fm;
	  	
	  	function __construct()
	  	{
	  		$this->db = new Database();
	  		$this->fm = new Format();
	  	}
	  	public function saveanswerbygidandsid($gid,$sid,$qid,$answer){
	  		$gid = $this->fm->validation($gid);
        	$sid = $this->fm->validation($sid);

        	$gid = mysqli_real_escape_string($this->db->link,$gid);
        	$sid = mysqli_real_escape_string($this->db->link,$sid);
        	for($i=0;$i<count($qid);$i++){
              
              $ans    = $answer[$i];
              $quesid = $qid[$i];
	    	  $query = "INSERT into answer (ans,qid,sid,gid) VALUES (?,?,?,?)";
			  $type = array('siii');
              $result = $this->db->insert($query,$type,array(&$ans,&$quesid,&$sid,&$gid));
	        }

	  	}
	  	public function updateresultcondition($gid){
	  	   $pubval = 1;
           $query = "UPDATE answer SET 
                     publish = ?
                    WHERE gid = ?";
		   $result = $this->db->update($query,array('ii'),array(&$pubval,&$gid));
             if($result){
             	$msg = "Result Publish Successfully...";
              return  $msg;
            }
	  	}
      public function getusersrightanswer($sid,$gid){
          
          $query = "SELECT distinct *
            FROM answer JOIN groupquestions
            ON answer.gid = groupquestions.group_id AND answer.qid = groupquestions.id  AND (answer.ans = groupquestions.mulcs OR  answer.ans = groupquestions.tfcs ) where gid = ? AND sid = ?  GROUP BY(answer.qid) order by sid";
          $result = $this->db->select($query,array('ii'),array(&$gid,&$sid),array());
          if($result)
            return $result;
          else
            return false;
      }
      public function storerightans($qid,$gid,$sid){
        
         $query = "SELECT * from storerightans where qidd = ? AND gid = ? AND sid=?";
         $result = $this->db->select($query,array('iii'),array(&$qid,&$gid,&$sid),array());
         if(!$result){
           $insert = "INSERT into storerightans (qidd,sid,gid) VALUES (?,?,?)";
           $type = array('iii');
           $result = $this->db->insert($insert,$type,array(&$qid,&$sid,&$gid));
         }
      }
      public function getuserswronganswer($sid,$gid){
         
          $query = "SELECT answer.*,groupquestions.*,storerightans.qidd
                  FROM answer,groupquestions,storerightans
                  where  answer.gid = groupquestions.group_id AND answer.qid = groupquestions.id  AND (answer.ans != groupquestions.mulcs AND  answer.ans != groupquestions.tfcs ) AND answer.sid =? AND answer.gid = ? GROUP BY(answer.qid) HAVING (answer.qid != storerightans.qidd)";
          $result = $this->db->select($query,array('ii'),array(&$sid,&$gid),array());
          if($result)
            return $result;
          else
            return false;
      }
      public function userresultseeconfirm($gid){
        $pubval = 1;
         $query = "SELECT * from answer where  publish = ? AND gid = ?";
         $result = $this->db->select($query,array('ii'),array(&$pubval,&$gid),array());
             if($result){
              return  $result;
            }else{
              return false;
            }
      }
  }