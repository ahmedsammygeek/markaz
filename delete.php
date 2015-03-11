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
	$query = $pdo->prepare("DELETE  FROM criminals WHERE id = ? ");
	$query->bindValue(1,$id , PDO::PARAM_INT);
	if($query->execute()) {
		safe_redirect('Mothms' , 'done');
	} else {
		echo "no";
		safe_redirect('Mothms' , 'no');
	}
}

else {
	header("Location: Mothms.php");
	die();
}


?>