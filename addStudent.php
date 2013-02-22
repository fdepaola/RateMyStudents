<html>
	<body>
	<div id="menubar">

        <!-- put class="tab_selected" in the li tag for the selected page - to highlight which page you're on -->
        <a href="addUser.php">Create Account</a>
        <a href="login.html">Login</a>
        <a href="addStudent.php">Mike's functionality</a>
        <a href="Sam's functionality">Sam's functionality</a>
		<a href="Moe's functionality">Moe's functionality</a>
		<a href="logout.php">Logout</a>

      </div>
		<form method = "post" action = "addStudent2.php">
			<table>
				<tr><td>first name:</td><td><input type="text" id="firstname" name="firstname" /></td></tr>
				<tr><td>last name:</td><td><input type="text" id="lastname" name="lastname" /></td></tr>
				<tr><td>major</td><td><input type="text" id="major" name="major" /></td></tr>
				<tr><td><input type="submit" value="submit a student" /></td></tr>
			</table>
		</form>
	</body>
</html>
