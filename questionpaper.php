<?php
include 'lib/Session.php';
Session::checkuserSession();
include('includes/header1.php');
include('includes/menu1.php');
?>
<?php
      $userid = Session::get('uid');
	   if(!isset($_GET['exgid'],$_GET['egtok'],$_GET['ttime'],$_GET['toque'])){
	     echo "<script>window.location='userdashboard.php'</script>";
	  }else{
	     $exgid = $_GET['exgid'];
	     $egtok = $_GET['egtok'];
	     $ttime = $_GET['ttime'];
	     $toque = $_GET['toque'];
	  }
	  $che = $us->agcheckexamcondition($exgid,$userid);
      if($che){
        echo "<script>window.location='userdashboard.php'</script>";
      }
      if(!isset($_GET['i'])){
	     $i = 0;
	     $j = $i;
	     $ec = $us->examconditionmaintain($exgid,$userid);
     }else{
   	    $i = $_GET['i'];
   	    $j = $i;
     } 
                  //***** Check The Url ******//

       /*$url = $us->checkurlmaintain($exgid,$i);
       if($url){ ?>
       	<script>window.location='finishexam.php?exgid=<?php echo $exgid;?>&sid=<?php echo $userid;?>'</script>";
     <?php  }
      $inserturlvalue = $us->maintain($exgid,$i);*/

               //***** Finished Check The Url ******//


     $datmain = $us->datemaintain($userid,$exgid,$ttime);
     $i++;
     if($i>$toque){ ?>
      <script>window.location='finishexam.php?exgid=<?php echo $exgid;?>&sid=<?php echo $userid;?>'</script>";
    <?php }
     /*$getque = $qs->getquestionbygroup($exgid,$egtok,$toque);

     if($getque){
	 	while ($value=$getque->fetch_assoc()) {
		   $questions[] = $value;
	 	}
	 }*/
	  // print_r($_SESSION['questionid']);
	   $id=$questionTitle=$mulfiop=$mulsiop=$multhop=$mulfoop="";
	   $mulcs=$image=$tffiop=$tfsiop=$tfcs="";
	   $questions = $_SESSION['questionid'];


       $id                = $questions[$j]['id'];
       $questionTitle     = $questions[$j]['questionTitle'];
	   $mulfiop           = $questions[$j]['mulfiop'];
	   $mulsiop           = $questions[$j]['mulsiop'];
	   $multhop           = $questions[$j]['multhop'];
	   $mulfoop           = $questions[$j]['mulfoop'];
	   $mulcs             = $questions[$j]['mulcs'];
	   $image             = $questions[$j]['image'];
	   $tffiop            = $questions[$j]['tffiop'];
	   $tfsiop            = $questions[$j]['tfsiop'];
	   $tfcs              = $questions[$j]['tfcs'];

?>
     
<div class="container bg-light-gray">
 <div class="main-content">
  <div class="featured-content">
    <div class="row-fluid">
     <div class="span6 offset2">
        <h2 style="color:gray">Question Number : <?php echo $i?>/<?php echo $toque ?></h2> <br><br>
     </div>
     <div style="color:gray" class="span3 offset0 ">
        <h2 style="display: inline;">Time Left: </h2>
        <h2 id="val" style="display: inline;"></h2>
     </div>
    </div>

    <div class="ruler"></div>


    <div class="row-fluid">
     <div class="span8 offset3">
     <br><br>
       <h1><?php echo $questionTitle ?></h1>
       <?php
          if(!empty($image)){ ?>
          	 <image class="htk" src="<?php echo $image;?>">
        <?php  }
       ?>
       <?php if(!empty($mulfiop)){ ?>

        <div class="radio qm">
		 <label><input  type="radio" name="question" onclick="ajax_value_save(<?php echo $id;?>)" id="a" value="<?php echo $mulfiop ?>"><?php echo $mulfiop ?></label>
		</div>
		<div class="radio qm">
		  <label><input type="radio" name="question" onclick="ajax_value_save(<?php echo $id ; ?>)"  id="b" value="<?php echo $mulsiop ?>"><?php echo $mulsiop ?></label>
		</div>
		<div class="radio qm">
		  <label><input type="radio"  name="question" id="c" onclick="ajax_value_save(<?php echo $id;?>)" value="<?php echo $multhop ?>"><?php echo $multhop ?></label>
		</div>
		<div class="radio qm">
		  <label><input type="radio"  name="question" id="d" onclick="ajax_value_save(<?php echo $id ; ?>)" value="<?php echo $mulfoop ?>"><?php echo $mulfoop ?></label>
		</div>

		<?php } else  { ?>

		<div class="radio qm">
		 <label><input  type="radio" name="question" id="a" onclick="ajax_value_save(<?php echo $id ; ?>)" value="<?php echo $tffiop ?>"><?php echo $tffiop ?></label>
		</div>
		<div class="radio qm">
		  <label><input type="radio" name="question" id="b" onclick="ajax_value_save(<?php echo $id ; ?>)" value="<?php echo $tfsiop ?>"><?php echo $tfsiop ?></label>
		</div>
		<?php } ?>
		 <?php 
		 if($i==$toque){ ?>
		 	<a href="finishexam.php?exgid=<?php echo $exgid ;?>&sid=<?php echo $userid;?>"><button class="btn btn-info esb">Finish</button></a>
	  <?php	 }else{ ?>
		 	<a href="questionpaper.php?exgid=<?php echo $exgid ;?>&egtok=<?php echo $egtok;?>&ttime=<?php echo $ttime;?>&toque=<?php echo $toque;?>&i=<?php echo $i;?>"><button class="btn btn-info esb1">Next</button></a>
		<?php } 
          include('timer.php');
          include('answer.php');
		?>  
		    
     </div>
    </div>
  </div>
 </div>
</div>


<?php 
include('includes/footer.php');
?>