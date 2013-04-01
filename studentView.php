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
							<th>Rate student</th>
						</tr>";
				$student_id	= $_GET['student_id'];	
				$id = $student_id; 
				
				$query = "SELECT s.student_id as student_id, s.first_name as first_name, s.last_name as last_name, 
				COUNT( r.review_id ) AS count, FORMAT(AVG( r.smart ),1) as smart , FORMAT(AVG( r.hot ),1) as hot , 
				FORMAT(AVG( r.lazy ),1) as lazy , FORMAT(AVG( r.smelly ),1) as smelly , 
				FORMAT(AVG( r.integrity ),1) as integrity , SUM( r.vote ) as vote , s.major as major
				FROM student AS s INNER JOIN reviews AS r ON r.student_id = s.student_id WHERE s.student_id = $student_id;";
				
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
							<th> <a href=rateStudentView.php?student_id=$student_id>Rate Student</a> </th>
						 </tr>";
					echo "</table>";
				} 

				$query = "SELECT r.comments as comments FROM reviews r NATURAL JOIN student s WHERE s.student_id = $student_id;";
          		$result = mysqli_query($db, $query) 
            		or die("Error Querying Database");
          		while($row = mysqli_fetch_array($result)) 
          		{
            		$comments = $row['comments'];
            		echo "<table>";
          			echo "<tr><th>$comments</th></tr>";
          			echo "</table>";
        		}                 
?>

			</div>
			<div class="cleaner"></div>
		</div> <!-- end of main -->
		<div id="templatemo_main_bottom"></div>
		<div class="cleaner"></div>
	</div> <!-- end of templatemo wrapper -->
	</div> <!-- end of templatemo body wrapper -->
</body>
</html>


