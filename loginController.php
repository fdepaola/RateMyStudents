<?php
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'ratemystudents')
		or die(mysqli_error($db));
		
	$em = $_POST['email'];
	$pw = $_POST['pw'];
	$em = mysqli_real_escape_string($db,trim($em));
	$query = $db->prepare("SELECT user_id, email, password FROM user WHERE email= ? AND password=sha(?)");
	$query->bindParam(1,$em);
	$query->bindParam(2,$pw);
	
	$result = $query->execute();
    $id = ""; 

	while ($row = mysqli_fetch_array($result)) {
		$rowExists = $row['email'];
		$id = $row['user_id']; 
	}
		
	if (!isset($rowExists)) {
		echo "Wrong password/Username combination";
		header("Location: loginView.php");
	}
	else {
		$_SESSION['email'] = "$em";
		$_SESSION['user_id'] = "$id"; 
		header("Location: home.php");
	}
?>
