<?php
session_start();
session_destroy();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Log In</title>
	<link rel="stylesheet" type="text/css" href="css.css">
</head>
<body>
	<div id="frm">	
		<form action="loginprocess.php" method="POST">
			<img src="ExternalImage/umplogo.png" alt="UMP LOGO">
			<h2>UMP BOOK DELIVERY SYSTEM</h2>
			<p>
				<label>Username:</label>
				<input type="text" id="user" name="username"	/>
			</p>
			<p>
				<label>Password:</label>
				<input type="password" id="pass" name="password"	/>
			</p>
			<p>
  				<label for="user">Login as:</label>
  					<select name="user" id="user">
    					<option value="student">Student</option>
						<option value="runner">Runner</option>
    					<option value="serviceprovider">Staff</option>
  					</select>
  			</p>
			<p>	
				<input type="submit" id="btn" name="Login" value="Login" />
			</p>
		</form>
		<div style="text-align: center; font-size: medium;">
            Don't have an account? <a class="register" href="registration.php"><u>Register here</u></a>.
		</div>
	</div>

</body>
</html>
