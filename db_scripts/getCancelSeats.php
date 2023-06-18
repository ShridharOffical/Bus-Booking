<?php
require "../db_scripts/login.php";
// Take another connection to the db is required as two tables exist in different databases.

$hn = "localhost";
$un = "root";
$pw = "";
$db = "login";

$conn2 = new mysqli($hn, $un, $pw, $db); // connects to the db table


$_SESSION['refundstatus'] = true;
$GetSeatArray = $_POST['selectedRows'];
$currentTable = null;
$seatcounter = 0;

session_start(); // Start the session

$amount = 0; // Initialize the amount

foreach ($GetSeatArray as $checkboxValue) {
    $tableAndSeatNo = explode('-', $checkboxValue);
    $table_name = $tableAndSeatNo[0];
    $seatNo = $tableAndSeatNo[1];

    // Retrieve the route and date from the corresponding row
    $query = "SELECT Date, Route FROM $table_name WHERE Seat_no='$seatNo'";
    $result = mysqli_query($conn, $query);
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $date = $row['Date'];
        $route = $row['Route'];
        
        //For getting the acurate amount from the db
        $routefetch = $conn2->query("select * from fares"); //This line was moved inside the while loop and will fetch for each table

        while ($routeTable = mysqli_fetch_row($routefetch)){// checking if the current table matches the current route table
            $currentRoute = strtolower($routeTable[0]);
            

            if (strtolower($route) == $currentRoute)
            {
                $temp = mysqli_num_rows($result) * $routeTable[1];
                $amount += $temp;
                break;
            }
    }

        // Update the table by setting the Status as 'Cancelled' and IsTaken as 0
        $updateQuery = "UPDATE $table_name SET Status='Cancelled', IsTaken=0 WHERE Seat_no='$seatNo'";
        $updateResult = mysqli_query($conn, $updateQuery);

        if ($updateResult) {
            $seatcounter++;
            // Use the $date, $route, and other necessary values to perform further actions or database operations
            // For example, you can insert the refund information into the refundedrecords table.
            // $insertQuery = "INSERT INTO refundedrecords (Name, Email, amount, tablename, seat_no) VALUES (...)";

        } else {
            echo "Query error: " . mysqli_error($conn);
        }
    } else {
        echo "No row found for the given seat in table $table_name";
    }
    }


$_SESSION['amount'] = $amount; // Store the accumulated amount in a session variable

// Redirect to refund.php
header("Location: ../admin_pages/refund.php");
exit;
 // Make sure to exit after the redirect
 ?>
