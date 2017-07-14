<?php
include 'lib/Session.php';
Session::checkadminSession();
include('includes/header1.php');
include('includes/menu.php');
   $aid = Session::get('aid');
   $adminId = Session::get('adminId');
?>
<?php 
 if(!isset($_GET['aqgid']) && $_GET['aqgid']==NULL){
     echo "<script>window.location='admindashboard.php'</script>";
  }else{
     $aqgid = $_GET['aqgid'];
  }
?>
<div class="container bg-light-gray">
 <div class="main-content">
  <div class="featured-content">
    <div class="row-fluid">
     <div class="span8 offset3">
        <a href="multiplequestion.php?mulq=<?php echo $aqgid; ?>"><input type="submt" name="multiple" value="Multiple Questions" class="btn btn-primary"></a>
        <a href="truefalse.php?trefaq=<?php echo $aqgid; ?>"><input type="submt" name="multiple" value="True Or False" class="btn btn-primary"></a>
     </div>
    </div>
  </div>
 </div>
</div>
<?php 
include('includes/footer.php');
?>