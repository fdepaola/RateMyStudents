<?php
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'ratemystudents')
		 or die(mysqli_error($db));
		
	$fn = $_POST['firstname'];
	$ln = $_POST['lastname'];
	$em = $_POST['email'];
	$pw = $_POST['pw'];
	$pw2 = $_POST['pw2'];
	
	if($pw != $pw2) {
		echo "Password mismatch</br></br>";
	    echo "<a href=\"login.html\">Try again</a>";
	}
	else {
		$query = "INSERT INTO user (last_name, first_name, email, password) 
					VALUES ('$ln', '$fn', '$em', SHA('$pw'))";
		$result = mysqli_query($db, $query) or die(mysqli_error($db));	
		$_SESSION['email'] = "$em";
		header("Location: home.php");
	}
?>
