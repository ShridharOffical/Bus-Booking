<?php
require '../db_scripts/login.php';
$conn = new mysqli('localhost', 'root', '', 'learn');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$tablesQuery = "SHOW TABLES";
$tablesResult = $conn->query($tablesQuery);

if (!$tablesResult) {
    die("Error fetching tables: " . $conn->error);
}

$tables = array();
while ($row = $tablesResult->fetch_array()) {
    $tables[] = $row[0];
}

$currentDate = date('Y-m-d');
$filterTables = array();

foreach ($tables as $table) {
    $dateString = substr($table, 0, 8); // Extract the date string
    $year = substr($dateString, 0, 4); // Extract the year
    $month = substr($dateString, 4, 2); // Extract the month
    $day = substr($dateString, 6, 2); // Extract the day

    $tableDate = $year . '-' . $month . '-' . $day; // Create a valid date format (YYYY-MM-DD)
    
    if ($tableDate < $currentDate) {
        echo "Processing table: $table<br>";

        $query = "UPDATE $table SET status = 'Expired' WHERE status != 'Cancelled' AND status!='' AND status != 'Expired' AND IsTaken != 0" ;
        $result = $conn->query($query);

        if (!$result) {
            echo "Error updating table: $table - " . $conn->error . "<br>";
        } else {
            echo "Table updated successfully: $table<br>";
        }

        $filterTables[] = $table;
    }
}




$conn->close();
header("Location: ../admin_pages/admin.php");
exit();
?>
