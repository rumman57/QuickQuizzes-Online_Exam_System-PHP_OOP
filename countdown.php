<?php
include 'lib/Session.php';
Session::checkuserSession();
include 'lib/Database.php';
$db = new Database();
?>
<?php
if(!empty($_REQUEST['gid'])){
    $gid = $_REQUEST['gid'];
    $sid = $_REQUEST['stid'];
}
    $query = "SELECT * from maintaindate where gid=? AND sid=?";
    $result = $db->select($query,array('ii'),array(&$gid,&$sid),array());
    if($result){
    	$value = $result->fetch_assoc();
    	$enddate = $value['enddate'];
    }

    $dt = new DateTime('now', new DateTimeZone('Asia/Dhaka'));
    $dt1 = new DateTime($enddate, new DateTimeZone('Asia/Dhaka'));

    $start = $dt->format('H:i:s');
    $end = $dt1->format('H:i:s'); 
    $three = $dt->diff($dt1);
    echo $three->format('%I:%S');
?>