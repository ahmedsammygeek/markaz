<?php
session_start();


// var_dump($_POST); die;

if (isset($_POST['submit']) && !empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['old_password']) && !empty($_POST['password_again'])) {


	$username = $_POST['username'];
	$password = $_POST['password'];
	$old_password = $_POST['old_password'];
	$password_again = $_POST['password_again'];
	$id = $_SESSION['user_id'];
	require 'connection.php';
	$query = $pdo->prepare(" SELECT * FROM system_users  WHERE id = ? ");
	$query->bindValue(1,$id , PDO::PARAM_INT);
	$query->execute();
	$count=$query->rowCount();
	$row = $query->fetch(PDO::FETCH_OBJ);

	if($row->password !== $old_password) {
		header('location:editadmin.php?msg=wop');
		die;
	}


	if($password !== $password_again) {
		// new don't match
		header('location:editadmin.php?msg=ndm');
		die;
	}

	
	$query2 = $pdo->prepare(" UPDATE  system_users  set username = ? , password = ? WHERE id = ?");
	$query2->bindValue(1,$username , PDO::PARAM_STR);
	$query2->bindValue(2,$password , PDO::PARAM_STR);
	$query2->bindValue(3,$id , PDO::PARAM_INT);
	$query2->execute();


	$result = $query2->rowCount();


	if ($result) {
		$_SESSION['username'] = $row->username;
		header("location:editadmin.php?msg=successup");
	} else {

		header("location:editadmin.php?msg=failiup");
	}

} else {
	header("location:editadmin.php?empty");
}
?>