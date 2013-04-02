<?php
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'ratemystudents')
		 or die(mysqli_error($db));
	
	$query = $db->prepare("INSERT INTO student(`last_name`, `first_name`, `major`) 
		VALUES (?, ?, ?)");
	
	$query->bindparam(1,$lastname);
	$query->bindparam(2,$firstname);
	$query->bindparam(3,$major);
	
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$major = $_POST['major'];
	
	$query->execute();

	$result = mysqli_query($db, $query) or die(mysqli_error($db));

	header("Location: home.php");
?>
