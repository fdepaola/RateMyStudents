<html>
<body>
<?php
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'ratemystudents')
		or die ("ERROR: connecting to mysql server");
		
	$em = $_POST['email'];
	$pw = $_POST['pw'];

       

					  $em = mysqli_real_escape_string($db,trim($em));

		  		$query = "SELECT email,password FROM user where email='$em' AND password = sha('$pw')";
				echo "QUERY $query";
				$result = mysqli_query($db, $query) 
                         or die("Error Querying Database ");
			while($row = mysqli_fetch_array($result)) {
			$rowExists = $row['email'];
  			//$correctPassword = $row['password'];
		
			echo "$rowExists \n";
	    }
		if(!isset($rowExists)){
				echo"Wrong password/Username combination";
				header("Location: loginAgain.html");
		}
	
		else{
						$_SESSION['email'] = "$em";
						   header("Location: homepage.php");

						}
						
						

?>
</body>
</html>	
