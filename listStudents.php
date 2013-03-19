<?php
	$db = mysqli_connect('localhost', 'root', '', 'ratemystudents')
		or die(mysqli_error($db));
	echo "<h2>Students</h2>";
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
				<th>Rate student</th>
			</tr>";

	$query = "SELECT s.student_id as student_id, s.first_name as first_name, s.last_name as last_name, 
				COUNT( r.review_id ) AS count, FORMAT(AVG( r.smart ),1) as smart , FORMAT(AVG( r.hot ),1) as hot , 
				FORMAT(AVG( r.lazy ),1) as lazy , FORMAT(AVG( r.smelly ),1) as smelly , 
				FORMAT(AVG( r.integrity ),1) as integrity , SUM( r.vote ) as vote
				FROM student AS s INNER JOIN reviews AS r ON r.student_id = s.student_id GROUP BY student_id;";
	$result = mysqli_query($db, $query)
		or die(mysqli_error($db));
	
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
		echo "<tr>
				<td>$first_name</td>
				<td>$last_name</td>
				<td>$smart</td>
				<td>$hot</td>
				<td>$lazy</td>
				<td>$smelly</td>
				<td>$integrity</td>
				<td>$vote</td>
				<td> <a href=rateStudentView.php?student_id=$student_id>Rate</a> </td>
			 </tr>";
	} 
	
	echo "</table>";
	echo "<h2>Unrated Students</h2>"; 
	$query = "SELECT student_id,first_name,last_name from student where student_id not in (SELECT student_id FROM reviews);";
		echo "<table><tr><th>First name</th><th>Last name</th><th>Rate student</th></tr>"; 
	$result = mysqli_query($db, $query)
		or die(mysqli_error($db));

	while($row = mysqli_fetch_array($result)) 
	{
		$student_id = $row['student_id'];
		$first_name = $row['first_name'];
		$last_name = $row['last_name'];
		echo "<tr><td>$first_name</td><td>$last_name</td><td><a href=rateStudentView.php?student_id=$student_id>Rate</a></td></tr>";
	}
	mysqli_close($db);
?>
