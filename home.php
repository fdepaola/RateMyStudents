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
		
	<div id="templatemo_header">
		<h2>rate my students</h2>
	</div>
	
	<div id="templatemo_menu">
		<ul>
			<li><a href="home.php">home</a></li>
			<li><a href="addUser.html">add user</a></li>
			<li><a href="addStudent.html">add student</a></li>
			<li><a href="deleteStudent.html">delete student</a></li>
			<li><a href="findStudent.html">find student</a></li>
			<li><a href="rateStudent.html">rate student</a></li>
			<li><a href="logoutController.php" class="last">log out</a></li>
		</ul>       
	</div> <!-- end of templatemo_menu -->

	<div id="templatemo_main">
		<div class="col_w620 float_l">
			<?php 
				require("listStudents.php");
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
