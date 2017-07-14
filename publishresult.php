<?php
include 'lib/Session.php';
Session::checkadminSession();
include('includes/header1.php');
 if(!isset($_GET['pgid']) && $_GET['pgid']==NULL){
	     echo "<script>window.location='admindashboard.php'</script>";
	  }else{
	      $pgid = $_GET['pgid'];
          $cnfm = $as->updateresultcondition($pgid);
          if($cnfm){
          	 echo "<script>confirm('".$cnfm."')</script>"; 
          	 echo "<script>window.location='admindashboard.php'</script>";
          }
  }
?>