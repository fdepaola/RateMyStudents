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
		<form method = "post" action = "addUser2.php">
			<table>
				<tr><td>First Name:</td><td><input type="text" id="firstname" name="firstname" /></td></tr>
				<tr><td>Last Name:</td><td><input type="text" id="lastname" name="lastname" /></td></tr>
				<tr><td>E-Mail Address:</td><td><input type="text" id="email" name="email" /></td></tr>
				<tr><td>Choose a Password:</td><td><input type="password" id="pw" name="pw" /></td></tr>
				<tr><td>Re-type Password:</td><td><input type="password" id="pw2" name="pw2" /></td></tr>
				<tr><td><input type="submit" value="Join the Fun!" /></td></tr>
			</table>
		</form>
	</body>
</html>
