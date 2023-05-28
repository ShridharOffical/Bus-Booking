<?php
$hn = "localhost";
$un = "root";
$pw = "";
$db = "login";
$conn = new mysqli($hn,$un,$pw,$db);

$upiId = $_POST['upi_id'];
$refundReason = $_POST['refund_reason'];

// Prepare the INSERT statement
$stmt = $conn->prepare("INSERT INTO refund ( UPI_ID , Cancell_Reason ) VALUES (?, ?)");

// Bind the parameter values
$stmt->bind_param('ss', $upiId, $refundReason);

// Execute the query
if ($stmt->execute()) {
  // Data inserted successfully
  ?>
  <script>
    alert("Refund process has been completed. SORRY FOR INCONVENIENCE.");
    window.location.href = "../index.php";
  </script>
  <?php
} else {
  // Error occurred
  echo "Error: " . $stmt->error;
}

// Close the statement
$stmt->close();
?>

