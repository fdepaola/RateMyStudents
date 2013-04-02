<?php
	session_start();
	include 'dbconnect.php';

	$user_id = $_SESSION['user_id']; 

	if (is_null($user_id))
	{
		header("Location: loginView.php");
		exit();
	}
	else 
	{
		$student_id = $_POST['student_id']; 
		$smart = $_POST['smart'];
		$hot = $_POST['hot'];
		$lazy = $_POST['lazy'];
		$smelly = $_POST['smelly'];
		$integrity = $_POST['integrity'];
		$vote = $_POST['vote'] ? 1 : 0;
		$major = $_POST['major'];
		$comments = $_POST['comments'];
		
		$query = "INSERT INTO reviews
			(`user_id`, `student_id`, `smart`, `hot`, `lazy`, `smelly`, `integrity`, `vote`, `comments`) 
			VALUES ('$user_id', '$student_id', '$smart', '$hot', '$lazy', '$smelly', '$integrity', '$vote', '$comments')";

		$result = mysqli_query($db, $query) or die(mysqli_error($db));
		header("Location: home.php");
		exit();
	}
?>
