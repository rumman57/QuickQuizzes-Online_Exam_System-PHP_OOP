<?php
include 'lib/Session.php';
Session::checkuserSession();
include('includes/header.php');
include('includes/menu.php');
?>
<?php
   $userid = Session::get('uid');
   $msg = $us->checkuserhasgroup($userid);
   $rows = 0; 
   $tgtq ="";
?>
<?php 
 if(!isset($_GET['resid'],$_GET['regpid'])){
     echo "<script>window.location='admindashboard.php'</script>";
  }else{
     $resid = $_GET['resid'];
     $regpid = $_GET['regpid'];
     $tgtq = $_GET['tgtq'];
  }
?>
<div class="container bg-light-gray">
 <div class="main-content">
  <div class="featured-content">
    <section>
    <div class="row-fluid">
      <div class="span8 offset1 fn">                 
       <?php
            $results = $as->getusersrightanswer($resid,$regpid);
            if($results){
              $rows = mysqli_num_rows($results);       
            } 
        ?>
          <button style="font-weight: bold;font-size: 17px; word-spacing: 12px; padding:10px 0px;" class="btn btn-success btn-block">You Got <?php echo $rows; ?>/<?php echo $tgtq; ?></button><br><br>
      </div>
    </div>
  </section>
   <section>
    <div class="row-fluid">
      <div class="span8 offset1 fn">
         <h3><pre>User's Right Answer</pre></h3>
         <table class="table table-bordered table-striped">
            <thead>
            <tr class="warning">
              <th width="10%">Ques. Id</th>
              <th width="30%">Ques. Title</th>
              <th width="30%">Right Ans.</th>
              <th width="30%">Your Ans.</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $results = $as->getusersrightanswer($resid,$regpid);
            if($results){
              while ($value = $results->fetch_assoc())  {
              ?>
            
            <tr class="info">
              <td><?php echo $value['qid'];?></td>
              <td><?php echo  $value['questionTitle'];?></td>
              <td><?php
                 if(!empty($value['mulcs']))
                  echo $value['mulcs'];
                 else
                  echo $value['tfcs'];
               ?>
              </td>
              <td><?php echo $value['ans'];?></td>
            </tr>
            <?php } } else{ ?>
               <tr>
                 <td colspan="4" style="text-align: center;">No Result</td>
               </tr>
            <?php  } ?>
            </tbody>             
          </table>
      </div>
    </div>
  </section>
  <section>
    <div class="row-fluid">
      <div class="span8 offset1 fn">
         <h3><pre>User's Wrong Answer</pre></h3>
         <table class="table table-bordered table-striped">
            <thead>
            <tr class="warning">
              <th width="10%">Ques. Id</th>
              <th width="30%">Ques. Title</th>
              <th width="30%">Right Ans.</th>
              <th width="30%">Your Ans.</th>
            </tr>
            </thead>
            <tbody>
            <?php 
            $results = $as->getuserswronganswer($resid,$regpid);
            if($results){
              while ($value = $results->fetch_assoc())  {
              ?>           
            <tr class="info">
              <td><?php echo $value['qid'];?></td>
              <td><?php echo  $value['questionTitle'];?></td>
              <td><?php
                 if(!empty($value['mulcs']))
                  echo $value['mulcs'];
                 else
                  echo $value['tfcs'];
               ?>
              </td>
              <td><?php echo $value['ans'];?></td>
            </tr>
            <?php } } else{ ?>
               <tr>
                 <td colspan="4" style="text-align: center;">No Result</td>
               </tr>
            <?php  } ?>
            </tbody>             
          </table>
      </div>
    </div>
  </section>
 </div>
</div>
</div>
<?php 
include('includes/footer.php');
?>