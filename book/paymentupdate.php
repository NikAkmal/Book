<?php

	session_start();
	$studentID = $_SESSION['studentID'];

	//get value pass from form in bookdescription.php file
	$paid 			= "no";
	$itemLocation 	= "UMP library";
	$runnerStatus 	= "Processing Order";
	$customerStatus = "Not Received Yet";

	//message 
	$proceed = "Proceed to tracking page";
	$failed = "Try Again";
     
	//connect to the database
	$link = mysqli_connect('localhost', 'book', 'book', 'book') or die ("failed to connect database");

	//Updata Book Order Paid Status Hahaha
	$sql = "UPDATE bookOrder SET paid='complete' WHERE studentID='$studentID' AND paid='no'";

	if (mysqli_query($link, $sql)) {

		$sql = "UPDATE payment SET paymentMethod='paypal', paymentStatus='complete' WHERE studentID='$studentID'";
		if (mysqli_query($link, $sql)) {
			//Data Insertion into Tracking Table via Looping 

					$result = $link->query("SELECT * FROM  bookOrder WHERE studentID = '$studentID' and paid = 'complete'");
					while($row = $result->fetch_assoc()):
					$orderID =  $row['orderID'];
					$bookID = $row['bookID'];
					$salary = 5;

					//Insert order into tracking table
					$stmt = $link->prepare("insert into tracking (studentID, bookID, orderID, salary, itemLocation, runnerStatus, customerStatus) values(?, ?, ?, ?, ?, ?, ?)");
					$stmt->bind_param ("iiiisss",$studentID, $bookID, $orderID, $salary, $itemLocation, $runnerStatus, $customerStatus);
					$stmt->execute();
					$stmt->close();
					endwhile;

					$sql = "UPDATE bookOrder SET paid='yes' WHERE studentID='$studentID'";

					if (mysqli_query($link, $sql)) {
						//Data Insertion into Tracking Table via Looping END :D
						echo "<script type='text/javascript'>alert('$proceed');
						window.location = '../book/customertracking.php';</script>";
					}
		}
	} else {
	  	echo "<script type='text/javascript'>alert('$failed');
		window.location = '../book/customerpayment.php';</script>";
	}

	$link->close();

?>


