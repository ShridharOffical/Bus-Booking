<?php
// Check if the upi_id parameter is set in the URL
if (isset($_GET['upi_id'])) {
  // Retrieve the UPI ID from the URL
  $upi_id = $_GET['upi_id'];

  // Perform the payment process
  // Add your code here to process the payment, update the necessary database records, etc.

  // Show payment success message
  //echo "<script>alert('Payment Successful');</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Refund Process</title>
</head>
<body>
  <h2>Refund Process</h2>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <label for="upi_id">UPI ID:</label>
    <input type="text" id="upi_id" name="upi_id" value="<?php echo $upi_id ?? ''; ?>" required>
    <br><br>
    <label for="payment_amount">Payment Amount:</label>
    <input type="text" id="payment_amount" name="payment_amount" required>
    <br><br>
    <input type="submit" value="Submit">
  </form>
</body>
</html>
