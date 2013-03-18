<?php
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'ratemystudents')
		or die(mysqli_error($db));

	$user_email = $_POST['user_email'];
	$user_password = $_POST['user_password'];
	
	$query = "DELETE FROM user WHERE email='$user_email' AND password='$user_password'";
	$result = mysqli_query($db, $query) or die(mysqli_error($db));

	header("Location: loginView.php");
?>
