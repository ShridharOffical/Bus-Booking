<?php
require "../db_scripts/login.php";
session_start();

$_SESSION['refundstatus'] = true;
$GetSeatArray = $_POST['selectedRows'];
$currentTable = null;
$seatcounter = 0;

var_dump($GetSeatArray);

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

// Redirect to refund.php
header("Location: ../admin_pages/refund.php");
exit; // Make sure to exit after the redirect
?>
