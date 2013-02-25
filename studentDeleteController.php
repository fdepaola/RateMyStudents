<?php
  $db = mysqli_connect('localhost', 'root', '', 'ratemystudents')
		 or die(mysqli_error($db));

	$name = $_POST['name'];
	
	$query = "DROP * FROM student WHERE name='".$name."'";
	$result = mysqli_query($db, $query) or die(mysqli_error($db));
	
?>
