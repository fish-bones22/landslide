<!DOCTYPE html>
<html>
<head>
	<title>Register Page</title>
</head>
<body>

	<form action="php/helper-functions/add-user.php" method="post">

	<label>Email</label>
	<input type="email" name="email">
	<br>
	<label>Password</label>
	<input type="password" name="password">
	<br>

	<label>Confirm Password</label>
	<input type="password" name="confirmPw">
	<br>

	<label>First Name</label>
	<input type="text" name="fname">
	<br>

	<label>Last Name</label>
	<input type="text" name="lname">
	<br>

	<label>Gender</label>
	<select name="gender">
  		<option value="1">Male</option>
		<option value="2">Female</option>
	</select>
	<br>

	<label>Type</label>
	<select name="type">
  		<option value="1">Client</option>
		<option value="2">Developer</option>
	</select>

	<input type="submit" name="register">
	</form>



</body>

</html>