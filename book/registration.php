<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
	<link rel="stylesheet" type="text/css" href="css.css">
</head>
<body>
	<div id="frm">	
		<form action="registrationprocess.php" method="POST" >
			<img src="ExternalImage/umplogo.png" alt="UMP LOGO" >
			<h2>Account Registration</h2>
			<p>
				<label>Name:</label>
				<input type="text" id="user" name="username"	/>
			</p>
			<p>
				<label>Email:</label>
				<input type="text" id="email" name="email"	/>
			</p>
			<p>
				<label>Password:</label>
				<input type="password" id="password" name="password"	/>
			</p>
			<p>
				<label>Phone Number:</label>
				<input type="text" id="phone" name="phone"	/>
			</p>
			<p>
				<label>Address:</label>
				<input type="text" id="address" name="address"	/>
			</p>
			<p>
  				<label for="user">Register as:</label>
  					<select name="user" id="user">
    					<option value="student">Student</option>
						<option value="runner">Runner</option>
  					</select>
  			</p>
			<p>	
				<input type="submit" id="btn" name="Register" value="Register" />
			</p>
		</form>
		<div style="text-align: center; font-size: medium;">
           Already have an account? <a class="register" href="login.php"><u>Login here</u></a>.
		</div>
	</div>

</body>
</html>
