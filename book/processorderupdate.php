<?php

	session_start();
	$orderID = $_SESSION['orderID'];

	//get value pass from form in serviceproviderhomepage.php file
	//$orderID = $_POST['orderID'];

	//Error Email and Password 
	$success	= "Order Ready!!";
	$failed 	= "Information Update Failed!!";
     
	//connect to the database
	$link = mysqli_connect('localhost', 'book', 'book', 'book') or die ("failed to connect database");

	// SQL TO UPDATE CUSTOMER STATUS
	$sql = "UPDATE tracking SET runnerStatus = 'Waiting for Pickup' WHERE orderID=$orderID ";

	if ($link->query($sql) === TRUE) {
	echo "<script type='text/javascript'>alert('$success');
	window.location = '../book/serviceproviderhomepage.php';</script>";

	} 
	else {
	echo "<script type='text/javascript'>alert('$failed');
	window.location = '../book/serviceproviderhomepage.php';</script>";
	}

?>