<?php
session_start();
// Check if page was accessed directly
if (!isset($_SERVER['HTTP_REFERER'])) {
  // Redirect to homepage or error page
  header('Location: /get');
  exit();
}


?>

<header>
  <p>BusX Bookings <br> || Miles of smiles! Always going your way! ||</p>
</header>
<br>
<button class="my-button" onclick="redirectToIndex()">Back to Homepage</button>

<?php
require "../db_scripts/login.php";
$usermail = $_SESSION['usermail'];



//$pdo = new PDO("$host;$dbname, $username, $password);

// Use the query() method to retrieve a list of table names
$table_query = $conn->query("SHOW TABLES");

// Initialize an empty array to store the data and the table names
$dataActive = array();
$dataInactive = array();
$checkbox = array();

// Use the fetch() method to retrieve each table name
while ($table_row = $table_query->fetch_array()) {
  // Retrieve the table name
  $table_name = $table_row[0];

  // Execute a query to search for matching emails in the current table
  $email_query = $conn->query("SELECT * FROM $table_name WHERE Email = '$usermail'");

  // Check if any matching emails were found
  while ($email_row = $email_query->fetch_array()) {
    // Retrieve the status value from the row
    $status = $email_row['Status'];

    // Add the row data to the data array according to the status of that ticket
    if ($status == 'Active') {
      $dataActive[] = $email_row;
      $checkbox[] = $table_name;
    }
    else if ($status == 'Cancelled') {
      $dataInactive[] = $email_row;
    }
    
  }
}




// Rest of the code remains unchanged


// Display the data in a table format for active status
echo "<form action='../db_scripts/getCancelSeats.php' method='post'>";
echo "<table>";
echo "<tr><th>Check</th><th>Seat_no</th><th>Name</th><th>Age</th><th>Date</th><th>Route</th><th>Status</th></tr>";
if(empty($dataActive)){
  echo "<td>" . "Active Records Not Found ". "</td>";

}
else{
  foreach ($dataActive as $index => $row) {
  
    $checkboxValue = $checkbox[$index] . '-'. $row['Seat_no'];
    
    echo "<tr>";
    echo "<td><input type='checkbox' name='selectedRows[]' value='$checkboxValue' onchange='displaySelectedData()'></td>";
    echo "<td>" . $row['Seat_no'] . "</td>";
    echo "<td>" . $row['Name'] . "</td>";
    echo "<td>" . $row['Age'] . "</td>";
    echo "<td>" . $row['Date'] . "</td>";
    echo "<td>" . $row['Route'] . "</td>";
    echo "<td>" . $row['Status'] . "</td>";
    echo "</tr>";
  }
}

echo "</table>";
echo "<br>";
echo "<textarea id='result' placeholder='Check the checkboxes to Cancel Ticket *Note: Ticket Status Must be Active' readonly></textarea>";
echo "&nbsp;&nbsp;&nbsp;<input type='submit' value='Cancel'>";
echo "</form>";
echo "<br><br> Inactive or Cancled tickets on this email<br><br>";
echo "<table>";
echo "<tr><th>Seat_no</th><th>Name</th><th>Age</th><th>Date</th><th>Route</th><th>Status</th></tr>";
foreach ($dataInactive as $index => $row) {
  echo "<td>" . $row['Seat_no'] . "</td>";
  // echo "<td>" . $checkbox[$index] . "</td>";
  echo "<td>" . $row['Name'] . "</td>";
  echo "<td>" . $row['Age'] . "</td>";
  echo "<td>" . $row['Date'] . "</td>";
  echo "<td>" . $row['Route'] . "</td>";
  echo "<td>" . $row['Status'] . "</td>";
  echo "</tr>";
}
echo "</table>";
?>

<script>
  function displaySelectedData() {
    var selectedCheckboxes = document.querySelectorAll('input[name="selectedRows[]"]:checked');
    var resultTextBox = document.getElementById('result');
    var output = '';
    for (var i = 0; i < selectedCheckboxes.length; i++) {
      var checkboxValue = selectedCheckboxes[i].value;
      console.log(checkboxValue);
      
      var tableAndSeatNo = checkboxValue.split('-');
      var table_name = tableAndSeatNo[0];
      var seatNo = tableAndSeatNo[1];
      
      var route = selectedCheckboxes[i].parentNode.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.innerText;
      output += 'Table Name: ' + table_name + ', Seat No: ' + seatNo + ', Route: ' + route + '\n';
    }
    resultTextBox.innerHTML = output;
  }
  
  function redirectToIndex() {
  window.location.href = '../index.php';
}

</script>

<?php
session_abort(); // Calling the session abort function here, comment this if we want to save the aray data for further use.
?>




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

  
  header {
  background-color: yellow;
  padding: 20px;
  text-align: center;
}

header p {
  font-size: 24px;
  font-weight: bold;
  margin-bottom: 10px;
}

header p::after {
  content: '';
  display: block;
  border-bottom: 2px solid #333;
  margin: 0 auto;
  width: 80px;
  margin-top: 10px;
}


  #result {
    display: inline-block;
    padding: 5px 10px;
    background-color: #f2f2f2;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 14px;
    color: #333;
    width: 400px;
    /* Allow vertical resizing */
    overflow: auto;
    /* Add scrollbar when content exceeds height */
    min-height: 60px;
    /* Set a minimum height for the text box */
  }



  table {
    border-collapse: collapse;
    width: 100%;
  }

  th,
  td {
    padding: 8px;
    text-align: left;
    border-bottom: 1px solid #ddd;
  }

  tr:hover {
    background-color: #f5f5f5;
  }

  th {
    background-color: #4CAF50;
    color: white;
  }
</style>