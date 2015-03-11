<?php 


function safe_redirect( $url , $msg )
{
  header( "location: $url.php?id=". $msg, true, 302 );
  die();
}

$array = '';
if(isset($_POST['id']) && !empty($_POST['id'])) {
$id = $_POST['id'];
  if(!empty($_POST['cause_number']) && !empty($_POST['charge_type'])) {
    require 'connection.php';
    foreach ($_POST['cause_number'] as $key => $value) {
      if(!empty($_POST['cause_number'][$key]) || !empty($_POST['charge_type'][$key])) {
       $cause = $pdo->prepare("INSERT INTO causes VALUES('',? , ? , ?)");
       $cause->bindValue(1,$_POST['cause_number'][$key] , PDO::PARAM_STR);
       $cause->bindValue(2,$_POST['charge_type'][$key] , PDO::PARAM_STR);
       $cause->bindValue(3,$id,PDO::PARAM_INT);
       if($cause->execute()) {
        $array = 'done';
       }
     }

   }
 }
 safe_redirect('new_cause' , "$id&msg=$array");
}
?>