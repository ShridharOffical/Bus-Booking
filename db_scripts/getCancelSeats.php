<?php
require "login.php";

$GetSeatArray = $_POST['selectedRows'];

for ($i=0; $i < sizeof($GetSeatArray); $i++) { 
    $currentTableDate = $GetSeatArray[$i];

    //Below we seprate the table name and seat no to be deleted
    $currentTable = substr($currentTableDate,0,strlen($currentTableDate)-2);
    $currentSeat = substr($currentTableDate,strlen($currentTableDate)-2);
    
    $query = "update $currentTable SET IsTaken=0 where Seat_no=$currentSeat";
    mysqli_query($conn,$query);

}
echo "The seats have been cancled";
?>