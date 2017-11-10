<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
</head>
<body>
<div>
	<?php
	session_start();
	if (isset($_SESSION["userid"]))
		session_destroy(); 
	?>
	<form action="php/helper-functions/user-login.php" method="post">
		<label>Email</label>
		<input type="text" name="user_email">
		<label>Password</label>
		<input type="password" name="user_password">
		<input type="submit" name="login">
	</form>
</div>

<a href="register.php">Register here</a>
</body>
</html>