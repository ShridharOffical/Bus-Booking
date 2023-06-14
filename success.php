<?php
  require_once 'db_scripts/Send_form_data.php';
  require_once 'db_scripts/send_seats.php';

  
?>

<!DOCTYPE html>
<html>
  <head>
  </head>
    <style>
      body {
        text-align: center;
        
        background: #EBF0F5;
      }
        h1 {
          color: #88B04B;
          font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
          font-weight: 900;
          font-size: 40px;
          margin-bottom: 10px;
        }
        p {
          color: #404F5E;
          font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
          font-size:20px;
          margin: 0;
        }
      i {
        color: #9ABC66;
        font-size: 100px;
        line-height: 200px;
        margin-left:-15px;
      }
      .card {
        background: white;
        padding: 40px;
        border-radius: 4px;
        box-shadow: 0 2px 3px #C8D0D8;
        display: inline-block;
        margin: 0 auto;
      }
      .homepage{
  background-color: rgba(133, 28, 14, 0.61);
  width: 200px;
  font-weight: bolder;
  height: 45px;
  font-size: 18px;
  margin-top: 5px;
  color: rgb(12, 12, 12);
  cursor: pointer;
  justify-content: center;
  border-radius: 17px;
  text-decoration: none;

      }
    </style>
    <body>
      <div class="card">
      <div style="border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;">
        <i class="checkmark">✓</i>
      </div>
        <h1> Payment Successful</h1>
        <h2 class="name">Your Name </h2>
        <h2 class="name"> <?php echo $_SESSION['Name'] . "<br>"?></h2>
        <br>
        <h2 class="Email">Your Email</h3>
        <h2 class="name"> <?php echo $_SESSION['Email'] . "<br>"?></h2>
        <br>
        <h2 class="Seat">Your Seats</h2>
        <h2 class="name"> <?php echo $_COOKIE['Seats'] . "<br>"?></h2>
        <br>
        <h2 class="Seat">Route (Short Form)</h2>
        <h2 class="name"> <?php echo $_SESSION['Road'] . "<br>"?></h2>
        <br>
        <h2 class="Seat">Date</h2>
        <h2 class="name"> <?php echo $_SESSION['Date'] . "<br>"?></h2>
        <br>
        <p>Your Ticket Recipt will be printed now.<br/>Thank You for Booking Ticket with Us.</p>
      <a href="index.php"><button class="homepage">Back To Homepage</button></a>
    </div>
    </body>
</html>
 <script>
   print();
 </script>
<?php
  session_destroy();
?>