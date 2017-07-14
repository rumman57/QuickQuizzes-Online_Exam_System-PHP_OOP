<?php
include 'lib/Session.php';
Session::checkadminSession();
include('includes/header1.php');
include('includes/menu.php');
   $aid = Session::get('aid');
   $adminId = Session::get('adminId');
?>
<?php 
if(($_SERVER['REQUEST_METHOD']=='POST')){
   $msg = $gp->insertgroup($_POST,$aid,$adminId); 
}

?>
<div class="container bg-light-gray">
 <div class="main-content">
 <div class="featured-content">
 <section>
 	<div class="row-fluid">
      <div class="span8 offset3">
         <h2 style="margin-bottom: 5px;">Some Rulus:</h2>
         <p><strong>1. </strong>All field Must Be Fillid Up.</p>
         <p><strong>2. </strong>You Can Set Total Question & You Have Optioned To Show Limitation Question For Exam.</p>
         <p><strong>3. </strong>You Can Set Up,How Long Exam Should Be Running Through Setting The Exam Running Time.</p>
         <p><strong>4. </strong>Exam Running Time & Time Per Question Count Miniutes & Seconds Time Format Respectively.</p>
         <p><strong>5. </strong>Starting Time Format Must Be [YYYY-MM-DD hh:mm:ss] & Time Is 24 Hour Format,If These Condition Is Not True,Exam System Not Work For You.</p>
      </div>
    </div>
 </section>
   
      <div style="margin-bottom: 30px;" class="ruler"></div>

    <div class="row-fluid">
      <div class="span8 offset3">
		<form action="" method="POST">
		  <div class="form-group">
		    <label style="margin-right: 66px;">Group Name: </label>
		    <input type="text" class="form-control adgrfs" name="groupName" required="1">
		  </div>
		  <div class="form-group hgad">
		    <label style="margin-right: 72px;">Exam Name: </label>
		    <input type="text" class="form-control adgrfs" name="examName" required="1">
		  </div>
		  <div class="form-group hgad">
		    <label style="margin-right: 42px;">Total Questions: </label>
		    <input type="number" class="form-control adgrfs" name="totalQuestion"  placeholder="Only Number" required="1">
		  </div>
		  <div class="form-group hgad">
		    <label style="margin-right: 10px;">Questions For Exam: </label>
		    <input type="number" class="form-control adgrfs" name="totalExamShowQues" placeholder="Only Number" required="1">
		  </div>
		  <div class="form-group hgad">
		    <label style="margin-right: 14px;">Exam Running Time: </label>
		    <input type="number" class="form-control adgrfs" name="examRunningTime" placeholder="Minutes For Exam Running Time" required="1">
		  </div>
		  <div class="form-group hgad">
		    <label style="margin-right: 22px;">Time Per Question: </label>
		    <input type="number" class="form-control adgrfs" name="eachQuestionTime" placeholder="Seconds For Per Time Question" required="1">
		  </div>
		  <div class="form-group hgad">
		    <label style="margin-right: 58px;">Starting Time: </label>
		    <input type="text" class="form-control adgrfs" name="startingTime" placeholder="Format: 2017-01-27 07:18:01 [Time:24 Hour Format]" required="1">
		  </div>
		  <button type="submit" class="btn btn-primary agb">Add Group</button>
		</form>
	 </div>
    </div>
     <section>
			<?php
               if(isset($msg)) { ?>
				<div style="text-align: center;background:#4CAF50;padding: 10px; width: 400px;margin-left: 480px;border-radius: 7px;color:#fff;">
                      <?php
                      $len = strlen($msg);
                      if($len !=24)
                       echo '<h4><i>'.$msg.'</i><h4>'; 
                      else
                      	echo "<script>
                         alert('Group Added Successfully');
                         window.location='admindashboard.php'
                      </script>"
                       ?>
				</div>
				<?php } ?>
	 </section>
  </div>
 </div>
</div>

<?php 
include('includes/footer.php');
?>