<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Bookings</title>
</head>

<body>
    <header>
        <p>BusX Bookings <br> || Miles of smiles! Always going your way! ||</p>
    </header>
    <br>

    <form action="" method="GET">
        <label for="email">Enter your email:</label>&nbsp;
        <input type="email" id="email" name="email">
        <br>
        <button type="submit">Submit</button>
    </form>

    <?php
   
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "login";
// Connect to the database
$conn = new mysqli($host, $username, $password, $dbname);

// Get the list of tables
$sql = "SELECT table_name FROM information_schema.tables WHERE table_schema='$dbname'";
$result = $conn->query($sql);
$em=$_GET["email"];
if ($result->num_rows > 0) {
  // Loop through each table
  while($row = $result->fetch_assoc()) {
    $table = $row["table_name"];

    // Query the table to find the matching data
    $sql2 = "SELECT * FROM $table WHERE Email='$em'";
    $result2 = $conn->query($sql2);

    if ($result2->num_rows > 0) {

      // Echo the matched data
      while($row2 = $result2->fetch_assoc()) {

        echo "Match found in table $table: " . $row2["column_"] . "<br>";
      }
    }
  }
} else {
  echo "No tables found in the database";
}

// Close the database connection
$conn->close();
?> 

    <style>
        body {
            background-color: grey;
        }

        header {
            justify-content: center;
            text-align: center;
            font-size: 100%;
            font-weight: 900;
            align-items: center;
            padding: 10px;
            background-color: yellow;
        }
        form{
            text-align: center;
            justify-content: center;
            align-items: center;
        }
    </style>


</body>

</html>