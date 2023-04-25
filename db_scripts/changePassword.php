<?php
    $hn = "localhost";
    $username = "root";
    $password = "";
    $db = "login";

    $conn = mysqli_connect($hn,$username,$password,$db);
    $newpassword = $_POST['NewPassword'];
    $confirmpassword = $_POST['ConfirmPassword'];
    if (!$conn) {
        echo "the connection was not set up properly";
    }
    else if ($newpassword != $confirmpassword) {
        header("location: ../admin_pages/changepassword.php");
        mysqli_close($conn);

    }
    else if (strlen($newpassword)<8) {
        header("location: ../admin_pages/changepassword.php");
        mysqli_close($conn);
    }
    else {
        echo $newpassword;
        $query = "UPDATE `cred` SET `password`= '$newpassword';";
        mysqli_query($conn,$query);
        header("location: ../admin_login.php");
        mysqli_close($conn);
    }


