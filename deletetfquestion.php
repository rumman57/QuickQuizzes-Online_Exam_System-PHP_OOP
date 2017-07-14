<?php
include 'lib/Session.php';
Session::checkadminSession();
include('includes/header1.php');
 if(!isset($_GET['tfqd']) && $_GET['tfqd']==NULL){
	     echo "<script>window.location='admindashboard.php'</script>";
	  }else{
	      $tfqd = $_GET['tfqd'];
          $msg = $qs->delTrueFalseById($tfqd);
          if(isset($msg)){
          	 echo $msg;
          	 echo "<script>window.location='admindashboard.php'</script>";
          }
  }
?>