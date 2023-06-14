<?php
    require_once "login.php";
    session_start();
    $seat = 1; // number to be inserted in the column
    $name = $_SESSION["table"];

    // echo $name;
    while($seat<=24)
    { 
        $query = "INSERT INTO $name SET  Seat_no = $seat;";
        $conn->query($query);
        $seat++;
    }
    
    if ($seat=24) {
        echo $seat;
        // echo("<br>the data has been inserted");
    }

    $q = "UPDATE $name SET IsTaken=1 WHERE Seat_no=1";
    $conn->query($q);

    $q = "update $name set IsTaken=0 where IsTaken=1"; //Resetting the first seat is not taken
    $conn->query($q);

    function Redirect($url, $permanent = false) { //Redirects to given page
        header('Location: ' . $url, true, $permanent ? 301 : 302);
        exit();
        }
       Redirect('../seatBook.php', false);
    

?>