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

	<label>Sex</label>
	<select name="gender">
  		<option value="1">Boeing AH-64 Apache Helicopter</option>
		<option value="2">Others</option>
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