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
			</tr>";
	$query = "SELECT * FROM student ORDER BY last_name";
	$result = mysqli_query($db, $query)
		or die(mysqli_error($db));
	while($row = mysqli_fetch_array($result)) 
	{
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
	} 
	echo "</table>";
		mysqli_close($db);
?>
