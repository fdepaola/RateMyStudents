<?php
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'ratemystudents')
		or die(mysqli_error($db));

	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	
	$query = "DELETE FROM user WHERE first_name='$first_name' AND last_name='$last_name'";
	$result = mysqli_query($db, $query) or die(mysqli_error($db));

	header("Location: loginView.php");
?>
