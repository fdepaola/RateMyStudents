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
	$student_id	= $_GET['student_id'];	
?>

		<form method="post" action="rateStudentController.php">
			<input type="hidden" name="student_id" value=<? echo "\"$student_id\"" ?>/>
			<table>
				<tr><td>smart</td><td>not smart</td><td><input type="range" name="smart" min="1" max="10" step="1" value="5"/></td><td>smart</td></tr>
				<tr><td>hot</td><td>not hot</td><td><input type="range" name="hot" min="1" max="10" step="1" value="5"/></td><td>hot</td></tr>
				<tr><td>lazy</td><td>not lazy</td><td><input type="range" name="lazy" min="1" max="10" step="1" value="5"/></td><td>lazy</td></tr>
				<tr><td>smelly</td><td>not smelly</td><td><input type="range" name="smelly" min="1" max="10" step="1" value="5"/></td><td>smelly</td></tr>
				<tr><td>integrity</td><td>not integrity</td><td><input type="range" name="integrity" min="1" max="10" step="1" value="5"/></td><td>integrity</td></tr>
			</table>
			<table>
				<tr><td>vote</td><td><input type="checkbox" name="vote" value="checked"/>
				<tr><td>comments</td><td><textarea id="comment" name="comments">Enter your comment here!</textarea>
				<tr><td>submit</td><td><input type="submit" value="submit" /></td></tr>
			</table>
		</form>

			</div>
			<div class="cleaner"></div>
		</div> <!-- end of main -->
		<div id="templatemo_main_bottom"></div>
		<div class="cleaner"></div>
	</div> <!-- end of templatemo wrapper -->
	</div> <!-- end of templatemo body wrapper -->
</body>
</html>


