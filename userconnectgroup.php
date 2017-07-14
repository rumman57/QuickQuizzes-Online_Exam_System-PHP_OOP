<?php
include 'lib/Session.php';
Session::checkuserSession();
include('includes/header1.php');
include('includes/menu.php');
   $userid = Session::get('uid');
?>
<?php 
if(($_SERVER['REQUEST_METHOD']=='POST')){
   $msg = $us->insertusertoconnegrp($_POST,$userid); 
}

?>
<div class="container bg-light-gray">
 <div class="main-content">
 <div class="featured-content">
 <section>
 	<div class="row-fluid">
      <div class="span8 offset3">
         <h2 style="margin-bottom: 5px;">Some Rules:</h2>
         <p style="margin-top: 10px;"><strong>1. </strong>All field Must Be Fillid Up.</p>
         <p><strong>2. </strong>You Must Provide a Group Id and Instractor Id.</p>
      </div>
    </div>
 </section>
   
      <div style="margin-bottom: 30px;" class="ruler"></div>

    <div class="row-fluid">
      <div class="span8 offset3">
		<form action="" method="POST">
		  <div class="form-group">
		    <label style="margin-right: 64px;">Group Token: </label>
		    <input type="text" class="form-control adgrfs" name="gtoken" required="1">
		  </div>
		  <div class="form-group hgad">
		    <label style="margin-right: 72px;">Instructor Id</label>
		    <input type="text" class="form-control adgrfs" name="insid" required="1">
		  </div>
		  <div class="form-group hgad">
		    <label style="margin-right: 119px;">Name</label>
		    <input type="text" class="form-control adgrfs" name="name"  placeholder="Full Name" required="1">
		  </div>
		  <div class="form-group hgad">
		    <label style="margin-right: 104px;">Roll No.</label>
		    <input type="text" class="form-control adgrfs" name="roll" placeholder="Roll Number" required="1">
		  </div>
		  <div class="form-group hgad">
		    <label style="margin-right: 121px;">Email</label>
		    <input type="text" class="form-control adgrfs" name="email" placeholder="Email Id">
		  </div>
		  <div class="form-group hgad">
		    <label style="margin-right: 76px;">Department</label>
		    <input type="text" class="form-control adgrfs" name="dept" placeholder="Department Name">
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
                      if($len !=28)
                      echo '<h4><i>'.$msg.'</i><h4>'; 
                      else
                      	echo "<script>
                         alert('Group Connected Successfully');
                         window.location='userdashboard.php'
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