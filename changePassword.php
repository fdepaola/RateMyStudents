<?php 
	session_start(); 
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>rate my students</title>
<link href="templatemo_style.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript">
function clearText(field)
{
	if (field.defaultValue == field.value) field.value = '';
	else if (field.value == '') field.value = field.defaultValue;
}
</script>
</head>
<body>
<div id="templatemo_body_wrapper">
<div id="templatemo_wrapper">
		
	<div id="templatemo_header">
		<h2>rate my students</h2>
	</div>
	
	<div id="templatemo_menu">
		<ul>
            <li><a href="home.php">home</a></li>
            <li><a href="addStudent.html">add student</a></li>
            <li><a href="deleteUser.html">delete user</a></li>
            <li><a href="login.html">log in</a></li>
            <li><a href="logoutController.php" class="last">log out</a></li>
		</ul>       
	</div> <!-- end of templatemo_menu -->
	</br></br>
	<?php
	
	$db = mysqli_connect('localhost', 'root', '', 'ratemystudents')
		 or die(mysqli_error($db));
		
	$em = $_SESSION['email'];
	$opw = $_POST['opw'];
	$pw = $_POST['pw'];
	$pw2 = $_POST['pw2'];
	
	$query = "SELECT email FROM user WHERE email = '$em' AND password = SHA('$opw')";
	$result = mysqli_query($db, $query) 
        or die(mysqli_error($db));
		
	while ($row = mysqli_fetch_array($result)) {
		$rowExists = $row['email'];
	}
		
	if(!isset($rowExists) || $pw != $pw2) {
		echo "<b>Password mismatch</b></br></br>";
	    echo "<a href=\"home.php\">Try again</a>";
	}
	else {
		$query = "UPDATE user
					SET password = SHA('$pw') WHERE email = '$em' AND password = SHA('$opw')";
		$result = mysqli_query($db, $query) or die(mysqli_error($db));	
		echo "<b>Password successfully changed.</b></br></br>";
		echo "<a href=\"home.php\">Return home</a>";
	}
?>