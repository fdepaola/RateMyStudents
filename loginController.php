<?php
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'ratemystudents')
		or die(mysqli_error($db));
		
	$em = $_POST['email'];
	$pw = $_POST['pw'];
	$em = mysqli_real_escape_string($db,trim($em));
	$query = "SELECT email,password FROM user where email='$em' AND password = sha('$pw')";
	
	echo "QUERY $query";

	$result = mysqli_query($db, $query) 
        or die(mysqli_error($db));

	while ($row = mysqli_fetch_array($result)) {
		$rowExists = $row['email'];
  		//$correctPassword = $row['password'];
		echo "$rowExists \n";
	}
		
	if (!isset($rowExists)) {
		echo"Wrong password/Username combination";
		header("Location: login.html");
	}
	
	else {
		$_SESSION['email'] = "$em";
		header("Location: home.html");
	}
?>
