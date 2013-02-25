<?php
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'ratemystudents')
		 or die(mysqli_error($db));

	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$major = $_POST['major'];
	
	$query = "INSERT INTO student(`last_name`, `first_name`, `major`) 
		VALUES ('$lastname', '$firstname', '$major')";

	$result = mysqli_query($db, $query) or die(mysqli_error($db));

	header("Location: home.html");
?>
