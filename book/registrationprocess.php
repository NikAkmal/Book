<?php

	//get value pass from form in registration.php file
	$username 	= $_POST['username'];
	$email 		= $_POST['email'];
	$password 	= $_POST['password'];
	$phone 		= $_POST['phone'];
	$address 	= $_POST['address'];
	$user 		= $_POST['user'];


	//to prevent mysql injection
	//$username = stripcslashes($username);
	//$password = stripcslashes($password);

	//Error and Success notification
	$error = "user error!!!";
	$regis = "successfully register!!";
     
	//connect to the database
	$link = mysqli_connect('localhost', 'book', 'book', 'book') or die ("failed to connect database");

	//Register Student and Runner into the table database 
	if($user == 'student'){
		$stmt = $link->prepare("insert into student (studentName, studentEmail, studentPhoneNumber, studentPassword, studentAddress) values(?, ?, ?, ?, ?)");
		$stmt->bind_param ("sssss",$username, $email, $phone, $password, $address);
		$stmt->execute();
		echo "<script type='text/javascript'>alert('$regis');
		window.location = '../book/login.php';</script>";
		$stmt->close();
		$link->close();
	}

	if ($user == 'runner'){
		$stmt = $link->prepare("insert into runner (runnerName, runnerEmail, runnerPhoneNumber, runnerPassword, runnerAddress) values(?, ?, ?, ?, ?)");
		$stmt->bind_param ("sssss",$username, $email, $phone, $password, $address);
		$stmt->execute();
		echo "<script type='text/javascript'>alert('$regis');
		window.location = '../book/login.php';</script>";
		$stmt->close();
		$link->close();
	}
		
	else{		
		echo "<script type='text/javascript'>alert('$incorrect');
		window.location = '../book/registration.php';</script>";
	}
?>