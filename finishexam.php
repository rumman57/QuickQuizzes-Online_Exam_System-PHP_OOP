<?php
include 'lib/Session.php';
Session::checkuserSession();
include('includes/header1.php');
include('includes/menu.php');
?>
<?php
   $userid = Session::get('uid');
   if(!isset($_GET['exgid'],$_GET['sid'])){
     echo "<script>window.location='userdashboard.php'</script>";
  }else{
     $exgid = $_GET['exgid'];
     $sid = $_GET['sid'];
     $ec = $us->finexamconditionmaintain($exgid,$userid);
  }
    $ans=$questionid=array();
    if(isset($_SESSION['answers'],$_SESSION['quid'])){
      $ans = $_SESSION['answers'];
      $questionid =  $_SESSION['quid'];
   }

   $saveans = $as->saveanswerbygidandsid($exgid,$sid,$questionid,$ans);
   if(isset($_SESSION['answers'],$_SESSION['quid'])){
      unset($_SESSION['answers']);
      unset($_SESSION['quid']);
      unset($ans);
      unset($questionid);
   }
   
?>
<div class="container bg-light-gray">
 <div class="main-content">
  <div class="featured-content">
    <div class="row-fluid">
      <div class="span11 offset1">
        <div class="alert alert-success" style="font-size: 16px;">
		  <strong>Success!!</strong> <span>You Exam Is Completed Successfully. Please Back To The Dashboard.</span>
		</div>
		<div class="alert alert-warning">
		<h2 style="text-align: justify;">To see your Exam result Please, contact your Administrator. When your Administrator published your result,You can see your result. Otherwise Result will not be visible.</h2>
		</div>
		<a href="userdashboard.php"><button class="btn btn-primary offset4 esb1">Back To Pavilion..</button></a>
     </div>
   </div>
  </div>
 </div>
</div>
<?php 
include('includes/footer.php');
?>