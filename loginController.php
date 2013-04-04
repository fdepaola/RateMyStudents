<?php
	session_start();
	include 'dbconnect.php';
		
	$em = $_POST['email'];
	$pw = $_POST['pw'];
	$em = mysqli_real_escape_string($db,trim($em));
	$pw = mysqli_real_escape_string($db,trim($pw));
	$query = "SELECT user_id, email, password FROM user WHERE email='$em' AND password=sha('$pw')";
	
	$result = mysqli_query($db, $query) 
        or die(mysqli_error($db));
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
