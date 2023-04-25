<?php

    require_once 'login.php';
    session_start();
    $Tname = $_SESSION['table'];
    

    $query = "SELECT Seat_no FROM $Tname WHERE IsTaken>0";
    $Sold_seats = $conn->query($query);
    
    
    $data = array(); // ^Gets the Seat number which has been occupied
    // if (!$Sold_seats) exit;
    
    if (mysqli_num_rows($Sold_seats) > 0) {
        
        while ($row = mysqli_fetch_array($Sold_seats)) {
            
            $data[] = (int) ($row['Seat_no']);
        }
    }
    mysqli_close($conn);
?>