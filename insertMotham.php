<?php 


// var_dump($_POST); die;

function safe_redirect( $url , $msg )
{
	header( "location: $url.php?msg=". $msg, true, 302 );
	die();
}

if(!isset($_POST['name']) OR empty($_POST['name'])) {
	safe_redirect('addMothm' , 'miss');
}
$inputs = filter_input_array( INPUT_POST,  array(
  'name' => FILTER_SANITIZE_STRING,
  'nickname' => FILTER_SANITIZE_STRING,
  'ent7al' => FILTER_SANITIZE_STRING,
  'birthday' => FILTER_SANITIZE_STRING,
  'address' => FILTER_SANITIZE_STRING,
  'job' => FILTER_SANITIZE_STRING,
  'mother_name' => FILTER_SANITIZE_STRING,
  'egra2' => FILTER_SANITIZE_STRING,
  'card_number' => FILTER_SANITIZE_STRING,
  'marks' => FILTER_SANITIZE_STRING,
  'pic' => FILTER_SANITIZE_STRING,
  ));


extract($inputs);
$img_new_name = '';
if(isset($_FILES['pic']['name']) && !empty($_FILES['pic']['name'])) {
	$pic_name = $_FILES['pic']['name'];
    $pic_tmp = $_FILES['pic']['tmp_name'];
    $pic_ex = explode('.', $pic_name);
    $pic_ex = end($pic_ex);
    $img_new_name = md5(md5(date('Y-m-d H:i:s')).$pic_name).'.'.$pic_ex;	
    $move = move_uploaded_file($pic_tmp, "pics/$img_new_name");
}

require 'connection.php';

$insert = $pdo->prepare("INSERT INTO criminals VALUES( '' , ?,?,?,?,?,?,?,?,?,?,?)");
$insert->bindValue(1,$name , PDO::PARAM_STR);
$insert->bindValue(2,$nickname , PDO::PARAM_STR);
$insert->bindValue(3,$ent7al, PDO::PARAM_STR);
$insert->bindValue(4,$birthday , PDO::PARAM_STR);
$insert->bindValue(5,$job , PDO::PARAM_STR);
$insert->bindValue(6,$address , PDO::PARAM_STR);
$insert->bindValue(7,$card_number , PDO::PARAM_STR);
$insert->bindValue(8,$marks , PDO::PARAM_STR);
$insert->bindValue(9,$mother_name , PDO::PARAM_STR);
$insert->bindValue(10,$img_new_name , PDO::PARAM_STR);
$insert->bindValue(11,$egra2, PDO::PARAM_STR);
if($insert->execute()) {
    $array = array();
    $criminal_id = $pdo->lastInsertId();


// echo $cout; die;
    foreach ($_POST['cause_number'] as $key => $value) {
        if(!empty($_POST['cause_number'][$key]) || !empty($_POST['charge_type'][$key])) {
           $cause = $pdo->prepare("INSERT INTO causes VALUES('',? , ? , ?)");
           $cause->bindValue(1,$_POST['cause_number'][$key] , PDO::PARAM_STR);
           $cause->bindValue(2,$_POST['charge_type'][$key] , PDO::PARAM_STR);
           $cause->bindValue(3,$criminal_id,PDO::PARAM_INT);
           $cause->execute();
       }
       
   }
   safe_redirect('addMothm' , 'done');
} else {
  echo "no";
  safe_redirect('addMothm' , 'no');
}
?>