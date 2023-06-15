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
    // write code here to check every row if the date is not equal to or greater than the current date
    foreach ($tables as $table) {
        
        $tableName = $table;
        
        $query = "UPDATE `$tableName` SET status = 'Expired' WHERE STR_TO_DATE(`Date`, '%Y-%m-%d') < CURDATE() AND status != 'Cancelled' AND status != '' AND status != 'Expired' AND IsTaken != 0";
    
        $result = $conn->query($query);
    
        if (!$result) {
            echo "Error updating table: $tableName - " . $conn->error . "<br>";
        } else {
            echo "Table updated successfully: $tableName<br>";
        }
    
        $filterTables[] = $tableName;
    }
    
}






$conn->close();
?><script>alert('All Tickets has Been Expired ');
         window.location.href = "../admin_pages/admin.php";</script><?php

?>
