<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
  <title>Logout</title>
  </head>
  <body>
  <?php
			session_start();
						session_destroy();
						unset($_SESSION['email']);
						   header("Location: loginAfterLogout.html");
?>
</body>
</html>
  
  
  