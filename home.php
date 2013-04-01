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
	<style>
		td,th {
			padding-left: 2em;
		}
	</style>
</head>

<body>
	<div id="templatemo_body_wrapper">
	<div id="templatemo_wrapper">

		<?php require("header.php"); ?>
	
		<div id="templatemo_main">
			<div class="col_w620 float_l" style="text-align: center;">
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
