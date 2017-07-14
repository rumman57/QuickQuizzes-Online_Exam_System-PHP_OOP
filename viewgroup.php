<?php
include 'lib/Session.php';
Session::checkadminSession();
include('includes/header1.php');
include('includes/menu.php');
   $aid = Session::get('aid');
   $adminId = Session::get('adminId');
?>
<?php 
 if(!isset($_GET['vgid']) && $_GET['vgid']==NULL){
     echo "<script>window.location='admindashboard.php'</script>";
  }else{
     $vgid = $_GET['vgid'];
  }
     $nt = new DateTime('now', new DateTimeZone('Asia/Dhaka'));
     $st =  $nt->format('Y-m-d H:i:s');
  $groupdetails = $gp->getGroupDetailsById($vgid,$aid);
  if($groupdetails){
  	 $value = $groupdetails->fetch_assoc();
     
     $tgtq = $value['totalExamShowQues'];
     $totalsetqs = $qs->totalsetquestionbygroup($vgid);
     $totalext = $value['examRunningTime'];
     $datatime1 = $value['startingTime'];
     $datatime = new DateTime($datatime1, new DateTimeZone('Asia/Dhaka'));
     $dt = new DateTime($datatime1, new DateTimeZone('Asia/Dhaka'));
     $dt1 =  $dt->format('Y-m-d h:i:s a');
     $datatime->add(new DateInterval('P0M0DT0H'.$totalext.'M0S'));
     $newtime =  $datatime->format('Y-m-d h:i:s a');
     $ch="";
     if($st>$newtime){
       $ch="y";
     }

  }
?>
<div class="container bg-light-gray">
 <div class="main-content">
  <div class="featured-content">
   <section>
    <div class="row-fluid">
      <div class="span8 offset1 fn">
        <h2>Some Information: </h2>
        <p style="margin-top: 10px;">1. <strong>Total Questions: </strong><span style="color:#F76E5D;font-weight: bold"><?php echo $value['totalQuestion'];?></span></p>
        <p>2. <strong>Set Question For Exam: </strong><span style="color:#F76E5D;font-weight: bold"><?php echo $value['totalExamShowQues'];?></span></p>
        <p>3. <strong>Total Added Question: </strong><span style="color:#F76E5D;font-weight: bold"><?php if(isset($totalsetqs)) echo $totalsetqs;?></span></p>
        <p>4. <strong>Time For Each Questions: </strong><span style="color:#F76E5D;font-weight: bold"><?php echo $value['eachQuestionTime'];?> Seconds</p></span>
        <p>4. <strong>Exam Will Be Continue: </strong><span style="color:#F76E5D;font-weight: bold"><?php echo $value['examRunningTime'];?> Minutes</p></span>
        <p>5. <strong>Exam Starting Time: </strong><span style="color:#F76E5D;font-weight: bold"><?php echo $dt1;?></p></span>
        <p>5. <strong>Exam Ending Time: </strong><span style="color:#F76E5D;font-weight: bold"><?php echo $newtime;?></p></span>

        <h2>Some Notes</h2>
        <div class = "vgn">
        <p>1. If your "Set Questions For Exam" is not greater or equal the "Total Added Questions", User can't participate to the exam.</p>
        <p>2. You Can't Edit or Add Questions for your group when exam will be running or exam is finished.</p>
        <p>3. When you publish the exam result,user only then will be able to see the result. </p>
        </div>
      </div>
    </div>
    </section>
    <section>
     <div class="row-fluid">
      <div class="span12 ">
        <h3 style="width:500px;"><pre>User Information For This Group:</pre></h3><br>
          <table class="table table-bordered table-striped">
            <thead>
            <tr class="warning">
              <th width="8%">No.</th>
              <th width="27%">Students Name</th>
              <th width="20%">Students Roll</th>
              <th width="15%">Students Email</th>
              <th width="10%">Students Dept</th>
              <th width="10%">Delete</th>
              <th width="10%">Result</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $users = $us->getalluserforagroupbyid($vgid); 
            if($users){
              $i=0;
              while ($value=$users->fetch_assoc()) {
               $i++; 
               $eachsid = $value['student_id'];
               ?>
            <tr class="info">
              <td><?php echo $i;?></td>
              <td><?php if(isset($value['name'])) echo $value['name'];?></td>
              <td><?php if(isset($value['roll'])) echo $value['roll'];?></td>
              <td><?php if(isset($value['email'])) echo $value['email'];?></td>
              <td><?php if(isset($value['department'])) echo $value['department'];?></td>
              <td><a href="deleteuserfmgp.php?urgid=<?php echo $eachsid; ?>"><button class="btn btn-primary">Delete</button></a></td>
              <td><a href="adminresultsheet.php?resid=<?php echo $eachsid;?>&regpid=<?php echo $vgid;?>&tgtq=<?php echo $tgtq;?>"><button class="btn btn-primary">See Result</button></a></td>
            </tr>
            <?php } } ?>
            </tbody>             
          </table>
       </div>
      </div>
    </section>
    <section>
     <div class="row-fluid">
      <div class="span10 offset1 ">
        <h3 style="width: 300px;"><pre>Publish The Result:</pre></h3><br>
         <?php
            if($ch==""){
              echo "<button class='btn btn-primary offset5'>Wait For Finishing Exam</button>";
            }else{ ?>
              <a href="publishresult.php?pgid=<?php echo $vgid; ?>"><button class='btn btn-primary offset5'>Publish Result</button></a>
           <?php }
         ?>
       </div>
      </div>
    </section>
  </div>
 </div>
</div>



<?php 
include('includes/footer.php');
?>