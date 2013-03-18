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
	
		<div id="templatemo_main">
			<div class="col_w620 float_l">

			<?php
				$db = mysqli_connect('localhost', 'root', '', 'ratemystudents')
					or die(mysqli_error($db));
				echo "<table>		
						<tr>
							<th>First name</th>
							<th>Last name</th>
							<th>Smart</th>
							<th>Hot</th>
							<th>Lazy</th>
							<th>Smelly</th>
							<th>Integrity</th>
							<th>Vote</th>
							<th>Major</th>
							<th>Comments</th>
							<th>Rate student</th>
						</tr>";
				$student_id	= $_GET['student_id'];	
				$query = "SELECT * FROM student WHERE student_id=$student_id";
				$result = mysqli_query($db, $query) or die(mysqli_error($db));
				while($row = mysqli_fetch_array($result)) 
				{
					$student_id = $row['student_id'];
					$first_name = $row['first_name'];
					$last_name = $row['last_name'];
					$smart = $row['smart'];
					$hot = $row['hot'];
					$lazy = $row['lazy'];
					$smelly = $row['smelly'];
					$integrity = $row['integrity'];
					$vote = $row['vote'];
					$major = $row['major'];
					$comments = $row['comments'];
					echo "<tr>
							<th>$first_name</th>
							<th>$last_name</th>
							<th>$smart</th>
							<th>$hot</th>
							<th>$lazy</th>
							<th>$smelly</th>
							<th>$integrity</th>
							<th>$vote</th>
							<th>$major</th>
							<th>$comments</th>
						 </tr>";
					echo "</table>";
				} 
			?>

		<form method="post" action="rateStudentController.php">
			<table>
				<tr><td>smart</td><td>not smart<input type="range" name="smart" min="1" max="10" step="1" value="5"/>smart</td></tr>
				<tr><td>hot</td><td>not hot<input type="range" name="hot" min="1" max="10" step="1" value="5"/>hot</td></tr>
				<tr><td>lazy</td><td>not lazy<input type="range" name="lazy" min="1" max="10" step="1" value="5"/>lazy</td></tr>
				<tr><td>smelly</td><td>not smelly<input type="range" name="smelly" min="1" max="10" step="1" value="5"/>smelly</td></tr>
				<tr><td>integrity</td><td>not integrity<input type="range" name="integrity" min="1" max="10" step="1" value="5"/>integrity</td></tr>
				<tr><td>vote</td><td><input type="checkbox" name="vote" value="checked"/>
				<tr><td>comments</td><td><input type="text" name="comments" id="comments"/> 
				<tr><td>submit</td><td><input type="submit" value="submit" /></td></tr>
			</table>
		</form>

			</div>
			<div class="cleaner"></div>
		</div> <!-- end of main -->
		<div id="templatemo_main_bottom"></div>
		<div class="cleaner"></div>
	</div> <!-- end of templatemo wrapper -->
	</div> <!-- end of templatemo body wrapper -->
</body>
</html>


