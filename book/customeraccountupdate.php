<?php

	session_start();
	$studentID = $_SESSION['studentID'];

	//get value pass from form in customercart.php file
	$studentName   			= $_POST['updateName'];
	$studentEmail   		= $_POST['updateEmail'];
	$studentPhoneNumber   	= $_POST['updatePhone'];
	$studentPassword   		= $_POST['updatePassword'];
	$studentAddress   		= $_POST['updateAddress'];

	//Error Email and Password 
	$success	= "Information Updated!!";
	$failed 	= "Information Update Failed!!";
     
	//connect to the database
	$link = mysqli_connect('localhost', 'book', 'book', 'book') or die ("failed to connect database");

	// SQL TO UPDATE CUSTOMER STATUS
	$sql = "UPDATE student SET studentName='$studentName', studentEmail='$studentEmail', studentPhoneNumber='$studentPhoneNumber', studentPassword='$studentPassword', studentAddress='$studentAddress' WHERE studentID=$studentID ";

	if ($link->query($sql) === TRUE) {
	echo "<script type='text/javascript'>alert('$success');
	window.location = '../book/customeraccount.php';</script>";

	} 
	else {
	echo "<script type='text/javascript'>alert('$failed');
	window.location = '../book/customeraccount.php';</script>";
	}

?>