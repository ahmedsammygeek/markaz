<?php 



if(!empty($_POST['name']) && !empty($_POST['password'])) {
	$add = 0;
	$edit = 0;
	$delete = 0;
	$name = $_POST['name'];
	$password = $_POST['password'];

	if(isset($_POST['add'])) {
		$add = 1;
	}

	if(isset($_POST['edit'])) {
		$edit = 1;
	}


	if(isset($_POST['delete'])) {
		$delete = 1;
	}
	require 'connection.php';


$insert = $pdo->prepare("INSERT INTO system_users VALUES('', ?,?,'normal',?,?,?)");
    $insert->bindValue(1,$name , PDO::PARAM_STR);
    $insert->bindValue(2,$password , PDO::PARAM_STR);
    $insert->bindValue(3,$edit, PDO::PARAM_INT);
    $insert->bindValue(4,$add , PDO::PARAM_INT);
    $insert->bindValue(5,$delete , PDO::PARAM_INT);

    
function safe_redirect( $url , $msg )
{
	header( "location: $url.php?msg=". $msg, true, 302 );
	die();
}


    if($insert->execute()) {
     safe_redirect('add_member' , 'done');
    } else {
      echo "no";
     safe_redirect('add_member' , 'no');
    }

}

else {
	header("Location: add_member.php?msg=allmiss");
	die();
}
?>