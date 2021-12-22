<?php
	
	session_start();

	//get value pass from form in login.php file
	$username 	= $_POST['username'];
	$password 	= $_POST['password'];
	$user 		= $_POST['user'];

	//to prevent mysql injection
	$username = stripcslashes($username);
	$password = stripcslashes($password);

	//Error Email and Password 
	$incorrect = "The Email or Password is Wrong!!";
     
	//connect to the database
	$link = mysqli_connect('localhost', 'book', 'book', 'book') or die ("failed to connect database");

	//Query the database for Student, Runner and Service Provider (Library Staff)
	if($user == 'student'){
		$result = mysqli_query ($link, "SELECT * FROM student WHERE studentEmail = '$username' AND studentPassword = '$password'") or die ("failed to query database".mysql_error());

		$row = mysqli_fetch_array($result);
		if ($row['studentEmail'] == $username && $row['studentPassword'] == $password){
				$_SESSION['studentID'] = $row['studentID'];
				header("Location:../book/customerhomepage.php");
			}
		else {	
				echo "<script type='text/javascript'>alert('$incorrect');
				window.location = '../book/login.php';</script>";
			}
	}

	if ($user == 'runner') {
			$result = mysqli_query ($link, "SELECT * FROM runner WHERE runnerEmail = '$username' AND runnerPassword = '$password'") or die ("failed to query database".mysql_error());

			$row = mysqli_fetch_array($result);
				if ($row['runnerEmail'] == $username && $row['runnerPassword'] == $password){
				$_SESSION['runnerID'] = $row['runnerID'];
				header("Location:../book/runnerhomepage.php");
			}
		else {
				echo "<script type='text/javascript'>alert('$incorrect');
				window.location = '../book/login.php';</script>";
			}
		}
	

	else{
		if ($user == 'serviceprovider') {
			$result = mysqli_query ($link, "SELECT * FROM library WHERE libraryStaffEmail = '$username' AND libraryStaffPassword = '$password'") or die ("failed to query database".mysql_error());

			$row = mysqli_fetch_array($result);
				if ($row['libraryStaffEmail'] == $username && $row['libraryStaffPassword'] == $password){
				$_SESSION['libraryID'] = $row['libraryID'];
				header("Location:../book/serviceproviderhomepage.php");
			}
		else {
				echo "<script type='text/javascript'>alert('$incorrect');
				window.location = '../book/login.php';</script>";
			}
		}
	}
?>