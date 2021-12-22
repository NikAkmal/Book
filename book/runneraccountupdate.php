<?php

	session_start();
	$runnerID = $_SESSION['runnerID'];

	//get value pass from form in customercart.php file
	$runnerName   			= $_POST['updateName'];
	$runnerEmail   			= $_POST['updateEmail'];
	$runnerPhoneNumber   		= $_POST['updatePhone'];
	$runnerPassword   		= $_POST['updatePassword'];
	$runnerAddress   			= $_POST['updateAddress'];

	//Error Email and Password 
	$success	= "Information Updated!!";
	$failed 	= "Information Update Failed!!";
     
	//connect to the database
	$link = mysqli_connect('localhost', 'book', 'book', 'book') or die ("failed to connect database");

	// SQL TO UPDATE CUSTOMER STATUS
	$sql = "UPDATE runner SET runnerName='$runnerName', runnerEmail='$runnerEmail', runnerPhoneNumber='$runnerPhoneNumber', runnerPassword='$runnerPassword', runnerAddress='$runnerAddress' WHERE runnerID=$runnerID ";

	if ($link->query($sql) === TRUE) {
	echo "<script type='text/javascript'>alert('$success');
	window.location = '../book/runneraccount.php';</script>";

	} 
	else {
	echo "<script type='text/javascript'>alert('$failed');
	window.location = '../book/runneraccount.php';</script>";
	}

?>