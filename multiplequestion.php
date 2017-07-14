<?php
include 'lib/Session.php';
Session::checkadminSession();
include('includes/header1.php');
include('includes/menu.php');
   $aid = Session::get('aid');
   $adminId = Session::get('adminId');
?>
<?php 
 if(!isset($_GET['mulq']) && $_GET['mulq']==NULL){
     echo "<script>window.location='admindashboard.php'</script>";
  }else{
     $mulqid = $_GET['mulq'];
  }
  $fgt = $gp->findGroupTokenForAddQues($mulqid);
  if($fgt){
    $val = $fgt->fetch_assoc();
    $gtoken = $val['groupToken'];
  }
  if(($_SERVER['REQUEST_METHOD']=='POST')){
    $msg = $qs->addmulquestion($_POST,$_FILES,$mulqid,$gtoken);
    if(isset($msg)){
       echo "<script>alert('".$msg."')</script>";
    } 
 }
?>
<div class="container bg-light-gray">
 <div class="main-content">
  <div class="featured-content">
   <section>
    <div class="row-fluid">
     <div class="span8 offset3">
        <form action="" method="POST" enctype="multipart/form-data">
          <div class="form-group hgad" style="margin-top: 0px;">
            <label style="margin-right: 56px;">Question Title: </label>
            <!--<input type="text" class="form-control adgrfs" name="mulqtitle" required="1" placeholder="Question Title">-->
            <textarea class="form-control" rows="5"  name="mulqtitle" required="1" placeholder="Question Title" ></textarea>
          </div>
          <div class="form-group hgad form-inline">
            <label style="margin-right: 42px;">Image If Needed: </label>
            <input type="file" class="form-control adgrfs" name="image">
          </div>
          <div class="form-group hgad">
            <label style="margin-right: 70px;">First Option: </label>
            <input type="text" class="form-control adgrfs" name="mulfiop"  placeholder="First Option" required="1">
          </div>
          <div class="form-group hgad">
            <label style="margin-right: 48px;">Second Option: </label>
            <input type="text" class="form-control adgrfs" name="mulsiop" placeholder="Second Option" required="1">
          </div>
          <div class="form-group hgad">
            <label style="margin-right: 65px;">Third Option: </label>
            <input type="text" class="form-control adgrfs" name="multhop" placeholder="Third Option" required="1">
          </div>
          <div class="form-group hgad">
            <label style="margin-right: 54px;">Fourth Option: </label>
            <input type="text" class="form-control adgrfs" name="mulfoop" placeholder="Fourth Option" required="1">
          </div>
          <div class="form-group hgad">
            <label style="margin-right: 43px;">Correct Answer: </label>
            <input type="text" class="form-control adgrfs" name="mulcs" placeholder="Should Be Same Above Any Four Options. Otherwise Not Work." required="1">
          </div>
          <button type="submit" class="btn btn-primary agb">Add Question</button>
      </form>
     </div>
    </div>
    </section>
    <section>
      <div class="row-fluid">
       <div class="span12">
         <h2>Question List: </h2><br>
         <table class="table table-bordered table-striped">
            <thead>
            <tr class="warning">
              <th width="8%">No.</th>
              <th width="12%">Title</th>
              <th width="10%">Image</th>
              <th width="12%">First Option</th>
              <th width="12%">Second Option</th>
              <th width="12%">Third Option</th>
              <th width="12%">Fouth Option</th>
              <th width="12%">Correct Ans.</th>
              <th width="10%">Action</th>
            </tr>
            </thead>
            <tbody>
          <?php
             $smresult = $qs->showmultiplequestion($mulqid);
             if($smresult){
              $i = 0;
               while ($value = $smresult->fetch_assoc()) {
                $i++;
          ?>
            <tr class="info cta">
               <td><?php echo $i;?></td>
               <td><?php echo $value['questionTitle']; ?></td>
               <td><img src="<?php echo $value['image'];?>" height="65" width="65"></td>
               <td><?php echo $value['mulfiop']; ?></td>
               <td><?php echo $value['mulsiop']; ?></td>
               <td><?php echo $value['multhop']; ?></td>
               <td><?php echo $value['mulfoop']; ?></td>
               <td><?php echo $value['mulcs']; ?></td>
               <td><a href="deletemulques.php?demq=<?php echo $value['id']; ?>"><button class="btn btn-primary">Delete</button></a></td>
            </tr>
            <?php } }?>
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