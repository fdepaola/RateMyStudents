<?php
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'ratemystudents')
		or die(mysqli_error($db));

	$user_email = $_POST['user_email'];
	$user_password = $_POST['user_password'];
	
	$query = $db->prepare("DELETE FROM user WHERE email='$user_email' AND password='$user_password'");
	$query->bindParam(1,$user_email);
	$query->bindParam(2,$user_password);
	$result = $query->execute();

	header("Location: loginView.php");
?>
