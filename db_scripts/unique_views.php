<?php
    $hn = "localhost";
    $username = "root";
    $password = "";
    $db = "login";

    $conn = mysqli_connect($hn,$username,$password,$db);
    

    mysqli_query($conn,"UPDATE page_views SET count=count+1;");

    
?>



