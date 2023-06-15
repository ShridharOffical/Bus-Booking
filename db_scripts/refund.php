<?php
require 'getCancelSeats.php';
 //This block of code will stop the users from opening this page directly!
 if ($_SERVER['HTTP_REFERER'] !== 'ex.php') {
  header('Location: ex.php');
  exit;
}
?>
<!DOCTYPE html>
<html>

<head>
  <style>
    body {
      font-family: Arial, sans-serif;
    }

    .container {
      max-width: 600px;
      margin: 0 auto;
      padding: 20px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    h2 {
      text-align: center;
    }

    form {
      margin-top: 20px;
    }

    .form-group {
      margin-bottom: 10px;
    }

    label {
      display: block;
      font-weight: bold;
    }

    input[type="text"] {
      width: 100%;
      padding: 8px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    textarea {
      width: 100%;
      height: 100px;
      padding: 8px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    .submit-btn {
      display: block;
      width: 100%;
      padding: 10px;
      background-color: #4CAF50;
      color: #fff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    .submit-btn:hover {
      background-color: #45a049;
    }
  </style>
</head>

<body>
  <div class="container">
    <h2>Cancel Ticket Refund Process </h2>
    <h6>Plese Enter you UPI ID Payment to refund your Associate bank account.</h6>
    <form action="../admin_pages/sendrefunddata.php" method="post">
      <div class="form-group">
        <label for="upi_id">UPI ID:</label>
        <input type="text" id="upi_id" name="upi_id" required>
      </div>
      <h6>20% amount will be minus  for cancellation fees :</h6>
    
      <?php
      session_start(); // Start the session

      $amount = $_SESSION['amount']; // Retrieve the value from the session variable
      
       $originalAmount = $amount; // Rseplace 100 with the actual original amount
       $cancellationFee = $originalAmount * 0.2; // Calculate 20% of the original amount
       $finalAmount = $originalAmount - $cancellationFee; // Deduct the cancellation fee
       echo "Original Amount: " . $originalAmount . "<br>";
       echo "Cancellation Fee: " . $cancellationFee . "<br>";
       echo "Final Amount after Deducting Cancellation Fee: " . $finalAmount;
        ?>
      <div class="form-group">
        <label for="refund_reason">Reason for cancellation:</label>
        <textarea id="refund_reason" name="refund_reason" required></textarea>
      </div>
      <input type="submit" class="submit-btn" value="Cancel">
    </form>
    <div class="message">
      <p>If refund was not added in your account, please contact us on WhatsApp <a
          href="https://wa.me/918208147136">+918208147136</a>.</p>
    </div>
  </div>
</body>
<script>
    // Disable browser's back button
    window.history.pushState(null, '', location.href);
    window.addEventListener('popstate', function () {
        window.history.pushState(null, '', location.href);
    });
</script>
</html>