<?php
require "login.php";

$GetSeatArray = $_POST['selectedRows'];
$statusArray = $_POST['status'];
for ($i=0; $i < sizeof($GetSeatArray); $i++) {
    
 
    $currentTableDate = $GetSeatArray[$i];

    //Below we seprate the table name and seat no to be deleted
    $currentTable = substr($currentTableDate, 0, 12);

    //$currentTable = substr($currentTableDate,0,strlen($currentTableDate)-2);
    $currentSeat = substr($currentTableDate, 12);
    $status = $statusArray[$i]; //get status value

    if( $status=='Active'){
    $query = "UPDATE $currentTable SET Status='cancelled', IsTaken=0 WHERE Seat_no='$currentSeat'";

   // $query = "update $currentTable SET IsTaken=0,status='cancelled'  where Seat_no=$currentSeat";
    mysqli_query($conn,$query);

    ?> <script>
alert("Your Seats Has been Cancelled");
//window.location.href ="admin_pages/ex.php";
</script> <?php
}
else{
    ?> <script>
    alert("Please select Active Status ticket Only ");
</script> <?php
}
}



?>