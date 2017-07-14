<?php
include 'lib/Session.php';
Session::checkadminSession();
include('includes/header1.php');
 if(!isset($_GET['demq']) && $_GET['demq']==NULL){
	     echo "<script>window.location='admindashboard.php'</script>";
	  }else{
	      $demq = $_GET['demq'];
          $msg = $qs->delMultiplqQuesById($demq);
          if(isset($msg)){
          	 echo $msg;
          	 echo "<script>window.location='admindashboard.php'</script>";
          }
  }
?>