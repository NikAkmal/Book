<?php

	session_start();
	$studentID = $_SESSION['studentID'];

	//get value pass from form in customercart.php file
	$orderID   			= $_POST['orderID'];

	//Error Email and Password 
	$success	= "Order Received!!";
	$failed 	= "Update Failed!!";
     
	//connect to the database
	$link = mysqli_connect('localhost', 'book', 'book', 'book') or die ("failed to connect database");

	// SQL TO UPDATE CUSTOMER STATUS
	$sql = "UPDATE tracking SET customerStatus='Received' WHERE orderID=$orderID ";
	if ($link->query($sql) === TRUE) {
	echo "<script type='text/javascript'>alert('$success');
	window.location = '../book/customertracking.php';</script>";

	} 
	else {
	echo "<script type='text/javascript'>alert('$failed');
	window.location = '../book/customertracking.php';</script>";
	}

?>