<?php
session_start();
$runnerID = $_SESSION['runnerID'];
?>

<!DOCTYPE html>
<html>
<head>
<title>Update Tracking</title>
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
      <a href="runnerhomepage.php">UMP BOOK SYSTEM</a>
      <a href="runnerhomepage.php">Delivery Request</a>
      <a class="active" href="updatetracking.php">Update Tracking</a>
      <a href="runnermonthselection.php">Report</a>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="runneraccount.php"><span class="glyphicon glyphicon-user"></span> Account</a></li>
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
        <table class="center" >
            <tr class="center">
              <td><label>No</label></td>
              <td><label>Student Contact and Delivery Information</label></td>
              <td><label>Update Tracking</label></td>
            </tr>
        <?php 
          $i = 0;
          //connect to the database
          $link = mysqli_connect('localhost', 'book', 'book', 'book') or die ("failed to connect database");
          $result = $link->query("SELECT * FROM  bookOrder inner join book inner join student inner join tracking WHERE bookOrder.bookID = book.bookID AND bookOrder.studentID = student.studentID AND bookOrder.orderID = tracking.orderID AND bookOrder.paid = 'yes' AND tracking.runnerID = $runnerID");
          while($row = $result->fetch_assoc()):
          ?>  
            <tr>
              <td><label><?php $i=$i+1; echo $i ?></label></td>
            <td><label>
              <div class="w3-content" style="text-align:center">
                <div class="w3-row w3-margin">
                    <div class="w3-twothird w3-container">
                    <h4 style="text-align:left;"> Student Name : <?php echo $row['studentName'] ?></h4>
                    <h4 style="text-align:left"> Student Email : <?php echo $row['studentEmail'] ?></h4>
                    <p>
                    <h4 style="text-align:left">Student Phone Number : <?php echo $row['studentPhoneNumber'] ?></h4>
                    </p>
                    <p>
                    <h4 style="text-align:left">Student Address: <?php echo $row['studentAddress'] ?></h4>
                    
                    </p>
                    </div>                  
                </div>
              </div>
            </label></td>
              <td>
                <form action="updatetrackingprocess.php" method="POST">
                <p>
                Current Delivery Location:
                </p>
                <p>
                <?php $_SESSION['orderID'] = $row['orderID']; ?>              
                <select name="itemLocation" id="itemLocation">
                  <option value="<?=$row['itemLocation'];?>"><?php echo $row['itemLocation'] ?></option>
                  <option value="UMP">UMP library</option>
                  <option value="KK1">KK1</option>
                  <option value="KK2">KK2</option>
                  <option value="KK3">KK3</option>
                  <option value="KK4">KK4</option>
                </select>
                </p>
                <p>
                Delivery Status:
                </p>
                <p>
                <select name="runnerStatus" id="runnerStatus">
                  <option value="<?=$row['runnerStatus'];?>"><?php echo $row['runnerStatus'] ?></option>
                  <option value="Unable to deliver">Unable to deliver</option>
                  <option value="Delivering Postpone">Delivering Postpone</option>
                  <option value="Student is not available">Student is not available</option>
                  <option value="Delivering">Delivering</option>
                  <option value="Delivered">Delivered</option>
                </select>
                </p>
                <p>
                <?php  if( $row['runnerStatus'] != 'Delivered' )  {?>
                <input type="hidden" name="orderID" value="<?=$row['orderID']?>"> 
                <input type="submit" id="btn" name="Update" value="Update" />
            	<?php } ?>
                </p>
                </form>
              </td>
            </tr>
          <?php endwhile; ?>
          </table>
          </form>
        </div>
      </div>
    </section>
</html>
