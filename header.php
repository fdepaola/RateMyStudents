<?php 
if(session_id() == '') {
    session_start();
} 
?>


<div id="templatemo_header">
	<h2>rate my students</h2>
        

        
</div>
	
<div id="templatemo_menu">
	<ul>
        <li><a href="home.php">home</a></li>
        <li><a href="addStudentView.php">add student</a></li>
<?php 
        $user_id = $_SESSION['user_id']; 
        if (is_null($user_id))
        {
                echo "<li><a href=\"loginView.php\">log in</a></li>";
        }
        else
        {
                echo "<li><a href=\"logoutController.php\">log out</a></li>";
        }
?>
        <li><a href="optionsView.php">options</a></li>
        <li><input style="margin-top: 10px; margin-left: 5px;"></li>
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
                echo "You are logged in as: $user_id"; 
        }
        echo "</div>"; 
?>
