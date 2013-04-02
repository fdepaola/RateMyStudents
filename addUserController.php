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
	
	if($pw != $pw2) 
	{
		echo "Password mismatch</br></br>";
	    echo "<a href=\"loginView.php\">Try again</a>";
	}
	else 
	{
		$query = $db->prepare("SELECT department_id FROM departments WHERE department_name = ?");
		$query->bindParam(1,$dept);
		$result = $query->execute();
		$did = ""; 
		if($row = mysqli_fetch_array($result)) 
		{
			$did = $row['department_id'];
		} 
		else 
		{
			$query = $db->prepare("INSERT INTO departments (department_name) VALUES (?)");
			$query-> bindParam(1,$dept);
			$result = $query->execute();
			
			$query = $db->prepare("SELECT department_id FROM departments WHERE department_name = ?");
			$query->bindParam(1,$dept);
			$result = $query->execute();
			while($row = mysqli_fetch_array($result)) 
			{
				$did = $row['department_id'];
			}
		}
		$query = $db->prepare("INSERT INTO user (last_name, first_name, email, password, department_id) 
					VALUES (?, ?, ?, ?, ?)");
		$query->bindParam(1,$ln);
		$query->bindParam(2,$fn);
		$query->bindParam(3,$em);
		$query->bindParam(4,SHA('$pw');
		$query->bindParam(5,$did);
		$result = query->execute(); 
		
		$query = $db->prepare("SELECT * FROM user WHERE email = ?;");
		$query->bindParam(1,$em);
		$result = $query->execute();
		$id = "butts"; 
		if($row = mysqli_fetch_array($result)) {
			$id = $row["user_id"]; 
		}
		$_SESSION['email'] = "$em";
		$_SESSION['user_id'] = "$id"; 
		header("Location: home.php");
	}
?>
