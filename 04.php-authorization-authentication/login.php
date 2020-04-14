<?php 
	session_start();

	$_SESSION['user_id'] = 5;

	header('Location: index.php');
?>