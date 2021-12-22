<?php

	session_start();
	$libraryID = $_SESSION['libraryID'];

	//get value pass from form in customercart.php file
	$libraryStaffName   			= $_POST['updateName'];
	$libraryStaffEmail   			= $_POST['updateEmail'];
	$libraryStaffPhoneNumber   		= $_POST['updatePhone'];
	$libraryStaffPassword   		= $_POST['updatePassword'];
	$libraryStaffAddress   			= $_POST['updateAddress'];

	//Error Email and Password 
	$success	= "Information Updated!!";
	$failed 	= "Information Update Failed!!";
     
	//connect to the database
	$link = mysqli_connect('localhost', 'book', 'book', 'book') or die ("failed to connect database");

	// SQL TO UPDATE CUSTOMER STATUS
	$sql = "UPDATE library SET libraryStaffName='$libraryStaffName', libraryStaffEmail='$libraryStaffEmail', libraryStaffPhoneNumber='$libraryStaffPhoneNumber', libraryStaffPassword='$libraryStaffPassword', libraryStaffAddress='$libraryStaffAddress' WHERE libraryID=$libraryID ";

	if ($link->query($sql) === TRUE) {
	echo "<script type='text/javascript'>alert('$success');
	window.location = '../book/serviceprovideraccount.php';</script>";

	} 
	else {
	echo "<script type='text/javascript'>alert('$failed');
	window.location = '../book/serviceprovideraccount.php';</script>";
	}

?>