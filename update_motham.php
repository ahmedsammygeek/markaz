<?php 
// var_dump($_POST); die;

require 'connection.php';
function safe_redirect( $url , $msg )
{
	header( "location: $url.php?msg=". $msg, true, 302 );
	die();
}

if(isset($_GET['id']) && !empty($_GET['id'])) {
	$id = $_GET['id'];

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


	foreach ($inputs as  $input) {
		nl2br($input);
	}

	extract($inputs);	
	if(isset($_FILES['pic']['name']) && !empty($_FILES['pic']['name'])) {
		$pic_name = $_FILES['pic']['name'];
		$pic_tmp = $_FILES['pic']['tmp_name'];
		$pic_ex = explode('.', $pic_name);
		$pic_ex = end($pic_ex);
		$img_new_name = md5(md5(date('Y-m-d H:i:s')).$pic_name).'.'.$pic_ex;	
		$move = move_uploaded_file($pic_tmp, "pics/$img_new_name");
	}
	else {
		$query2 = $pdo->prepare(" SELECT * FROM criminals  WHERE id = ? ");
		$query2->bindValue(1,$id , PDO::PARAM_INT);
		$query2->execute();
		// if() {
		// 	echo "ok";
		// }
		// else {
		// 	echo "no";
		// }
		$row = $query2->fetch(PDO::FETCH_OBJ);
		$img_new_name = $row->pic ;
	}

// var_dump($img_new_name); die();


	$query = $pdo->prepare("UPDATE criminals set name =? , nickname = ? , ent7al = ?
		, birthday= ? , job=? , address=? ,  mother_name=? , card_number= ? , egra2=? , marks=? , pic = ?
		WHERE id = ? ");
	$query->bindValue(1,$name , PDO::PARAM_STR);
	$query->bindValue(2,$nickname , PDO::PARAM_STR);
	$query->bindValue(3,$ent7al, PDO::PARAM_STR);
	$query->bindValue(4,$birthday , PDO::PARAM_STR);
	$query->bindValue(5,$job , PDO::PARAM_STR);
	$query->bindValue(6,$address , PDO::PARAM_STR);
	$query->bindValue(8,$card_number , PDO::PARAM_STR);
	$query->bindValue(10,$marks , PDO::PARAM_STR);
	$query->bindValue(7,$mother_name , PDO::PARAM_STR);
	$query->bindValue(11,$img_new_name , PDO::PARAM_STR);
	$query->bindValue(9,$egra2, PDO::PARAM_STR);
	$query->bindValue(12,$id, PDO::PARAM_INT);
	if($query->execute()) {
		$delete = $pdo->prepare("DELETE  FROM causes WHERE criminal_id = ?");
		$delete->bindValue(1,$id,PDO::PARAM_INT);
		// var_dump($delete->execute()); die();
		if($delete->execute()) {

			// echo "done"; die();
			foreach ($_POST['cause_number'] as $key => $value) {
				if(!empty($_POST['cause_number'][$key]) || !empty($_POST['charge_type'][$key])) {
					$cause = $pdo->prepare("INSERT INTO causes VALUES('',? , ? , ?)");
					$cause->bindValue(1,$_POST['cause_number'][$key] , PDO::PARAM_STR);
					$cause->bindValue(2,$_POST['charge_type'][$key] , PDO::PARAM_STR);
					$cause->bindValue(3,$id,PDO::PARAM_INT);
					$cause->execute();
				}

			}
			safe_redirect('addMothm' , 'done');
		}

		
	} else {
		echo "no";
		safe_redirect('addMothm' , 'no');
	}
}
else {
	header("Location: Mothms.php");
	die();
}
?>