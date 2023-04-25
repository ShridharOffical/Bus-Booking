<?php
$hn = "localhost";
$username = "root";
$password = "";
$db = "login";

$conn = mysqli_connect($hn, $username, $password, $db);

$T = mysqli_query($conn, "SELECT * FROM `page_views` ;");

$total_views = 0; //^ will store all the booked seats from the database

while ($rows = mysqli_fetch_array($T)) {
    $total_views += $rows['count'];
}


?>



