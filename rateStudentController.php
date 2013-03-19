<?php
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'ratemystudents')
		 or die(mysqli_error($db));

	$user_id = $_SESSION['user_id']; 
	$student_id = $_POST['student_id']; 
	$smart = $_POST['smart'];
	$hot = $_POST['hot'];
	$lazy = $_POST['lazy'];
	$smelly = $_POST['smelly'];
	$integrity = $_POST['integrity'];
	$vote = $_POST['vote'] ? 1 : 0;
	$major = $_POST['major'];
	$comments = $_POST['comments'];
	
	$query = "INSERT INTO `ratemystudents`.`reviews` 
		(`user_id`, `student_id`, `smart`, `hot`, `lazy`, `smelly`, `integrity`, `vote`) 
		VALUES ('$user_id', '$student_id', '$smart', '$hot', '$lazy', '$smelly', '$integrity', '$vote')";

	$result = mysqli_query($db, $query) or die(mysqli_error($db));

	header("Location: home.php");
?>
