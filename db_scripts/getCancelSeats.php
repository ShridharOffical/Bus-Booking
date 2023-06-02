<?php
require "../db_scripts/login.php";
session_start();
$_SESSION['refundstatus'] = true;
$GetSeatArray = $_POST['selectedRows'];
$currentTable = null;
$seatcounter = 0; // increments when we deactivate a seat
for ($i = 0; $i < sizeof($GetSeatArray); $i++) {
    
    $currentTableDate = $GetSeatArray[$i];

    //Below we seprate the table name and seat no to be deleted

    $currentTable = substr($currentTableDate, 0, 12);
    //$currentTable = substr($currentTableDate,0,strlen($currentTableDate)-2);
    $currentSeat = substr($currentTableDate, 13);

    //Removing the seats by setting the isTaken value to 0
    $query = "UPDATE $currentTable SET Status='Cancelled', IsTaken=0 WHERE Seat_no='$currentSeat'";
        
    $result = mysqli_query($conn, $query);
if ($result) {
    $seatcounter++;
} else {
    echo "Query error: " . mysqli_error($conn);
}
}
    //Here we will extract the information we need for the refundrecord table
    // $query = "insert into refundedrecords column(Name,Email,amount,tablename,seat_no) values()"; 
    ?>

<?php
// Redirect to refund.php
header("Location: ../admin_pages/refund.php");
exit; // Make sure to exit after the redirect
?>