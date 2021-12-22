<?php
session_start();
$runnerID = $_SESSION['runnerID'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Runner Account Information</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
      <a href="runnerhomepage.php">UMP BOOK SYSTEM</a>
      <a href="runnerhomepage.php">Delivery Request</a>
      <a href="updatetracking.php">Update Tracking</a>
      <a href="runnermonthselection.php">Report</a>
      <ul class="nav navbar-nav navbar-right">
        <li><a class="active" href="runneraccount.php"><span class="glyphicon glyphicon-user"></span> Account</a></li>
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

    <div>
      <div id="frm">
         <?php 
        //connect to the database
        $link = mysqli_connect('localhost', 'book', 'book', 'book') or die ("failed to connect database");
        $result = $link->query("SELECT * FROM  runner WHERE runnerID = '$runnerID'");
        while($row = $result->fetch_assoc()):
        ?> 
        <form action="runneraccountupdate.php" method="POST" style="text-align:center">
        <p>
        <h3>Account Details</h3>
        </p>

        <table class="center">
          <tr>
            <td><label>Name</label></td>
            <td><input type="text" name="updateName" value="<?=$row['runnerName'];?>"></td>
          </tr>
          <tr>
            <td><label>Email</label></td>
            <td><input type="text" name="updateEmail" value="<?=$row['runnerEmail'];?>"></td>
          </tr>
          <tr>
            <td><label>PhoneNumber</label></td>
            <td><input type="text" name="updatePhone" value="<?=$row['runnerPhoneNumber'];?>"></td>
          </tr>
          <tr>
            <td><label>Password</label></td>
            <td><input type="text" name="updatePassword" value="<?=$row['runnerPassword'];?>"></td>
          </tr>
          <tr>
            <td><label>Address</label></td>
            <td><textarea type="text" name="updateAddress"><?=$row['runnerAddress'];?></textarea></td>
          </tr>
        </table>
        <p>
        <input type="submit" id="btn" name="Update" value="Update" />
        </form>
        <?php endwhile; ?>
        <form action="login.php" style="text-align:center">
          <input type="submit" id="btn" name="Log Out" value="Log Out" />
        </form>
      </div>
    </div>
  </body>
</html>
