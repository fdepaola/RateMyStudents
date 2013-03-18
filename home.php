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
				<b> Update password </b>
				<form method="post" action="changePassword.php">
					<table>
						<tr><td>Current Password:</td><td><input type="password" id="opw" name="opw" /></td></tr>
						<tr><td>Choose new Password:</td><td><input type="password" id="pw" name="pw" /></td></tr>
						<tr><td>Re-type new Password:</td><td><input type="password" id="pw2" name="pw2" /></td></tr>
						<tr><td><input type="submit" value="change" /></td></tr>
					</table>
				</form>
				<?php 
					echo "Note: one cannot actually rate students yet.";
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
