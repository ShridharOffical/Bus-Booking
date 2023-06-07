<?php
//require '../db_scripts/login.php';
$hn = "localhost";
$un = "root";
$pw = "";
$db = "learn";

$conn = new mysqli($hn,$un,$pw,$db);
$tablesQuery = "SHOW TABLES";
$tablesResult = $conn->query($tablesQuery);

$tables = array();
while ($row = $tablesResult->fetch_array()) {

    $tables[] = $row[0];
    echo $row[0];
}

$currentDate = date('Y-m-d');
$filterTables = array();

foreach ($tables as $table) {

    
    $year = substr($table, 4, 4);
    $month = substr($table, 8, 2);
    $day = substr($table, 10, 2);
    $tableDate = $year . "-" . $month . "-" . $day;
    
    // $dateString = substr($table, 0, 8); // Extract the date string
    // $year = substr($dateString, 0, 4); // Extract the year
    // $month = substr($dateString, 4, 2); // Extract the month
    // $day = substr($dateString, 6, 2); // Extract the day

    //$tableDate = $year . '-' . $month . '-' . $day; // Create a valid date format (YYYY-MM-DD)
    

    if ($tableDate < $currentDate) {
        //echo "Processing table: $table<br>";
 
        $query = "UPDATE $table SET status = 'Expired', IsTaken = 0 WHERE status != 'Cancelled' AND status != '' AND status != 'Expired' AND IsTaken != 0";

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
?><script>alert('All Tickets has Been Expired ');
           window.location.href = "../admin_pages/admin.php";</script><?php

?>
