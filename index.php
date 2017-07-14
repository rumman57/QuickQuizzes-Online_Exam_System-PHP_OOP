<?php
include 'lib/Session.php';
 Session::init();
include('includes/header.php');
include('includes/header_slider.php');
include('includes/menu.php');
?>
<div class="container bg-light-gray">
        <div class="main-content">
          <div class="featured-heading">
              <h1>QuickQuizzes Is a Professional Online Exam System</h1>
              <h2>Professional Easy-To-Use Online Testing  System</h2>
          </div>
         <!-- <div class="ruler"></div>
         <div class="featured-blocks">
              <div class="row-fluid">
                  <div class="span4">
                      <div class="media">
                        <i class="fw-icon-refresh icon"></i>
                        <div class="media-body">
                          <h1 class="media-heading">Morbi interdum</h1>
                          <p>Suspendisse mauris. Fusce accumsan mollis eros. Pellentesque a diam sit amet mi ullamcorper vehicula. Integer adipiscing risus a sem.</p>
                         
                        <div class="readmore">
                        <a href="#">Read more <i class="fw-icon-chevron-right"></i> </a>
                        </div>
                       
                        </div>
                      </div>

                      
                  </div>
                  <div class="span4">
                      <div class="media">
                        <i class="fw-icon-headphones icon"></i>
                        <div class="media-body">
                          <h1 class="media-heading">Vivamus molestie</h1>
                          <p>Cinspendisse mauris. Fusce accumsan mollis eros. Pellentesque a diam sit amet mi ullamcorper vehicula. Integer adipiscing risus a sem</p>
                          <div class="readmore">
                        <a href="#">Read more <i class="fw-icon-chevron-right"></i> </a>
                        </div>
                        </div>
                      </div>
                  </div>
                  <div class="span4">
                      <div class="media">
                        <i class="fw-icon-repeat icon"></i>
                        <div class="media-body">
                          <h1 class="media-heading">Fusce lobortis </h1>
                          <p>Jovispendisse mauris. Fusce accumsan mollis eros. Pellentesque a diam sit amet mi ullamcorper vehicula. Integer adipiscing risus a sem</p>
                          <div class="readmore">
                        <a href="#">Read more <i class="fw-icon-chevron-right"></i> </a>
                        </div>
                        </div>
                      </div>
                  </div>
              </div>
          </div> -->
          <div class="ruler"></div>
          <div class="tabs">
              <ul id="myTabContent" class="nav nav-tabs">
                <li class="active"><a href="#vestibuluco" data-toggle="tab">Log In(Test Takers)</a></li>
                <li class=""><a href="#loginadmin" data-toggle="tab">Log In(Administrators)</a></li>
                <li class=""><a href="#fuscelobin" data-toggle="tab">Registers(Test Takers)</a></li>
                <li class=""><a href="#praesentplac" data-toggle="tab">Registers(Administrators)</a></li>
              </ul>
              <div id="myTabContent" class="tab-content">
                <div class="tab-pane fade active in" id="vestibuluco">
                      <div class="media">
                        <img src="img/loginy.jpg" class="spacing-r" alt="">
                        <div class="media-body">
                          <h1 class="media-heading ruler-bottom">Log In For Test Takers</h1>
                          <p style="font-size: 16px;">If you participate any online exam group or community for exam , you should login this form to take them.</p>
                          <div class="readmore">
                        <a href="login.php">Log In<i class="fw-icon-chevron-right"></i></a>
                        </div>
                        </div>
                      </div>  
                  </div>
                  <div class="tab-pane fade" id="loginadmin">
                          <div class="media">
                          <img src="img/aloginy1.jpg" class="spacing-r" alt="">
                            <div class="media-body">
                              <h1 class="media-heading ruler-bottom">Log In For Administration</h1>
                              <p style="font-size: 16px;">If you want to take any tests or create any groups on community for taking the exam, You should login here to take them.</p>
                              <div class="readmore">
                            <a href="login_twice.php">Log In<i class="fw-icon-chevron-right"></i> </a>
                            </div>
                            </div>
                        </div>
                  </div>
                  <div class="tab-pane fade" id="fuscelobin">
                          <div class="media">
                          <img src="img/registery.jpg" class="spacing-r" alt="">
                            <div class="media-body">
                              <h1 class="media-heading ruler-bottom">Registration Form For Test Takers</h1>
                              <p style="font-size: 16px;">If you participate any online exam group or community for exam , you should have first registered this form to take them.</p>
                              <div class="readmore">
                            <a href="register_one.php">Register<i class="fw-icon-chevron-right"></i> </a>
                            </div>
                            </div>
                        </div>
                  </div>
                  <div class="tab-pane fade" id="praesentplac">
                          <div class="media">
                        <img src="img/registery2.jpg" class="spacing-r" alt="">
                            <div class="media-body">
                              <h1 class="media-heading ruler-bottom">Registration Form For Administrations</h1>
                              <p style="font-size: 16px;">If you want to take any tests or create any groups on community for taking the exam, You should have first registered here to take them.</p>
                              <div class="readmore">
                            <a href="register_twice.php">Register<i class="fw-icon-chevron-right"></i> </a>
                            </div>
                            </div>
                          </div>
                  </div>
              </div>
          </div>
        <div class="featured-content">
            <div class="row-fluid">
                <div class="span4">
                    <div class="block">
                        <div class="block-title">
                            <h1>Create Custom Tests & Exams Online </h1>
                        </div>
                        <div class="block-content">
                            <p>You can fully customized your online exam system for your candidate & also Candidate has a user friendly environment for their requirements.</p>
                            <ul>
                                <li><i class="fw-icon-check"></i>Secure & private</li>
                                <li><i class="fw-icon-check"></i>Easy to define Test settings</li>
                                <li><i class="fw-icon-check"></i>No software installations required</li>
                                <li><i class="fw-icon-check"></i>Create Assistants to help manage your account</li>
                                <li><i class="fw-icon-check"></i>Results automatically graded & viewable in real time</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="span4">
                    <div class="block">
                        <div class="block-title">
                            <h1>About System</h1>
                        </div>
                        <div class="block-content">
                            <p style="text-align: justify;">This Online Examination System(OES) is a Multiple Choice Questions(MCQ) based examination system that provides an easy to use environment for both Test Conducters and Students appearing for Examination. The main objective of this OES is to provide all the features that an Examination System must have, with the "interfaces that doesn't Scare it's Users!".</p>                           
                        </div>
                    </div>
                </div>
                <div class="span4">
                    <div class="block">
                        <div class="block-title">
                            <h1>Gallery Zone</h1>
                        </div>
                        <div class="block-content">
                            <div class="row-fluid">
                              <ul class="gallery">
                                <li>
                                  <a href="#" >
                                    <img src="img/img2.jpg" alt="">
                                  </a>
                                </li>
                                <li>
                                  <a href="#" >
                                    <img src="img/img2.jpg" alt="">
                                  </a>
                                </li>
                                <li>
                                  <a href="#" >
                                    <img src="img/img2.jpg" alt="">
                                  </a>
                                </li>
                                <li>
                                  <a href="#" >
                                    <img src="img/img2.jpg" alt="">
                                  </a>
                                </li>
                                <li>
                                  <a href="#" >
                                    <img src="img/img2.jpg" alt="">
                                  </a>
                                </li>
                                <li>
                                  <a href="#">
                                    <img src="img/img2.jpg" alt="">                 
                                  </a>
                                </li>
                                <li>
                                  <a href="#">
                                   <img src="img/img2.jpg" alt="">
                                  </a>
                                </li>
                                <li>
                                  <a href="#">
                                    <img src="img/img2.jpg" alt="">
                                  </a>
                                </li>
                                <li>
                                  <a href="#" >
                                    <img src="img/img2.jpg" alt="">
                                  </a>
                                </li>
                                <li>
                                  <a href="#">
                                    <img src="img/img2.jpg" alt="">                 
                                  </a>
                                </li>
                                <li>
                                  <a href="#">
                                   <img src="img/img2.jpg" alt="">
                                  </a>
                                </li>
                                <li>
                                  <a href="#">
                                    <img src="img/img2.jpg" alt="">
                                  </a>
                                </li>
                              </ul>
                          </div>
                        </div>
                    </div>
                </div>
             </div>
        </div>      
    </div>
</div>
<?php
include('includes/footer.php');
?>