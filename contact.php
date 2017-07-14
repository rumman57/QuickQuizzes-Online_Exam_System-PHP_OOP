<?php
include 'lib/Session.php';
 Session::init();
include('includes/header1.php');
include('includes/menu.php');
?>
<div style="width: 100%;">
	 <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d468364.2115417723!2d88.75748308578926!3d23.493072955720667!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39fedc0492c838a3%3A0xf9deab2812a1b7cc!2sJhenaidah+District!5e0!3m2!1sen!2sbd!4v1487347037441" height="300" width="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
</div>
<div style="margin-top: -4px;" class="container bg-light-gray">
 <div class="main-content">
  <div class="featured-content">
     <div class="row-fluid">
     <div class="span8 offset3">
       <h2 style="margin-bottom: 20px;">Contact With QuickQuizzes</h2>
  <?php
  if(($_SERVER['REQUEST_METHOD']=='POST')){
    $msg = $us->contactus($_POST);
}
  ?>
         <form action="" method="POST">
          <div class="form-group hgad" style="margin-top: 0px;">
            <label style="margin-right: 56px;">Your Name: </label>
            <input type="text" class="form-control adgrfs" name="name" required="1" placeholder="Your Name Please">
          </div>
          <div class="form-group hgad">
            <label style="margin-right: 56px;">Your Email: </label>
            <input type="text" class="form-control adgrfs" name="email"  placeholder="your Email Please" required="1">
          </div>
          <div class="form-group hgad">
            <label style="margin-right: 40px;">Your Subject: </label>
            <input type="text" class="form-control adgrfs" name="subject" placeholder="Subject Please" required="1">
          </div>
          <div class="form-group hgad">
            <label style="margin-right: 65px;">Your Message: </label>
           <textarea name="body" class="form-control" rows="10" placeholder="Message Please"></textarea>
          </div>
          <button type="submit" class="btn btn-info esb1">Send Message</button>
      </form>
       <?php 
        if(isset($msg)){
         echo $msg;
       } ?>
     </div>
    </div>
   </div>
  </div>
</div>

<?php
include('includes/footer.php');
?>