<?php
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'ratemystudents')
		 or die(mysqli_error($db));
		
	$em = $_POST['email'];
	$pw = $_POST['pw'];
	$pw2 = $_POST['pw2'];
	
	if($pw != $pw2) {
		echo "Password mismatch</br></br>";
	    echo "<a href=\"forgotPassword.html\">Try again</a>";
	}
	else {
		$query = "UPDATE user (password) 
					VALUES (SHA('$pw'))" WHERE email = '$em';
		$result = mysqli_query($db, $query) or die(mysqli_error($db));	
		$_SESSION['email'] = "$em";
		header("Location: home.php");
	}
?>
