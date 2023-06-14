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
   // echo $row[0];
}

$currentDate = date('Y-m-d');
$filterTables = array();

foreach ($tables as $table) {
    $tableDate = substr($table, -8);

    // Convert dates to DateTime objects for proper comparison
    $tableDateTime = DateTime::createFromFormat('Y-m-d', $tableDate);
    $currentDateTime = DateTime::createFromFormat('Y-m-d', $currentDate);

    if ($tableDateTime < $currentDateTime) {
        //echo "Processing table: $table<br>";

        $query = "UPDATE $table SET status = 'Expired' WHERE status != 'Cancelled' AND status != '' AND status != 'Expired' AND IsTaken != 0";

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
