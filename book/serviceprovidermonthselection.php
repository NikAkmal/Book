<?php
session_start();
$libraryID = $_SESSION['libraryID'];
?>

<!DOCTYPE html>
<html>
<head>
<title>Report</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css2.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<style>
  body {
    margin: 0;
    font-size: 28px;
    font-family: Arial, Helvetica, sans-serif;
  }

  .header {
    background-color: #white;
    padding: 30px;
    text-align: center;
  }

  #navbar {
    overflow: hidden;
    background-color: #e9e9e9;
  }

  #navbar a {
    float: left;
    display: block;
    color: black;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    font-size: 17px;
  }

  #navbar a:hover {
    background-color: #ddd;
    color: black;
  }

  #navbar a.active {
    background-color: #4CAF50;
    color: white;
  }

  .content {
    padding: 16px;
  }

  .sticky {
    position: fixed;
    top: 0;
    width: 100%;
  }

  .sticky + .content {
    padding-top: 60px;
  }

  .topnav .search-container button {
    float: right;
    padding: 6px 10px;
    margin-top: 8px;
    margin-right: 16px;
    background: #ddd;
    font-size: 17px;
    border: none;
    cursor: pointer;
  }

  .topnav input[type=text] {
    padding: 6px;
    margin-top: 8px;
    font-size: 17px;
    border: none;
  }

  .topnav .search-container {
    float: left;
  }

  .topnav .search-container button:hover {
    background: #ccc;
  }

  @media screen and (max-width: 600px) {
    .topnav .search-container {
      float: none;
  }

  .topnav a, .topnav input[type=text], .topnav .search-container button {
      float: none;
      display: block;
      text-align: left;
      width: 100%;
      margin: 0;
      padding: 14px;
  }



</style>
</head>
  <body>

    <div class="header">
      <img src="ExternalImage/umplogo.png" alt="UMP LOGO">
    </div>
    <div id="navbar" class="topnav">
      <a href="serviceproviderhomepage.php">UMP BOOK SYSTEM</a>
      <a href="serviceproviderhomepage.php">Order</a>
      <a href="orderhistory.php">Order History</a>
      <a class="active" href="serviceprovidermonthselection.php">Report</a>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="serviceprovideraccount.php"><span class="glyphicon glyphicon-user"></span> Account</a></li>
      </ul>
    </div>

    <div class="content">

    </div>

    <script>
      window.onscroll = function() {myFunction()};

      var navbar = document.getElementById("navbar");
      var sticky = navbar.offsetTop;

      function myFunction() {
        if (window.pageYOffset >= sticky) {
          navbar.classList.add("sticky")
        } 
        else {
          navbar.classList.remove("sticky");
        }
      }
    </script>
  </body>

  <div>
  <form id="frm" action="serviceproviderreport.php" method="POST" >
  	<p>
  	    <label for="month">LIBRARY BOOK SALES</label>	
  	</p>
  	
  	<label>Select month :</label>
	<select name="month" id="selectMonth">
            <option value="1">January</option>
            <option value="2">February</option>
            <option value="3">March</option>
            <option value="4">April</option>
            <option value="5">May</option>
            <option value="6">June</option>
            <option value="7">July</option>
            <option value="8">August</option>
            <option value="9">September</option>
            <option value="10">October</option>
            <option value="12">November</option>
            <option value="12">December</option>
	</select>
  	<p>
  		<input type="submit" value="Submit">
  	</p>
  </form>
</div>
  
</html>
