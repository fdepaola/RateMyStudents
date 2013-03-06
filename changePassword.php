<?php
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'ratemystudents')
		 or die(mysqli_error($db));
		
	$em = $_SESSION['email'];
	$opw = $_POST['opw'];
	$pw = $_POST['pw'];
	$pw2 = $_POST['pw2'];
	
	if($pw != $pw2) {
		echo "Password mismatch</br></br>";
	    echo "<a href=\"login.html\">Try again</a>";
	}
	else {
		$query = "UPDATE user
					SET password = SHA('$pw') WHERE email = $em" AND password = $opw;
		$result = mysqli_query($db, $query) or die(mysqli_error($db));	
		header("Location: home.php");
	}
?>
