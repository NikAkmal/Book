<?php

	session_start();
	$studentID = $_SESSION['studentID'];

	//get value pass from form in bookdescription.php file
	$paid = "no";
	$paymentMethod = "selecting";
	$paymentStatus = "selecting";

	//message 
	$proceed = "Proceed to payment page";
     
	//connect to the database
	$link = mysqli_connect('localhost', 'book', 'book', 'book') or die ("failed to connect database");

	//retrieve orderID based on user ID
	$result = $link->query("SELECT * FROM  bookOrder WHERE studentID = '$studentID' and paid = 'no'");
	while($row = $result->fetch_assoc()):
	$orderID =  $row['orderID'];

	//Insert order into payment table
	$stmt = $link->prepare("insert into payment (studentID, orderID, paymentMethod, paymentStatus) values(?, ?, ?, ?)");
	$stmt->bind_param ("iiss",$studentID, $orderID, $paymentMethod, $paymentStatus);
	$stmt->execute();
	$stmt->close();

	endwhile;
	$link->close();
	echo "<script type='text/javascript'>alert('$proceed');
	window.location = '../book/customerpayment.php';</script>";
?>

