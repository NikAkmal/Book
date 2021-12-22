<?php
session_start();
$studentID = $_SESSION['studentID'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Paypal Payment</title>
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
      <a href="customerhomepage.php">UMP BOOK SYSTEM</a>
      <a href="customerhomepage.php">Home</a>
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

    <div>
      <div id="frm">
        <form style="text-align:center">
        <img src="ExternalImage/paypal.png" alt="PAYPAL LOGO" style="width:50%">
        <p>
        <h3>Payment Details</h3>
        </p>
        <table class="center">
          <tr>
            <th><h3>Order No</h3></th>
            <th><h3>Order ID</h3></th>
            <th><h3>Order Date</h3></th>
            <th><h3>Total Order Price</h3></th>
          </tr>
        <?php
          $i=1;
          $total=0;
          //connect to the database
          $link = mysqli_connect('localhost', 'book', 'book', 'book') or die ("failed to connect database");

          //retrieve orderID based on user ID
          $result = $link->query("SELECT * FROM bookOrder WHERE bookOrder.studentID = '$studentID' and bookOrder.paid = 'no'");
          while($row = $result->fetch_assoc()):
          ?>  
          <tr>
            <td><h3><?=$i?></h3></td>
            <td><h3><?php echo $row['orderID'] ?></h3></td>
            <td><h3><?=$row['orderDate']?></h3></td>
            <td><h3>RM<?php echo $row['totalOrderPrice'] ?></h3></td>
          </tr>

        <?php
        $total=$total+ $row['totalOrderPrice']; 
        $i=$i+1;
        endwhile; 

        ?>

        <?php
        	$usd = $total;
        	$usd /= 4;
        ?>

        </table>
        <p>

        <div id="paypal-payment-button">

        </p>
        </div>
        </form>
      </div>
    </div>

    <script src="https://www.paypal.com/sdk/js?client-id=ATqJoT8uledW83BN2RvdA4o9tptMnGw4EUVlV1na6YHhKgqXEHcJXE8t0EZLGsDr4mybfMJ5nXxL10vQ&disable-funding=credit,card"></script>
    <script>
    	paypal.Buttons({
    style : {
        color: 'blue',
        shape: 'pill'
    },
    createOrder: function (data, actions) {
        return actions.order.create({
            purchase_units : [{
                amount: {
                               value: "<?=$usd?>"
                }
            }]
        });
    },
    onApprove: function (data, actions) {
        return actions.order.capture().then(function (details) {
            console.log(details)
            window.location.replace("../../book/paymentupdate.php")
        })
    },
    onCancel: function (data) {
        //window.location.replace("../../book/paymentupdate.php")
    }
	}).render('#paypal-payment-button');
    </script>

  </body>
</html>
