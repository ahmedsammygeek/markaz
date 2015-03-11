<?php 

function safe_redirect( $url , $msg )
{
	header( "location: $url.php?msg=". $msg, true, 302 );
	die();
}

// echo "sds";
if(isset($_GET['id'])) {
	$id = $_GET['id'];
	require 'connection.php';
	$query = $pdo->prepare("DELETE  FROM system_users WHERE id = ? ");
	$query->bindValue(1,$id , PDO::PARAM_INT);
	if($query->execute()) {
		safe_redirect('members' , 'done');
	} else {
		echo "no";
		safe_redirect('members' , 'no');
	}
}

else {
	header("Location: members.php");
	die();
}


?>