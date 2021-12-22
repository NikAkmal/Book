<?php

	session_start();
	$runnerID = $_SESSION['runnerID'];
	//$orderID = $_SESSION['orderID'];
	// $itemLocation = $_SESSION['itemLocation'];
	// $runnerStatus = $_SESSION['runnerStatus'];
	// $trackingID = $_SESSION['trackingID'];

	//get value pass from form in updatetracking.php file
	$itemLocation 	= $_POST['itemLocation'];
	$runnerStatus 	= $_POST['runnerStatus'];
	$orderID		= $_POST['orderID'];

	echo $runnerID;
	echo $orderID;
	echo $itemLocation;
	echo $runnerStatus;

	//Error Email and Password 
	$success	= "Tracking Updated!!!";
	$failed 	= "Information Update Failed!!";
     
	//connect to the database
	$link = mysqli_connect('localhost', 'book', 'book', 'book') or die ("failed to connect database");

	// SQL TO UPDATE CUSTOMER STATUS
	$sql = "UPDATE tracking SET itemLocation = '$itemLocation', runnerStatus = '$runnerStatus' WHERE orderID=$orderID ";

	if ($link->query($sql) === TRUE) {
	echo "<script type='text/javascript'>alert('$success');
	window.location = '../book/updatetracking.php';</script>";

	} 
	else {
	echo "<script type='text/javascript'>alert('$failed');
	// window.location = '../book/updatetracking.php';</script>";
	}

?>