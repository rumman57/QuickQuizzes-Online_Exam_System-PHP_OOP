<?php
include 'lib/Session.php';
Session::checkadminSession();
include('includes/header1.php');
 if(!isset($_GET['dgid']) && $_GET['dgid']==NULL){
	     echo "<script>window.location='admindashboard.php'</script>";
	  }else{
	      $dgid = $_GET['dgid'];
          $deletegroup = $gp->delGroupById($dgid);
          if(isset($deletegroup)){
          	 echo $deletegroup;
          	 echo "<script>window.location='admindashboard.php'</script>";
          }
  }
?>