
<!-- This file checks the Entered creds are true or not for admin login. -->

<?php 
    $hn = "localhost";
    $username = "root";
    $password = "";
    $db = "login";

    $conn = mysqli_connect($hn,$username,$password,$db);

    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM `cred` WHERE username='$username'";

    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);

    if ($num == 1){
            $row=mysqli_fetch_assoc($result);
            if ($password == $row['password']){ 
                $login = true;
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $username;
                header("location: ../admin_pages/admin.php");
            } 
            else{
                header("location: ../admin_login.php");
            }
        }
        
    
    else{
        header("location: ../admin_login.php");
    }

    
?>