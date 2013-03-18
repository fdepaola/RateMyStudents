<?php
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'ratemystudents')
		or die(mysqli_error($db));
		
	$em = $_POST['email'];
	$pw = $_POST['pw'];
	$em = mysqli_real_escape_string($db,trim($em));
	$query = "SELECT email, password FROM user WHERE email='$em' AND password=sha('$pw')";
	
	$result = mysqli_query($db, $query) 
        or die(mysqli_error($db));

	while ($row = mysqli_fetch_array($result)) {
		$rowExists = $row['email'];
	}
		
	if (!isset($rowExists)) {
		echo "Wrong password/Username combination";
		header("Location: loginView.php");
	}
	else {
		$_SESSION['email'] = "$em";
		header("Location: home.php");
	}
?>
