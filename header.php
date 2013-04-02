<?php 
if(session_id() == '') {
    session_start();
} 
?>


<div id="templatemo_header">
	<h2 style="text-align: center;">Rate My Students</h2>
        

        
</div>
	
<div id="templatemo_menu">
	<ul>
        <li><a href="home.php">Home</a></li>
        <li><a href="addStudentView.php">Add Student</a></li>
		<li><a href="searchstudents.php">Search Student</a></li>
<?php 
        $user_id = $_SESSION['user_id']; 
        if (is_null($user_id))
        {
                echo "<li><a href=\"loginView.php\">Log In</a></li>";
        }
        else
        {
                echo "<li><a href=\"logoutController.php\">Log out</a></li>";
        }
?>
        <li><a href="optionsView.php">Options</a></li>
        
	</ul>       
</div>

<?php 
        $user_id = $_SESSION['user_id'];
        echo "<div style='top: -10px'>"; 
        if (is_null($user_id))
        {
                echo "You are not logged in";
        }
        else 
        {
			include 'dbconnect.php';
        		
        		$query = "SELECT * FROM user WHERE user_id = $user_id;"; 
        		$result = mysqli_query($db,$query) or die(mysqli_error($db)); 
        		if($row = mysqli_fetch_array($result)) {
        			$name = $row["first_name"];
        			echo "You are logged in as: $name";
        		} 
        }
        echo "</div>"; 
?>
