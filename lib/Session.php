<?php
  /**
  *Session Class
  **/
  class Session{
       public static function init(){
        session_start();
     }

     public static function set($key, $val){
          $_SESSION[$key] = $val;
     }

     public static function get($key){
          if (isset($_SESSION[$key])) {
           return $_SESSION[$key];
          } else {
           return false;
          }
     }

     public static function checkSession(){
          self::init();
          if (self::get("login")== false) {
           self::destroy();
           //header("Location:login.php");
           echo "<script>window.location = 'login.php'</script>";
          }
     }
     public static function checkadminSession(){
          self::init();
          if (self::get("admin")== false) {
           self::destroy();
           echo "<script>window.location = 'index.php'</script>";
          }
     }
     public static function checkuserSession(){
          self::init();
          if (self::get("user")== false) {
           self::destroy();
           echo "<script>window.location = 'index.php'</script>";
          }
     }
     public static function checkLogin(){
          self::init();
          if (self::get("login")== true) {
           //header("Location:index.php");
           echo "<script>window.location = 'index.php'</script>";

          }
     }
     public static function checkadminLogin(){
          self::init();
          if (self::get("admin")==true) {
           echo "<script>window.location = 'index.php'</script>";
          }
     }
     public static function checkuserLogin(){
          self::init();
          if (self::get("user")==true) {
           echo "<script>window.location = 'index.php'</script>";
          }
     }
     public static function checkadminLogin1(){
          if (self::get("admin")==true) {
           echo "<script>window.location = 'index.php'</script>";
          }
     }
     public static function checkuserLogin1(){
          if (self::get("user")==true) {
           echo "<script>window.location = 'index.php'</script>";
          }
     }

     public static function destroy(){
          session_destroy();
          //header("Location:login.php");
          echo "<script>window.location = 'index.php'</script>";

     }
  }
?>
