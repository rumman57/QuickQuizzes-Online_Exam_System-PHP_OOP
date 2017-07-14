<?php
include 'lib/Session.php';
 Session::init();
include('includes/header.php');
include('includes/menu.php');
?>
<div class="container bg-light-gray">
 <div class="main-content">
  <div class="featured-content">
     <div class="row-fluid">
     <div class="span10 offset1 aboutp">
       <h2 style="margin-bottom: 15px;font-size: 30px;">Who Takes The Exam(Administrators):</h2>

        <p><strong>1. First you have to "Log In"  from 'Administrators' tab.</strong></p> 
        <p><strong>2. If you don't have any id,first you have to "Registers" from "Administrators" tab & then 'Log In' from 'Administrators' tab.</strong></p>
        <p><strong>3. When you sign in,you automatically get your registration id. It is also mentioned in the term of instructor id.</strong></p>
        <p><strong>4. Then You have to create exam groups. Here you can  set total questions, Questions you want to show,time per questions etc for the examinees.</strong></p>
        <p><strong>5. Each Group has automatically a group token.</strong></p>
        <p><strong>6. Then you have to set the questions. You can set 'MCQ' or 'True-False' questions.</strong></p>
        <p><strong>7. Notice that,If you don't set the minimum questions,examinees will not able to participate the exam. Minimum questions means,questions you want to show the examinees. Suppose,you want to set the total questions 100 &  want to show 25 questions for your examinees randomly. So,exams will not be start until you set the minimum 25 questions.</strong></p>
        <p><strong>8. For User Connection you have to provide your 'registration id'(Instructor id) & Group token for set up the connection.</strong></p>
        <p><strong>9. Users are connected each group only participate the exams.</strong></p>
        <p><strong>10. You can see examinees details who are connected each group.</strong></p>
        <p><strong>11. You can delete the users from any exam groups if you needed.</strong></p>
        <p><strong>12. You can show the results in each user for each exam groups.</strong></p>
        <p><strong>13. Users can't show the results until you published the exam groups results.</strong></p>
        <p><strong>14. You can create & manage as many exam groups as you need.</strong></p>

         <h2 style="margin-bottom: 15px;font-size: 30px;">Who Participates The Exam(Examinees):</h2>
         
         <p><strong>1. First you have to "Log In"  from 'Test Takes' tab.</strong></p> 
        <p><strong>2. If you don't have any id,first you have to "Registers" from "Test Takers" tab & then 'Log In' from 'Test Takers' tab.</strong></p>
        <p><strong>3. Then you have to connect the group to participate the exams.</strong></p>
        <p><strong>4. To connect the group you need the group id & instructor id for that group.So,please contact you administrators to get the requirements.</strong></p>
        <p><strong>5. After connected any group,you can see when exam will be started.You can participate any time between exam srart & end.</strong></p>
        <p><strong>6. Once you start your exam,you can't participate twice. If you scroll back to home page after starting exam,your exam will be finished & can't longer be available for you.</strong></p>
        <p><strong>7. After successfully finishing your exam,you have to wait to see the result until your admin published that result.</strong></p>



     </div>
    </div>
   </div>
  </div>
</div>
<?php
include('includes/footer.php');
?>