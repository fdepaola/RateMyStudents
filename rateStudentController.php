<?php
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'ratemystudents')
		 or die(mysqli_error($db));

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
		
		$query = $db->prepare("INSERT INTO `ratemystudents`.`reviews` 
			(`user_id`, `student_id`, `smart`, `hot`, `lazy`, `smelly`, `integrity`, `vote`, `comments`) 
			VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
		$query->bindParam(1,$user_id);
		$query->bindParam(2,$student_id);
		$query->bindParam(3,$smart);
		$query->bindParam(4,$hot);
		$query->bindParam(5,$lazy);
		$query->bindParam(6,$smelly);
		$query->bindParam(7,$integrity);
		$query->bindParam(8,$vote);
		$query->bindParam(9,$comments);
		
		$result = $query->execute();
		header("Location: home.php");
		exit();
	}
?>
