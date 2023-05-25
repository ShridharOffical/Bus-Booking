


<?php
session_start();
// Check if page was accessed directly
if(!isset($_SERVER['HTTP_REFERER'])) {
    // Redirect to homepage or error page
    header('Location: /get');
    exit();
}

// Page content here


?> 

<header>
        <p>BusX Bookings <br> || Miles of smiles! Always going your way! ||</p>
    </header>
    <br>
    
 <?php    
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "learn";
    $usermail = $_SESSION['usermail'];
  
  $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);


  //$pdo = new PDO("$host;$dbname, $username, $password);

  // Use the query() method to retrieve a list of table names
  $table_query = $pdo->query("SHOW TABLES");

  // Initialize an empty array to store the data and the table names
  $data = array();
  $rootanddate = array();

  // Use the fetch() method to retrieve each table name
  while ($table_row = $table_query->fetch()) {
    // Retrieve the table name
    $table_name = $table_row[0];
    // Execute a query to search for matching emails in the current table
    $email_query = $pdo->query("SELECT * FROM $table_name WHERE Email = '$usermail'");

    // Check if any matching emails were found
    while ($email_row = $email_query->fetch()) {
      // Add the row data to the data array
      $data[] = $email_row;
      $rootanddate[] = $table_name;
    }
  

  // Display the data in a table format
  echo "<table>";
  echo "<tr><th>Check</th><th>Seat_no</th><th>Name</th><th>Age</th><th>Date</th><th>Route</th><th>Status</th></tr>";
  $i = 0;
  foreach ($data as $row) {
      $checkbox = $table_name . $row['Seat_no'];
      echo "<tr>";
      echo "<td><input type='checkbox' name='selectedRows[]' value='$checkbox' onchange='displaySelectedData()'></td>";
      echo "<td>" . $row['Seat_no'] . "</td>";
      echo "<td>" . $row['Name'] . "</td>";
      echo "<td>" . $row['Age'] . "</td>";
      echo "<td>" . $row['Date'] . "</td>";
      echo "<td>" . $row['Route'] . "</td>";
      echo "<td>" . $row['Status'] . "</td>";
      echo "</tr>";
      $i++;
  }
  echo "</table>";
  
  // Result text box
  echo "<textarea id='result' placeholder='Check the checkboxes to Cancel Ticket *Note: Ticket Status Must be Active' readonly></textarea>";
  
  // JavaScript function to display selected data


  
  
}
?>
<script>
function displaySelectedData() {
  var selectedCheckboxes = document.querySelectorAll('input[name="selectedRows[]"]:checked');
  var resultTextBox = document.getElementById('result');
  var output = '';
  for (var i = 0; i < selectedCheckboxes.length; i++) {
    var checkboxValue = selectedCheckboxes[i].value;
    var seatNo = checkboxValue.substr('.$table_name_len.');
    var route = selectedCheckboxes[i].parentNode.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.innerText;
    output += 'Seat No: ' + seatNo + ', Route: ' + route + '\n';
  }
  resultTextBox.innerHTML = output;
}
</script>
<?php  
session_abort(); // Calling the session abort function here, comment this if we want to save the aray data for further use.
?>




<style>
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
  overflow: auto; /* Add scrollbar when content exceeds height */
  min-height: 60px; /* Set a minimum height for the text box */
}



  table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
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
