<?php
include 'lib/Session.php';
Session::checkuserSession();
include 'lib/Database.php';
$db = new Database();
?>
<?php
if(!empty($_REQUEST['valsave'])){
    $valsave = $_REQUEST['valsave'];
    $id = $_REQUEST['qid'];
}
 array_push($_SESSION['answers'], $valsave);
 array_push($_SESSION['quid'], $id);
  

?>