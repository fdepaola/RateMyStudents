<?php
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'ratemystudents')
		 or die(mysqli_error($db));
	
	$query = $db->prepare("INSERT INTO student(`last_name`, `first_name`, `major`) 
		VALUES (?, ?, ?)");
	
	$query->bindParam(1,$lastname);
	$query->bindParam(2,$firstname);
	$query->bindParam(3,$major);
	
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$major = $_POST['major'];
	
	

	$result = $query->execute();

	header("Location: home.php");
?>
