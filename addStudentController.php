<?php
	session_start();
	include 'dbconnect.php';

	$firstname = mysqli_escape_string($db, $_POST['firstname']);
	$lastname = mysqli_escape_string($db, $_POST['lastname']);
	$major = mysqli_escape_string($db, $_POST['major']);
	
	$query = "INSERT INTO student(`last_name`, `first_name`, `major`) 
		VALUES ('$lastname', '$firstname', '$major')";

	$result = mysqli_query($db, $query) or die(mysqli_error($db));

	header("Location: home.php");
?>
