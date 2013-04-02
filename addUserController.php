<?php
	session_start();
	include 'dbconnect.php';
		
	$fn = $_POST['firstname'];
	$ln = $_POST['lastname'];
	$em = $_POST['email'];
	$pw = $_POST['pw'];
	$pw2 = $_POST['pw2'];
	$dept = $_POST['dept'];
	
	if($pw != $pw2) 
	{
		echo "Password mismatch</br></br>";
	    echo "<a href=\"loginView.php\">Try again</a>";
	}
	else 
	{
		$query = "SELECT department_id FROM departments WHERE department_name = '$dept'";
		$result = mysqli_query($db, $query) or die(mysqli_error($db));
		$did = ""; 
		if($row = mysqli_fetch_array($result)) 
		{
			$did = $row['department_id'];
		} 
		else 
		{
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
		$result = mysqli_query($db,$query) or die(mysqli_error($db)); 
		$query = "SELECT * FROM user WHERE email = '$em';"; 
		$result = mysqli_query($db, $query) or die(mysqli_error($db));
		$id = "butts"; 
		if($row = mysqli_fetch_array($result)) {
			$id = $row["user_id"]; 
		}
		$_SESSION['email'] = "$em";
		$_SESSION['user_id'] = "$id"; 
		header("Location: home.php");
	}
?>
