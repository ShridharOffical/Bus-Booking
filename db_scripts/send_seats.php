<?php
    require_once 'login.php';

    $TN = $_SESSION['table'];

    $raw_Seats =  $_COOKIE['Seats'];

    $arr = array_map('intval', explode(',',$raw_Seats)); //^ converting the string array to int array

    // echo var_dump($arr);

    for ($i=0; $i < count($arr) ; $i++) { //^sending data to the back end 
        
        $query = "UPDATE $TN SET IsTaken=1 WHERE Seat_no=" . $arr[$i];
        $conn->query($query);
    }

    mysqli_close($conn);
    // exit;
?>


