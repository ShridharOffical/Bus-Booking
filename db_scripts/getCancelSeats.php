<?php
require "../db_scripts/login.php";

$GetSeatArray = $_POST['selectedRows'];
for ($i = 0; $i < sizeof($GetSeatArray); $i++) {


    $currentTableDate = $GetSeatArray[$i];
    // echo $currentTableDate ,"\n";
    //Below we seprate the table name and seat no to be deleted
    $currentTable = substr($currentTableDate, 0, 12);
    echo $currentTable ,"\n";
    //$currentTable = substr($currentTableDate,0,strlen($currentTableDate)-2);
    $currentSeat = substr($currentTableDate, 13);
    // echo $currentSeat ,"\n";
    $query = "UPDATE $currentTable SET Status='Cancelled', IsTaken=0 WHERE Seat_no='$currentSeat'";

    // $query = "update $currentTable SET IsTaken=0,status='cancelled'  where Seat_no=$currentSeat";
    mysqli_query($conn, $query);
}
    ?>
    <script>
        alert("Your Seats Has been Cancelled");
    window.location.href ="../admin_pages/refund.php";
    </script>
    <?php
    





?>