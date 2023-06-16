<?php

require_once 'login.php';

// Take another connection to the db is required as two tables exist in different databases.

$hn = "localhost";
$un = "root";
$pw = "";
$db = "login";

$conn2 = new mysqli($hn, $un, $pw, $db); // connects to the db table

$tables = mysqli_query($conn, "SHOW TABLES");
$total_earnings = 0; //^ will store the total earnings
$total_seats = 0;

while ($table = mysqli_fetch_object($tables)) {
    
    $table_name = $table->{"Tables_in_learn"};
    
    $results = mysqli_query($conn, "SELECT * FROM `$table_name` WHERE IsTaken=1");
    $routefetch = $conn2->query("select * from fares"); //This line was moved inside the while loop and will fetch for each table

    if ($results) {
        while ($routeTable = mysqli_fetch_row($routefetch)) {
            $Route = substr($table_name, 0, strlen($table_name) - 8); //Removes the date from the table name
            $currentRoute = strtolower($routeTable[0]);


            if ($Route == $currentRoute)
            {
                $temp = mysqli_num_rows($results) * $routeTable[1];
                $total_seats+=mysqli_num_rows($results);
                $total_earnings += $temp;
                break;
            }

    
        }
    
    }
    
}

?>
