<html>
	<body>
		<?php
			$db = mysqli_connect('localhost', 'root', '', 'ratemystudents')
				or die ("ERROR: connecting to mysql server");

			$firstname = $_POST['firstname'];
			$lastname = $_POST['lastname'];
			$major = $_POST['major'];
			
			$query = "INSERT INTO student(last_name, first_name, major) 
				VALUES ('" . $lastname . "', '" . $firstname . "', '" . $major . "')";

			echo $query . " ";

			$result = mysqli_query($db, $query)
				or die("Error Querying Database");
		?>
	</body>
</html>	
