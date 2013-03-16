<?php
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'ratemystudents')
		 or die(mysqli_error($db));
		
	$fn = $_POST['firstname'];
	$ln = $_POST['lastname'];
	$em = $_POST['email'];
	$pw = $_POST['pw'];
	$pw2 = $_POST['pw2'];
	$dept = $_POST['dept'];
	
	if($pw != $pw2) {
		echo "Password mismatch</br></br>";
	    echo "<a href=\"login.html\">Try again</a>";
	}
	else {
		$query = "SELECT department_id FROM departments WHERE department_name = '$dept'";
		$result = mysqli_query($db, $query) or die(mysqli_error($db));
		if($row = mysqli_fetch_array($result)) 
	{
		$did = $row['department_id'];
	} else {
		$query = "INSERT INTO departments (department_name) VALUES ('$dept')";
		$result = mysqli_query($db, $query) or die(mysqli_error($db));
		
		$query = "SELECT department_id FROM departments WHERE department_name = '$dept'";
		$result = mysqli_query($db, $query) or die(mysqli_error($db));
		while($row = mysqli_fetch_array($result)) 
	{
		$did = $row['department_id'];
	}
	}
	
		$query = "INSERT INTO user (last_name, first_name, email, password, department_id) 
					VALUES ('$ln', '$fn', '$em', SHA('$pw'), '$did')";
		$result = mysqli_query($db, $query) or die(mysqli_error($db));
		$_SESSION['email'] = "$em";
		header("Location: home.php");
	}
?>
