<?php

	session_start();
	$orderID = $_SESSION['orderID'];
	$runnerID = $_SESSION['runnerID'];

	//get value pass from form in runnerHomepage.php file
	//$orderID = $_POST['orderID'];

	//Error Email and Password 
	$success	= "Delivery Accepted!!!";
	$failed 	= "Information Update Failed!!";
     
	//connect to the database
	$link = mysqli_connect('localhost', 'book', 'book', 'book') or die ("failed to connect database");

	// SQL TO UPDATE CUSTOMER STATUS
	$sql = "UPDATE tracking SET runnerStatus = 'Delivering', runnerID = $runnerID WHERE orderID=$orderID ";

	if ($link->query($sql) === TRUE) {
	echo "<script type='text/javascript'>alert('$success');
	window.location = '../book/updatetracking.php';</script>";

	} 
	else {
	echo "<script type='text/javascript'>alert('$failed');
	window.location = '../book/runnerhomepage.php';</script>";
	}

?>