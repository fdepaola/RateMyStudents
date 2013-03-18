<?php session_start(); ?>

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
			
		<?php require("header.php"); ?>
		
		<h1> Search for a Student </h1>
			<form method="post" action="searchStudents.php">
				<table>
					<tr><td>Name:</td><td><input type="text" id="target" name="target" /></td></tr>
					<tr><td><input type="submit" value="Search!" /></td></tr>
				</table>
			</form>

		<?php
			$db = mysqli_connect('localhost', 'root', '', 'ratemystudents') or die(mysqli_error($db));
			if(isset($_POST['target']))
			{
				$target = $_POST['target'];
			    $query = "SELECT first_name,last_name FROM student WHERE first_name LIKE '%$target%' OR last_name LIKE '%$target%'";  
		   		$result = mysqli_query($db, $query) or die(mysqli_error($db));
				$beenInWhile = 0;
				echo "<table>";
				while($row = mysqli_fetch_array($result)) 
				{
					$beenInWhile = 1;
					$first_name = $row['first_name'];
					$last_name = $row['last_name'];
					$lenF = strlen($first_name);
					echo "<tr>
						<th>$first_name $last_name</th>
			 			</tr>";
				} 
				if($beenInWhile ==0 )
				{
					echo "<tr><th>No match found!</th></tr>";
				}
				echo "</table>";
			}
		?>
		
		</div> <!-- end of main -->
		<div id="templatemo_main_bottom"></div>
		<div class="cleaner"></div>
	</div> <!-- end of templatemo wrapper -->
	</div> <!-- end of templatemo body wrapper -->
</body>
</html>
