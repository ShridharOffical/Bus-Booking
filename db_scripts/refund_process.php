<?php
// Check if the upi_id parameter is set in the URL
if (isset($_GET['upi_id'])) {
  // Retrieve the UPI ID from the URL
  $upi_id = $_GET['upi_id'];
  $amount=  $_GET['amount'];
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
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $upiId = $_POST['upi_id'];
    $paymentAmount = $_POST['payment_amount'];

    // Insert information into refund_records table
    $insertQuery = "INSERT INTO refundrecord (upi_id, amount, status) VALUES ('$upiId', '$paymentAmount', 'refunded')";
    $hn = "localhost";
    $un = "root";
    $pw = "";
    $db = "login";
    $conn = new mysqli($hn,$un,$pw,$db); // connects to the db table
    $insertResult = mysqli_query($conn, $insertQuery);

    if ($insertResult) {
        // Delete the row from refund table
        $deleteQuery = "DELETE FROM refund WHERE UPI_ID = '$upiId' AND amount = '$paymentAmount'";
        $deleteResult = mysqli_query($conn, $deleteQuery);

        if ($deleteResult) {
          ?>
          <script>
            alert("Amount has been Refunded .");
            window.location.href = "../admin_pages/admin.php";
          </script>
          <?php
        } else {
            echo "Error deleting row from refund table: " . mysqli_error($conn);
        }
    } else {
        echo "Error inserting data into refund_records table: " . mysqli_error($conn);
    }
}
?>
<style>
    h2 {
        color: #333;
        font-size: 24px;
        margin-bottom: 20px;
    }

    form {
        max-width: 400px;
        margin: 0 auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #f5f5f5;
    }

    label {
        display: block;
        margin-bottom: 10px;
        font-weight: bold;
    }

    input[type="text"] {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    input[type="submit"] {
        display: block;
        width: 100%;
        padding: 10px;
        margin-top: 20px;
        border: none;
        border-radius: 4px;
        background-color: #4caf50;
        color: #fff;
        font-weight: bold;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #45a049;
    }
</style>

<h2>Refund Process</h2>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <label for="upi_id">UPI ID:</label>
    <input type="text" id="upi_id" name="upi_id" value="<?php echo $upi_id ?? ''; ?>" required>
    <br><br>
    <label for="payment_amount">Payment Amount:</label>
    <input type="text" id="payment_amount" name="payment_amount" value="<?php echo $_GET['amount'] ?? ''; ?>" required>
    <br><br>
    <input type="submit" value="Submit">
</form>

</body>
</html>
