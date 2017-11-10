<!DOCTYPE html>
<html lang="en">
<head>
<title>Register</title>
</head>
<body>

<form action="/landslide/php/helper-functions/add-dev.php" method="post">
	<label>Developer Name</label>
	<input type="text" name="devName">
	<br>

	<label>Developer Description</label>
	<input type="text" name="devDesc">
	<br>
	<input type="hidden" name="email" value="<?php echo $_REQUEST["email"] ?>">
	<input type="submit" name="register">
</form>

</body>
</html>