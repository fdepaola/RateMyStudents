<?php
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'ratemystudents')
		 or die(mysqli_error($db));

	$smart = $_POST['smart'];
	$hot = $_POST['hot'];
	$lazy = $_POST['lazy'];
	$smelly = $_POST['smelly'];
	$integrity = $_POST['integrity'];
	$vote = $_POST['vote'];
	$major = $_POST['major'];
	$comments = $_POST['comments'];
	
	$query = "INSERT INTO student(`last_name`, `first_name`, `major`) 
		VALUES ('$lastname', '$firstname', '$major')";

	$result = mysqli_query($db, $query) or die(mysqli_error($db));

	header("Location: home.php");
?>
