
<header>
        <p>BusX Bookings <br> || Miles of smiles! Always going your way! ||</p>
    </header>
    <br>

    <form action="" method="POST">
        <label for="email">Enter your email:</label>&nbsp;
        <input type="email" id="email" name="email" required>
        <br>
        <input type="submit" name="submit" value="Run Script">
    </form>

    <?php
    
     
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "learn";
  
  $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
if (isset($_POST['submit'])) {

  // Retrieve the email from session variable
  $email=$_POST["email"];
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
    $email_query = $pdo->query("SELECT * FROM $table_name WHERE Email = '$email'");

    // Check if any matching emails were found
    while ($email_row = $email_query->fetch()) {
      // Add the row data to the data array
      $data[] = $email_row;
      $rootanddate[] = $table_name;
    }
  }

  // Display the data in a table format
  echo "<table>";
  echo "<tr><th>Seat_no</th><th>Name</th><th>Age</th><th>Status</th><th>Root</th></tr>";
  $i = 0;
  foreach ($data  as $row) {
    echo "<tr>";
    echo "<td>" . $row['Seat_no'] . "</td>";
    echo "<td>" . $row['Name'] . "</td>";
    echo "<td>" . $row['Age'] . "</td>";
    echo "<td>" . $row['Status'] . "</td>";
    echo "<td>" . $rootanddate[$i] . "</td>";
    echo "</tr>";
    $i++;
  }
  echo "</table>";
}

?>




<style>
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