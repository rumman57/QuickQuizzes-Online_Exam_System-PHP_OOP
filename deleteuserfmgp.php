<?php
include 'lib/Session.php';
Session::checkadminSession();
include('includes/header1.php');
 if(!isset($_GET['urgid'])){
	     echo "<script>window.location='admindashboard.php'</script>";
	  }
	  else{
	      $urgid = $_GET['urgid'];
          $msg = $us->deluserfmconnectedgp($urgid);
          if(isset($msg)){
          	 echo $msg;
          	 echo "<script>window.location='admindashboard.php'</script>";
          }
  }
?>