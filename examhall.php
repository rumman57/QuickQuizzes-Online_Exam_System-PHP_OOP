<?php
include 'lib/Session.php';
Session::checkuserSession();
include('includes/header1.php');
include('includes/menu.php');
?>
<?php
   $userid = Session::get('uid');
	   if(!isset($_GET['egid'],$_GET['gtok'])){
	     echo "<script>window.location='userdashboard.php'</script>";
	  }else{
	     $egid = $_GET['egid'];
	     $gtok = $_GET['gtok'];
	  }
  $_SESSION['answers'] = array();
  $_SESSION['quid'] = array();

?>
<div class="container bg-light-gray">
 <div class="main-content">
  <div class="featured-content">
    <div class="row-fluid">
     <div class="span8 offset3">
     <?php
         $dt = new DateTime('now', new DateTimeZone('Asia/Dhaka'));
         $st =  $dt->format('Y-m-d H:i:s'); 
        $result = $us->detailsuserexamgroup($egid,$gtok);
        if($result){
    	    $value = $result->fetch_assoc();
            $totalext = $value['examRunningTime'];
            $datatime1 = $value['startingTime'];
            $datatime = new DateTime($datatime1, new DateTimeZone('Asia/Dhaka'));
            $dt = new DateTime($datatime1, new DateTimeZone('Asia/Dhaka'));
            $dt1 =  $dt->format('Y-m-d H:i:s');
            $datatime->add(new DateInterval('P0M0DT0H'.$totalext.'M0S'));
            $newtime =  $datatime->format('Y-m-d H:i:s');
        }
          ?>
        <h2>Some Information : </h2>
         <p class="hgad">1. Exam Starting Time: <strong><?php echo $fm->DateFormat($dt1);?></strong></p>
         <p>2. Current Time: <strong><?php echo $fm->DateFormat($st);?></strong></p>
         <p>3. Exam Will Be Conitnue: <strong><?php echo $fm->DateFormat($newtime);?></strong></p>
         <p>4. Total Question: <strong><?php echo $value['totalExamShowQues']; ?></strong></p>
         <?php
         $ttime = $value['totalExamShowQues'] * $value['eachQuestionTime'];
         $tq = $value['totalExamShowQues'];
         ?>
         <?php
          $mi = (int) ($ttime / 60);
          $se =  $ttime % 60;
         ?>
         <p>5. Time For Exam: <strong><?php echo $mi." Minutes ".$se." Seconds"; ?></strong></p>

        <h2>Some Rules : </h2>
        <p class="hgad"><strong>1. If you reload your current url or back to ure previous questions,You will be suspended & You are no logner available to attain this exam.</strong></p>
        <p><strong>2. Once you start your exam,then back to the exam starting page you will be suspended.</strong></p>
     </div>
    </div>
     <?php 
     $ecv='';
     $q=0;
     $fiquestion = $qs->checkminimumcondition($egid);
     if($fiquestion){
        while ($fqvalue = $fiquestion->fetch_assoc()) {
            $q++;
        }
     }
    $che = $us->checkexamcondition($egid,$userid);
    if($che){
        $cvalue = $che->fetch_assoc();
        $ecv = $cvalue['econdition'];
    }
    $getque = $qs->getquestionbygroup($egid,$gtok,$tq);
     if($getque){
        while ($value=$getque->fetch_assoc()) {
           $questions[] = $value;
        }
     }
     if(isset($questions)){
     $_SESSION['questionid'] = $questions;
     } 

     ?>

    <div class="row-fluid">
     <div class="span8 offset2 text-center">
      <?php
        if($ecv==1 || $ecv==2){
          echo "<button class='btn btn-primary esb'>You Already Finished Your Exam</button>";
        }
        elseif($tq>$q){
          echo "<button class='btn btn-primary esb'>Minimum Questions Is Not Set</button>";
        } 
        elseif($st==$dt1 || $st>$dt1){ ?>
        <a href="questionpaper.php?exgid=<?php echo $egid ;?>&egtok=<?php echo $gtok;?>&ttime=<?php echo $ttime;?>&toque=<?php echo $tq; ?>"><button class="btn btn-primary esb">Start Exam</button></a>
      <?php  } else{?>
          <button class="btn btn-primary esb">Exam Not Start</button></a>
       <?php } ?>
     </div>
    </div>
  </div>
 </div>
</div>

<?php 
include('includes/footer.php');
?>