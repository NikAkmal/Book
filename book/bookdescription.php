<?php 
  
  session_start();
  //get value pass from form in customerhomepage.php file
  $bookID   = $_POST['bookID'];

 ?>

<!DOCTYPE html>
<html>
<head>
    <title>Book Description</title>
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
        <div class="search-container">
          <form action="/action_page.php">
            <input type="text" placeholder="Search.." name="search">
            <button type="submit"><i class="fa fa-search"></i></button>
          </form>
        </div>
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
          $result = $link->query("SELECT * FROM  book WHERE bookID = '$bookID'");
          while($row = $result->fetch_assoc()):
          ?>  
            <div class="w3-content" style="text-align:center">
            <div class="w3-row w3-margin">
              <form action="cartprocess.php" method="POST">
                <div class="w3-third">
                <img src="ExternalImage/<?php echo $row['imageLocation'] ?>.png" style="width:100%;">
                <?php $_SESSION['imageLocation'] = $row['imageLocation']; ?>
                </div>
                <div class="w3-twothird w3-container">
                <h1 style="text-align:left;"><?php echo $row['bookName'] ?></h1>
                <?php $_SESSION['bookName'] = $row['bookName']; ?>
                <h4 style="text-align:left">Book Author: <?php echo $row['bookAuthor'] ?> | <?php echo $row['bookQuantity'] ?> piece available | <?php echo $row['bookRating'] ?> ratings</h4>
                <?php $_SESSION['bookAuthor'] = $row['bookAuthor']; ?>
                <?php $_SESSION['bookQuantity'] = $row['bookQuantity']; ?>
                <?php $_SESSION['bookRating'] = $row['bookRating']; ?>
                <h4 style="text-align:left">RM <?php echo $row['bookPrice'] ?></h4>
                <?php $_SESSION['bookPrice'] = $row['bookPrice']; ?>
                <div class="w3-container w3-light-grey">
                <h3 style="text-align:left;">Book Description</h3>
                </div>
                <h4 style="text-align:left"><?php echo $row['bookDescription'] ?></h4>
                <?php $_SESSION['bookDescription'] = $row['bookDescription']; ?>
                <p>
                  <label for="select">Select:</label>
                    <select name="select" id="select">
                      <option value="purchase">Purchase</option>
                      <option value="borrow">Borrow</option>
                    </select>
                </p>
                <p>
                <input type="hidden" name="bookID" value="<?=$row['bookID']?>"> 
                <input type="submit" id="btn" name="confirm" value="confirm" />
                </p>
                </div>                  
              </form>
            </div>
            </div>
          <?php endwhile; ?>
        </div>
      </div>
    </section>
</html>
