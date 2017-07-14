<?php
if(!isset($_GET['aid'],$_GET['email']) && $_GET['action']==Null){
     echo "<script>window.location='index.php'</script>";
  }else{
     $aid   = $_GET['aid'];
     $email = $_GET['email'];
  }
 ?>
<!DOCTYPE html>
<html lang="en">
    <head>
		<meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <title>Log In</title>
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/login_register_style.css" />
		<script src="js/login_register_style.css.js"></script>
		<!--[if lte IE 7]><style>.main{display:none;} .support-note .note-ie{display:block;}</style><![endif]-->
    </head>
<?php
include 'classes/Login.php';
$lg = new Login();
if(($_SERVER['REQUEST_METHOD']=='POST')){
   $msg = $lg->adminreset($_POST,$aid,$email);
}

?>
    <body style="background:url('img/bg.jpg') repeat;>
        <div class="container">	
			<header>
			  <div class="title">
				<h1><strong>Admin Reset Form</strong> </h1>
				<p><i>Give Your Password With Matching</i></p>
			  </div>
			</header>
			<section class="main">
				<form class="form-1" action="#" method="POST">
					<p class="field">
						<input type="password" name="password" placeholder="Password" required="1">
						<i class="fw-icon-user icon-large"></i>
					</p>
					<p class="field">
							<input type="password" name="cnpassword" placeholder="Confirm Password" required="1">
							<i class="fw-icon-lock icon-large"></i>
					</p>
					<p class="submit">
						<button type="submit" name="submit"><i class="fw-icon-arrow-right icon-large"></i></button>
					</p>
				</form>
			</section>
			<section>
			<?php
               if(isset($msg)) { ?>
				<div style="text-align: center;background:#4CAF50;padding: 10px; width: 400px;margin-left: 480px;border-radius: 7px;color:#fff;">
					
                      <?php 	echo '<h4><i>'.$msg.'</i><h4>'; ?>
				</div>
				<?php } ?>
			</section>
        </div>
    </body>
</html>