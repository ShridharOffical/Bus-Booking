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
      <th>Cancellation Reason</th>
      <th>Refund</th>
    </tr>
    <?php
    // Assuming you have a refund_data table in your database with columns order_id, refund_amount, and refund_reason
    // Replace the database credentials with your own
    $hn = "localhost";
    $un = "root";
    $pw = "";
    $db = "login";

    $conn = new mysqli($hn,$un,$pw,$db);
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    // Fetch refund data from the refund_data table
    $sql = "SELECT UPI_ID, Cancell_Reason FROM refund";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["UPI_ID"] . "</td>";
        echo "<td>" . $row["Cancell_Reason"] . "</td>";
        echo '<td><a href="refund_process.php?upi_id=' . urlencode($row["UPI_ID"]) . '">Refund</a></td>';
        echo "</tr>";
      }
    } else {
      echo "<tr><td colspan='3'>No refund data available</td></tr>";
    }
    $conn->close();
    ?>
  </table>
</body>
</html>
