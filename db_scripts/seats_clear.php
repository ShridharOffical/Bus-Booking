<?php
    require_once 'login.php';

    $query = 'UPDATE `spiderman_30m` SET IsTaken=0 WHERE IsTaken=1';
    $conn->query($query);

    mysqli_close($conn);


?>