<!DOCTYPE html>
<html>
<head>
  <title>Refund Table</title>
  <style>
    body {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    table {
      border-collapse: collapse;
      width: 100%;
      max-width: 600px;
    }
    th, td {
      padding: 8px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }
    th {
      background-color: green;
      color: white;
    }
    tr:hover {
      background-color: #f5f5f5;
    }
    a {
      text-decoration: none;
      color: #0000FF;
      font-weight: bold;
    }
    a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  
  <table>
    <tr>
      <th>UPI_ID</th>
      <th>Amount</th>
      <th>Status</th>
    </tr>
    <?php
    // Assuming you have a refund_data table in your database with columns order_id, refund_amount, and refund_reason
    // Replace the database credentials with your own
    require_once "admindb.php";
    echo "<button class='my-button' onclick=redirectToIndex()>Back to Dashbord</button>";
    $sql = "SELECT UPI_ID,amount,'status' FROM refundrecord";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
          echo "<tr>";
          echo "<td>" . $row["UPI_ID"] . "</td>";
          echo "<td>" . $row["amount"] . "</td>";
          echo "<td>" . $row["status"] . "</td>";
          echo "</tr>";
      }
  } else {
      echo "<tr><td colspan='4'>No refund data available</td></tr>";
  }
  $conn->close();
  
    ?>
  </table>
  <style>
     .my-button {
  position: fixed;
  top: 10px;
  right: 10px;
  background-color: rebeccapurple;
  color: white;
  padding: 10px 20px;
  font-size: 16px;
  border: none;
  cursor: pointer;
  border-radius: 4px;
}

.my-button:hover {
  background-color:red;
}
    </style>
  <script>
    function redirectToIndex() {
  window.location.href = '../admin_pages/admin.php';
}
</script>
</body>
</html>
