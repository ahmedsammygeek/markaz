<?php session_start();



$msg='';
if(isset($_POST['submit']) && !empty($_POST['username']) && !empty($_POST['password']) 	){

	$username=$_POST['username'];
	$password=$_POST['password']; 
	
	// $password = md5($password);
	require 'connection.php';

$query = $pdo->prepare(" SELECT * FROM system_users  WHERE username = ? AND password = ?");
$query->bindValue(1,$username , PDO::PARAM_STR);
$query->bindValue(2,$password , PDO::PARAM_STR);
$query->execute();


	$user= $query->fetch(PDO::FETCH_OBJ);
	$count=$query->rowCount();

	// var_dump($query->rowCount()); die;
	if($count==1){
		$_SESSION['username'] = $user->username ;
		$_SESSION['role'] = $user->role ;
		$_SESSION['can_add'] = $user->addP ;
		$_SESSION['can_delete'] = $user->deleteP ;
		$_SESSION['can_edit'] = $user->edit ;
		$_SESSION['logged_in'] = true;
		$_SESSION['user_id'] = $user->id ;
		header("location:index.php");
		die;
	}
	else
	{
		$msg = "fail";
		header("location:login.php?error=".$msg);
		die;
	}
}
else 
{
	$msg = "allneed";
	header("location:login.php?error=".$msg);
	die;	
}

?>