<?php
session_start();
$studentID = $_SESSION['studentID'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
      <a href="customerhomepage.php">UMP BOOK SYSTEM</a>
      <a class="active" href="customerhomepage.php">Home</a>
      <a href="customercart.php">Cart</a>
      <a href="customertracking.php">Tracking</a>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="customeraccount.php"><span class="glyphicon glyphicon-user"></span> Account</a></li>
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
    <section>
      <div>
        <div class="w3-row">
        <?php 
          //connect to the database
          $link = mysqli_connect('localhost', 'book', 'book', 'book') or die ("failed to connect database");
          $result = $link->query("SELECT * FROM  book");
          while($row = $result->fetch_assoc()):
          ?>  
            <div class="w3-col l3 s6" style="text-align:center">
            <div class="w3-container">
              <form action="bookdescription.php" method="POST">
                <img src="ExternalImage/<?php echo $row['imageLocation'] ?>.png" style="width:100%;">
                <div>
                <h4 style="text-align:center"><?php echo $row['bookName'] ?></h4>
                <h4 style="text-align:center">RM <?php echo $row['bookPrice'] ?></h4>
                </div>
                <p> 
                <input type="hidden" name="bookID" value="<?=$row['bookID']?>">  
                <input type="submit" id="btn" name="View" value="View" />
                </p>                  
              </form>
            </div>
            </div>
          <?php endwhile; ?>
        </div>
      </div>
    </section>
</html>
