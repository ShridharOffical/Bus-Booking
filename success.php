<?php
  session_start();
  require_once 'db_scripts/Send_form_data.php';
  require_once 'db_scripts/send_seats.php';
?>

<!DOCTYPE html>
<html>
<head>
  <style>
    body {
      text-align: center;
      background: #EBF0F5;
    }

    .receipt {
      max-width: 400px;
      margin: 0 auto;
      background: white;
      padding: 20px;
      border-radius: 4px;
      box-shadow: 0 2px 3px #C8D0D8;
      font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
    }

    .checkmark {
      display: inline-block;
      font-size: 100px;
      color: #9ABC66;
      line-height: 200px;
      margin-bottom: 20px;
    }

    .title {
      color: #88B04B;
      font-size: 30px;
      font-weight: 900;
      margin-bottom: 10px;
    }

    .subtitle {
      color: #404F5E;
      font-size: 18px;
      margin-bottom: 5px;
    }

    .info {
      color: #707070;
      font-size: 16px;
      margin-bottom: 20px;
    }

    .button {
      background-color: #851C0E;
      color: white;
      font-size: 16px;
      border: none;
      border-radius: 17px;
      padding: 10px 30px;
      text-decoration: none;
      margin-top: 20px;
      display: inline-block;
    }
  </style>
</head>
<body>
  <div class="receipt">
    <div class="checkmark">✓</div>
    <h1 class="title">Payment Successful</h1>

    <div class="subtitle">Your Name</div>
    <div class="info"><?php echo $_SESSION['Name']; ?></div>

    <div class="subtitle">Your Email</div>
    <div class="info"><?php echo $_SESSION['Email']; ?></div>

    <div class="subtitle">Your Seats</div>
    <div class="info"><?php echo $_COOKIE['Seats']; ?></div>
    
    <div class="subtitle">Route (Short Form)</div>
    <div class="info"><?php echo $_SESSION['Road']; ?></div>

    <div class="subtitle">Date</div>
    <div class="info"><?php echo $_SESSION['Date']; ?></div>

    <p>Your Ticket Receipt will be printed now.<br>Thank you for booking a ticket with us.</p>
    <a href="index.php" class="button">Back To Homepage</a>
  </div>

  <script>
    window.onload = function() {
      window.print();
    };
  </script>
</body>
</html>

<?php
  session_destroy();
?>
