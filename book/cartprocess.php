<?php

	session_start();
	$studentID = $_SESSION['studentID'];

	//get value pass from form in bookdescription.php file
	$select				= $_POST['select'];
	$bookID   			= $_POST['bookID'];
	$imageLocation		= $_SESSION['imageLocation'];
	$bookName			= $_SESSION['bookName'];
	$bookAuthor			= $_SESSION['bookAuthor'];
	$bookQuantity		= $_SESSION['bookQuantity'];
	$bookRating			= $_SESSION['bookRating'];
	$bookPrice			= $_SESSION['bookPrice'];
	$bookDescription	= $_SESSION['bookDescription'];
	$deliveryPrice		= 5.00;
	$quantity 			= 1;	//Default
	$totalOrderPrice	= $bookPrice + 5.00;
	$paid				= "no";

	//message 
	$success	= "Added to cart!!";
	$incorrect 	= "The selection is Wrong!!";
     
	//connect to the database
	$link = mysqli_connect('localhost', 'book', 'book', 'book') or die ("failed to connect database");

	//Insert order into bookorder table

	if($select == 'purchase'){
	$stmt = $link->prepare("insert into bookorder (studentID, bookID, orderSelect, deliveryPrice, quantity, totalOrderPrice, paid) values(?, ?, ?, ?, ?, ?, ?)");
	$stmt->bind_param ("iisdids",$studentID, $bookID, $select, $deliveryPrice, $quantity, $totalOrderPrice, $paid);
	$stmt->execute();
	echo "<script type='text/javascript'>alert('$success');
	window.location = '../book/customerhomepage.php';</script>";
	$stmt->close();
	$link->close();
	}

	if($select == 'borrow'){
	$stmt = $link->prepare("insert into bookorder (studentID, bookID, orderSelect, deliveryPrice, quantity, totalOrderPrice, paid) values(?, ?, ?, ?, ?, ?, ?)");
	$stmt->bind_param ("iisdids",$studentID, $bookID, $select, $deliveryPrice, $quantity, $deliveryPrice, $paid);
	$stmt->execute();
	echo "<script type='text/javascript'>alert('$success');
	window.location = '../book/customerhomepage.php';</script>";
	$stmt->close();
	$link->close();
	}

	else{		
		echo "<script type='text/javascript'>alert('$incorrect');
		window.location = '../book/bookdescription.php';</script>";
	}

?>